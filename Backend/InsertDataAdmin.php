<?php
require_once('dbInforBackend.php');
$errors = [
    'UserName' => '',
    'Password' => ''
];

function isFormValidated(){
    global $errors;
    foreach ($errors as $value){
        if (!empty($value)) return false;
    }

    return true;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['UserName'])){
        $errors['UserName'] = 'User Name is required';
    }

    if (empty($_POST['Password']) && strlen($_POST['Password']) > 16){
        $errors['Password'] = 'Password must be less than 16 characters';
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Create New Admin</title>
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
            <label for="UserName">User Name: </label>
            <input type="text" id="UserName" name="UserName" placeholder="UserName"
            value="<?php echo isFormValidated()? '': $_POST['UserName'] ?>">
            <br><br>

            <label for="Password">Password: </label>
            <input type="password" id="Password" name="Password" min="1" placeholder="Password"
            value="<?php echo isFormValidated()? '': $_POST['Password'] ?>">
            <br><br>
            
            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">
        
        </div>
    </form>
    
    

    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $Admin = [];
        $Admin['UserName'] = htmlspecialchars($_POST['UserName']);
        //$Admin['UserName'] = $_POST['UserName'];
        $Admin['Password'] = htmlspecialchars($_POST['Password']);
        $result = insert_Admin($Admin);
        $newAdminId = mysqli_insert_id($db);
        ?>
        <h2>A new Admin has been created:</h2>
        <ul>
        <?php 
            foreach ($_POST as $key => $value) {
                if ($key == 'submit') continue;
                if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
            }        
        ?>
        </ul>
    <?php endif; ?>
    
    <br>
    <a href="IndexBackend.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>