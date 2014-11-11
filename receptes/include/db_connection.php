<?php
// 1. Create a database connection
$dbhost = <host>;
$dbuser = <user>;
$dbpass = <pass>;
$dbname = <db>;
$connection = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);
// Test if connection occured.
if(mysqli_connect_error()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}
?>