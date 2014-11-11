<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>

<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
    <?php echo message(); ?>
        <h2>Create Category</h2>
        <form action="create_category.php" method="post" >
        <p> <label>Product name:</label>
            <input type="text" name="CategoryName" value="" />

        <p> <input type="submit" name="submit" value="Create Category"/></p>
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
