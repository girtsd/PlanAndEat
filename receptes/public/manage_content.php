<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>


        <div id="main">
            <div id="navigation">

          
            <a href="product_list.php">Show products</a></br>
            <a href="recipes_list.php">Show recipes</a></br>
            <a href="categories_list.php">Show categories</a></br>   
            <a href="menu_show.php">Show menu</a></br>
            <a href="units_list.php">Show units</a></br>              
            <a href="weights_list.php">Show weights</a>            
            
            </div>
            
            <div id="page">
                <h2>Manage Content</h2>
                
                    <?php echo message(); ?>
            </div>
        </div>
      
 <?php include("../include/layouts/footer.php"); ?>
