<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $rec_id=$_GET['rid'];
    $prod_id=$_GET['pid'];
    $prod_name=$_GET['pname'];
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

  <fieldset>
    <legend>Sastāvdaļas:</legend>
    <?php
    $query2 = "select r.Recipe_id, r.RecipeName, r.Description, r.RecipePicture,  
                    c.Unit, c.Amount, p.Product_id, p.ProductName, p.Calories 
            from Recipes r, Components c, Products p
            where r.Recipe_id='$rec_id'
            and c.Recipe_id = r.Recipe_id
            and p.Product_id = c.Product_id";
    $result = mysqli_query($connection, $query2);
    confirm_query($result);
    $row = mysqli_fetch_assoc($result);            
            echo "<table>";
            echo "<tr><th>Product</th><th>Amount</th><th>Unit</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";        
            echo "<td>".$row["ProductName"]."</td>";
            echo "<td>".$row["Amount"]."</td>";
            echo "<td>".$row["Unit"]."</td>";                           
            echo "<td><a href=product_edit.php?id=".$row['Product_id'].">update</a></td>";
            echo "</tr>";
            };
            echo "</table>";
          
        ?>

           </fieldset>
        <form name="form1" method="post" action="component_update.php" accept-charset="UTF-8">
        <fieldset>
            <legend>Edit Components:</legend>
 
            <p> <label>Sastāvdaļa:</label>
            <?php
                $query3 = "select c.Unit, c.Amount, p.Product_id, p.ProductName
                        from Components c, Products p
                        where c.Recipe_id='$rec_id'
                        and c.Product_id = '$prod_id'";
                $result3 = mysqli_query($connection, $query3);
                confirm_query($result3);
                $row3 = mysqli_fetch_array($result3);
                echo $prod_id ;
                echo $rec_id ;  

                $sql = "SELECT Product_id, ProductName FROM Products ORDER BY ProductName ASC"; 
                $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
                $cdrow=mysqli_fetch_array($cd_result);
                
               echo "<select name='Product'>";
                echo '<option value='.$prod_id.'>'.$prod_name."</option>";               
                       while ($cdrow=mysqli_fetch_array($cd_result)) {
                    echo '<option value="' .$cdrow['Product_id']. '">'. $cdrow['ProductName'] .'</option>';
                    }
                 echo "</select>";
            ?>                
            <p> <label>Receptes_id:</label>
                <input type="text" name="Recipe_id" value="<?php echo $rec_id;?>" />
            </p>
            <p> <label>Produkta_id:</label>
                <input type="text" name="Product_id" value="<?php echo $prod_id;?>" />
            </p>
            </p> 
            <p> <label>Skaits:</label>
                <input type="text" name="Amount" value="<?php echo $row3['Amount'];?>" />
            </p>
            <p> <label>Vienība:</label>
                <input type="text" name="Unit" value="<?php echo $row3['Unit'];?>" />            

            </p>
            <p>
            <input type="submit" name="submit" value="Submit Component"/>
            </p>
        </fieldset>
        </form> 
        <a href="recipe_show.php?id=<?php echo $rec_id; ?>">Cancel</a>
 
</div>
 
            <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
