<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php include("../include/layouts/header.php"); ?>
<div id="main">
    <div id="page">
        <h2>Shopping list</h2>
        <?php 
    mysqli_set_charset($connection,"utf8");           
            if (isset($_GET["mdate"])) { $mdate  = $_GET["mdate"]; } else { $mdate="2014-06-16"; };
//            echo $mdate;        
        ?>
        <form action="list_of_products.php" method="post">
        <?php 
//            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
//            $start_from = ($page-1) * 20;
            mysqli_set_charset($connection,"utf8");            
//            $sql = "select m.Menu_id, m.User_id, m.Date, m.Category_id, m.Recipe_id, c.CategoryName, r.RecipeName
//            from Menu m, Categories c, Recipes r
//            where r.Recipe_id=m.Recipe_id
//            and c.Category_id=m.Category_id
//            order by m.Date, m.category_id LIMIT {$start_from}, 20";
            $sql = "select p.ProductName ProductName, sum(c.Amount) Amount, u.UnitName Unit, sum(c.Amount) * w.Weight Grams
            from Menu m, Components c, Products p, Units u, Weight w
            where m.Date between '$mdate' and date_add('$mdate', INTERVAL 7 DAY)
            and c.Recipe_id = m.Recipe_id
            and p.Product_id = c.Product_id
            and c.Product_id = w.Product_id
            and c.Unit_id = u.Unit_id
            and c.Unit_id = w.Unit_id
            group by ProductName, Unit
            order by ProductName asc" ;
//            order by ProductName asc LIMIT $start_from, 20" ;
            $rs_result = mysqli_query($connection,$sql); 
        if ($rs_result) {
            echo $mdate;      
            echo "<table>";
            echo "<tr><th>ProductName</th><th>Amount</th><th>Unit</th><th>Grams</th></tr>";
        while ($row = mysqli_fetch_assoc($rs_result)) {
            echo "<tr>";
            echo "<td>".$row["ProductName"]."</td>";            
            echo "<td>".$row["Amount"]."</td>";
            echo "<td>".$row["Unit"]."</td>";
            echo "<td>".$row["Grams"]."</td>";
            echo "</tr>";
        };
            echo "</table>";
            echo "<p></p>";
        ?>
        <?php 
//            $sql_cnt = "select @row := @row + 1 as row, t1.ProductName from (select p.ProductName ProductName, sum(c.Amount) Amount, c.Unit_id Unit
//            from Menu m, Components c, Products p
//            where m.Date between '$mdate' and date_add('$mdate', INTERVAL 7 DAY)
//            and c.Recipe_id = m.Recipe_id
//            and p.Product_id = c.Product_id
//            GROUP BY p.ProductName, c.Unit_id) t1, (SELECT @row := 0) t2";
//            $rs_result1 = mysqli_query($connection,$sql_cnt);
//            $row_cnt = mysqli_num_rows($rs_result1);
//            $row = mysqli_fetch_row($rs_result1); 
//            $total_pages = ceil($row_cnt / 20); 
//            for ($i=1; $i<=$total_pages; $i++) { 
//                echo "<a href='list_of_products.php?page=".$i."'>".$i."</a> "; 
//                };                       
//            echo "<br><br>";
        ?>       

     
        </form> 
            <a href="manage_content.php"> Cancel</a>
            <a href="new_menu.php">New Menu</a>
            <a href="kalendarsv4.php"> Kalendars</a> 
            <a href="recipes_list.php"> All Recipes</a>
            <a href="list_of_products.php"> Product shopping list</a>             
     </div>
</div>
        <?php
     // 5. Release returned data
        mysqli_free_result($rs_result);
        ?>
    <?php    
    } else {
    redirect_to('menu_show.php');
    } 
    ?>
    
    
<?php //include("../include/layouts/footer.php"); ?>
