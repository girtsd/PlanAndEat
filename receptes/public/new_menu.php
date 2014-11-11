<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>

<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
    <?php echo message(); ?>
        <h2>Create Menu</h2>
        <form action="create_menu.php" method="post">
        <p> <label>Date:</label>
  <input type="date" name="mdate"> <br>
        </p>
        <p> <label>Category:</label>
            <?php
    mysqli_set_charset($connection,"utf8");            
                echo "<select name= 'Category'>";
                echo '<option value="">'.$category."</option>";
          
                $sql = "SELECT Category_id, CategoryName FROM Categories ORDER BY CategoryName ASC"; 
                $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
            
                while ($cdrow=mysqli_fetch_array($cd_result)) {
                    $cat_id=$cdrow['Category_id'];
                    echo "<option>". $cdrow['CategoryName'] ."</option>";
                    }
            
                echo '</select>';
            ?>            
        </p>            
        <p> <label>Recipe:</label>
            <?php
                echo "<select name= 'Recipe'>";
                echo '<option value="">'.$recipe."</option>";
          
                $sql = "SELECT Recipe_id, RecipeName FROM Recipes ORDER BY RecipeName ASC"; 
                $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
            
                while ($cdrow=mysqli_fetch_array($cd_result)) {
                    $rec_id=$cdrow['Recipe_id'];
                    echo "<option>". $cdrow['RecipeName'] ."</option>";
                    }
            
                echo "</select>";
            ?>
            
        </p>
            </p>
        <p>
        <input type="submit" name="submit" value="Create Menu"/></p>
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
