<?php
   session_start();
    $c = !empty($_GET['c']) ? $_GET['c'] : 'Message';
    $a = !empty($_GET['a']) ? $_GET['a'] : 'lists';
    header("Content-type:text/html;charset=utf-8");
   include "./controller/{$c}Controller.class.php";
  include "./common/function.php";
   $c = ucfirst($c);
   function __autoload($a) {
        include "./controller/{$a}.class.php";
    }
  $classname="{$c}Controller";
  $obj = new $classname();
  $obj->$a();


