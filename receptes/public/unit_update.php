<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php
 $unit_name=$_POST['UnitName'];
 $unit_desc=$_POST['Description'];
 $id=$_POST['id'];
     mysqli_set_charset($connection,"utf8");
        $query = "UPDATE Units SET UnitName='$unit_name', Description='$unit_desc' WHERE Unit_id='$id'";
        //echo $query;
        $result = mysqli_query($connection, $query);
        confirm_query($result);         
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to('units_list.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to('unit_edit.php');
    }

?>