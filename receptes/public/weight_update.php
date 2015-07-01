<?php require_once("../include/sessions.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/functions.php");?>
<?php
 $prod_id=$_POST["Product_id"]; 
 $unit_id=$_POST["Unit_id"];
 $product=$_POST["Product"];
 $unit=$_POST["Unit"];
 $weight=$_POST["Weight"];

 mysqli_set_charset($connection,"utf8");
    $query = "UPDATE Weight SET Product_id='$prod_id', Unit_id='$unit_id', Weight='$weight' WHERE Product_id='$prod_id' and Unit_id='$unit_id'";
        $result = mysqli_query($connection, $query);
        confirm_query($result); 

        if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to("product_edit.php?pid=".$prod_id);
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to("product_edit.php?pid=".$prod_id);
    }

?>