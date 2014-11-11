<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $rec_id=$_GET['id'];
    mysqli_set_charset($connection,"utf8");
    $query = "select r.Recipe_id, r.RecipeName, r.Description, 
                    c.Unit, c.Amount, p.ProductName, p.Calories 
            from Recipes r, Components c, Products p
            where r.Recipe_id='$rec_id'
            and c.Recipe_id = r.Recipe_id
            and p.Product_id = c.Product_id";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    $row = mysqli_fetch_assoc($result);

?>


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Edit Recipe</h2>
        <form enctype="multipart/form-data" method="post" action="rec_picture_add.php">
            <p> <label>ID:</label>
                <input type="text" name="id" id="id" value="<?php echo $row['Recipe_id'];?>" />
            </p>        
            <p> <label>Recipe name:</label>
                <input type="text" name="RecipeName" value="<?php echo $row['RecipeName'];?>" />
            </p>
            <p> <label>Description:</label>
                <input type="text" name="Description" value="<?php echo $row['Description'];?>" /> 
            </p>
            <p> <label>Picture:</label>
                <input type="file" name="Photo" value="<?php echo $row['PicName'];?>" />
            </p>
            <p>
            <input type="submit" name="submit" value="Add"/>
            </p>


        </form> 
            <a href="manage_content.php"> Cancel</a>
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
