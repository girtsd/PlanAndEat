<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php include("../include/layouts/header.php"); ?>
 
 <?php
 $rec_name=$_POST['Recipe_id'];
 $rec_description=$_POST['Description'];
 $id=$_POST['id'];
        $query = "UPDATE Recipes SET RecipeName='$rec_name', Description='$rec_description' WHERE Recipe_id='$id'";
        $result = mysqli_query($connection, $query);
        confirm_query($result);         
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to('recipes_list.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to('recipe_edit.php');
    }

?>