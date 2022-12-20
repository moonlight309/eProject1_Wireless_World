<?php
require_once('dbInforBackend.php');
require_once('function.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    delete_Admin($_POST['UserId']);
    redirect_to('IndexBackend.php');
} else {
    if(!isset($_GET['UserId'])) {
        redirect_to('IndexBackend.php');
    }
    $id = $_GET['UserId'];
    $Admin = View_Admin_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete Admin</title>
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
    <h1>Delete Admin</h1>
    <h2>Are you sure you want to delete this Admin?</h2>
    <p><span class="label">User Name: </span><?php echo $Admin['UserName']; ?></p>
    <p><span class="label">Password: </span><?php echo $Admin['Password']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="UserId" value="<?php echo $Admin['UserId']; ?>" >
     
        <input type="submit" name="submit" value="Delete Admin">
     
    </form>
    
    <br><br>
    <a href="IndexBackend.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>