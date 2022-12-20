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
    if (empty($_POST['BrandName'])){
        $errors[] = 'Brand Name is required';
    }

    if (empty($_POST['BrandDescription'])){
        $errors[] = 'Brand Description is required';
    }
    

}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $Brand = [];
        $Brand['BrandId'] = $_POST['BrandId'];
        $Brand['BrandName'] = $_POST['BrandName'];
        $Brand['BrandDescription'] = $_POST['BrandDescription'];


        update_Brand($Brand);
        redirect_to('IndexBackend.php');
    }
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
    <title>Edit Brand</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        .error {
            color: #FF0000;
            list-style-type: none;
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
        .form textarea{
            width: 75%;
            padding: 5px;
            font-size: 15px;
            border: 1px solid black;
            border-radius: 5px;
            resize: vertical;
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
        </div><br><br>
    <?php endif; ?>
   
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form">
            <input type="hidden" name="BrandId" placeholder="Brand Name"
            value="<?php echo isFormValidated()? $Brand['BrandId']: $_POST['BrandId'] ?>" >

            <label for="BrandName">Brand Name: </label>
            <input type="text" id="BrandName" name="BrandName"  
            value="<?php echo isFormValidated()? $Brand['BrandName']: $_POST['BrandName'] ?>">
            <br><br>

            <label for="BrandDescription">Brand Description: </label>
            <textarea id="BrandDescription" name="BrandDescription" rows="4" cols="50" placeholder="Brand Description"
            value="<?php echo isFormValidated()? $Barand['BrandDescription']: $_POST['BrandDescription'] ?>"></textarea>
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