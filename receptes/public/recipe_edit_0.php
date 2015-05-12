<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $rec_id=$_GET['rid'];
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
        <form name="form1" method="post" action="recipe_update.php" accept-charset="UTF-8">
            <p> <label>ID:</label>
                <input type="text" name="id" id="id" value="<?php echo $row['Recipe_id'];?>" />
            </p>        
            <p> <label>Recipe name:</label>
                <input type="text" name="RecipeName" value="<?php echo $row['RecipeName'];?>" />
            </p>
            <p> <label>Description:</label>
                <input type="text" name="Description" value="<?php echo $row['Description'];?>" /> 
            </p>
            <p>
            <input type="submit" name="submit" value="Edit recipe"/>
            </p>


        </form> 
            <a href="recipe_show.php?id=<?php echo $rec_id;?>"> Cancel</a>
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
