<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>

<?php    $prod_id=$_GET['pid'];
?>    
    
    
<div id="main">
    <div id="navigation">

    </div>
    <div id="page">


    <?php
// 2.Perform database query.

        mysqli_set_charset($connection,"utf8");        
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
        $start_from = ($page-1) * 20; 
        $sql = "SELECT w.Unit_id, u.UnitName, w.Weight FROM Units u left join Weight w on Product_id='$prod_id' and w.Unit_id=u.Unit_id ORDER BY Unit_id "; 
        $rs_result = mysqli_query($connection,$sql); 
    ?>    
    
    
    <?php echo message(); ?>
    <?php $errors = errors();?>
    <?php echo form_errors($errors);?>    
        <h2>Create Weight</h2>
        <form action="create_unit.php" method="post" >
 
 
 <?php while ($row = mysqli_fetch_assoc($rs_result)) { 
            echo "<p> <label>".$row["UnitName"]."</label>";
            echo "<input type='text' name='UnitName' value=".$row["Weight"]."> ";      
       };                       
 ?>       
        <p> <input type="submit" name="submit" value="Accept Weights"/></p>
     </form>
     <br />
<?php echo "<a href=product_edit.php?id=".$prod_id.">Cancel</a>"; ?>
      
    </div>
</div>
      
<?php include("../include/layouts/footer.php"); ?>
