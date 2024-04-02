
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://pay.uniquepaybd.com/request/payment/create',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('cus_name' => 'demo','cus_email' => 'demo@gmail.com','amount' => '50','success_url' => 'https://myearningbd.com/payment/success.php','cancel_url' => 'https://myearningbd.com/payment/cancel.php'),
  CURLOPT_HTTPHEADER => array(
    'app-key: yDQqB1dZ9hVqB',
    'secret-key: 57992403',
    'host-name: myearningbd.com',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
                