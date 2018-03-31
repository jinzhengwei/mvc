<?php
 class UserController {
 	public function login(){
 		include "./view/user/login.html";
 	}
 	public function dologin(){
 			$phone = $_POST['phone'];
            $password = $_POST['password'];
            $mysqli = new mysqli('127.0.0.1', 'root', '', 'test');
            $sql="select * from user where phone='{$phone}'";
            $query= $mysqli->query($sql);
            $info = $query->fetch_array(MYSQLI_ASSOC);
            if ($info['password'] == $password){
            	unset($info['password']);
            	$_SESSION['me']= $info;
            }
            header('location:index.php?c=Message&a=lists');

 	}
 	public function reg(){
 		include"./view/user/reg.html";
 	}
 	public function doreg(){
 		$name = $_POST['name'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'test');
        $sql="select * from user where phone='{$phone}'";
        $query= $mysqli->query($sql);
        if ($query->num_rows > 0) {
            header('location:index.php?c=User&a=login');
            die();
            }
            $sql="insert into user (name,phone,password) value ('{$name}','{$phone}','{$password}') ";
           $query= $mysqli->query($sql);
           header('location:index.php?c=User&a=login');
 	}
 
 public function logout() {
            $_SESSION = array('a'=>'b','c'=>'d');
            header('location:index.php?c=User&a=login');
        }






 }





