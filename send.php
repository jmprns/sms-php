<?php

$smsIp = "http://".$_POST["smsIp"]."/";
$cp = $_POST["cp"];
$mes = $_POST["mes"];


$data = json_encode(array("number" => $cp, "text" => $mes));
 
$ch = curl_init($smsIp);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

$response = json_decode($result, true);

if($response['number'] !== null){
	echo json_encode(array("status" => TRUE, "responseCode" => 200));
}else{
	print_r($result);

	// echo json_encode(array("status" => TRUE, "responseCode" => 404));
}
