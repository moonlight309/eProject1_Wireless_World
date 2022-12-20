<?php
    require_once('dbInforBackend.php');
    session_start();
    if(isset($_POST['submit'])){
        $Username = $_POST['username'];
        $Password = $_POST['password'];

        $sql = "SELECT * FROM `admin` WHERE UserName=
                '$Username' AND `Password`='$Password'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) == 1) {

            header('location: ./IndexBackend.php');
			
        }else{
            $mess = "Invalid username or Incorrect password";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>

    <div class="login">    
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="logincontainer">
            <div class='logintext'>
                    <span>LOGIN</span>
                </div>
                <label for='username'><b>User Name: </b></label>
                <input type="text" name="username" placeholder='User name'>
                <label for='password'><b>Password: <b></label>
                <input type="password" name="password" placeholder='password'>
                <input type="submit" name="submit" onclick="Login()" value="Login">
            </div>
            <div class='containerERR'  >
            <strong >
                <br><?php
                    if(isset($_POST['submit'])){
                        echo $mess;
                    }
                    
                ?></br>
            </strong>
        </form>
    </div>

</body>
</html>

<?php
db_disconnect($db);
?>