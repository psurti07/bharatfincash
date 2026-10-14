<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("153").className += " active";
      document.getElementById("1530").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-6 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Subscription Customers</h1>
	  </div>

		<div class="content-header-right col-md-6 col-12 mb-1">
		  <?php echo form_open('subscriptionusers', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

			  <fieldset class="form-group">
				From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
				&nbsp; &nbsp;
				  To: <input name="dt_from" type="date" class="input-sm form-control col-md-4" id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
				  &nbsp; &nbsp;
				  <button class="btn btn-outline-primary btn-sm" name="submit" type="submit">Show</button>
			  </fieldset>

		  <?php echo form_close(); ?> 
		</div>
	</div>

	<div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Full Name</th>
                        <th>Mobile</th>
                        <th>Email Id</th>
                        <th>City</th>
                        <th>State</th>
                        <th class='text-center'>Details</th>
                         <!--<?php if($this->session->userdata('adminid') == 1){  ?>
                        <th class='text-center'>Invoice</th>
                        <?php } ?>-->
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($userlist)) {
                        	$cnt=1; 
                        	foreach ($userlist as $row) {
                            if($row->isActive == 0) {
                              echo "<tr class='bg-danger bg-lighten-1 white'>";
                            }
                            else {
                              echo "<tr>";
                            }
                        		echo "<td width='50'>".htmlentities($cnt)."</td>";
                            echo "<td>".displayDate($row->rec_date)."</td>";
                            echo "<td class='text-capitalize'>".htmlspecialchars($row->fullname ?? '')."</td>";
                        		echo "<td>".htmlspecialchars($row->mobile ?? '')."</td>";
                            echo "<td width='320' class='dont-break-out'>".htmlspecialchars($row->email ?? '')."</td>";
                            echo "<td>".htmlspecialchars($row->city ?? '')."</td>";
                            echo "<td>".htmlspecialchars($row->state ?? '')."</td>";
                        		echo "<td class='text-center' width='50'>".anchor("subscriptionusers/userdetails/{$row->id}",'<i class="la la-info"></i>','class="btn btn-icon btn-outline-dark btn-sm"')."</td>";
                            /* if($this->session->userdata('adminid') == 1 && $row->invstatus == 1){  
                              echo "<td class='text-center' width='50'>".anchor("subscriptionusers/generateinvoice/{$row->id}",'<i class="la la-pencil"></i>','class="btn btn-icon btn-outline-dark btn-sm"')."
                              </td>";
                             } else {
                               echo "<td>
                              </td>";
                             }*/
                        		
                          	echo "</tr>";
                          	$cnt++;
                        	}
                        }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
