<?php

function redirect_to($new_location){
    header("Location:".$new_location);
    exit;
}
   
function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed.");
    }
}
  
function form_errors($errors=array()) {
    $output = "";
    if (!empty($errors)) {
        $output .="<div class=\"error\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>{$error}<li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}
   
function mysql_prep($string) {
    global $connection;

    $escaped_string = mysqli_real_escape_string($connection, $string);
    return $escaped_string;
}
   
function data_uri($file, $mime) {
  $contents = file_get_contents($file);
  $base64   = base64_encode($contents); 
  return ('data:' . $mime . ';base64,' . $base64);
}
?>