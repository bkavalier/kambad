<?php

class Post{
	private $conn;
	private $table = 'posts';
	
	public $id;
	public $order_id;
	public $amount;
	public $response_code;
	public $response_desc;
	
	public function __construct($db){
		$this->conn =$db;
	}
	
	public function read(){
		$query = 'SELECT * FROM transaction';
		$stmt = $this->conn->prepare($query);

		$stmt->execute();
		return $stmt;
	}
	
	
	public function read_single(){
		$query = 'SELECT * FROM transaction
		WHERE id=?';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->order_id = $row['order_id'];
		$this->amount = $row['amount'];
		$this->response_code = $row['response_code'];
		$this->response_desc = $row['response_desc'];
	}
	
	
	public function create(){
		$query = "INSERT INTO transaction
(order_id, amount, response_code, response_desc)
VALUES
(:order_id, :amount, :response_code, :response_desc)";
	
	$stmt = $this->conn->prepare($query);
	
	$this->order_id = htmlspecialchars(strip_tags($this->order_id));
	$this->amount = htmlspecialchars(strip_tags($this->amount));
	$this->response_code = htmlspecialchars(strip_tags($this->response_code));
	$this->response_desc = htmlspecialchars(strip_tags($this->response_desc));
	
	$stmt->bindParam(':order_id',$this->order_id);
	$stmt->bindParam(':amount',$this->amount);
	$stmt->bindParam(':response_code',$this->response_code);
	$stmt->bindParam(':response_desc',$this->response_desc);
	
	if($stmt->execute()){
		return true;
	}
	print_r("Error %s \n", $stmt->error);
	return false;
	
	}
	
	
	public function update(){
		$query = "
 UPDATE transaction  
 SET order_id=:order_id, amount=:amount, response_code=:response_code, response_desc=:response_desc   
 WHERE id=:id";
	
	$stmt = $this->conn->prepare($query);
	
	$this->order_id = htmlspecialchars(strip_tags($this->order_id));
	$this->amount = htmlspecialchars(strip_tags($this->amount));
	$this->response_code = htmlspecialchars(strip_tags($this->response_code));
	$this->response_desc = htmlspecialchars(strip_tags($this->response_desc));
	$stmt->bindParam(':id', $this->id);
	$stmt->bindParam(':order_id',$this->order_id);
	$stmt->bindParam(':amount',$this->amount);
	$stmt->bindParam(':response_code',$this->response_code);
	$stmt->bindParam(':response_desc',$this->response_desc);
	
	if($stmt->execute()){
		return true;
	}
	print_r("Error %s \n", $stmt->error);
	return false;
	
	}
	
	public function delete(){
		$query = "DELETE FROM transaction where id=:id";
		$stmt = $this->conn->prepare($query);
		$this->id = htmlspecialchars(strip_tags($this->id));
		$stmt->bindParam(':id',$this->id);
		
		if($stmt->execute()){
			return true;
		}
		
		print_r("Error %s. \n", $stmt->error);
		return false;
	}
	
	
}	
















