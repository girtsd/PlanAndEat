<?php require_once("../include/db_connection.php"); ?>


<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>

<div id="main">
    <div id="navigation">
    <li class="row">
        <li>Products</li>
            <li><a href="product_list.php">Show Product list</li>
            <li><a href="new_product.php">+ Add a Product</li>
        <li>Recipes</li>
        <ul>
            <li>Show Recipes</li>
            <li>+ Add a Recipe</li>
        </ul>       
        <li>Categories</li>
        <li>Menu</li>        
    </li>
    <a href="new_product.php">+ Add a product</a></br>
    <a href="new_recipe.php"> + Add a recipe</a></br>            
    <a href="product_list.php">Show product list</a></br>
    <a href="product_drop_list.php">Choose product</a></br>
    <a href="product_edit.php">Edit product</a></br>
    <a href="recipes_list.php">Show recipes</a>
    
    
    </div>
    
    <div id="page">
        <h2>Manage Content</h2>

    </div>
</div>

 <?php include("../include/layouts/footer.php"); ?>