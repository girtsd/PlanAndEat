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
    $query = "UPDATE Weight SET Product_id='$product', Unit_id='$unit', Weight='$weight' WHERE Product_id='$prod_id' and Unit_id='$unit_id'";
        $result = mysqli_query($connection, $query);
        confirm_query($result); 

        if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to("weights_list.php?id=".$rec_id);
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to('manage_content.php');
    }

?>