<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>

<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
    <?php echo message();
    $rec_id=$_GET['id'];
    ?>
        <h2>Create Step</h2>
        <form action="create_step.php" method="post" >
         <p> <label>Recipe_id:</label>

        <input type="text" name="Recipe" value="<?php echo $rec_id;?>">
        </p>
        <p> <label>Step no:</label>
            <input type="text" name="StepNo" value="" />
        </p>
        <p> <label>Description:</label>
            <input type="text" name="StepDesc" value="" />
        <p>        <input type="submit" name="submit" value="Create Step"/></p>
     </form>
     <br />
     <a href="manage_content.php"> Cancel</a>
      
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
