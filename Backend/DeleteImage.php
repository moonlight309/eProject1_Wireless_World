<?php
require_once('dbInforBackend.php');
require_once('function.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    delete_Image($_POST['ImageId']);
    redirect_to('IndexBackend.php');
} else { 
    if(!isset($_GET['ImageId'])) {
        redirect_to('IndexBackend.php');
    }
    $id = $_GET['ImageId'];
    $Image = View_Image_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete Image</title>
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
    <h1>Delete Image</h1>
    <h2>Are you sure you want to delete this Image?</h2>
    <p><span class="label">Image Name: </span><?php echo $Image['ImageName']; ?></p>
    <p><span class="label">Image Title: </span><?php echo $Image['ImageTitle']; ?></p>
    <p><span class="label">ProductId: </span><?php echo $Image['ProductId']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="ImageId" value="<?php echo $Image['ImageId']; ?>" >
     
        <input type="submit" name="submit" value="Delete Image">
     
    </form>
    
    <br><br>
    <a href="IndexBackend.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>