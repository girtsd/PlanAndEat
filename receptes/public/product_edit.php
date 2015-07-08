<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $prod_id=$_GET['pid'];
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
            <br><br>
          
            
            <p>
            <input type="submit" name="submit" value="Edit Product"/>
            </p>
<br><br><br><br>
<?php            
        $sql = "SELECT w.Unit_id, u.UnitName, w.Weight, w.Weight*p.Calories div 100 as CaloriesProd 
                FROM Units u, Weight w, Products p 
                where p.Product_id='$prod_id' 
                and p.Product_id = w.Product_id 
                and w.Unit_id=u.Unit_id 
                group BY u.Unit_id "; 
        $rs_result = mysqli_query($connection,$sql);
echo "<fieldset>";
echo "<legend>Units and Weights:</legend>";
echo "<table>";
            echo   "<tr><th>Unit</th><th>Weight(in grams)</th><th>Calories</th></tr>";
            
            while ($row = mysqli_fetch_assoc($rs_result)) {
            echo "<tr>";
            echo "<td>".$row["UnitName"]."</td>";
            echo "<td>".$row["Weight"]."</td>";
            echo "<td>".$row["CaloriesProd"]."</td>";
            echo "<td><a href=weight_edit.php?pid=".$prod_id."&uid=".$row['Unit_id']."&wght=".urlencode($row["Weight"]).">update</a></td>";
            echo "<td><a href=weight_delete.php?pid=".$prod_id."&uid=".$row['Unit_id'].">delete</a></td>";
            echo "</tr>";
            };
echo "</table>";
echo "</fieldset>" ;           
?>  
        </form> 
        <?php
            echo "<a href=product_list.php> Cancel </a>";
            echo "<a href=weight_add_prod.php?pid=".$prod_id.">  Add unit</a>";

        ?>                   
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
