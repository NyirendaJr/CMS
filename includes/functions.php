<?php

function __autoload($class_name) {
  $class_name = strtolower($class_name);
  $path = "LIB_PATH.DS.{$class_name}.php";
  if (file_exists($path)) {
    require_once($path);
  } else {
    die("The file {$class_name}.php could not be found");
  }
}


function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function redirect_with( $location = NULL, $data = NULL ) {
  if ($location != NULL) {
    header("Location: $location".'?userid='.$data);
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) {
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function include_layout_template($template="") {
  include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template.'.php');
}

function getDateTime(){
  $date = datetime_to_text(new DateTime('NOW'));
  return $date;
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}


function encrypt($password){
  return md5($password);
}
 ?>
