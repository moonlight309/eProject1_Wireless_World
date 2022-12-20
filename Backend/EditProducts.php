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
    if (empty($_POST['ProductName'])){
        $errors[] = 'Product Name is required';
    }

    if (empty($_POST['ProductPrice'])){
        $errors[] = 'Product Price is required';
    }
    if (empty($_POST['ProductDescription'])){
        $errors[] = 'Product Description is required';
    }
     

}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $Product = [];
        $Product['ProductId'] = $_POST['ProductId'];
        $Product['ProductName'] = $_POST['ProductName'];
        $Product['ProductPrice'] = $_POST['ProductPrice'];
        $Product['ProductDescription'] = $_POST['ProductDescription'];
        $Product['BrandId'] = $_POST['BrandId'];


        update_Products($Product);
        redirect_to('IndexBackend.php');
    }
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
            padding: 20px 10px;
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
        .form select{
            width: 80px;
            height: 25px; 
            border-radius: 5px;
            font-size: 15px;
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
            <input type="hidden" name="ProductId" 
            value="<?php echo isFormValidated()? $Product['ProductId']: $_POST['ProductId'] ?>" >
            <br><br>

            <label for="ProductName">Product Name: </label> 
            <input type="text" id="ProductName" name="ProductName" placeholder="Product Name"
            value="<?php echo isFormValidated()? $Product['ProductName']: $_POST['ProductName'] ?>">
            <br><br>

            <label for="ProductPrice">Product Price: </label> 
            <input type="text" id="ProductPrice" name="ProductPrice" placeholder="Product Price" 
            value="<?php echo isFormValidated()? $Product['ProductPrice']: $_POST['ProductPrice'] ?>">
            <br><br>

            <label for="ProductDescription">Product Description: </label> 
            <textarea id="ProductDescription" name="ProductDescription" rows="4" cols="50" placeholder="Product Description"
            value="<?php echo isFormValidated()? $Product['ProductDescription']: $_POST['ProductDescription'] ?>"></textarea>
            <br><br>

            <select name="BrandId" id="BrandId" >
                <?php  
                    $products_set = View_Name_Brand();
                    $count = mysqli_num_rows($products_set);
                    for ($i = 0; $i < $count; $i++):
                    $Pro = mysqli_fetch_assoc($products_set); 
                    
                ?>

                <option   value="<?php echo $Pro['BrandId']?>">
                    <?php echo $Pro['BrandName']; ?>
                </option>
                    
                    
                <?php 
                    endfor; 
                    mysqli_free_result($products_set);
                ?>
            </select>
            <?php echo isFormValidated()? $Product['BrandId']: $_POST['BrandId'] ?>
            <br><br>
            <input type="submit" name="submit" value="Submit">

        </div>
    </form>
  
    <br><br>
    <a href="IndexBackend.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>