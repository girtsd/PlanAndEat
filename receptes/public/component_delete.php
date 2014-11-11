<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

// Process the form
    $rec_id = mysql_prep($_GET["rid"]);
    $prod_id = mysql_prep($_GET["pid"]);
     mysqli_set_charset($connection,"utf8");    
// 2.Perform database query.

    $query = "DELETE FROM Components ";
    $query .= "WHERE Recipe_id ={$rec_id} and Product_id ={$prod_id} ";
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