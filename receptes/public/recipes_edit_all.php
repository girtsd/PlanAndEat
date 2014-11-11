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
        <?php
            echo "<tr>";
            $recipe_id=$row["Recipe_id"];
            $recipe_name=$row["RecipeName"];
            $recipe_desc=$row["Description"];
            
            echo "<td>".$row["Recipe_id"]."</td>";
            echo "<td>".$recipe_name."</td>";
            echo "<td>".$recipe_desc."</td></br>";
           echo "<td>".$row["ProductName"]."</td>";
           echo "<td>".$row["Amount"]."</td>";
           echo "<td>".$row["Unit"]."</td></br>";             
        while ($row = mysqli_fetch_assoc($result)) { 
           echo "<td>".$row["ProductName"]."</td>";
           echo "<td>".$row["Amount"]."</td>";
           echo "<td>".$row["Unit"]."</td>";                           
           echo "<td><a href=recipe_edit.php?id=".$row['Recipe_id'].">update</a></td></br>";
           echo "</tr>";

        };
        ?>
        <form name="form1" method="post" action="recipe_update.php">
            <p> <label>ID:</label>
                <input type="text" name="id" id="id" value="<?php echo $recipe_id;?>" />
            </p>        
            <p> <label>Recipe name:</label>
                <input type="text" name="RecipeName" value="<?php echo $recipe_name;?>" />
            </p>
            <p> <label>Description:</label>
                <input type="text" name="Description" value="<?php echo $recipe_desc;?>" /> 
            </p>
            <p>
            <input type="submit" name="submit" value="Edit Recipe"/>
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
