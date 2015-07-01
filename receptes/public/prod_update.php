<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php
 $prod_name=$_POST['ProductName'];
 $calories=$_POST['Calories'];
 $id=$_POST['id'];
     mysqli_set_charset($connection,"utf8");
        $query = "UPDATE Products SET ProductName='$prod_name', Calories='$calories' WHERE Product_id='$id'";
        //echo $query;
        $result = mysqli_query($connection, $query);
        confirm_query($result);         
    if ($result) {
    // Success
    $_SESSION["message"] = "Subject updated.";
    redirect_to('product_list.php');
    } else {
    // Failure
    $_SESSION["message"] = "Subject update failed";
    redirect_to('prod_edit.php');
    }

?>