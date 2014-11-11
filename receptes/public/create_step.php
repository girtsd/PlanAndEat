<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

if (isset($_POST['submit'])) {

// Process the form
    $rec_id=$_POST["Recipe"];
    $step_no = mysql_prep($_POST["StepNo"]);
    $step_desc = mysql_prep($_POST["StepDesc"]);
     mysqli_set_charset($connection,"utf8");    
// 2.Perform database query.

    $query = "INSERT INTO Steps (";
    $query .= "Recipe_id, StepNo, Description";
    $query .= ") VALUES (";
    $query .= "'{$rec_id}', '{$step_no}', '{$step_desc}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject created.";
    redirect_to('recipe_show.php?id='.$rec_id);
    } else {
    // Failure
    $_SESSION["message"] = "Subject creation failed";
    redirect_to('recipe_show.php?id='.$rec_id);
    }


} else {
$_SESSION["message"] = "Not submitted";

redirect_to("new_step.php");
}
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>