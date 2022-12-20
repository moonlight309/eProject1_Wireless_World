<?php
require_once('dbInforBackend.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=\, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style/Backend.css">
    <title>Index Backend</title>

    <style>
      
    </style>
  </head>
  <body>        
    <div class="Admin">
      <div class="NavAdmin">
        <div class="NavAdminLogo">
          <button onclick="OpenMenu()"><i class="fa fa-bars"></i></button>
          <span><p>Mobile Shop</p> </span>
        </div>
        <div class="NavAdminSearch">
          <input type="text" id="Search" name="Search" placeholder="Search.." />
          <button class="Search"><i class="fa fa-search"></i></button>
        </div>
        <div class="NavAdminLogout">
          <span><i class="fa fa-user"></i></span>
          <a href="Logout.php"><i class="fa fa-sign-out"></i></a>
        </div>
      </div>

      <div class="Content">
        <div id="Menu" class="Menu">
          <div onclick="OpenIndexAdmin()" class="NameTable">
            <div class="Icon"><i class="fa fa-user"></i></div>
            <div class="Name">Admin</div>
          </div>
          <br/>
          <div onclick="ClickIndexProducts()" class="NameTable">
            <div class="Icon"><i class="fa fa-book"></i></div>
            <div class="Name">Products</div>
          </div>
          <br />
          <div onclick="OpenIndexImage()" class="NameTable">
            <div class="Icon"><i class="fa fa-image"></i></div>
            <div class="Name">Image</div>
          </div>
          <br />
          <div onclick="OpenIndexOrder()" class="NameTable">
            <div class="Icon"><i class="fa fa-id-card-o"></i></div>
            <div class="Name">Order</div>
          </div>
          <br />
          <div onclick="OpenIndexBrand()" class="NameTable">
            <div class="Icon"><i class="fa fa-paw"></i></div>
            <div class="Name">Brand</div>
          </div>
        </div>

        <div class="Index">

            <div id="ClickOpenAdmin" class="IndexAdmin">
                <div class="NavCreateAdmin">
                    <div class="CreateAdmin">
                    <a href="InsertDataAdmin.php"><i class="fa fa-plus"></i>&nbsp;Create New</a>
                    </div>
                </div>
                <br>
                <table class="TableAdmin">
                <tr>
                    <th>User Name</th>
                    <th>Password</th>   
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>                 
                </tr>
                <?php  
                    $admin_set = View_Admin();
                    $count = mysqli_num_rows($admin_set);
                    for ($i = 0; $i < $count; $i++):
                    $Admin = mysqli_fetch_assoc($admin_set); 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($Admin['UserName']); ?></td>
                    <td><?php echo $Admin['Password']; ?></td>
                    <td><a href="<?php echo 'EditAdmin.php?UserId='.$Admin['UserId']; ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a></td>
                    <td><a href="<?php echo 'DeleteAdmin.php?UserId='.$Admin['UserId']; ?>"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
                </tr>
                <?php 
                    endfor; 
                    mysqli_free_result($admin_set);
                ?>
                </table>
            </div>

            <div id="ClickOpenBrand" class="IndexBrand">
                <div class="NavCreateAdmin">
                    <div class="CreateAdmin">
                    <a href="InsertDataBrand.php"><i class="fa fa-plus"></i>&nbsp;Create New</a>
                    </div>
                </div>
                <br>
                <table class="TableAdmin">
                    <tr>
                    <th>Brand Name</th>
                    <th>Brand Description</th>   
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>                 
                    </tr>
                    <?php  
                    $brand_set = View_Brand();
                    $count = mysqli_num_rows($brand_set);
                    for ($i = 0; $i < $count; $i++):
                        $Brand = mysqli_fetch_assoc($brand_set); 
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($Brand['BrandName']); ?></td>
                        <td><?php echo htmlspecialchars($Brand['BrandDescription']); ?></td>
                        <td><a href="<?php echo 'EditBrand.php?BrandId='.$Brand['BrandId']; ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a></td>
                        <td><a href="<?php echo 'DeleteBrand.php?BrandId='.$Brand['BrandId']; ?>"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
                    </tr>
                    <?php 
                    endfor; 
                    mysqli_free_result($brand_set);
                    ?>
                </table>               
            </div>
            
            <div id="ClickOpenProducts" class="IndexProducts">

                <div class="NavCreateAdmin">
                    <div class="CreateAdmin">
                    <a href="InsertDataProducts.php"><i class="fa fa-plus"></i>&nbsp;Create New</a>
                    </div>
                </div>
                <br>
                <table class="TableAdmin">
                    <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>   
                    <th>Product Description</th>   
                    <th>Brand Name</th> 
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>                 
                    </tr>
                    <?php  
                    $products_set = View_Produtcs();
                    $count = mysqli_num_rows($products_set);
                    for ($i = 0; $i < $count; $i++):
                        $Product = mysqli_fetch_assoc($products_set); 
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($Product['ProductName']); ?></td>
                        <td><?php echo htmlspecialchars($Product['ProductPrice']); ?></td>
                        <td><?php echo $Product['ProductDescription']; ?></td>
                        <td><?php echo htmlspecialchars($Product['BrandName']); ?></td>
                        <td><a href="<?php echo 'EditProducts.php?ProductId='.$Product['ProductId']; ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a></td>
                        <td><a href="<?php echo 'DeleteProducts.php?ProductId='.$Product['ProductId']; ?>"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
                    </tr>
                    <?php 
                    endfor; 
                    mysqli_free_result($products_set);
                    ?>
                </table>
            </div>
            
            <div id="ClickOpenImage" class="IndexImage">

                <div class="NavCreateAdmin">
                    <div class="CreateAdmin">
                    <a href="InsertDataImage.php"><i class="fa fa-plus"></i>&nbsp;Create New</a>
                    </div>
                </div>
                <br>
                <table class="TableAdmin">
                    <tr>
                    <!-- <th>Image Name</th> -->
                    <th>Image Title</th>   
                    <th>Product Name</th>  
                    <th>Image</th> 
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>                 
                    </tr>
                    <?php  
                    $image_set = View_Image();
                    $count = mysqli_num_rows($image_set);
                    for ($i = 0; $i < $count; $i++):
                        $Image = mysqli_fetch_assoc($image_set); 
                    ?>
                    <tr>
                        <!-- <td><?php //echo $Image['ImageName']; ?></td> -->
                        <td><?php echo htmlspecialchars($Image['ImageTitle']); ?></td>
                        <td><?php echo htmlspecialchars($Image['ProductName']); ?></td>
                        <td><img src=<?php echo $Image['ImageName']; ?> style="width: 80px; height: 80px;" alt=""></td>
                        <td><a href="<?php echo 'EditImage.php?ImageId='.$Image['ImageId']; ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a></td>
                        <td><a href="<?php echo 'DeleteImage.php?ImageId='.$Image['ImageId']; ?>"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
                    </tr>
                    <?php 
                    endfor; 
                    mysqli_free_result($image_set);
                    ?>
                </table>
            </div>  
            <div id="ClickOpenOrder" class="IndexOrder">
              <table class="TableAdmin">
                <tr>
                  <th>FullName</th>
                  <th>Phone</th>   
                  <th>Color</th>  
                  <th>ProductName</th> 
                  <th>Image</th> 
                  <th>ProductDescription</th> 
                  <th>ProductPrice</th> 
                  <th>Quantity</th>
                  <th>Status</th> 
                                
                </tr>
                <?php  
                $order_set = View_Order();
                $count = mysqli_num_rows($order_set);
                for ($i = 0; $i < $count; $i++):
                  $Order = mysqli_fetch_assoc($order_set); 
                ?>
                <tr>
                  <td><?php echo htmlspecialchars($Order['FullName']); ?></td>
                  <td><?php echo htmlspecialchars($Order['Phone']); ?></td>
                  <td><?php echo htmlspecialchars($Order['Color']); ?></td>
                  <td><?php echo htmlspecialchars($Order['ProductName']); ?></td>
                  <td> <img src="<?php echo $Order['Image'] ?>" style="width:80px ;height: 80px" alt=""> </td>
                  <td><?php echo $Order['ProductDescription']; ?></td>                        
                  <td><?php echo htmlspecialchars($Order['ProductPrice']); ?></td>
                  <td><?php echo htmlspecialchars($Order['Quantity']); ?></td>
                  <td>
                    <select>
                      <option value="1">Không Liên Hệ Được</option>
                      <option value="2" selected="selected">Đã Xác Nhận Đơn Hàng</option>
                      <option value="3">Đơn Hàng Đã Được Gửi</option>
                      <option value="4">Khách Hàng Đã Nhận Hàng</option>
                      <option value="5">Đơn Hàng Bị Hoàn</option>
                    </select>
                  </td>
                    
                </tr>
                <?php 
                endfor; 
                mysqli_free_result($order_set);
                ?>
              </table>
            </div> 
        </div>
      </div>
    <script type="text/javascript" src="Backend.js"></script>
  </body>
</html>
<?php
db_disconnect($db);
?>