<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/validation_functions.php"); ?>
<?php

if (isset($_POST['submit'])) {

// Process the form
     mysqli_set_charset($connection,"utf8");
    $cat_name = mysql_prep($_POST["CategoryName"]);

// Validations
$required_fields = array("CategoryName");
validate_presences($required_fields);
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("new_category.php");
    }     
     // 2.Perform database query.

    $query = "INSERT INTO Categories (";
    $query .= " CategoryName";
    $query .= ") VALUES (";
    $query .= " '{$cat_name}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject created.";
    redirect_to('categories_list.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject creation failed";
    redirect_to('categories_list.php');
    }


} else {
$_SESSION["message"] = "Not submitted";

redirect_to("new_category.php");
}
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>