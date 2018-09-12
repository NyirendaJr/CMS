<?php
require_once('init.php');
require_once(LIB_PATH.DS.'database.php');
class User extends DatabaseObject {
  protected static $table_name="users";
  protected static $db_fields = array('id', 'regNo','firstname','lastname','phone',
  'gender','email','category_id','password','created_at','updated_at'
  );
  public $id;
  public $regNo;
  public $firstname;
  public $lastname;
  public $phone;
  public $gender;
  public $email;
  public $category_id;
  public $password;
  public $created_at;
  public $updated_at;

   public function full_name(){
    if (isset($this->firstname) && isset($this->lastname)) {
      return $this->firstname . " " . $this->lastname;
    } else {
      return "";
    }
  }

   public static function authenticate($regNo="", $password="") {
    global $database;
    // $username = $database->escape_value($username);
    // $password = $database->escape_value($password);

    $sql  = "SELECT * FROM users WHERE regNo = '$regNo' AND password = '$password' LIMIT 1";
    $result_array = static::find_by_sql($sql);
    return !empty($result_array) ? array_shift($result_array) : false;
  }


  public static function find_by_category($cat_id){
    $sql = "SELECT * FROM ". static::$table_name . " WHERE category_id = $cat_id";
    return static::find_by_sql($sql);
  }

}

 ?>
