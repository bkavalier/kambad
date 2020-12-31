<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with');

include_once('../core/initialize.php');

$post = new Post($db);
$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$data= json_decode(file_get_contents("php://input"));
$post->order_id = $data->order_id;
$post->amount = $data->amount;
$post->response_code = $data->response_code;
$post->response_desc = $data->response_desc;

if($post->update()){
	echo json_encode(
		array('message'=>'Post updated'));
}else{
	echo json_encode(
	array('message'=>'Post not updated'));
}
