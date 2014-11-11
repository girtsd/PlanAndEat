<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

if (isset($_POST['submit'])) {

// Process the form

    $mdate  = $_POST["mdate"];
    $cat_name = $_POST["Category"];
    $rec_name = $_POST["Recipe"];
    
    mysqli_set_charset($connection,"utf8");
    $sql = "SELECT Category_id FROM Categories where CategoryName='$cat_name'"; 
    $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
    

    while ($cdrow=mysqli_fetch_assoc($cd_result)) {
    $category_id=$cdrow['Category_id'];
    }

    
    $sql = "SELECT Recipe_id FROM Recipes r where RecipeName='$rec_name'"; 
    $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
    
    while ($cdrow=mysqli_fetch_array($cd_result)) {
    $recipe_id=$cdrow['Recipe_id'];    
    }    
    

    
// 2.Perform database query.
     mysqli_set_charset($connection,"utf8");
    $query = "INSERT INTO Menu (";
    $query .= " Date, Category_id, Recipe_id";
    $query .= ") VALUES (";
    $query .= " '{$mdate}', '{$category_id}', '{$recipe_id}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject created.";
    redirect_to('manage_content.php');
    } else {
    // Failure

    $_SESSION["message"] = "Subject creation failed";
    redirect_to('new_menu.php');
    }


} else {
$_SESSION["message"] = "Not submitted";

redirect_to("new_menu.php");
}
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>