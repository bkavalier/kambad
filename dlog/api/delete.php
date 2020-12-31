<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with');

include_once('../core/initialize.php');

$post = new Post($db);
$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$data= json_decode(file_get_contents("php://input"));


if($post->delete()){
	echo json_encode(
		array('message'=>'Post deleted'));
}else{
	echo json_encode(
	array('message'=>'Post not deleted'));
}
