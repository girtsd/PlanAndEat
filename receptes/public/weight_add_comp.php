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
    <?php $errors = errors();?>
    <?php echo form_errors($errors);?>    
        <h2>Add Unit</h2>
        <form action="create_weight_comp.php?pid=<?php echo $prod_id;?>&rid=<?php echo $prod_id;?>&pname=<?php echo urlencode($prod_name) ?>" method="post" >
        <p> <label>Product:</label>
            <input type="hidden" name="Product_id" value="<?php echo $row["Product_id"];?> " />
            <input type="text" name="Product" value="<?php echo $row["ProductName"];?> " />       
       
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
     <a href="components_edit.php?pid=<?php echo $prod_id;?>&rid=<?php echo $prod_id;?>&pname=<?php echo urlencode($prod_name) ?>"> Cancel</a>
      
    </div>
</div>
      
<?php include("../include/layouts/footer.php"); ?>
