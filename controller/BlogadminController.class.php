<?php
 class BlogadminController {
 	public function add(){
 		$catelist=D('cate')->getlists();
 		include "./view/blog/add.html";
}
 		
 	public function doadd(){
 		$name=$_POST['name'];
 		$content=$_POST['content'];
 		$cate=$_POST['cate'];
 		$img=$_POST['img'];

 		$data = array(
              'title'=>$name,
              'content'=>$content,
              'category'=>$cate,
              'createtime'=>date('Y-m-d H:i:s')

 			);
 		$status=D('blog')->addBlog($data);
 		var_dump($status);

 		
 	}
 	
 	public function lists(){
 		$catelist = D('cate')->getlists();
 		foreach ($catelist as $key => $value) {
                $cateTmp[$value['id']] = $value;
            }
        
        
 		$lists = D('blog')->getlists();
 		include "./view/blog/list.html";
 	}

 	}