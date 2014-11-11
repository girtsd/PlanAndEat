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
      
    </div>
    <div id="page">
        <?php echo message(); ?>
            <h2>Product List</h2>
            <form action="product_drop_list.php" method="post">
         
                <?php
                    echo "<select name= 'ProductName'>";
                    echo '<option value="">'.'--- Please Select Product ---'."</option>";
              
                    $sql = "SELECT Product_id, ProductName FROM Products ORDER BY ProductName ASC"; 
                    $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
                
                    while ($cdrow=mysqli_fetch_array($cd_result)) {
                        $id=$cdrow['Product_id'];
                        echo "<option>". $cdrow['ProductName'] ."</option>";
                        }
                
                    echo '</select>';
               ?> 
                       
                     <br />
                     <input type='submit' name='submit' value='Submit'> 
               <?php
        //
        //               if(isset($_POST))
        //               {
        //               $val=$_POST['ProductName']; 
        //               echo $val;// To make sure value is posted
        //              $result=mysqli_query("Select * from Products where ProductName = '.$val.' "); 
        //               }
                ?> 
              
                <?php
                $name= null;
                       if(isset($_POST['ProductName'])){
                $name = $_POST['ProductName'];
                }
                ?> 
            <table>
                <tr><th>ID</th><th>Product Name</th><th>Calories</th><th>Picture</th></tr>
                <?php
                    // 2.Perform database query.

                    $query = "Select Product_id, ProductName, Calories, ProductPicture from Products  where ProductName = '$name' ";
                    $result = mysqli_query($connection, $query);
                    confirm_query($result);
                    mysqli_set_charset($connection,"utf8");
                ?>

                <?php 
                   while ($row = mysqli_fetch_assoc($result)) { 
                   $id=$row['Product_id'];
                   echo "<tr>";
                   echo "<td>".$row["Product_id"]."</td>";
                   echo "<td>".$row["ProductName"]."</td>";
                   echo "<td>".$row["Calories"]."</td>";
                   echo "<td>".$row["ProductPicture"]."</td>";
                   echo "<td><a href=product_edit.php?id=".$row['Product_id'].">update</a></td>";
                   echo "</tr>";

                };   
                ?> 
            </table>             
            </form>
        <br />
<!--        <a href="product_edit.php?id=<?php echo $id; ?>"> Edit product</a>   -->              
        <br />
        <a href="manage_content.php"> Cancel</a>
      
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
