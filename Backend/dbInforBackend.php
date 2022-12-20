<?php
require_once('database.php');

function db_connect()
{
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	return $connection;
}

$db = db_connect();


function db_disconnect($connection)
{
	if (isset($connection)) {
		mysqli_close($connection);
	}
}

function confirm_query_result($result)
{
	global $db;
	if (!$result) {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	} else {
		return $result;
	}
}

function insert_Admin($Admin)
{
	global $db;

	$sql = "INSERT INTO admin ";
	$sql .= "(UserName, Password) ";
	$sql .= "VALUES (";
	$sql .= "'" . $Admin['UserName'] . "',";
	$sql .= "'" . $Admin['Password'] . "'";
	$sql .= ")";
	$result = mysqli_query($db, $sql);

	return confirm_query_result($result);
}

function View_Admin()
{
	global $db;

	$sql = "SELECT * FROM admin";
	$result = mysqli_query($db, $sql);
	return $result;
}

function View_Admin_id($id)
{
	global $db;

	$sql = "SELECT * FROM admin ";
	$sql .= "WHERE UserId='" . $id . "'";
	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	$Admin = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Admin;
}

function update_Admin($Admin)
{
	global $db;

	$sql = "UPDATE admin SET ";
	$sql .= "UserName='" . $Admin['UserName'] . "', ";
	$sql .= "Password='" . $Admin['Password'] . "' ";
	$sql .= "WHERE UserId='" . $Admin['UserId'] . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	return confirm_query_result($result);
}

function delete_Admin($id)
{
	global $db;

	$sql = "DELETE FROM admin ";
	$sql .= "WHERE UserId='" . $id . "' ";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db, $sql);

	return confirm_query_result($result);
}

function insert_Brand($Brand)
{
	global $db;

	$sql = "INSERT INTO productbrand ";
	$sql .= "(BrandName, BrandDescription) ";
	$sql .= "VALUES (";
	$sql .= "'" . $Brand['BrandName'] . "',";
	$sql .= "'" . $Brand['BrandDescription'] . "'";
	$sql .= ")";
	$result = mysqli_query($db, $sql);

	return confirm_query_result($result);
}

function View_Brand()
{
	global $db;

	$sql = "SELECT * FROM productbrand";
	$result = mysqli_query($db, $sql);
	return $result;
}

function View_Brand_id($id)
{
	global $db;

	$sql = "SELECT * FROM productbrand ";
	$sql .= "WHERE BrandId='" . $id . "'";
	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	$Brand = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Brand;
}

function update_Brand($Brand)
{
	global $db;

	$sql = "UPDATE productbrand SET ";
	$sql .= "BrandName='" . $Brand['BrandName'] . "', ";
	$sql .= "BrandDescription='" . $Brand['BrandDescription'] . "' ";
	$sql .= "WHERE BrandId='" . $Brand['BrandId'] . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	return confirm_query_result($result);
}

function delete_Brand($id)
{
	global $db;

	$sql = "DELETE FROM productbrand ";
	$sql .= "WHERE BrandId='" . $id . "' ";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db, $sql);
	return confirm_query_result($result);
}

function View_Produtcs_id($id)
{
	global $db;

	$sql = "SELECT * FROM products ";
	$sql .= "WHERE ProductId='" . $id . "'";
	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	$Product = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Product;
}

function delete_Products($id)
{
	global $db;

	$sql = "DELETE FROM products ";
	$sql .= "WHERE ProductId='" . $id . "' ";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db, $sql);
	return confirm_query_result($result);
}

function View_Produtcs()
{
	global $db;

	$sql = "SELECT products.ProductId, products.ProductName, products.ProductPrice, products.ProductDescription, productbrand.BrandName 
		FROM products 
		INNER JOIN productbrand ON products.BrandId = productbrand.BrandId";
	$result = mysqli_query($db, $sql);
	return $result;
}

