<?php


$conn = mysqli_connect('localhost', 'root', '', 'test');



$response = json_decode(file_get_contents('php://input'), true);
$num = $response["number"];
$mes = $response["text"];
$time = $response["timestampMillis"];

$sql = "INSERT INTO `sms` (`id`, `number`, `message`, `time`, `response`) 
		VALUES ('','$num', '$mes', '$time', '$response') ";
$query = mysqli_query($conn, $sql);

if(!$query){
	echo "DIE";
}else{
	echo "SUCCESS";
}

?>