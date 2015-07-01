<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>


<div id="main">
    <div id="page">
        <?php echo message(); ?>
        <h2>Show Menu</h2>


        <form action="menu_show.php" method="post">
        
        <?php 
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
            $start_from = ($page-1) * 20;
            mysqli_set_charset($connection,"utf8");            
            $sql = "select m.Menu_id, m.User_id, m.Date, m.Category_id, m.Recipe_id, c.CategoryName, r.RecipeName
            from Menu m, Categories c, Recipes r
            where r.Recipe_id=m.Recipe_id
            and c.Category_id=m.Category_id
            order by m.Date LIMIT {$start_from}, 20";
            $rs_result = mysqli_query($connection,$sql); 
        ?>     
        <?php
            
            echo "<table>";
            echo "<tr><th>Menu_id</th><th>Datums</th><th>Edienreize</th><th>Recepte</th></tr>";
        while ($row = mysqli_fetch_assoc($rs_result)) {
            echo "<tr>";
            echo "<td>".$row["Menu_id"]."</td>";            
            echo "<td>".$row["Date"]."</td>";
            echo "<td>".$row["CategoryName"]."</td>";
            echo "<td>".$row["RecipeName"]."</td>";
            echo "<td><a href=menu_edit.php?id=".$row['Menu_id'].">update</a></td>";
            echo "<td><a href=menu_delete.php?id=".$row['Menu_id'].">delete</a></td>";            
            echo "</tr>";
        };
            echo "</table><br>";

            $sql1 = "select m.Menu_id, m.User_id, m.Date, m.Category_id, m.Recipe_id, c.CategoryName, r.RecipeName
            from Menu m, Categories c, Recipes r
            where r.Recipe_id=m.Recipe_id
            and c.Category_id=m.Category_id"; 
            $rs_result = mysqli_query($connection,$sql1); 
            $row_cnt = mysqli_num_rows($rs_result);
       
            $total_pages = ceil($row_cnt / 20); 

            for ($i=1; $i<=$total_pages; $i++) { 
                echo "<a href='menu_show.php?page=".$i."'>".$i."</a> "; 
                };                       
            echo "<br><br>";

           ?>
     
        </form> 


            <a href="manage_content.php"> Cancel</a>
            <a href="new_menu.php">New Menu</a>
            <a href="kalendarsv4.php"> Kalendars</a> 
             <a href="recipes_list.php"> All Recipes</a>         
     </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($rs_result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
