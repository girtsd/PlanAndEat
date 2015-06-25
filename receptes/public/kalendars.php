<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php include("../include/layouts/header.php"); ?>


<div id="main">
    <div id="page">
<?php 
    mysqli_set_charset($connection,"utf8");
    if (isset($_GET["mdate"])) { $mdate  = $_GET["mdate"]; } else { $mdate="2014-06-16"; };
    echo $mdate;
    $query = "select 'Edienreize' CategoryName,
	'$mdate' Pirmdiena, 
       date_add('$mdate', INTERVAL 1 DAY) Otrdiena, 
       date_add('$mdate', INTERVAL 2 DAY) Tresdiena, 
       date_add('$mdate', INTERVAL 3 DAY) Ceturtdiena, 
       date_add('$mdate', INTERVAL 4 DAY) Piektdiena, 
       date_add('$mdate', INTERVAL 5 DAY) Sestdiena, 
       date_add('$mdate', INTERVAL 6 DAY) Svetdiena 
    from DUAL
    union
    select menu_1.CategoryName, 
           RecipeName_1 Pirmdiena, 
           RecipeName_2 Otrdiena, 
           RecipeName_3 Tresdiena, 
           RecipeName_4 Ceturtdiena, 
           RecipeName_5 Piektdiena, 
           RecipeName_6 Sestdiena, 
           RecipeName_7 Svetdiena 
    from (select c.CategoryName, r.RecipeName RecipeName_1 from Menu m, Recipes r, Categories c where m.Date = '$mdate' and m.Category_id=c.Category_id and
    m.Recipe_id = r.Recipe_id)menu_1
    left outer join
    (select CategoryName, RecipeName RecipeName_2 from Menu m, Recipes r, Categories c where Date = '$mdate'+ INTERVAL 1 DAY and c.Category_id=m.Category_id and r.Recipe_id=m.Recipe_id )menu_2
    on
    menu_1.CategoryName = menu_2.CategoryName
    left outer join
    (select CategoryName, RecipeName RecipeName_3 from Menu m, Recipes r, Categories c where Date = '$mdate'+ INTERVAL 2 DAY and c.Category_id=m.Category_id and r.Recipe_id=m.Recipe_id )menu_3
    on
    menu_1.CategoryName = menu_3.CategoryName
    left outer join
    (select CategoryName, RecipeName RecipeName_4 from Menu m, Recipes r, Categories c where Date = '$mdate'+ INTERVAL 3 DAY and c.Category_id=m.Category_id and r.Recipe_id=m.Recipe_id )menu_4
    on
    menu_1.CategoryName = menu_4.CategoryName
    left outer join
    (select CategoryName, RecipeName RecipeName_5 from Menu m, Recipes r, Categories c where Date = '$mdate'+ INTERVAL 4 DAY and c.Category_id=m.Category_id and r.Recipe_id=m.Recipe_id )menu_5
    on
    menu_1.CategoryName = menu_5.CategoryName
    left outer join
    (select CategoryName, RecipeName RecipeName_6 from Menu m, Recipes r, Categories c where Date = '$mdate'+ INTERVAL 5 DAY and c.Category_id=m.Category_id and r.Recipe_id=m.Recipe_id )menu_6
    on
    menu_1.CategoryName = menu_6.CategoryName
    left outer join
    (select CategoryName, RecipeName RecipeName_7 from Menu m, Recipes r, Categories c where Date = '$mdate'+ INTERVAL 6 DAY and c.Category_id=m.Category_id and r.Recipe_id=m.Recipe_id )menu_7
    on
    menu_1.CategoryName = menu_7.CategoryName";

    $result = mysqli_query($connection, $query);
    confirm_query($result);
?>

        <?php echo message(); ?>
        <h2>Show Menu</h2></br>
        <form>

    <?php
            echo "<table>";
            echo "<tr><th>Çdienreize</th><th>Pirmdiena</th><th>Otrdiena</th><th>Treðdiena</th><th>Ceturtdiena</th><th>Piektdiena</th><th>Sestdiena</th><th>Svçtdiena</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";        
            echo "<td>".$row["CategoryName"]."</td>";
            echo "<td>".$row["Pirmdiena"]."</td>";
            echo "<td>".$row["Otrdiena"]."</td>";
            echo "<td>".$row["Tresdiena"]."</td>";
            echo "<td>".$row["Ceturtdiena"]."</td>";
            echo "<td>".$row["Piektdiena"]."</td>";
            echo "<td>".$row["Sestdiena"]."</td>";
            echo "<td>".$row["Svetdiena"]."</td>";
           echo "</tr>";
        };
            echo "</table>"; 
        ?>
     <p> </p>
         </form> 
         <form action="kalendars.php">
          Choose week:</br>
          <input type="date" name="mdate">
          <input type="submit"><br>
        </form>
     <p> </p>
    <p> </p>
            <a href="manage_content.php"> Cancel</a>
            <a href="recipes_list.php"> All Recipes</a>
            <a href="list_of_products.php?mdate=<?php echo $mdate ?>"> Product shopping list</a> 
   </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
