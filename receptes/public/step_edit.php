<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
// Process the form
    $rec_id = mysql_prep($_GET["rid"]);
    $step_no = mysql_prep($_GET["sno"]);
    mysqli_set_charset($connection,"utf8");
    $query = "SELECT * from Steps ";
    $query .= "WHERE Recipe_id='$rec_id' and StepNo= '$step_no'";
    $result = mysqli_query($connection, $query);
        confirm_query($result);
    $row = mysqli_fetch_assoc($result);

?>


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Edit Step</h2>
        
        <form enctype="multipart/form-data" method="post" action="step_update.php" >
            <p> <label>Recipe ID:</label>
                <input type="text" name="Recipe_id" id="id" value="<?php echo $rec_id;?>" />
            </p>        
            <p> <label>Step Number:</label>
                <input type="text" name="StepNo" value="<?php echo $step_no;?>" />
            </p>

            <p> <label>Step Description:</label>
                <input type="text" name="Description" value="<?php echo $row['Description'];?>" />
            </p>
            <p> <label>Picture:</label>
                <input type="file" name="Photo" value="<?php echo $row['PicName'];?>" />
            </p>
             <p>
            <input type="submit" name="submit" value="Edit Step"/>
            </p>

        </form> 
             <br><br><br><br>
    <a href="recipe_show.php?id=<?php echo $rec_id;?>"> Cancel</a>
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
