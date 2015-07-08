<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $rec_id=$_GET['id'];
    mysqli_set_charset($connection,"utf8");
    $query1 = "select r.Recipe_id, r.RecipeName, r.Description, r.RecipePicture  
            from Recipes r
            where r.Recipe_id='$rec_id'";
    $result = mysqli_query($connection, $query1);
    confirm_query($result);
    $row = mysqli_fetch_assoc($result);

    $query3 = "select sum(c.Calories) as CaloriesSum from(select c.Amount*w.Weight*p.Calories DIV 100 as Calories
            from Recipes r, Components c, Products p, Units u, Weight w
            where r.Recipe_id='$rec_id'
            and c.Recipe_id = r.Recipe_id
            and p.Product_id = c.Product_id
            and c.Product_id = w.Product_id            
            and c.Unit_id = u.Unit_id
            and u.Unit_id = w.Unit_id
            Group by p.ProductName) as c";                        
    $result1 = mysqli_query($connection, $query3);
    confirm_query($result1);
    
    $calories_row = mysqli_fetch_assoc($result1);
?>


<div id="main">
    <div id="navigation">

    </div>
    <div id="page">
        <?php echo message(); ?>
        <h2>Show Recipe</h2>
        <?php
            $recipe_id=$row["Recipe_id"];
            $recipe_name=$row["RecipeName"];
            $recipe_desc=$row["Description"];
            $calories_sum=$calories_row["CaloriesSum"];
            
            echo "<td>".$row["Recipe_id"]."</td>";
            echo "<h1>".$recipe_name."</h1>";
            echo "<td>".$recipe_desc."</td></br>";
            echo "Calories total:".$calories_sum."<br>";
            echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['RecipePicture'] ) . '"  width=150 height=130  />';            
//            echo "<img src='".$row["RecipePicture"]."' width='175' height='200' />";

        ?>

        <fieldset>
                <legend>Sastāvdaļas:</legend>
                <?php
                $query2 = "select c.Unit_id, c.Amount, p.ProductName, c.Product_id, c.Recipe_id, 
                        c.Amount*w.Weight*p.Calories DIV 100  as CaloriesProd, u.UnitName
                        from Recipes r, Components c, Products p, Units u, Weight w
                        where r.Recipe_id='$rec_id'
                        and c.Recipe_id = r.Recipe_id
                        and p.Product_id = c.Product_id
                        and c.Product_id = w.Product_id                        
                        and c.Unit_id = u.Unit_id
                        and u.Unit_id = w.Unit_id";
                $result = mysqli_query($connection, $query2);
                confirm_query($result);
                


                echo "<table>";
                    echo "<tr><th>Product</th><th>Amount</th><th>Unit</th><th>Calories</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row["ProductName"]."</td>";
                        echo "<td>".$row["Amount"]."</td>";
                       
                        echo "<td>".$row["UnitName"]."</td>";
                        echo "<td>".$row["CaloriesProd"]."</td>";
                        echo "<td><a href=components_edit.php?pid=".$row['Product_id']."&rid=".$row['Recipe_id']."&pname=".urlencode($row["ProductName"]).">update</a></td>";
                        echo "<td><a href=component_delete.php?pid=".$row['Product_id']."&rid=".$row['Recipe_id'].">delete</a></td>";
                   echo "<td><a href=product_edit.php?pid=".$row['Product_id'].">Product edit</a></td>";
                   echo "</tr>";
                    };
                    echo "</table><br>";
                    ?>
                    
    <form action="create_component.php" method="post">
        <?php
        echo '<input type="hidden" name="Recipe" value='.$recipe_id.'></p>';        
        
        mysqli_set_charset($connection,"utf8");
        $sql = "SELECT Product_id, ProductName FROM Products ORDER BY ProductName ASC"; 
            $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
            $cdrow=mysqli_fetch_array($cd_result);
            echo "<select name='Product'>";
            echo '<option value=""> --- Please select Product --- </option>';               
                   while ($cdrow=mysqli_fetch_array($cd_result)) {
                echo '<option value="' .$cdrow['Product_id']. '">'. $cdrow['ProductName'] .'</option>';
                }
             echo "</select>";
         ?>
                    
        </p>
        <input type="submit" name="submit" value="Add Product"/></p>
    </form>
            </fieldset>
            <fieldset>
            <legend>Pagatavošana:</legend>
            <?php 
                mysqli_set_charset($connection,"utf8");
                $query = "select s.StepNo, s.Description Step, s.StepPicture
                        from Recipes r, Steps s
                        where r.Recipe_id='$rec_id'
                        and s.Recipe_id = r.Recipe_id";
                $result = mysqli_query($connection, $query);
                confirm_query($result);
            ?>
            <?php
                echo "<table>";
                echo "<tr><th>No</th><th>Apraksts</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    $step_no=$row['StepNo'];
                    $step=$row['Step'];
                    echo "<td>".$step_no."</td>";
                    echo "<td>".$step."</td>";
                    echo "<td><a href=step_edit.php?sno=".$step_no."&rid=".$rec_id.">update</a></td>";
                    echo "<td><a href=step_delete.php?sno=".$step_no."&rid=".$rec_id.">delete</a></td>";
                    echo "</tr>";            
                };
                echo "</table><br>";        
                echo "<td><a href=new_step.php?id=".$rec_id.">New Step</a></td></br>";
            ?>
            </fieldset>        
            <a href="manage_content.php"> Cancel</a>
            <a href="recipes_list.php"> All Recipes</a>
            <a href="recipe_edit_0.php?rid=<?php echo $rec_id;?>"> Update Recipe</a>
            <a href="recipe_delete.php?rid=<?php echo $rec_id;?>"> Delete Recipe</a>            
        </div>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       

