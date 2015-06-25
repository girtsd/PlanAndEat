<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $prod_id=$_GET['pid'];
    $unit_id=$_GET['uid'];
    $weight=$_GET['weight'];
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


        <form name="form1" method="post" action="weight_update.php" accept-charset="UTF-8">
        <fieldset>
            <legend>Edit Weight:</legend>
 
            <p> <label>Produkts:</label>
            <?php
                $query3 = "select u.Unit_id, u.UnitName, w.Weight, p.Product_id, p.ProductName
                        from Units u, Products p, Weight w
                        where u.Unit_id='$unit_id'
                        and p.Product_id = '$prod_id'";
                $result3 = mysqli_query($connection, $query3);
                confirm_query($result3);
                $row3 = mysqli_fetch_array($result3);

               $prod_sql = "SELECT ProductName FROM Products where Product_id='$prod_id' Limit 1"; 
               $cd_result1 = mysqli_query($connection,$prod_sql) or die ("Query to get data from firsttable failed: ".mysqli_error()); 
               $prod_name = mysqli_fetch_assoc($cd_result1);
                
                $sql = "SELECT Product_id, ProductName FROM Products ORDER BY ProductName ASC"; 
                $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
                
               echo "<select name='Product'>";
                echo '<option value='.$prod_id.'>'.$prod_name['ProductName']."</option>";               
                       while ($cdrow=mysqli_fetch_array($cd_result)) {
                    echo '<option value="' .$cdrow['Product_id']. '">'. $cdrow['ProductName'] .'</option>';
                    }
                 echo "</select>";
            ?>

            <p> <label>Produkta_id:</label>
                <input type="text" name="Product_id" value="<?php echo $prod_id;?>" /></br>
            </p>
            </p> 
            <p> <label>Vienība:</label>
            <?php
                $sql = "SELECT Unit_id, UnitName FROM Units ORDER BY Unit_id ASC"; 
                $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());

               $unit_sql = "SELECT UnitName FROM Units where Unit_id='$unit_id' Limit 1"; 
               $cd_result2 = mysqli_query($connection,$unit_sql) or die ("Query to get data from firsttable failed: ".mysqli_error()); 
               $unit_name = mysqli_fetch_assoc($cd_result2);
               
               echo "<select name='Unit'>";
                echo '<option value='.$unit_id.'>'.$unit_name['UnitName']."</option>";               
                       while ($cdrow=mysqli_fetch_array($cd_result)) {
                    echo '<option value="' .$cdrow['Unit_id']. '">'. $cdrow['UnitName'] .'</option>';
                    }
                 echo "</select>";
 
            ?>                            
            </p>
            <p> <label>Unit_id:</label>
                <input type="text" name="Unit_id" value="<?php echo $unit_id;?>" /></br>
            </p>            
            <p> <label>Svars:</label>
                <input type="text" name="Weight" value="<?php echo $row3['Weight'];?>" />            

            </p>
            <p>
            <input type="submit" name="submit" value="Submit Component"/>
            </p>
        </fieldset>
        </form> 
        <a href="weights_list.php">Cancel</a>
 
</div>
 
            <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
