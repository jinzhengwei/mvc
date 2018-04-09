<?php
 class CateController{
 	public function add(){
 		include "./view/cate/add.html";
 		
 	}
 	public function doadd(){
 		$name=$_POST['name'];
 		if(empty($name)){
 			die();
 		}
 	    $status = D('cate')->addCate(array('name'=>$name));
 		var_dump($status);
 	}
 	public function lists(){
 		$lists=D('cate')->getlists();
 		include "./view/cate/lists.html";

 	}
 }