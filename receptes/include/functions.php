<?php
  function confirm_query($result_set) {
    if (!$result_set) {
    die("Database query failed.");
    }
  }
  function redirect_to($new_location){
   header("Location:" . $new_location);
   exit;
   }
   
   function mysql_prep($string) {
   global $connection;
   
   $escaped_string = mysqli_real_escape_string($connection, $string);
   return $escaped_string;
   }
   
    function data_uri($file, $mime) 
    {  
      $contents = file_get_contents($file);
      $base64   = base64_encode($contents); 
      return ('data:' . $mime . ';base64,' . $base64);
    } 

    function menu_droplist($menu_row){
    echo "<select name= 'Pirmdiena'>";
    echo '<option value="">'.'--- Please Select Product ---'."</option>";
    $sql = "SELECT Recipe_id, RecipeName FROM Recipes ORDER BY RecipeName ASC"; 
    $cd_result = mysqli_query($connection,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());;            
    $cdrow=mysqli_fetch_array($cd_result);
    echo "<option>". $cdrow['RecipeName'] ."</option>";
    while ($cdrow=mysqli_fetch_array($cd_result)) {
        echo "<option>". $cdrow['RecipeName'] ."</option>";
        }
    echo "</select>";
    }    
    function prod_droplist($cdrow){

        while ($cdrow=mysqli_fetch_array($cd_result)) {
            echo '<option value="' .$cdrow['Product_id']. '">'. $cdrow['ProductName'] .'</option>';
            }
    }  
 
 ?>

