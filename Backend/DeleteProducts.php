<?php
require_once('dbInforBackend.php');
require_once('function.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    delete_Products($_POST['ProductId']);
    redirect_to('IndexBackend.php');
} else {
    if(!isset($_GET['ProductId'])) {
        redirect_to('IndexBackend.php');
    }
    $id = $_GET['ProductId'];
    $Product = View_Produtcs_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete Products</title>
    <style>
        .label {
            font-weight: bold;
            font-size: large;
        }
        a{
            text-decoration: none;
            font-size: 18px;
            color: blue;
        }
    </style>
</head>
<body>
    <h1>Delete Products</h1>
    <h2>Are you sure you want to delete this Products?</h2>
    <p><span class="label">Product Name: </span><?php echo $Product['ProductName']; ?></p>
    <p><span class="label">Product Price: </span><?php echo $Product['ProductPrice']; ?></p>
    <p><span class="label">Product Description: </span><?php echo $Product['ProductDescription']; ?></p>
    <p><span class="label">BrandId: </span><?php echo $Product['BrandId']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="ProductId" value="<?php echo $Product['ProductId']; ?>" >
     
        <input type="submit" name="submit" value="Delete Product">
     
    </form>
    
    <br><br>
    <a href="IndexBackend.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>