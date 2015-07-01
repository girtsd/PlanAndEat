<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $unit_id=$_GET['id'];
    mysqli_set_charset($connection,"utf8");
    $query = "SELECT * from Units ";
    $query .= "WHERE Unit_id ='$unit_id'";
    $result = mysqli_query($connection, $query);
        confirm_query($result);
    $row = mysqli_fetch_assoc($result);

?>


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Edit Unit</h2>
        
        <form name="form1" method="post" action="unit_update.php" >
            <p> <label>ID:</label>
                <input type="text" name="id" id="id" value="<?php echo $row['Unit_id'];?>" />
            </p>        
            <p> <label>Unit:</label>
                <input type="text" name="UnitName" value="<?php echo $row['UnitName'];?>" />
            </p>
            <p> <label>Description:</label>
                <input type="text" name="Description" value="<?php echo $row['Description'];?>" /> 
            </p>
            <input type="submit" name="submit" value="Edit Unit"/>
            </p>


        </form> 
            <a href="units_list.php"> Cancel</a>
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
