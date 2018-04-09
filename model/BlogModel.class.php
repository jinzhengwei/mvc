<?php
    class BlogModel{
        public $mysqli;
        public function __construct() {
           $config = C();
            $this->mysqli = new mysqli($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']);
            $this->mysqli->query('set names utf8');

        }
        public function addBlog($data) {
            $sql = "insert into blog (title, content, category,createtime,image) value ('{$data['title']}', '{$data['content']}', {$data['category']}, '{$data['createtime']},'{$data['image']} ) ";
            $query = $this->mysqli->query($sql);
            return $query;
        }
        public function getLists() {
            $sql = "select * from blog";
            $query = $this->mysqli->query($sql);
            $data = $query->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
        public function formatBlog($value){
            $item=array(
             "id"   =>$value['id'],
             "title"=>$value['title'],
             "category_id"=>$value['category_id'],
             "category_name"=>$value['category_name'],
             "read_num"=>$value['read_num'],
             "createtime"=>$value['createtime']
        );
            if ( !empty($value['user_id'])){
                $author=D('user')->getInfoById($value['user_id']);
                $item['userid']=$author['id'];
                $item['username']=$author['name'];
                $item['userimg']=$author['image'];
            }else{
                $item['userid']='';
                $item['username']='账号不存在';
                $item['img']=''; 
            }
            return $item;
        }
        public function getInfo($id){
            $blogInfo=$this->getInfoById($id);
            if(empty($blogInfo)){
                return array();
            }
            $cateTmp=D('cate')->getTmpLists();
            $info=$this->formatBlog($blogInfo,$cateTmp);
            $info['content']=$blogInfo['centent'];
            return $info;


        }
        public function getInfoById(){
            if(empty($id)){
                return array();
            }
            $sql="select * from blog where id = {$id}";
            $query=$this->mysqli->query($sql);
            $res=$query->fetch_array(MYSQLI_ASSOC);
            return $res;

        }

        public function addReadNum($id){
            if(empty($id)){
                return false;
            }
            $sql="update blog set read_num = read_num +1 where id={$id}";
            $query=$this->mysqli->query($sql);
            return $query;
        }
        
    }