function insert_Products($Product)
{
	global $db;

	$sql = "INSERT INTO products ";
	$sql .= "(ProductName,ProductPrice,ProductDescription,BrandId) ";
	$sql .= "VALUES (";
	$sql .= "'" . $Product['ProductName'] . "',";
	$sql .= "'" . $Product['ProductPrice'] . "',";
	$sql .= "'" . $Product['ProductDescription'] . "',";
	$sql .= "'" . $Product['BrandId'] . "'";
	$sql .= ")";
	$result = mysqli_query($db, $sql);

	return confirm_query_result($result);
}

function update_Products($Product)
{
	global $db;

	$sql = "UPDATE products SET ";
	$sql .= "ProductName='" . $Product['ProductName'] . "', ";
	$sql .= "ProductPrice='" . $Product['ProductPrice'] . "', ";
	$sql .= "ProductDescription='" . $Product['ProductDescription'] . "', ";
	$sql .= "BrandId='" . $Product['BrandId'] . "' ";
	$sql .= "WHERE ProductId='" . $Product['ProductId'] . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	return confirm_query_result($result);
}

function View_Name_Brand()
{
	global $db;
	$sql = "SELECT BrandName , BrandId
		FROM productbrand ";
	$result = mysqli_query($db, $sql);
	return $result;
}

function View_Name_Product()
{
	global $db;
	$sql = "SELECT ProductName , ProductId
		FROM products ";
	$result = mysqli_query($db, $sql);
	return $result;
}

function View_Image()
{
	global $db;

	$sql = "SELECT images.ImageId, images.ImageName, images.ImageTitle, products.ProductName 
		FROM images 
		INNER JOIN products ON images.ProductId = products.ProductId";
	$result = mysqli_query($db, $sql);
	return $result;
}

function insert_Image($Image)
{
	global $db;

	$sql = "INSERT INTO images ";
	$sql .= "(ImageName,ImageTitle,ProductId) ";
	$sql .= "VALUES (";
	$sql .= "'" . $Image['ImageName'] . "',";
	$sql .= "'" . $Image['ImageTitle'] . "',";
	$sql .= "'" . $Image['ProductId'] . "'";
	$sql .= ")";
	$result = mysqli_query($db, $sql);

	return confirm_query_result($result);
}

function delete_Image($id)
{
	global $db;

	$sql = "DELETE FROM images ";
	$sql .= "WHERE ImageId='" . $id . "' ";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db, $sql);
	return confirm_query_result($result);
}

function View_Image_id($id)
{
	global $db;

	$sql = "SELECT * FROM images ";
	$sql .= "WHERE ImageId='" . $id . "'";
	$result = mysqli_query($db, $sql);
	confirm_query_result($result);
	$Image = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	return $Image;
}

function update_Image($Image)
{
	global $db;

	$sql = "UPDATE images SET ";
	$sql .= "ImageName='" . $Image['ImageName'] . "', ";
	$sql .= "ImageTitle='" . $Image['ImageTitle'] . "', ";
	$sql .= "ProductId='" . $Image['ProductId'] . "'";
	$sql .= "WHERE ImageId='" . $Image['ImageId'] . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db, $sql);
	return confirm_query_result($result);
}

function insert_Order($Order)
{
	global $db;

	$sql = "INSERT INTO orders ";
	$sql .= "(FullName,Phone,Color,ProductName,Image,ProductDescription,ProductPrice,Quantity) ";
	$sql .= "VALUES (";
	$sql .= "'" . $Order['FullName'] . "',";
	$sql .= "'" . $Order['Phone'] . "',";
	$sql .= "'" . $Order['Color'] . "',";
	$sql .= "'" . $Order['ProductName'] . "',";
	$sql .= "'" . $Order['Image'] . "',";
	$sql .= "'" . $Order['ProductDescription'] . "',";
	$sql .= "'" . $Order['ProductPrice'] . "',";
	$sql .= "'" . $Order['Quantity'] . "'";
	$sql .= ")";
	$result = mysqli_query($db, $sql);

	return confirm_query_result($result);
}

function View_Order()
{
	global $db;

	$sql = "SELECT * FROM orders";
	$result = mysqli_query($db, $sql);
	return $result;
}
