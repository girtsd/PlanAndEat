<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

if (isset($_POST['submit'])) {

// Process the form
    $rec_id=$_POST["Recipe"];
    $prod_id = $_POST["Product"];
    $comp_amount = 0;
    $comp_unit = 7;    

    
// 2.Perform database query.
     mysqli_set_charset($connection,"utf8");
    $query = "INSERT INTO Components (";
    $query .= " Recipe_id, Product_id, Amount, Unit_id";
    $query .= ") VALUES (";
    $query .= " '{$rec_id}','{$prod_id}', '{$comp_amount}', '{$comp_unit}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject created.";
    redirect_to("recipe_show.php?id=".$rec_id);
    } else {
    // Failure

    $_SESSION["message"] = "Subject creation failed";
    redirect_to("new_component.php?id=".$rec_id);
    }


} else {
$_SESSION["message"] = "Not submitted";

redirect_to("new_component.php?id=".$rec_id);
}
?>
 <?php
if (isset($connection)) {mysqli_close($connection);}
?>