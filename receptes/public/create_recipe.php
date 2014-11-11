<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

if (isset($_POST['submit'])) {

// Process the form

    $rec_name = $_POST["RecipeName"];
    $rec_description = $_POST["Description"];

    
// 2.Perform database query.
     mysqli_set_charset($connection,"utf8");
    $query = "INSERT INTO Recipes (";
    $query .= " RecipeName, Description";
    $query .= ") VALUES (";
    $query .= " '{$rec_name}', '{$rec_description}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject created.";
    redirect_to('recipes_list.php');
    } else {
    // Failure

    $_SESSION["message"] = "Subject creation failed";
    redirect_to('new_recipe.php');
    }


} else {
$_SESSION["message"] = "Not submitted";

redirect_to("new_recipe.php");
}
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>