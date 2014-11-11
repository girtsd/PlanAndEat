<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php include("../include/layouts/header.php"); ?>
<?php
$name = $_POST['ProductName'];
echo $name;?>
<table>
<tr><th>ID</th><th>Product Name</th><th>Calories</th><th>Picture</th></tr>
<?php
// 2.Perform database query.

    $query = "Select Product_id, ProductName, Calories, ProductPicture from Products where ProductName = '$name' ";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    mysqli_set_charset($connection,"utf8");
?>

<?php 
while ($row = mysqli_fetch_assoc($result)) { 

           echo "<tr>";
           echo "<td>".$row["Product_id"]."</td>";
           echo "<td>".$row["ProductName"]."</td>";
           echo "<td>".$row["Calories"]."</td>";
           echo "<td>".$row["ProductPicture"]."</td>";
           echo "</tr>";

};               
?> 
</table>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>   