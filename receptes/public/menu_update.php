<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php include("../include/layouts/header.php"); ?>
 
 <?php
    $id=$_POST['menu_id'];
    $category_id=$_POST['Category'];
    $recipe_id=$_POST['Recipe'];
    echo $id;
    echo $category_id;
    echo $recipe_id;
    mysqli_set_charset($connection,"utf8");
 //   $sql = "SELECT Category_id FROM Categories where CategoryName='$category'"; 
//    $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
    

//    while ($cdrow=mysqli_fetch_assoc($cd_result)) {
//    $category_id=$cdrow['Category_id'];
//    }

    
//    $sql = "SELECT Recipe_id FROM Recipes r where RecipeName='$recipe_name'"; 
//    $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
    
//    while ($cdrow=mysqli_fetch_array($cd_result)) {
//    $recipe_id=$cdrow['Recipe_id'];    
 //   }

    $query = "UPDATE Menu SET Recipe_id='$recipe_id', Category_id='$category_id' WHERE Menu_id='$id'";

    $result = mysqli_query($connection, $query);
    confirm_query($result);         
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to('menu_show.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to('menu_edit.php');
    }

?>