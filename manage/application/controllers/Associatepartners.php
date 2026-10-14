<?php 
    require APPPATH . 'libraries/REST_Controller.php';
    class Associatepartners extends REST_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function index_post(){
            $headers = $this->input->get_request_header('saltkey');
            $decryptKey = stringCrypt($headers, 'decrypt');
            $postFromDate = $_REQUEST['fromdate'];
            $postToDate = $_REQUEST['todate'];
            $product = $_REQUEST['product'];
            if($_REQUEST['ip'] === LOCAL_IP) :
                if($decryptKey === COMPANY_CODE) : 
                    $dateResponse = $this->calculateCountWithAmt($postFromDate, $postToDate, $product, 'date');
                    $yearResponse = $this->calculateCountWithAmt($postFromDate, $postToDate, $product, 'year');
                    $graphResponse = $this->hourBasedCountUser($postFromDate, $postToDate, $product);
                    $this->response([
                        'date' => $dateResponse,
                        'year' => $yearResponse,
                        'graph' => $graphResponse
                    ],REST_CONTROLLER::HTTP_OK);
                else:
                    $this->response('Unauthorize Access', REST_CONTROLLER::HTTP_UNAUTHORIZED);
                endif;
            else :
                $this->response('Invalid Request Perform', REST_CONTROLLER::HTTP_BAD_REQUEST);
            endif;
        }

        public function calculateCountWithAmt($fromDate, $toDate, $type, $dateYear){
            // switch case
            switch($type){
                case 'membership':
                    $table = 'membership_order AS m';
                    $table1 = 'user_registration AS r';
                    $wherein = array(1,2);
                    break;
                    
                case 'subscription':
                    $table = 'subscription_order AS m';
                    $table1 = 'user_subscription_registration AS r';
                    $wherein = array(4,5);
                    break;
                
                default:
                    echo 'invalid case';
                    break;    
            }
            
            switch($dateYear){
                case 'date':
                    $where = "DATE(m.rec_date) BETWEEN '". $fromDate ." 00:00:00' AND '". $toDate ." 23:59:59'";
                    break;
                case 'year':
                    $where = "YEAR(m.rec_date) = '".date('Y')."' AND MONTH(m.rec_date) = '".date('m')."'";
                    break;
                default:
                    echo 'invalid case';
                    break;
            }

            $totalRecords = $this->db->where($where)->from($table)->get()->num_rows();
            $chunkSize = 50;
            $numChunks = ceil($totalRecords / $chunkSize);
            $totalAmount = 0;
            $totalUser = 0;
            
            for($i=0; $i<$numChunks; $i++){
                $offset = $i * $chunkSize;
                $limit = $chunkSize;
                // ---------------- Post Date Data -------------------//
                $date = $this->db->select('i.inv_price AS amount')->from($table)->limit($limit, $offset)
                    ->join($table1,'r.id = m.userid')->join('invoice AS i','i.cardid = m.id')
                    ->where_in('i.inv_for',$wherein)
                    ->where($where)
                    ->where(['m.isActive' => 1, 'm.isDelete' => 0, 'r.isUser' => 2, 'r.isActive' => 1, 'r.isDelete' => 0, 'i.isDelete' => 0])
                    ->get()->result();
                foreach($date as $q):
                    $totalAmount += $q->amount;
                    $totalUser++;
                endforeach;
            }
            return ['totalUser'=>$totalUser,'totalAmount'=>$totalAmount];
        }

        public function hourBasedCountUser($fromdate, $todate, $type){
            switch($type){
                case 'membership':
                    $table = 'membership_order AS m';
                    $table1 = 'user_registration AS r';
                    $wherein = array(1,2);
                    break;
                
                case 'subscription':
                    $table = 'subscription_order AS m';
                    $table1 = 'user_subscription_registration AS r';
                    $wherein = array(4,5);
                    break;
            
                default:
                    echo 'invalid case';
                    break;    
            }

            $query = $this->db->select('m.rec_date AS InTime, COUNT(r.id) AS RecordCount')->from($table)
                ->join($table1,'r.id = m.userid')
                ->join('invoice AS i','i.cardid = m.id')
                ->where_in('i.inv_for',$wherein)
                ->where('m.rec_date BETWEEN "'. $fromdate." 00:00:00".'" AND "'.$todate." 23:59:59".'"')
                ->where('m.isActive = 1 AND m.isDelete = 0 AND r.isUser = 2 AND r.isActive = 1 AND r.isDelete = 0 AND i.isDelete = 0')
                ->group_by('DATE_FORMAT(SEC_TO_TIME(((TIME_TO_SEC(m.rec_date)) DIV 60) * 60), "%Y-%m-%d %H:%i:%s")')
                ->order_by('m.rec_date', 'ASC')
                ->get()->result_array();
            return $query;
        }

        public function todayRoyalty_post(){
            $headers = $this->input->get_request_header('saltkey');
            $decryptKey = stringCrypt($headers, 'decrypt');
            $postFromDate = $_REQUEST['fromdate'];
            $postToDate = $_REQUEST['todate'];
            $product = $_REQUEST['product'];
            if($_REQUEST['ip'] === LOCAL_IP) :
                if($decryptKey === COMPANY_CODE) : 
                    $royaltyAmount = $this->calculateRoyaltyAmount($product, $postFromDate, $postToDate);
                    $this->response($royaltyAmount, REST_CONTROLLER::HTTP_OK);
                else:
                    $this->response('Unauthorize Access', REST_CONTROLLER::HTTP_UNAUTHORIZED);
                endif;
            else :
                $this->response('Invalid Request Perform', REST_CONTROLLER::HTTP_BAD_REQUEST);
            endif;
        }

        public function calculateRoyaltyAmount($product, $fromDate, $toDate){
            // Switch case
            switch ($product) {
                case 'membership':
                    $table = 'membership_order AS m';
                    $table1 = 'user_registration AS r';
                    $wherein = array(1,2);
                    break;
                    
                case 'subscription':
                    $table = 'subscription_order AS m';
                    $table1 = 'user_subscription_registration AS r';
                    $wherein = array(4,5);
                    break;

                default:
                    echo 'invalid case';
                    break;
            }

            $totalRecords = $this->db->where("DATE(rec_date) BETWEEN '".$fromDate." 00:00:00' AND '".$toDate." 23:59:59'")->from($table)->get()->num_rows();
            $chunkSize = 50;
            $numChunks = ceil($totalRecords / $chunkSize);
            $totalAmount = 0;
            for($i=0; $i<$numChunks; $i++){
                $offset = $i * $chunkSize;
                $limit = $chunkSize;
                $query = $this->db->select('i.inv_price AS amount')->from($table)->limit($limit, $offset)
                    ->join($table1,'r.id = m.userid')->join('invoice AS i','i.cardid = m.id')
                    ->where_in('i.inv_for',$wherein)
                    ->where("DATE(m.rec_date) BETWEEN '". $fromDate ." 00:00:00' AND '". $toDate ." 23:59:59'")
                    ->where(['m.isActive' => 1, 'm.isDelete' => 0, 'r.isUser' => 2, 'r.isActive' => 1, 'r.isDelete' => 0, 'i.isDelete' => 0])
                    ->get()->result();
                foreach($query as $q):
                    $totalAmount += $q->amount;
                endforeach;
            }
            return $totalAmount;
        }
    }
?>