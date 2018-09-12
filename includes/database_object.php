<?php
class DatabaseObject {
	protected static $db_fields = "";
 	protected static $table_name = "";

		// common database methods
	public static function find_all() {
     return static::find_by_sql("SELECT * FROM ". static::$table_name);
	}

	public static function find_by_id($id='') {
	   $result_array = static::find_by_sql("SELECT * FROM ". static::$table_name." WHERE id={$id} LIMIT 1");
     return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_sql($sql='') {
		 global $database;
		 $result_set = $database->query($sql);
		 $object_array = array();
		 while ($row = $database->fetch_array($result_set)) {
		   $object_array[] = static::instantiate($row);
		 }

		 return $object_array;
	}


	private static function instantiate($record) {
		// Could check that $record exists and is an array
	// Simple, long-form approach:
		$class_name         = get_called_class();
		$object             = new $class_name;
		// $object->id 				= $record['id'];
		// $object->regNo 	    = $record['regNo'];
		// $object->firstname 	= $record['firstname'];
		// $object->lastname 	= $record['lastname'];
    // $object->phone      = $record['phone'];
    // $object->gender     = $record['gender'];
    // $object->email      = $record['email'];
    // $object->category   = $record['category'];

		// More dynamic, short-form approach:
		foreach($record as $attribute => $value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}


	private function has_attribute($attribute) {
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() {
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(static::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}

	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}

	public function create(){
		global $database;
		$attributes = $this->attributes();
	  $sql = "INSERT INTO ".static::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
	  $sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	  if($database->query($sql)) {
	    $this->id = $database->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update() {
	  global $database;
		$attributes = $this->attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".static::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $this->id;
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}


	public function delete() {
		global $database;
	  $sql = "DELETE FROM ".static::$table_name;
	  $sql .= " WHERE id=". $this->id;
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;

		// NB: After deleting, the instance of User still
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update()
		// after calling $user->delete().
	}

	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}

 }
 ?>
