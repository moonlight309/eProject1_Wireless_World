<?php
require_once('dbInforBackend.php');
require_once('function.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    delete_Brand($_POST['BrandId']);
    redirect_to('IndexBackend.php');
} else {
    if(!isset($_GET['BrandId'])) {
        redirect_to('IndexBackend.php');
    }
    $id = $_GET['BrandId'];
    $Brand = View_Brand_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete Brand</title>
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
    <h1>Delete Brand</h1>
    <h2>Are you sure you want to delete this Brand?</h2>
    <p><span class="label">Brand Name: </span><?php echo $Brand['BrandName']; ?></p>
    <p><span class="label">Brand Description: </span><?php echo $Brand['BrandDescription']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="BrandId" value="<?php echo $Brand['BrandId']; ?>" >
     
        <input type="submit" name="submit" value="Delete Brand">
     
    </form>
    
    <br><br>
    <a href="IndexBackend.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>