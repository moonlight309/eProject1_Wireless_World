<?php
require_once('dbInforBackend.php');
require_once('function.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    if (empty($_POST['UserName'])){
        $errors[] = 'User Name is required';
    }

    if (empty($_POST['Password'])){
        $errors[] = 'Password is required';
    }
    

}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $Admin = [];
        $Admin['UserId'] = $_POST['UserId'];
        $Admin['UserName'] = $_POST['UserName'];
        $Admin['Password'] = $_POST['Password'];


        update_Admin($Admin);
        redirect_to('IndexBackend.php');
    }
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
    <title>Edit Admin</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        .error {
            color: #FF0000;
        }
        div.error{
            border: thin solid red; 
            display: inline-block;
            padding: 5px;
            margin: 20px;
        }
        .form{
            width: 40%;
            padding: 30px 10px;
        }
        .form label {
            font-weight: bold;
            font-size: 20px;
        }
        .form input[type="text"]{
            width: 200px;
            height: 25px;  
            border-radius: 5px;
            margin-left: 10px;          
        }
        .form input[type="password"]{
            width: 200px;
            height: 25px;  
            border-radius: 5px;
            margin-left: 23px; 
        }
        .form input[type="submit"]{
            margin-left: 115px; 
        }
        .form input[type="reset"],
        .form input[type="submit"]{
            width: 80px;
            height: 25px;   
            font-size: 18px;
            border-radius: 5px;
        }
        a{
            text-decoration: none;
            font-size: 18px;
            color: blue;
            padding: 0px 10px;
        }
    </style>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
        <div class="error">
            <span> Please fix the following errors </span>
            <ul>
                <?php
                foreach ($errors as $key => $value){
                    if (!empty($value)){
                        echo '<li>', $value, '</li>';
                    }
                }
                ?>
            </ul>
        </div><br>
    <?php endif; ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form">
            <input type="hidden" name="UserId" 
            value="<?php echo isFormValidated()? $Admin['UserId']: $_POST['UserId'] ?>" >

            <label for="UserName">User Name</label>
            <input type="text" id="UserName" name="UserName" placeholder="UserName"
            value="<?php echo isFormValidated()? $Admin['UserName']: $_POST['UserName'] ?>">
            <br><br>

            <label for="Password">Password</label>
            <input type="password" id="Password" name="Password" placeholder="Password"
            value="<?php echo isFormValidated()? $Admin['Password']: $_POST['Password'] ?>">
            <br><br>
    
            <input type="submit" name="submit" value="Submit">
        
        </div>
    </form>
    
    
    
    <br>
    <a href="IndexBackend.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>