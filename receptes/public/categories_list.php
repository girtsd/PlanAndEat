<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php
// 2.Perform database query.

    mysqli_set_charset($connection,"utf8");
?>
<?php include("../include/layouts/header.php"); ?>


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
            <h2>Categories List</h2>
            <form action="category_list.php" method="post">
        
        <?php 
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
            $start_from = ($page-1) * 20; 
            $sql = "SELECT * FROM Categories ORDER BY Category_id ASC LIMIT $start_from, 20"; 
            $rs_result = mysqli_query($connection,$sql); 
        ?> 
        <table>
        <tr><th>ID</th><th>Category Name</th></tr>

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
                   echo "<td>".$row["Category_id"]."</td>";
                   echo "<td>".$row["CategoryName"]."</td>";
                   echo "<td><a href=category_edit.php?id=".$row['Category_id'].">update</a></td>";
                   echo "<td><a href=category_delete.php?id=".$row['Category_id'].">delete</a></td>";
                   echo "</tr>";
        
        };               
        ?> 
        </table>
        <p></p>
        <?php 
            $sql = "SELECT COUNT(Category_id) FROM Categories"; 
            $rs_result = mysqli_query($connection,$sql); 
            $row = mysqli_fetch_row($rs_result); 
            $total_records = $row[0]; 
            $total_pages = ceil($total_records / 20); 
            
            for ($i=1; $i<=$total_pages; $i++) { 
                echo "<a href='categories_list.php?page=".$i."'>".$i."</a> "; 
                }; 

        ?>
           
         </form>
         <br />
         <br><br><br>   
         <a href="manage_content.php"> Cancel</a>
         <a href="new_category.php">New Category</a>

      
    </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
