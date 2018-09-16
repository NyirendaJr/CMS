<?php
require_once('init.php');
require_once(LIB_PATH.DS.'database.php');
class Invoice extends DatabaseObject {

  protected static $table_name = "invoices";
  protected static $db_fields  = array('id', 'invoiceNo','ynote_id', 'farmerNo', 'tone', 'total_pay' ,'amount_paid', 'receiptNo', 'created_at');
  public $id;
  public $invoiceNo;
  public $ynote_id;
  public $farmerNo;
  public $tone;
  public $total_pay;
  public $amount_paid;
  public $receiptNo;
  public $created_at;



}

?>
