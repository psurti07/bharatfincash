<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

    function getRCSToken() {
      $api_url = "https://rcsapi.rcscloud.smartping.io/rcs/api/user/authorize"; // Replace with your API URL

      // Prepare the payload
        $post_fields = json_encode([
            'userId' => RCS_USERID,
            'apiKey' => RCS_APIKEY
        ]);
      $ch = curl_init($api_url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json',
      ]);

      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      $response = curl_exec($ch);
      
      // Handle cURL errors
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            log_message('error', 'cURL error: ' . $error_msg);
            return ['error' => $error_msg];
        }

        curl_close($ch);
    
        $data = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'JSON decode error: ' . json_last_error_msg());
            return ['error' => 'Invalid JSON response'];
        }

        // Debugging (optional, remove in production)
        return $data;
    }

    function sendRCSmessage($mobiledata){
        $response= "";
        $tokan = getRCSToken();
        $tokankey = $tokan['data']['apiToken'];
        
        if($tokankey) {
            foreach ($mobiledata as $row) {
                $message = [
                    "templateId" => RCS_TEMPLATEID,
                    "to" => $row,
                    "customOne" => "1",
                    "customTwo" => "1",
                    "customThree" => "1",
                    "customFour" => "1",
                    "components" => [
                        "richCard" => [
                            [
                                "type" => "messageText",
                                "parameters" => []
                            ],
                            [
                                "type" => "messageDescription",
                                "parameters" => []
                            ],
                            [
                                "type" => "dynamicSuggestionURL",
                                "parameters" => []
                            ]
                        ]
                    ]
                ];
                $datapost['messages'][] = $message;
            }
            
            $jsonOutput = json_encode($datapost, JSON_PRETTY_PRINT);
        
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://rcsapi.rcscloud.smartping.io/rcs/api/message/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_AUTOREFERER => true,
                CURLOPT_HEADER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CONNECTTIMEOUT => 120,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 120,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonOutput,
                CURLOPT_HTTPHEADER => [
                  "cache-control: no-cache",
                  "Content-Type: application/json",
                  "Authorization: $tokankey"
                ],
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
    
            /*if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }*/
        } else {
            $response = "Access token error.";
        }
        
        return $response;
    }

?>