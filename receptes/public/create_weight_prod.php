<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/validation_functions.php"); ?>
<?php

if (isset($_POST['submit'])) {

// Process the form
     mysqli_set_charset($connection,"utf8");
    $prod_id = mysql_prep($_POST["Product_id"]);
    $unit_id = mysql_prep($_POST["Unit"]);
    $weight = mysql_prep($_POST["Weight"]);
    
// Validations
$required_fields = array("Product_id", "Unit", "Weight");
validate_presences($required_fields);
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("product_edit.php");
    }     
     // 2.Perform database query.

    $query = "INSERT INTO Weight (";
    $query .= "Product_id, Unit_id, Weight";
    $query .= ") VALUES (";
    $query .= " '{$prod_id}', '{$unit_id}', '{$weight}'  ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject created.";
    redirect_to("product_edit.php?pid=".$prod_id);
    } else {
    // Failure
    $_SESSION["message"] = "Subject creation failed";
    redirect_to("product_edit.php?pid=".$prod_id);
    }


} else {
$_SESSION["message"] = "Not submitted";

redirect_to("weight_add_prod.php");
}
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>