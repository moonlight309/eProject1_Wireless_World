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
    if (empty($_POST['ImageTitle'])){
        $errors[] = 'ImageTitle is required';
    }else{
        if(empty($_POST['ImageName'])){
            $errors[] = 'ImageName is required';
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

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $Image = [];
        $Image['ImageId'] = $_POST['ImageId'];
        $Image['ImageName'] = $_POST['ImageName'];
        $Image['ImageTitle'] = $_POST['ImageTitle'];
        $Image['ProductId'] = $_POST['ProductId'];


        update_Image($Image);
        redirect_to('IndexBackend.php');
    }
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
    <title>Edit Image</title>
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
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form">
            <input type="hidden" name="ImageId" 
            value="<?php echo isFormValidated()? $Image['ImageId']: $_POST['ImageId'] ?>" >

            <label for="ImageName">Image Name: </label>
            <input type="text" id="ImageName" name="ImageName" placeholder="Image Name"
            value="<?php echo isFormValidated()? $Image['ImageName']: $_POST['ImageName'] ?>">
            <br><br>

            <label for="ImageTitle">Image Title: </label>
            <input type="text" id="ImageTitle" name="ImageTitle"  placeholder="Image Title"
            value="<?php echo isFormValidated()? $Image['ImageTitle']: $_POST['ImageTitle'] ?>">
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
            <?php echo isFormValidated()? $Image['ProductId']: $_POST['ProductId'] ?>
            <br><br>
            <input id="fileInput" type="file" name="upload" onclick="Choose()">
            
            <br><br>
            <input type="submit" name="submit" value="Submit">
        
        </div>
    </form>
    
    <br>
    <a href="IndexBackend.php">Back to index</a> 
    <script>
        document.getElementById("fileInput").onchange = function(){ 
            document.getElementById("ImageName").value = "./Image/" + document.getElementById("fileInput").files[0].name;
        };
    </script>
</body>
</html>


<?php
db_disconnect($db);
?>