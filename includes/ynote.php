<?php
require_once('init.php');
require_once(LIB_PATH.DS.'database.php');
class Ynote extends DatabaseObject {

  protected static $table_name="ynotes";
  protected static $db_fields = array('id', 'farmerNo', 'carRegNo', 'tone', 'sucrose', 'created_at', 'updated_at');
  public $id;
  public $farmerNo;
  public $carRegNo;
  public $tone;
  public $sucrose;
  public $created_at;
  public $updated_at;

  public static function is_user_exist($regNo){
    $user = User::find_by_regNo($regNo);
    return $user;
  }

}

 ?>
