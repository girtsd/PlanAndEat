<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

// Process the form
    $rec_id = mysql_prep($_GET["id"]);
     mysqli_set_charset($connection,"utf8");    
// 2.Perform database query.

    $query1 = "DELETE FROM Recipes ";
    $query1 .= "WHERE Recipe_id ={$rec_id} ";
    $query1 .= "LIMIT 1";

    $result1 = mysqli_query($connection, $query1);

    $query2 = "DELETE FROM Components ";
    $query2 .= "WHERE Recipe_id ={$rec_id} ";

    $result2 = mysqli_query($connection, $query2);

    $query3 = "DELETE FROM Steps ";
    $query3 .= "WHERE Recipe_id ={$rec_id} ";

    $result3 = mysqli_query($connection, $query3);    
    
    if ($result1 and $result2 and $result3) {
    // Success
    $_SESSION["message"] = "Subject deleted.";
    redirect_to('recipes_list.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject delete failed";
    redirect_to('recipes_list.php');
    }
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>