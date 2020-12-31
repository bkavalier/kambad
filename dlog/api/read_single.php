<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$post->read_single();

$post_arr = array(
	'id' => $post->id,
	'order_id' => $post->order_id,
	'amount' => $post->amount,
	'response_code' => $post->response_code,
	'response_desc' => $post->response_desc
	);
	
print_r(json_encode($post_arr));

