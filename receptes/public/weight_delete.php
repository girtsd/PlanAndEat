<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

// Process the form
    $prod_id = mysql_prep($_GET["pid"]);
    $unit_id = mysql_prep($_GET["uid"]);
     mysqli_set_charset($connection,"utf8");    
// 2.Perform database query.

    $query = "DELETE FROM Weight ";
    $query .= "WHERE Product_id ={$prod_id} and Unit_id ={$unit_id} ";
    $query .= "LIMIT 1";

    $result = mysqli_query($connection, $query);
    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject deleted.";
    redirect_to("weights_list.php");
    } else {
    // Failure
    $_SESSION["message"] = "Subject delete failed";
    redirect_to("weights_list.php");
    }
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>