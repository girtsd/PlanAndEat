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


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
            <h2>Product List</h2>
            <form action="product_list.php" method="post">
        
        <?php 
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
            $start_from = ($page-1) * 20; 
            $sql = "SELECT * FROM Products ORDER BY Product_id ASC LIMIT $start_from, 20"; 
            $rs_result = mysqli_query($connection,$sql); 
        ?> 
        <table>
        <tr><th>ID</th><th>Product Name</th><th>Calories</th></tr>

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
                   echo "<td>".$row["Product_id"]."</td>";
                   echo "<td>".$row["ProductName"]."</td>";
                   echo "<td>".$row["Calories"]."</td>";
                   echo "<td>".$row["ProductPicture"]."</td>";                           
                   echo "<td><a href=product_edit.php?id=".$row['Product_id'].">update</a></td>";
                   echo "<td><a href=product_delete.php?id=".$row['Product_id'].">delete</a></td>";
                   echo "</tr>";
        
        };               
        ?> 
        </table>
        <?php 
            $sql = "SELECT COUNT(Product_id) FROM Products"; 
            $rs_result = mysqli_query($connection,$sql); 
            $row = mysqli_fetch_row($rs_result); 
            $total_records = $row[0]; 
            $total_pages = ceil($total_records / 20); 
            
            for ($i=1; $i<=$total_pages; $i++) { 
                echo "<a href='product_list.php?page=".$i."'>".$i."</a> "; 
                };                       
            echo "<br><br><br>";    
           echo "<td><a href=new_product.php>New Product</a></td></br>";
        ?>
           
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
