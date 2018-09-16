<?php
require_once('init.php');
require_once(LIB_PATH.DS.'database.php');
class Process extends DatabaseObject {

  protected static $table_name="processes";
  protected static $db_fields = array('id', 'ynote_id', 'farmerNo', 'tone', 'total_pay', 'status', 'created_at', 'updated_at');
  public $id;
  public $ynote_id;
  public $farmerNo;
  public $tone;
  public $total_pay;
  public $created_at;
  public $updated_at;


}

?>
