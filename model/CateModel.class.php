<?php
class CateModel{
	public $mysqli;
	public function __construct(){
		$config = C();
            $this->mysqli = new mysqli($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']);
            $this->mysqli->query('set names utf8');

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
	public function getTmpLists() {
            $cateList = $this->getLists();
            foreach ($cateList as $key => $value) {
                $cateTmp[$value['id']] = $value;
            }
            return $cateTmp;
        }
		
}