<?php
 class BlogController {
 	
 	
 	public function lists(){
        $lists = D('blog')->getLists();
        foreach ($lists as $key => $value) {
        	$lists[$key]=D('blog')->formatBlog($value);
        }
        $banner=D('ad')->getBanners();
        $result=  array ('error_code'=>0,'message'=>'','data'=>array());
        $result['data']['blog']=$lists;
        $result['data']['banner']=$banner;

        echo json_encode($result);


 		// $lists = D('blog')->getlists();
 		// include "./view/blog/list.html";

 	}
    public function info (){
    	$result=array('error_code'=>0,'message'=>'','data'=>array());
    	 if (empty($_GET['id'])) {
                $result['error_code'] = 10001;
                $result['message']    = "参数错误";
                echo json_encode($result);
                die();
            }
            $id=empty($_GET['id']) ? 0 : $_GET['id'];
            $info=D('blog')->   getInfo($id);
             if (empty($info)) {
                $result['error_code'] = 10002;
                $result['message']    = "博客不存在";
                echo json_encode($result);
                die();
            }
            D('blog')->addReadNum($id);
            $result['data']['info']=$info;
            echo json_encode($result);


    }





 	}