<?php
class AdModel{
	public $mysqli;
	  public function __construct() {
            $config = C();
            $this->mysqli = new mysqli($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']);
            $this->mysqli->query('set names utf8');

        }
      public function getBanners(){
      	$list=$this->getlists();
      	 foreach ($lists as $key => $value) {
                $lists[$key] = $this->formatBanner($value);
            }
            return $lists;
      }
      public function formatBanner(){
      	 $item = array(
                      "id"    => $value['id'],
                      "img"   => $value['image'],
                      "title" => $value['title'],
                      "url"   => $value['url'],
                    );
            return $item;
      }
       public function getLists () {
            $sql = "select * from ad where status = 1";
            $query = $this->mysqli->query($sql);
            $lists = $query->fetch_all(MYSQLI_ASSOC);
            return $lists;
}