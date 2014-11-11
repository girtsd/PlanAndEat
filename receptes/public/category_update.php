<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php include("../include/layouts/header.php"); ?>
 
 <?php
 $cat_name=$_POST['CategoryName'];
 $id=$_POST['id'];
     mysqli_set_charset($connection,"utf8");
        $query = "UPDATE Categories SET CategoryName='$cat_name' WHERE Category_id='$id'";
        echo $query;
        $result = mysqli_query($connection, $query);
        confirm_query($result);         
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to('categories_list.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to('category_edit.php');
    }

?>