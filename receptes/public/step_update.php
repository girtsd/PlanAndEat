<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php include("../include/layouts/header.php"); ?>
 
 <?php
 $rec_id=$_POST['Recipe_id'];
 $step_no=$_POST['StepNo'];
 $step_desc=$_POST['Description'];
 $id=$_POST['id'];
     mysqli_set_charset($connection,"utf8");
        $query = "UPDATE Steps SET Description='$step_desc' WHERE Recipe_id='$rec_id' and StepNo='$step_no'";
        echo $query;
        $result = mysqli_query($connection, $query);
        confirm_query($result);         
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to('recipe_show.php?id='.$rec_id);
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to('recipe_show.php?id='.$rec_id);
    }

?>