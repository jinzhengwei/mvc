<?php
class CateModel{
	public $mysqli;
	public function __construct(){
		$this->mysqli = new mysqli('127.0.0.1', 'root', '', 'test');
	}
	public function addCate($data){
		$sql = "insert into category (name) value ('{$data['name']}')";
		$query=$this->mysqli->query($sql);
		return $query;

	}
	public function getlists(){
		$sql="select * from category";
		$query= $this->mysqli->query($sql);
		$lists=$query->fetch_all(MYSQLI_ASSOC);
		return $lists;
	}
		
}