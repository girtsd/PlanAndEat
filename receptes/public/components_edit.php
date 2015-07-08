<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $rec_id=$_GET['rid'];
    $prod_id=$_GET['pid'];
    $unit_id=$_GET['uid'];
    $prod_name=$_GET['pname'];
    mysqli_set_charset($connection,"utf8");
//    $query = "select r.Recipe_id, r.RecipeName, r.Description, 
//                    c.Unit, c.Amount, p.ProductName, p.Calories 
//            from Recipes r, Components c, Products p
//            where r.Recipe_id='$rec_id'
//            and c.Recipe_id = r.Recipe_id
//            and p.Product_id = c.Product_id";
//    $result = mysqli_query($connection, $query);
//    confirm_query($result);
//    $row = mysqli_fetch_assoc($result);

?>


<div id="main">


        <form name="form1" method="post" action="component_update.php" accept-charset="UTF-8">
        <fieldset>
            <legend>Edit Components:</legend>
            <p> <label>Receptes_id:</label>
                <input type="text" name="Recipe_id" value="<?php echo $rec_id;?>" />
            </p>
            <p> <label>Produkta_id:</label>
                <input type="text" name="Product_id" value="<?php echo $prod_id;?>" />
            </p>
            <br><br>
            <p> <label>Sastāvdaļa:</label>
            <?php
                $query3 = "select u.UnitName, u.Unit_id, c.Amount, p.Product_id, p.ProductName
                        from Components c, Products p, Units u
                        where c.Recipe_id='$rec_id'
                        and c.Product_id = '$prod_id'
                        and c.Unit_id = u.Unit_id";
                $result3 = mysqli_query($connection, $query3);
                confirm_query($result3);
                $row3 = mysqli_fetch_array($result3);

                $sql = "SELECT Product_id, ProductName FROM Products ORDER BY ProductName ASC"; 
                $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());           

                


                echo "<select name='Product'>";
                echo '<option value='.$prod_id.'>'.$prod_name."</option>";               
                       while ($cdrow=mysqli_fetch_array($cd_result)) {
                    echo '<option value="' .$cdrow['Product_id']. '">'. $cdrow['ProductName'] .'</option>';
                    }
                 echo "</select>";
            ?>                

            </p> 
            <p> <label>Skaits:</label>
                <input type="text" name="Amount" value="<?php echo $row3['Amount'];?>" />
            </p>
            <br>
            <p> <label>Vienība:</label>
        
            <?php    
                $sql_unit = "SELECT u.Unit_id, u.UnitName FROM Units u, Weight w where u.Unit_id = w.Unit_id and w.Product_id = $prod_id ORDER BY UnitName ASC"; 
                $cd_result = mysqli_query($connection,$sql_unit) or die ("Query to get data from firsttable failed: ".mysqli_error());    

                echo "<select name='Unit_id'>";
                echo '<option value='.$row3['Unit_id'].'>'.$row3['UnitName']."</option>";               
                   while ($cdrow=mysqli_fetch_array($cd_result)) {
                echo '<option value="' .$cdrow['Unit_id']. '">'. $cdrow['UnitName'] .'</option>';
                }
                echo "</select>";

                ?>
            </p>
            <p>
            <input type="submit" name="submit" value="Submit Component"/>
            </p>
        </fieldset>
        </form> 
        <a href="recipe_show.php?id=<?php echo $rec_id; ?>">Cancel</a>
        <a href="weight_add_comp.php?pid=<?php echo $prod_id;?>&rid=<?php echo $prod_id;?>&pname=<?php echo urlencode($prod_name) ?>">  Add unit</a> 
</div>
 
            <?php
 // 5. Release returned data
    mysqli_free_result($cd_result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
