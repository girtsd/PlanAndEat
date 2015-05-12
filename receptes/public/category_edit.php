<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $cat_id=$_GET['id'];
    mysqli_set_charset($connection,"utf8");
    $query = "SELECT * from Categories ";
    $query .= "WHERE Category_id ='$cat_id'";
    $result = mysqli_query($connection, $query);
        confirm_query($result);
    $row = mysqli_fetch_assoc($result);

?>


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Edit Category</h2>
        
        <form name="form1" method="post" action="category_update.php" >
            <p> <label>ID:</label>
                <input type="text" name="id" id="id" value="<?php echo $row['Category_id'];?>" />
            </p>        
            <p> <label>Category name:</label>
                <input type="text" name="CategoryName" value="<?php echo $row['CategoryName'];?>" />
            </p>

            <input type="submit" name="submit" value="Edit Category"/>
            </p>


        </form> 
            <a href="categories_list.php"> Cancel</a>
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
