<?php
// class MessageController{
// 	public function lists(){
//  	header("Content-type:text/html;charset=utf-8");
//     $key = "MESSAGE_LISTS";
//     $res = getMessageList($key, 0, 10);
//     $data = array();
//     foreach ($res as $key => $value) {
//         $infokey = 'MESSAGE_INFO_'.$value;
//         $info = getMessageInfo($infokey);
//         $data[] = $info;
//     }

//      include "./view/message/lists.html";
//     }
 	
//  	public function add(){
//       include "./view/message/add.html";
//  	}
//  	public function doadd(){
// 		$uname   = $_POST['uname'];
// 	    $content = $_POST['content'];
// 	    $time    = time(); //获取时间戳

// 	    $id = getId();

// 	    $key = 'MESSAGE_INFO_'.$id;
// 	    $value = array(
// 	            'id'        =>$id,
// 	            'name'      => $uname,
// 	            'content'   => $content
// 	        );
// 	    addMessage($key, $value);

// 	    $listKey = "MESSAGE_LISTS";
// 	    addMessageLists($listKey, $time, $id);
//         header('location:index.php?c=Message&a=lists');
// 	}
//     public function edit(){
//         $id=$_GET['id'];
//         if(empty($id)){
//             echo 'no data ';
//             die();
//         }
//         $infokey= 'MESSAGE_INFO_'.$id;
//         $messageinfo= getMessageInfo($infokey);
//         include './view/message/edit.html';
//     }
//     public function doedit(){
//         $name=$_POST['name'];
//         $content=$_POST['content'];
//         $id=$_POST['id'];

//         $key= 'MESSAGE_INFO_'.$id;
//         $value = array(
//                'id' => $id,
//                'name'=> $name,
//                'content'=>$content

//             );
//         addMessage($key,$value);
//         header('location:index.php?c=Message&a=lists');

//     }
//     public function del(){
//          $id = $_GET['id'];
//             if (empty($id)) {
//                 echo 'no data';
//                 die();
//             }
//             $key = 'MESSAGE_INFO_'.$id;
//             delMessage($key);

//              $listKey = 'MESSAGE_LISTS';
//              delMessageListItem($listKey,$id);
//             header('location:index.php?c=Message&a=lists');
//     }

// }
	