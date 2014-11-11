<?php require_once("../include/db_connection.php"); ?>


<?php require_once("../include/functions.php"); ?>
<?php
// 2.Perform database query.

    $query = "Select * from web_list";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
?>
<?php include("../include/layouts/header.php"); ?>

<?php 
    if (isset($_GET["row"])) {
        $selected_row_id = $_GET["row"];
        } else {
        $selected_row_id = null;
        }
?>

        <div id="main">
            <div id="navigation">
          <ul class="row">
            <?php
            // 3. Use returned data (if any)
            while($row = mysqli_fetch_assoc($result)) {
            //output data from eacn row
            ?>
            <?php
                echo "<li";
                if ($row["list_id"] == $selected_row_id) {
                  echo " class=\"selected\"";
                }
                echo ">";
             ?>
            <a href="manage_content.php?row=<?php echo $row["list_id"]; ?>">
            <?php echo $row["list_name"] . " (" . $row["list_id"] . ")"; ?>
            </a>
            </li>
            <?php
            }
            ?>
            </ul>
          
            <a href="product_list.php">Show products</a></br>
            <a href="recipes_list.php">Show recipes</a></br>
            <a href="categories_list.php">Show categories</a></br>   
            <a href="menu_show.php">Show menu</a>             
            
            </div>
            
            <div id="page">
                <h2>Manage Content</h2>
               <?php echo $selected_row_id; ?>
            </div>
        </div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
