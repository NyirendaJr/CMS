<?php
require_once('init.php');
require_once(LIB_PATH.DS.'database.php');
class Ynote extends DatabaseObject {

  protected static $table_name = "ynotes";
  protected static $db_fields  = array('id', 'farmerNo', 'carRegNo', 'tone', 'sucrose', 'total_pay' ,'status', 'created_at', 'updated_at');
  public $id;
  public $farmerNo;
  public $carRegNo;
  public $tone;
  public $sucrose;
  public $total_pay;
  public $status;
  public $created_at;
  public $updated_at;


  public static function is_user_exist($regNo){
    $user = User::find_by_regNo($regNo);
    return $user;
  }

  public static function calculateSucroseAvg() {
    global $database;
    $sql               = "SELECT AVG(sucrose) AS 'average_sucrose' FROM ".static::$table_name;
    $result_set        = $database->query($sql);
    $row               = $database->fetch_array($result_set);
    $sucrose_avg       = array_shift($row);
    $final_avg_sucrose = ($sucrose_avg * 8000);

    return $final_avg_sucrose;

  }

  public static function calculateTotalPayment($ynote_id){
    $ynote             = Ynote::find_by_id($ynote_id);
    $final_avg_sucrose = self::calculateSucroseAvg();
    $total_payment     = ($ynote->tone * $final_avg_sucrose);
    return $total_payment;
  }

  public static function reCalculateTotalPayment($ynote_id){
    $ynote                = Ynote::find_by_id($ynote_id);
    $final_avg_sucrose    = self::calculateSucroseAvg();
    $total_payment        = ($ynote->tone * $final_avg_sucrose);
    $new_ynote            = new Ynote();
    $new_ynote->id        = $ynote_id;
    $new_ynote->farmerNo  = $ynote->farmerNo;
    $new_ynote->carRegNo  = $ynote->carRegNo;
    $new_ynote->tone      = $ynote->tone;
    $new_ynote->sucrose   = $ynote->sucrose;
    $new_ynote->total_pay = $total_payment;
    $new_ynote->update();

    // put last ynote in the on-process table
    //$database       = new MySQLDatabase();
    // $last_insert_id = $database->insert_id();
    //$ynote_process  = Ynote::find_by_id($ynote_id);

    // create new instance of process modal
    // $process            = new Process();
    // $process->ynote_id  = $ynote_process->id;
    // $process->farmerNo  = $ynote_process->farmerNo;
    // $process->tone      = $ynote_process->tone;
    // $process->total_pay = $ynote_process->total_pay;
    // $process->status    = "Note Paid";
    // $process->save();

    return $total_payment;

  }
}

 ?>
