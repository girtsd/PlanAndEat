<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
if (isset ($_GET['id'])){

    $menu_id=$_GET['id'];}
    else {
    $menu_id=1;
    }
    mysqli_set_charset($connection,"utf8");
    $query = "SELECT * from Menu m, Categories c, Recipes r ";
    $query .= "WHERE Menu_id ='$menu_id' and m.Category_id=c.Category_id and m.Recipe_id=r.Recipe_id";
    $result = mysqli_query($connection, $query);
        confirm_query($result);
    $row = mysqli_fetch_assoc($result);
    $recipe_id=$row["Recipe_id"];
    $recipe=$row["RecipeName"];
    $category_id=$row["Category_id"];
    $category=$row["CategoryName"];
    
?>


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Edit Menu</h2>
        <?php if (isset($cat_id)) {
         echo $cat_id; }?>        
        <?php if (isset($rec_id)) {
         echo $rec_id; }?>       
        <form name="form1" method="post" action="menu_update.php" accept-charset="UTF-8">
            <p> <label>MenuID:</label>
                <input type="text" name="menu_id" value="<?php echo $row['Menu_id'];?>" />
            </p> 
            <p> <label>Date:</label>
                <input type="text" name="Date" value="<?php echo $row['Date'];?>" />
            </p>
            <p> <label>Category:</label>
            <?php
                echo "<select name= 'Category'>";
                echo "<option select='selected' value=".$category_id.">".$category."</option>";
          
                $sql = "SELECT Category_id, CategoryName FROM Categories ORDER BY CategoryName ASC"; 
                $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
            
                while ($cdrow=mysqli_fetch_array($cd_result)) {
                    $cat_id=$cdrow['Category_id'];
                    echo "<option value=". $cat_id .">". $cdrow['CategoryName'] ."</option>";
                    }
            
                echo '</select>';
            ?>
            </p>
            <p> <label>Recipe:</label>
            <?php
                echo "<select name= 'Recipe'>";
                echo "<option select='selected' value=". $recipe_id.">".$recipe."</option>";
          
                $sql = "SELECT Recipe_id, RecipeName FROM Recipes ORDER BY RecipeName ASC"; 
                $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
            
                while ($cdrow=mysqli_fetch_array($cd_result)) {
                    $rec_id=$cdrow['Recipe_id'];
                    echo "<option value=". $rec_id.">". $cdrow['RecipeName'] ."</option>";
                    }
            
                echo "</select>";
            ?>
            </p>
            <p>
            <input type="submit" name="submit" value="Submit Menu"/>
            </p>


        </form> 
            <a href="menu_show.php"> Cancel</a>
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
