<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php
// 2.Perform database query.

    $query = "Select * from web_list";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    mysqli_set_charset($connection,"utf8");    
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
            </div>
            <div id="page">
                <?php echo message(); ?>
                    <h2>Recipes List</h2>
                    <form action="recipes_list.php" method="post">
                
                <?php 
                    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                    $start_from = ($page-1) * 20; 
                    $sql = "SELECT * FROM Recipes ORDER BY Recipe_id ASC LIMIT $start_from, 20"; 
                    $rs_result = mysqli_query($connection,$sql); 
                ?> 
                <table>
                <tr><th>ID</th><th>Recipe Name</th><th>Description</th></tr>

                <?php 
 //   if (mysqli_num_rows($rs_result) > 0) {
    // output data of each row
  //  while($row = mysqli_fetch_assoc($rs_result)) {
 //       echo "id: " . $row["Product_id"]. " - Name: " . $row["ProductName"]. "<br>";
 //   }
//} else {
 //   echo "0 results";
//}
                while ($row = mysqli_fetch_assoc($rs_result)) { 
                
                           echo "<tr>";
                           echo "<td>".$row["Recipe_id"]."</td>";
                           echo "<td>".$row["RecipeName"]."</td>";
                           echo "<td>".$row["Description"]."</td>";
                           echo "<td><a href=recipe_show.php?id=".$row['Recipe_id'].">show details</a></td>";                           echo "</tr>";
                
                };               
                ?> 
                </table>
                <?php 
                    $sql = "SELECT COUNT(Recipe_id) FROM Recipes"; 
                    $rs_result = mysqli_query($connection,$sql); 
                    $row = mysqli_fetch_row($rs_result); 
                    $total_records = $row[0]; 
                    $total_pages = ceil($total_records / 20); 
                    
                    for ($i=1; $i<=$total_pages; $i++) { 
                        echo "<a href='recipes_list.php?page=".$i."'>".$i."</a> "; 
                        };                       

                ?>
                   
                 </form>
                 <br />
                 <a href="manage_content.php"> Cancel</a>
                <a href="new_recipe.php">New Recipe</a>      
            </div>
        </div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
