<?php

$conn = mysqli_connect('localhost', 'root', '', 'test');


$response = json_decode(file_get_contents('php://input'), true);
$response_json = json_encode($response);
$state = $response["state"];
$frag = $response["frag"];
$mes = $response["text"];
$time = $response["id"];

$sql = "INSERT INTO `ack` (`id`, `state`, `frag`, `message`, `sms_id`, `response`) 
		VALUES ('','$state', '$frag', '$mes', '$time', '$response_json') ";
$query = mysqli_query($conn, $sql);

if(!$query){
	echo "DIE";
}else{
	echo "SUCCESS";
}

?>