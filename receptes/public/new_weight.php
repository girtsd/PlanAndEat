<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>

<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
    <?php echo message(); ?>
    <?php $errors = errors();?>
    <?php echo form_errors($errors);?>    
        <h2>Create Weight</h2>
        <form action="create_weight.php" method="post" >
        <p> <label>Product:</label>
            <?php
             $sql = "SELECT Product_id, ProductName FROM Products ORDER BY ProductName ASC"; 
                    $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
                    echo "<select name='Product'>";
                    echo '<option value=""> --- Please select Product --- </option>';               
                           while ($cdrow=mysqli_fetch_array($cd_result)) {
                        echo '<option value="' .$cdrow['Product_id']. '">'. $cdrow['ProductName'] .'</option>';
                        }
                     echo "</select>";        
            ?>       
       <p> <label>Unit:</label>
            <?php
             $sql = "SELECT Unit_id, UnitName FROM Units ORDER BY Unit_id ASC"; 
                    $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            

                    echo "<select name='Unit'>";
                    echo '<option value=""> --- Please select Unit --- </option>';               
                           while ($cdrow=mysqli_fetch_array($cd_result)) {
                        echo '<option value="' .$cdrow['Unit_id']. '">'. $cdrow['UnitName'] .'</option>';
                        }
                     echo "</select>";        
            ?>  
        </p>
        <p> <label>Weight:</label>
            <input type="text" name="Weight" value="" /> 
        </p>
        <p> <input type="submit" name="submit" value="Create Weight"/></p>
     </form>
     <br />
     <a href="weights_list.php"> Cancel</a>
      
    </div>
</div>
      
<?php include("../include/layouts/footer.php"); ?>
