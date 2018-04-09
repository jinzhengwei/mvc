<?php
    class UserModel {
        public $mysqli;
        public function __construct() {
             $config = C();
            $this->mysqli = new mysqli($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']);
            $this->mysqli->query('set names utf8');

        }
        public function getUserInfoByPhone($phone) {
            $sql = "select * from user where phone = '{$phone}' ";
            $query = $this->mysqli->query($sql);
            $info = $query->fetch_array(MYSQLI_ASSOC);
            return $info;
        }
        public function addUser($uname, $phone, $password) {
            $sql = "insert into user (name,phone,password) value ('{$name}', '{$phone}', '{$password}')";
            
            $query = $this->mysqli->query($sql);
            return $query;
        }
        public function getIntoById($id){
            if(empty($id)){
                return array()
            }
            $sql="select * from user where id ={$id}";
            $query=$this->mysqli->query($sql)；
            $res=$query->fetch_array(MYSQLI_ASSOC);
            return $res;   
    }
        public function formatUser($value){
            $item=array(
            'userid'= $value['id'] ,
            'username'= $value['name'],
            'userimg'= $value['image']


                );
            return $item;
        }
    }