<?php
require_once('init.php');
require_once(LIB_PATH.DS.'database.php');

class Category extends DatabaseObject {
  protected static $table_name = "category";
  protected static $db_fields = array('id', 'name');
  public $id;
  public $name;

  // public function getAll(){
  //   return $categories = $this->find_all();
  // }

}
// $category = new Category();
// $cat = $category->getAll();
// echo "<pre>";
// print_r($cat);


 ?>
