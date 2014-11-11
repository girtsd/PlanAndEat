<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php include("../include/layouts/header.php"); ?>
<?php 
    $rec_id=$_GET['id'];
    mysqli_set_charset($connection,"utf8");
    $query = "select r.Recipe_id, r.RecipeName, r.Description, 
                    c.Unit, c.Amount, p.ProductName, p.Calories 
            from Recipes r, Components c, Products p
            where r.Recipe_id='$rec_id'
            and c.Recipe_id = r.Recipe_id
            and p.Product_id = c.Product_id";
    $result = mysqli_query($connection, $query);
    confirm_query($result);
    $row = mysqli_fetch_assoc($result);

?>


<div id="main">

    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
    <tr>
    <td><form name="form1" method="post" action="insert_ac.php">
        <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
        <td colspan="3"><strong>Sign up to the Tea App</strong></td>
        </tr>

        <tr>
        <td width="71">Name</td>
        <td width="6">:</td>
        <td width="301"><input name="name" type="text" id="name"></td>
        </tr>
        <tr>
          <td width="71">Name</td>
          <td width="6">:</td>
          <td width="301"><input name="drink" type="text" id="name">
            <select name="productname">
        <?php foreach($data as $row): ?>
              <option value="<?=$row['ProductName']?>"><?=$row['ProductName']?></option>
        <?php endforeach ?>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <input type="submit" name="Submit" value="Submit">
          </td>
        </tr>
        </table>
    </form>
    </td>
    </tr>
    </table>
            <a href="manage_content.php"> Cancel</a>
</div>
    <?php
 // 5. Release returned data
    mysqli_free_result($result);
    ?>       
 <?php include("../include/layouts/footer.php"); ?>
