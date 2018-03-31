<?php
 class BlogController{
 	public function add(){
 		$catelist=D('cate')->getlists();
 		include "./view/blog/add.html";
}
 		
 	public function doadd(){
 		$name=$_POST['name'];
 		$content=$_POST['content'];
 		$cate=$_POST['cate'];

 		$data = array(
              'title'=>$name,
              'content'=>$content,
              'category'=>$cate,
              'createtime'=>date('Y-m-d H:i:s')

 			);
 		$status=D('blog')->addblog($data);
 		var_dump($status)

 		
 	}
 	
 	public function lists(){
 		$catelist = D('cate')->geilists();
        include "./view/blog/list.html";
        
 		
 	}

 	}