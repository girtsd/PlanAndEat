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
        <h2>Create Unit</h2>
        <form action="create_unit.php" method="post" >
        <p> <label>Unit:</label>
            <input type="text" name="UnitName" value="" />
        <p> <label>Description:</label>
            <input type="text" name="Description" value="" /> 
        </p>
        <p> <input type="submit" name="submit" value="Create Unit"/></p>
     </form>
     <br />
     <a href="units_list.php"> Cancel</a>
      
    </div>
</div>
      
<?php include("../include/layouts/footer.php"); ?>
