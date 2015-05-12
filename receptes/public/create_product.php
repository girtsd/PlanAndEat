<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/validation_functions.php"); ?>
<?php

if (isset($_POST['submit'])) {

// Process the form

    $prod_name = mysql_prep($_POST["ProductName"]);
    $prod_calories = $_POST["Calories"];
    
// Validations
    $required_fields = array("ProductName", "Calories");
    validate_presences($required_fields);

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("new_product.php");
    }
    
// 2.Perform database query.
     mysqli_set_charset($connection,"utf8");
    $query = "INSERT INTO Products (";
    $query .= " ProductName, Calories";
    $query .= ") VALUES (";
    $query .= " '{$prod_name}', '{$prod_calories}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject created.";
    redirect_to('product_list.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject creation failed";
    redirect_to('new_product.php');
    }


} else {
$_SESSION["message"] = "Not submitted";

redirect_to("new_product.php");
}
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>