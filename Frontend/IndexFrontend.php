<?php
require_once('dbInfor.php');
if(isset($_GET["message"])) {
  echo "<script>alert('".$_GET["message"]."')</script>";
  $_GET["message"] = "";
}
if(isset($_POST['submit'])){
  $Search = $_POST['search'];
  $sql = "SELECT * FROM datas WHERE ProductName LIKE '%";
  $sql .= "$Search";
  $sql .= "%'";
  $result = mysqli_query($db, $sql);
  if (mysqli_num_rows($result) >= 1) {

      $mess="yes";

  }else{
      $mess = "Invalid username or Incorrect password";
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/Frontend.css">

    <title>Index Frontend</title>
    <style>
      
    </style>
  </head>
  <body>
    <header>
      <nav>
        <div class="logo">WIRELESSWORLD</div>
        <div class="search"> 
          <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input class="TextSearch" type="text" id="search" name="search" placeholder="Search.." value="" require/>        
            <input class="IconSearch" type="submit" name="submit" value="Search">     
          </form>
        </div>
        
        <div >
          <ul class="menu">
            <li><a href="#">Home</a></li>
            <li class="menu_link">
              <a href="#Apple">Product</a>
              <ul class="menu_down">
                <li><a href="#Apple">Apple</a></li>
                <li><a href="#Oppo">Oppo</a></li>
                <li><a href="#SamSung">SamSung</a></li>
                <li><a href="#Xiaomi">Xiaomi</a></li>
                <li><a href="#Vivo">Vivo</a></li>
              </ul>
            </li>
            <li><a href="#About">About</a></li>
            <li><a href="#footer">Contact</a></li>
            <li>
              <a href="../Backend/Login.php"><i class="fa fa-sign-in"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="IssetSearch">
        <?php 
          if(isset($_POST['submit'])){
          $Search = $_POST['search'];
          $sql = "SELECT * FROM datas WHERE ProductName LIKE '%";
          $sql .= "$Search";
          $sql .= "%'";
          $result = mysqli_query($db, $sql);
          if (mysqli_num_rows($result) >= 1) {
        ?>
        <?php  
          $image_set = View_Search($Search);
          $count = mysqli_num_rows($image_set);
          for ($i = 0; $i < $count; $i++):
            $Image = mysqli_fetch_assoc($image_set); 
        ?>
          <div class="ViewSearch">
                <img  src="<?php echo $Image['ImageName']; ?>" alt="" />
                <br>
                <div class="Properties">
                <span> <b>Name</b>:&emsp;<?php echo $Image['ProductName']; ?></span>
                <br>
                <span><b>Color</b>:&emsp;<?php echo $Image['ImageTitle']; ?></span>
                <br>
                <span><b>Price</b>:&emsp;<?php echo $Image['ProductPrice']; ?>VND</span>
                <br>
                <span><b>Brand</b>:&emsp;<?php echo $Image['BrandName']; ?></span>
                <br>
                <span><b>Description</b>:&emsp;<?php echo $Image['ProductDescription']; ?></span>
                </div>
                <div class="Add">
                  <a href="<?php echo 'AddCard.php?ImageId='.$Image['ImageId']; ?>"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                </div>
            </div>
        <?php 
          endfor; 
          mysqli_free_result($image_set);
        ?>
        <?php 
          }else{
            $mess = "Sorry, I dont find!"
        ?>
        <?php echo $mess ?>
        <?php }};?>  
    </div>
 
    <div id="home" class="content">

      <div class="item active">
        <img class="slides" src="Image/anh1.jpg" width="100%" height= "600px">
      </div>

      <div class="item">
        <img class="slides" src="Image/anh2.jpg" width="100%" height= "600px">
      </div>

      <div class="item">
        <img class="slides" src="Image/anh3.png" width="100%" height= "600px">
      </div>

      <div class="item">
        <img class="slides" src="Image/anh4.png" width="100%" height= "600px">
      </div>

      <div class="item">
        <img class="slides" src="Image/anh5.jpg" width="100%" height= "600px">
      </div>
    </div>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script>
      w3.slideshow(".slides", 1500);
    </script>


    <div id="Apple"></div>
    <div  class="Apple">
      <div class="NameBrand">
        <p>----------Product Apple----------</p>
      </div>
      <div class="ImageProduct">
        <?php  
          $image_set = View_Image_Apple();
          $count = mysqli_num_rows($image_set);
          for ($i = 0; $i < $count; $i++):
              $Image = mysqli_fetch_assoc($image_set); 
        ?>
        <div class="ViewImage">
          <img src="<?php echo $Image['ImageName']; ?>" alt="" />
          <br>
          <div class="Properties">
          <span> <b>Name</b>:&emsp;<?php echo $Image['ProductName']; ?></span>
          <br>
          <span><b>Color</b>:&emsp;<?php echo $Image['ImageTitle']; ?></span>
          <br>
          <span><b>Price</b>:&emsp;<?php echo $Image['ProductPrice']; ?>VND</span>
          <br>
          <span><b>Brand</b>:&emsp;<?php echo $Image['BrandName']; ?></span>
          <br>
          <span><b>Description</b>:&emsp;<?php echo $Image['ProductDescription']; ?></span>
          </div>
          <div class="Add">
            <a href="<?php echo 'AddCard.php?ImageId='.$Image['ImageId']; ?>"><i class="fa fa-shopping-cart"></i> Buy Now</a>
          </div>
        </div>
        <?php 
          endfor; 
          mysqli_free_result($image_set);
        ?>

      </div>
    </div>

    <div id="Oppo"></div>
    <div class="Oppo">
      <div class="NameBrand">
        <p>----------Product Oppo----------</p>
      </div>
      <div class="ImageProduct">
        <?php  
                $image_set = View_Image_Oppo();
                $count = mysqli_num_rows($image_set);
                for ($i = 0; $i < $count; $i++):
                    $Image = mysqli_fetch_assoc($image_set); 
        ?>
        <div class="ViewImage">
          <img src="<?php echo $Image['ImageName']; ?>" alt="" />
          <br>
          <div class="Properties">
          <span> <b>Name</b>:&emsp;<?php echo $Image['ProductName']; ?></span>
          <br>
          <span><b>Color</b>:&emsp;<?php echo $Image['ImageTitle']; ?></span>
          <br>
          <span><b>Price</b>:&emsp;<?php echo $Image['ProductPrice']; ?>VND</span>
          <br>
          <span><b>Brand</b>:&emsp;<?php echo $Image['BrandName']; ?></span>
          <br>
          <span><b>Description</b>:&emsp;<?php echo $Image['ProductDescription']; ?></span>
          </div>
          <div class="Add">
            <a href="<?php echo 'AddCard.php?ImageId='.$Image['ImageId']; ?>"><i class="fa fa-shopping-cart"></i> Buy Now</a>
          </div>
        </div>
        <?php 
            endfor; 
            mysqli_free_result($image_set);
        ?>

      </div>
    </div>

    <div id="SamSung"></div>
    <div class="SamSung">
      <div class="NameBrand">
        <p>----------Product SamSung----------</p>
      </div>
      <div class="ImageProduct">
        <?php  
                $image_set = View_Image_SamSung();
                $count = mysqli_num_rows($image_set);
                for ($i = 0; $i < $count; $i++):
                    $Image = mysqli_fetch_assoc($image_set); 
        ?>
        <div class="ViewImage">
          <img src="<?php echo $Image['ImageName']; ?>" alt="" />
          <br>
          <div class="Properties">
          <span> <b>Name</b>:&emsp;<?php echo $Image['ProductName']; ?></span>
          <br>
          <span><b>Color</b>:&emsp;<?php echo $Image['ImageTitle']; ?></span>
          <br>
          <span><b>Price</b>:&emsp;<?php echo $Image['ProductPrice']; ?>VND</span>
          <br>
          <span><b>Brand</b>:&emsp;<?php echo $Image['BrandName']; ?></span>
          <br>
          <span><b>Description</b>:&emsp;<?php echo $Image['ProductDescription']; ?></span>
          </div>
          <div class="Add">
            <a href="<?php echo 'AddCard.php?ImageId='.$Image['ImageId']; ?>"><i class="fa fa-shopping-cart"></i> Buy Now</a>
          </div>
        </div>
        <?php 
            endfor; 
            mysqli_free_result($image_set);
        ?>

      </div>
    </div>

    <div id="Xiaomi"></div>
    <div class="Xiaomi">
      <div class="NameBrand">
        <p>----------Product Xiaomi----------</p>
      </div>
      <div class="ImageProduct">
        <?php  
                $image_set = View_Image_Xiaomi();
                $count = mysqli_num_rows($image_set);
                for ($i = 0; $i < $count; $i++):
                    $Image = mysqli_fetch_assoc($image_set); 
        ?>
        <div class="ViewImage">
          <img src="<?php echo $Image['ImageName']; ?>" alt="" />
          <br>
          <div class="Properties">
          <span> <b>Name</b>:&emsp;<?php echo $Image['ProductName']; ?></span>
          <br>
          <span><b>Color</b>:&emsp;<?php echo $Image['ImageTitle']; ?></span>
          <br>
          <span><b>Price</b>:&emsp;<?php echo $Image['ProductPrice']; ?>VND</span>
          <br>
          <span><b>Brand</b>:&emsp;<?php echo $Image['BrandName']; ?></span>
          <br>
          <span><b>Description</b>:&emsp;<?php echo $Image['ProductDescription']; ?></span>
          </div>
          <div class="Add">
            <a href="<?php echo 'AddCard.php?ImageId='.$Image['ImageId']; ?>"><i class="fa fa-shopping-cart"></i> Buy Now</a>
          </div>
        </div>
        <?php 
            endfor; 
            mysqli_free_result($image_set);
        ?>

      </div>
    </div>

    <div id="Vivo"></div>
    <div class="Vivo">
      <div class="NameBrand">
        <p>----------Product Vivo----------</p>
      </div>
      <div class="ImageProduct">
        <?php  
                $image_set = View_Image_Vivo();
                $count = mysqli_num_rows($image_set);
                for ($i = 0; $i < $count; $i++):
                    $Image = mysqli_fetch_assoc($image_set); 
        ?>
        <div class="ViewImage">
          <img src="<?php echo $Image['ImageName']; ?>" alt="" />
          <br>
          <div class="Properties">
          <span> <b>Name</b>:&emsp;<?php echo $Image['ProductName']; ?></span>
          <br>
          <span><b>Color</b>:&emsp;<?php echo $Image['ImageTitle']; ?></span>
          <br>
          <span><b>Price</b>:&emsp;<?php echo $Image['ProductPrice']; ?>VND</span>
          <br>
          <span><b>Brand</b>:&emsp;<?php echo $Image['BrandName']; ?></span>
          <br>
          <span><b>Description</b>:&emsp;<?php echo $Image['ProductDescription']; ?></span>
          </div>
          <div class="Add">
            <a href="<?php echo 'AddCard.php?ImageId='.$Image['ImageId']; ?>"><i class="fa fa-shopping-cart"></i> Buy Now</a>
          </div>
        </div>
        <?php 
            endfor; 
            mysqli_free_result($image_set);
        ?>
      </div>
    </div>

    <div id="About"></div>
    <div class="about">
      <div class="about-text">
        <h1>About Us</h1>
        <h3>Wireless World</h3>
        <p>Wireless World has years of experience in the international consumer electronics market.
        We have a structured, dynamic, competitive work team, committed to their work and with a great sense of belonging. We permanently innovate in our processes and technology services portfolio in the face of challenging market changes. We constantly bet on new projects to renew our offer and add value to our customers, innovating in products, services, knowledge transfers and growth. We help our customers obtain the most innovative electronic products, from top brands and at competitive prices. We currently have a large inventory with more than 40 leading brands in the consumer electronics and computer industry.
        Understanding that markets change and customers evolve. We help them find comfort when making a purchase.
        We work with products Samsung, Apple, Nokia, LG, Motorola, Alcatel, CAT, Sony, HTC, Blackberry, Huawei, ZTE, and Xiaomi, among others.
        You are supposed to create a Single-Page-Application and responsive Website for them with the below mentioned requirement specifications.
        </p>
      </div>
    </div> 
    

    <footer id="footer">
      <div class="contactUs">
        <div class="title">
          <h2>Get in Touch</h2>
        </div>
        <div class="box">
          <div class="contact form">
            <h3>SEND US A MESSAGE</h3>
            <form action="">
              <div class="formBox">
                <div class="row50">
                  <div class="inputBox">
                    <span>First Name</span>
                    <input type="text" placeholder="Hai Duong">
                  </div>
                  <div class="inputBox">
                    <span>Last Name</span>
                    <input type="text" placeholder="Nguyen">
                  </div>
                </div>
                <div class="row50">
                  <div class="inputBox">
                    <span>Email</span>
                    <input type="email" placeholder="nguyenvana@gaml.com">
                  </div>
                  <div class="inputBox">
                    <span>Mobile</span>
                    <input type="text" placeholder="+84 123 456 789">
                  </div>
                </div>
                <div class="row100">
                  <div class="inputBox">
                    <span>Messsage</span>
                    <textarea name="" id=""  placeholder="Write your message here..."></textarea>
                  </div>
                </div>
                <div class="row100">
                  <div class="inputBox">
                    <input type="Submit" value="Send">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="contact info">
            <h3>Contact Info</h3>
            <div class="infoBox">
              <div>
                <span><i class="fa fa-map-marker"></i></span>
                <p>Doi Can Ba Dinh Ha Noi</p>
              </div>
              <div>
                <span><i class="fa fa-envelope-o"></i></span>
                <a href="mailto:ly.hp.816@aptechlearning.edu.vn">ly.hp.816@aptechlearning.edu.vn</a>
              </div>
              <div>
                <span><i class="fa fa-phone"></i></span>
                <a href="tel:+84 123 456 789">+84 123 456 789</a>
              </div>
            </div>
            <ul class="sci">
              <li><a href="#footer"><i class="fa fa-facebook-f"></i></a></li>
              <li><a href="#footer"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#footer"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#footer"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          <div class="contact map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.932922248766!2d105.81702561485456!3d21. 035369785994817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13. 1!3m3!1m2!1s0x3135ab0cfe2b9b53%3A0x944735747d98fa87!2zxJDhu5lpIEPhuqVuLCBCYSDEkMOsbmgsIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1658508260049!5m2!1sen!2s" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"  referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </footer>
  

  </body>
  
</html>
