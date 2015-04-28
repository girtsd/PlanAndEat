<?php require_once("/var/www/html/receptes/include/user.php"); ?>

<?php
// 1. Create a database connection
//$dbhost = $_ENV["dbhost"];
//$dbuser = $_ENV["dbuser"];
//$dbpass = $_ENV["dbpass"];
//$dbname = $_ENV["dbname"];
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test if connection occured.
if(mysqli_connect_error()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}
?>