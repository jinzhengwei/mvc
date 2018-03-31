<?php
    class UserModel {
        public $mysqli;
        public function __construct() {
            $this->mysqli = new mysqli('127.0.0.1', 'root', '', 'test');
        }
        public function getUserInfoByPhone($phone) {
            $sql = "select * from zt_user where phone = '{$phone}' ";
            $query = $this->mysqli->query($sql);
            $info = $query->fetch_array(MYSQLI_ASSOC);
            return $info;
        }
        public function addUser($uname, $phone, $password) {
            $sql = "insert into user (name,phone,password) value ('{$name}', '{$phone}', '{$password}')";
            
            $query = $this->mysqli->query($sql);
            return $query;
        }
    }