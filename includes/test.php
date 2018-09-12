<?php
require_once('init.php');
function getUsers(){
  global $database;
  $x = $database->query("SELECT * FROM users");
  return $x;
}

function instantiate($record){
  $object = new User();
  $object->id = $record['id'];
  $object->regNo = $record['regNo'];
  return $object;
}
$y = getUsers();
while ($rows = $y->fetch(PDO::FETCH_ASSOC)) {
  $user = instantiate($rows);
  echo "<pre>";
  print_r($user->id ." ". $user->regNo);
}

 ?>
