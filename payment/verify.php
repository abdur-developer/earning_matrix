
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://pay.uniquepaybd.com/request/payment/verify',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('transaction_id' => 'JJTG987652'),
  CURLOPT_HTTPHEADER => array(
    'app-key: ##########',
    'secret-key: #####',
    'host-name: ###',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
        