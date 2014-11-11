<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

// Process the form
    $menu_id = mysql_prep($_GET["id"]);
     mysqli_set_charset($connection,"utf8");    
// 2.Perform database query.

    $query = "DELETE FROM Menu ";
    $query .= "WHERE Menu_id ={$menu_id} ";
    $query .= "LIMIT 1";

    $result = mysqli_query($connection, $query);
    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject deleted.";
    redirect_to('menu_show.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject delete failed";
    redirect_to('menu_show.php');
    }
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>