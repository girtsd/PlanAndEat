<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $prod_id=$_GET['id'];
    mysqli_set_charset($connection,"utf8");
    $query = "SELECT * from Products ";
    $query .= "WHERE Product_id ='$prod_id'";
    $result = mysqli_query($connection, $query);
        confirm_query($result);
    $row = mysqli_fetch_assoc($result);

?>


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Edit Product</h2>
        
        <form name="form1" method="post" action="prod_update.php" accept-charset="UTF-8">
            <p> <label>ID:</label>
                <input type="text" name="id" id="id" value="<?php echo $row['Product_id'];?>" />
            </p>        
            <p> <label>Product name:</label>
                <input type="text" name="ProductName" value="<?php echo $row['ProductName'];?>" />
            </p>
            <p> <label>Calories:</label>
                <input type="text" name="Calories" value="<?php echo $row['Calories'];?>" /> 
            </p>
            <p>
            <input type="submit" name="submit" value="Edit Product"/>
            </p>
<br></br>

        </form> 
        <?php
            echo "<a href=product_list.php> Cancel </a>";
            echo "<a href=unit_choose.php?pid=".$row['Product_id'].">  Choose units</a>";

        ?>                   
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
