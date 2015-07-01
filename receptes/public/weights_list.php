<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php

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
                    <h2>Unit Weight</h2>
                    <form action="weights_list.php" method="post">
                
                <?php 
                    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                    $start_from = ($page-1) * 20; 
                    $sql = "SELECT * FROM Weight ORDER BY Product_id ASC LIMIT $start_from, 20"; 
                    $rs_result = mysqli_query($connection,$sql); 

                    $query2 = "select p.Product_id, p.ProductName, u.Unit_id, UnitName, w.Weight 
                        from Products p, Units u, Weight w
                        where u.Unit_id = w.Unit_id
                        and p.Product_id = w.Product_id
                        ORDER BY ProductName ASC LIMIT $start_from, 20";
                    $rs_result2 = mysqli_query($connection,$query2);
                    ?> 
                <table>
                <tr><th>Product_ID</th><th>Unit_ID</th><th>Weight</th></tr>

                <?php 
                
                
                
                
 //   if (mysqli_num_rows($rs_result) > 0) {
    // output data of each row
  //  while($row = mysqli_fetch_assoc($rs_result)) {
 //       echo "id: " . $row["Product_id"]. " - Name: " . $row["ProductName"]. "<br>";
 //   }
//} else {
 //   echo "0 results";
//}
                while ($row = mysqli_fetch_assoc($rs_result2)) { 
                    echo "<tr>";
                    echo "<td>".$row["ProductName"]."</td>";
                    echo "<td>".$row["UnitName"]."</td>";
                    echo "<td>".$row["Weight"]."</td>";
                    echo "<td><a href=weight_edit.php?pid=".$row['Product_id']."&uid=".$row['Unit_id']."&wght=".urlencode($row["Weight"]).">update</a></td>";
                    echo "<td><a href=weight_delete.php?pid=".$row['Product_id']."&uid=".$row['Unit_id'].">delete</a></td>";
                    echo "</tr>";
                        };               
                ?> 
                </table>
        <p></p>
                
                <?php 
                    $sql = "SELECT COUNT(Product_id) FROM Weight"; 
                    $rs_result = mysqli_query($connection,$sql); 
                    $row = mysqli_fetch_row($rs_result); 
                    $total_records = $row[0]; 
                    $total_pages = ceil($total_records / 20); 
                    
                    for ($i=1; $i<=$total_pages; $i++) { 
                        echo "<a href='weights_list.php?page=".$i."'>".$i."</a> "; 
                        };                       

                ?>
                   
                 </form>
                 <br />
                 <a href="manage_content.php"> Cancel</a>
                <a href="new_weight.php">New Weight</a>      
            </div>
        </div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
