<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>

<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
    <?php 
    echo message(); 
    $rec_id=$_GET['id'];    
    ?>

        <h2>Create Component</h2>
        <form action="create_component.php" method="post">
        <?php
        echo "<p> <label>Recipe_id:</label>";
        echo '<input type="text" name="Recipe" value='.$rec_id.'></p>';
        echo "<p> <label>Product:</label>";

   
     mysqli_set_charset($connection,"utf8");
     $sql = "SELECT Product_id, ProductName FROM Products ORDER BY ProductName ASC"; 
            $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
            $cdrow=mysqli_fetch_array($cd_result);
            echo "<select name='Product'>";
            echo '<option value=""> --- Please select Product --- </option>';               
                   while ($cdrow=mysqli_fetch_array($cd_result)) {
                echo '<option value="' .$cdrow['Product_id']. '">'. $cdrow['ProductName'] .'</option>';
                }
             echo "</select>";
         ?>
        </p>

        <input type="submit" name="submit" value="Create Component"/></p>
     </form>
     <br />
     <a href="recipe_show.php?id=<?php echo $rec_id; ?>"> Cancel</a>
      
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
