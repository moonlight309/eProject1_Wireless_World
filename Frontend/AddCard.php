<?php
require_once('dbInfor.php');
require_once('function.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    if (empty($_POST['FullName'])){
        $errors[] = 'FullName is required';
    }

    if (empty($_POST['Phone'])){
        $errors[] = 'Phone is required';
    }
    if (empty($_POST['Quantity'])){
        $errors[] = 'Quantity is required';
    } 

}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $Order = [];
        $Order['FullName'] = $_POST['FullName'];
        $Order['Phone'] = $_POST['Phone'];
        $Order['Color'] = $_POST['ImageTitle'];
        $Order['ProductName'] = $_POST['ProductName'];
        $Order['Image'] = $_POST['ImageName'];
        $Order['ProductDescription'] = $_POST['ProductDescription'];
        $Order['ProductPrice'] = $_POST['ProductPrice'];
        $Order['Quantity'] = $_POST['Quantity'];

        insert_Order($Order);
        $mess = "Bạn Đã Đặt Hàng Thành Công";
        redirect_to("IndexFrontend.php?message=$mess");
        
    }
} else {
    if(!isset($_GET['ImageId'])) {
        redirect_to('IndexFrontend.php');
    }
    $id = $_GET['ImageId'];
    $Image = View_Image_Id($id);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add card</title>
    <link rel="stylesheet" href="style/AddCard.css">
    <style>
        label {
            font-weight: bold;
            
        }
        .error {
            color: #FF0000;
        }
        div.error{
            border: thin solid red; 
            display: inline-block;
            padding: 5px;
        }
        input[id="ImageName"]{
            width: 0;
            height: 0;
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
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">   
        <div id="form" class="form">
        
            <div id="ImageOrder" class="image">
                <input type="text" id="ImageName" name="ImageName" readonly
                value="<?php echo isFormValidated()? $Image['ImageName']: $_POST['ImageName'] ?>">
                <img src="<?php echo $Image['ImageName']; ?>" alt="">
            </div>  

            <div id="DataOrder" class="DataOrder">
                <div class="order">
                    <div class="orderlabel">
                        <label for="ProductName">ProductName: </label>
                    </div>
                    <div class="orderinput">
                        <input type="text" id="ProductName" name="ProductName" placeholder="Product Name" readonly
                        value="<?php echo isFormValidated()? $Image['ProductName']: $_POST['ProductName'] ?>">
                    </div>
                </div> 
                <br>
                
                <div class="order">
                    <div class="orderlabel">
                        <label for="ProductDescription">Product Description: </label> 
                    </div>
                    <div class="ordertextareaprodes">
                        <textarea id="ProductDescription" name="ProductDescription" rows="6" cols="70" placeholder="Product Description" readonly
                        value="<?php echo isFormValidated()? $Image['ProductDescription']: $_POST['ProductDescription'] ?>"></textarea>
                    </div> 
                </div> 
                <br>
                
                <div class="order">
                    <div class="orderlabel">
                        <label for="ImageTitle">ImageTitle: </label> 
                    </div>
                    <div class="orderinput">
                        <input type="text" id="ImageTitle" name="ImageTitle" placeholder="Image Title" readonly
                        value="<?php echo isFormValidated()? $Image['ImageTitle']: $_POST['ImageTitle'] ?>">
                    </div>
                </div>    
                <br>
                
                <div class="order">
                    <div class="orderlabel">
                        <label for="ProductPrice">ProductPrice: </label>
                    </div>
                    <div class="orderinput">
                        <input type="text" id="ProductPrice" name="ProductPrice"  placeholder="Product Price" readonly
                        value="<?php echo isFormValidated()? $Image['ProductPrice']: $_POST['ProductPrice'] ?>">
                    </div>
                </div> 
                <br>

                <div class="order">
                    <div class="orderlabel">
                        <label for="BrandName">BrandName: </label> 
                    </div>
                    <div class="orderinput">
                        <input type="text" id="BrandName" name="BrandName"  placeholder="Brand Name" readonly
                        value="<?php echo isFormValidated()? $Image['BrandName']: $_POST['BrandName'] ?>">
                    </div>
                </div> 
                <br>

                <div class="order">
                    <div class="orderlabel">
                        <label for="Quantity">Quantity: </label> 
                    </div>
                    <div class="orderinput">
                        <input type="number" id="Quantity" name="Quantity"  min='1' placeholder="Quantity"
                        value="<?php echo isFormValidated()? '': $_POST['Quantity'] ?>">
                    </div>
                </div> 
                <br>
                
                <div class="order">
                    <div class="orderlabel">
                        <label for="FullName">FullName: </label> 
                    </div>
                    <div class="orderinput">
                        <input type="text" id="FullName" name="FullName"  placeholder="FullName"
                        value="<?php echo isFormValidated()? '': $_POST['FullName'] ?>">
                    </div>
                </div> 
                <br>
                
                <div class="order">
                    <div class="orderlabel">
                        <label for="Phone">Phone: </label>  
                    </div>
                    <div class="orderinput">
                        <input type="text" id="Phone" name="Phone" placeholder="Phone"
                        value="<?php echo isFormValidated()? '': $_POST['Phone'] ?>">
                    </div>
                </div> 
                <br><br>
                <div class="buynow">
                    <input type="submit" id="submit" name="submit" value="Buy Now">
                </div> 
            </div>
        </div>  
    </form>
    
    
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $Order = [];
        $Order['FullName'] = htmlspecialchars($_POST['FullName']);
        $Order['Phone'] = htmlspecialchars($_POST['Phone']);
        $Order['Color'] = htmlspecialchars($_POST['ImageTitle']);
        $Order['ProductName'] = htmlspecialchars($_POST['ProductName']);
        $Order['Image'] = htmlspecialchars($_POST['ImageName']);
        $Order['ProductDescription'] = $_POST['ProductDescription'];
        $Order['ProductPrice'] = htmlspecialchars($_POST['ProductPrice']);
        $Order['Quantity'] = htmlspecialchars($_POST['Quantity']);
        $result = insert_Order($Order);
        $newOrderId = mysqli_insert_id($db);
        ?>
        <!-- <h2><?php //echo $mess ?></h2> -->
        
    <?php endif; ?>
    
    <br><br>
    <a href="IndexFrontend.php">Back to HomePage</a> 
    <!-- <script>
        debugger
        document.getElementById("ImageOrder").style.display = 'none';
            document.getElementById("DataOrder").style.display = 'none';
        document.getElementById("submit").onclick = function () {
            debugger
            
        }
    </script> -->
</body>
</html>


<?php
db_disconnect($db);
?>