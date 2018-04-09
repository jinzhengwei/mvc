<?php
 class UserController {
 	public function login(){
 		include "./view/user/login.html";
 	}
 	public function dologin(){
 			$phone = $_POST['phone'];
            $password = $_POST['password'];
            $format=!empty($_POST['format'])? $_POST['format'] : 'html';
            $info = D('user')->getUserInfoByPhone($phone);       
            if($format= 'json'){
                $result=array('error_code'=>0,'message'=>'','data'=>array());
                if($format['password']=$password){
                    $result['data']['user'] = D('user')->formatUser($info);
                }else{
                    $result['error_code']= 1;
                    $result['message']='密码错误';

                }
                echo json_encode($result);

            }else{
                if ($info['password'] == $password) {
                    unset($info['password']);
                    $_SESSION['me'] = $info;
                }
                header('location:index.php?c=message&a=lists');
            } 
            }
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
        $model = D('user');
            $info = $model->getUserInfoByPhone($phone);
        if (!empty($info)) {
            header('location:index.php?c=User&a=login');
            die();
            }
            $model->addUser($uname, $phone, $password);
           header('location:index.php?c=User&a=login');
 	}
 
 public function logout() {
            $_SESSION = array('a'=>'b','c'=>'d');
            header('location:index.php?c=User&a=login');
        }






 }





