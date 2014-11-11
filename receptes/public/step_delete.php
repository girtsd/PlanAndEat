<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

// Process the form
    $rec_id = mysql_prep($_GET["rid"]);
    $step_no = mysql_prep($_GET["sno"]);
     mysqli_set_charset($connection,"utf8");    
// 2.Perform database query.

    $query = "DELETE FROM Steps ";
    $query .= "WHERE Recipe_id ={$rec_id} and StepNo ={$step_no} ";
    $query .= "LIMIT 1";
echo $query;
    $result = mysqli_query($connection, $query);
    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject deleted.";
    redirect_to("recipe_show.php?id=".$rec_id);
    } else {
    // Failure
    $_SESSION["message"] = "Subject delete failed";
    redirect_to("recipe_show.php?id=".$rec_id);
    }
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>