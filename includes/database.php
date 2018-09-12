<?php
include_once(LIB_PATH.DS.'config.php');
class MySQLDatabase{
  private $connection;
  public $last_query;

  function __construct(){
    $this->open_connection();
  }

  public function open_connection(){
    try {
      $this->connection = new PDO("mysql: dbhost=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
      echo "Failled to connect to the database: " . $e->getMessage();
    }
  }

  public function close_connection(){
    if (isset($this->connection)) {
      $this->connection = null;
    }
  }

  public function query($sql){
     $this->last_query = $sql;
     $prep = $this->connection->prepare($sql);
     $prep->execute();
     return $prep;
  }


  public function insert_id() {
   // get the last id inserted over the current db connection
   return $this->connection->lastInsertId();
  }


  public function affected_rows(){
    $num_rows = $this->query($this->last_query);
    return $num_rows->rowCount();
  }

  public function fetch_array($result){
    return $this->mysql_fetch_array($result);
  }

  private function mysql_fetch_array($result){
    return $result->fetch(PDO::FETCH_ASSOC);
  }


  public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

}

$database  = new MySQLDatabase();
 ?>
