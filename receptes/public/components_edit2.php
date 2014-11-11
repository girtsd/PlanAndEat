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

 <fieldset>
    <legend>Sastāvdaļas:</legend>
    <?php
    $query2 = "select r.Recipe_id, c.Unit, c.Amount, p.ProductName, p.Calories 
            from Recipes r, Components c, Products p
            where r.Recipe_id='$rec_id'
            and c.Recipe_id = r.Recipe_id
            and p.Product_id = c.Product_id";
    $result = mysqli_query($connection, $query2);
    confirm_query($result);
    $row = mysqli_fetch_assoc($result);            
        $sql = "SELECT Product_id, ProductName FROM Products ORDER BY ProductName ASC"; 
        $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
        $cdrow=mysqli_fetch_array($cd_result);
        
       echo "<select name='classID'>";
               while ($cdrow=mysqli_fetch_array($cd_result)) {
            echo '<option value="' .$cdrow['Product_id']. '">'. $cdrow['ProductName'] .'</option>';
            }
            echo"</select>";

            echo "<tr><th>Product</th><th>Amount</th><th>Unit</th></tr></br>";
            echo "<p></p>";
            echo "<tr>";        
            echo "<td>";
            echo '<input type="text" name=amount value='.$row["Amount"].">";
            echo "</td>";
            echo "<td>";
            echo '<input type="text" name=amount value='.$row["Unit"].">";
            echo "</td>"; 
            
            echo "</tr>";

            
        ?>
            <a href="components_edit.php"> Update Components</a>     
  </fieldset>
            <a href="manage_content.php"> Cancel</a>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
