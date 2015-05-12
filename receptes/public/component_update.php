<?php require_once("../include/sessions.php");?>
<?php require_once("../include/db_connection.php");?>
<?php require_once("../include/functions.php");?>
<?php
 $rec_id=$_POST["Recipe_id"];
 $prod_id=$_POST["Product_id"]; 
 $comp_prod=$_POST["Product"];
 $comp_amount=$_POST["Amount"];
 $comp_unit=$_POST["Unit"];
 echo $rec_id;
 echo $comp_prod;
 echo $comp_amount;
 echo $comp_unit;
    mysqli_set_charset($connection,"utf8");
    $query = "UPDATE Components SET Product_id='$comp_prod', Amount='$comp_amount', Unit='$comp_unit' WHERE Recipe_id='$rec_id' and Product_id='$prod_id'";
//        $query = "UPDATE Components SET Product_id=1, Amount=2, Unit=edams WHERE Recipe_id=1";
        //echo $query;
        $result = mysqli_query($connection, $query);
        confirm_query($result);         
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to("recipe_show.php?id=".$rec_id);
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to('manage_content.php');
    }

?>