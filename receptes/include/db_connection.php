<?php require_once("/var/www/html/receptes/include/user.php");?>
<?php
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test if connection occured.
if(mysqli_connect_error()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}
  /* change character set to utf8 */
    mysqli_set_charset($connection,"utf8"); 
   
?>