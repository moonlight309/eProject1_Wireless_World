<?php
require_once('dbInforBackend.php'); 
$errors = [];
$ImgName = '';

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    if (empty($_POST['ImageTitle'])){
        $errors[] = 'Image Title is required';
    }else{
        if(empty($_POST['ImageName'])){
            $errors[] = 'Image Name is required';
        }else{
            if(isset($_POST['submit'])) {
                $permitted_extensions = ['png', 'jpg', 'jpeg', 'gif'];    
                $file_name = $_FILES['upload']['name'];
                if(!empty($file_name)) {

                    $file_size = $_FILES['upload']['size'];
                    $file_tmp_name = $_FILES['upload']['tmp_name'];  
                    $generated_file_name = time().'-'.$file_name;         
                    $destination_path = "./Image/$file_name";
                    $file_extension = explode('.', $file_name);
                    $file_extension = strtolower(end($file_extension)); 
                    $ImgName = $destination_path;
                    echo "$file_name, $file_size, $file_extension, $destination_path";   

                    if(in_array($file_extension, $permitted_extensions)) {
                        if($file_size <= 2000000) {

                            move_uploaded_file($file_tmp_name, $destination_path);
                            $message = 'UPLOAD SUCCESFUL'; 
                        } else {
                            $message = '<p style="color:red;">
                                File is too big</p>';                    
                        }
                    } else {
                        $message = '<p style="color:red;">
                                Invalid file type</p>';
                    }
                } else {
                    $message = '<p style="color:red;">
                        No file selected, please try again</p>';
                }
            } 
        }
    }
    
    
}

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
        .form input[type="reset"],
        .form input[type="submit"]{
            width: 80px;
            height: 25px;   
            font-size: 18px;
            border-radius: 5px;
        }
        .form select{
            width: 210px;
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
    <br>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="form">                
            <label for="ImageName">Image Name: </label>
            <input type="text" id="ImageName" name="ImageName" placeholder="Image Name" value="<?php echo isFormValidated()? '': $_POST['ImageName'] ?>">
            <br><br>
            <label for="ImageTitle">Image Title: </label>
            <input type="text" id="ImageTitle" name="ImageTitle" placeholder="Image Title"
            value="<?php echo isFormValidated()? '': $_POST['ImageTitle'] ?>">
            <br><br>
            <select name="ProductId" id="ProductId" >
            <label for="ProductId">ProductId: </label>
                <?php  
                    $image_set = View_Name_Product();
                    $count = mysqli_num_rows($image_set);
                    for ($i = 0; $i < $count; $i++):
                    $img = mysqli_fetch_assoc($image_set); 
                ?>
                    
                <option   value="<?php echo $img['ProductId']?>">
                    <?php echo $img['ProductName']; ?>
                </option>
                    
                    
                <?php 
                    endfor; 
                    mysqli_free_result($image_set);
                ?>
            </select>
            <?php echo isFormValidated()? '': $_POST['ProductId'] ?>
            <br><br>

            <input id="fileInput" type="file" name="upload" onclick="Choose()">
            <br><br>
            <input type="submit" value="submit" name="submit">
            <input type="reset" value="Reset" name="Reset">
        </div>
    </form>
    
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $Image = [];
        $Image['ImageName'] = htmlspecialchars($_POST['ImageName']);
        $Image['ImageTitle'] = htmlspecialchars($_POST['ImageTitle']);
        $Image['ProductId'] = htmlspecialchars($_POST['ProductId']);
        
        $result = insert_Image($Image);
        $newImageId = mysqli_insert_id($db);
        ?>
        <h2>A new Image has been created:</h2>
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
    <script>

        document.getElementById("fileInput").onchange = function(){ 
            document.getElementById("ImageName").value = "./Image/" + document.getElementById("fileInput").files[0].name;
        };
    </script>
</body>
</html>