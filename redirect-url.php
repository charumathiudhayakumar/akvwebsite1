<?php
$response = $_POST;

echo '<pre>';
print_r($response);
echo '</pre>';

$saltkey = '';
$saltIndex = 1;

$string = '/pg/v1/status/'.$response['merchantId'].'/'.$response['transactionId'].saltkey;
$sha256=hash('sha256',$string);
$finalXHeader = $sha256.'###' .$saltIndex;


$ch= curl_init();

curl_setopt($ch,CURLOPT_URL,"https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/merchantId/merchantTransactionId");

curl_setopt($ch,CURLOPT_HTTPHEADER,
array('Content-Type:application/json',
'accept:application/json',
'X-VERIFY:'.$finalXHeader,
'X-MERCHANT-ID:'.$response['merchantId']
)
);

curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$response = curl_exec($ch);

$final = json_decode($response,true);

//echo '<pre>';
//print_r($final);
//echo '</pre>';

header('location:' .$final['data']['instrumentResponse']['redirectInfo']['url']);
exit;
?>
