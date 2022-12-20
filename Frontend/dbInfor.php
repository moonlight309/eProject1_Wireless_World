<?php
	require_once('database.php');

	function db_connect() {
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		return $connection;
	}
	
	$db = db_connect();
	
	
	function db_disconnect($connection) {
		if(isset($connection)) {
		  mysqli_close($connection);
		}
	}

	function confirm_query_result($result){
		global $db;
		if (!$result){
			echo mysqli_error($db);
			db_disconnect($db);
			exit;
		} else {
			return $result;
		}
	}


	function View_Image_Apple(){
		global $db;
		$sql = "WITH nameimage as(
			SELECT * , ROW_NUMBER()
			OVER(PARTITION BY ProductId order BY ProductId) rownum
			FROM datas
			WHERE BrandId = 1
			)
			SELECT * FROM nameimage WHERE  rownum = 1";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	// function View_Image_Apple_Id($id){
	// 	global $db;
	// 	$sql = "WITH nameimage as(
	// 		SELECT * , ROW_NUMBER()
	// 		OVER(PARTITION BY ProductId order BY ProductId) rownum
	// 		FROM datas
	// 		WHERE BrandId = 1 and ImageId = $id
	// 		)
	// 		SELECT * FROM nameimage WHERE  rownum = 1";
	// 		$result = mysqli_query($db, $sql);
	// 		confirm_query_result($result);
	// 		$Image = mysqli_fetch_assoc($result);
	// 		mysqli_free_result($result);
	// 		return $Image;
	// }

	function View_Image_Oppo(){
		global $db;
		$sql = "WITH nameimage as(
			SELECT * , ROW_NUMBER()
			OVER(PARTITION BY ProductId order BY ProductId) rownum
			FROM datas
			WHERE BrandId = 2
			)
			SELECT * FROM nameimage WHERE  rownum = 1";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	function View_Image_SamSung(){
		global $db;
		$sql = "WITH nameimage as(
			SELECT * , ROW_NUMBER()
			OVER(PARTITION BY ProductId order BY ProductId) rownum
			FROM datas
			WHERE BrandId = 3
			)
			SELECT * FROM nameimage WHERE  rownum = 1";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	function View_Image_Xiaomi(){
		global $db;
		$sql = "WITH nameimage as(
			SELECT * , ROW_NUMBER()
			OVER(PARTITION BY ProductId order BY ProductId) rownum
			FROM datas
			WHERE BrandId = 4
			)
			SELECT * FROM nameimage WHERE  rownum = 1";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	function View_Image_Vivo(){
		global $db;
		$sql = "WITH nameimage as(
			SELECT * , ROW_NUMBER()
			OVER(PARTITION BY ProductId order BY ProductId) rownum
			FROM datas
			WHERE BrandId = 5
			)
			SELECT * FROM nameimage WHERE  rownum = 1";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	function View_Image_Id($id){
		global $db;
		$sql = "WITH nameimage as(
			SELECT * , ROW_NUMBER()
			OVER(PARTITION BY ProductId order BY ProductId) rownum
			FROM datas
			WHERE ImageId = $id
			)
			SELECT * FROM nameimage WHERE  rownum = 1";
			$result = mysqli_query($db, $sql);
			confirm_query_result($result);
			$Image = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			return $Image;
	}

	function insert_Order($Order) {
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

	function View_Order(){
		global $db;

		$sql = "SELECT * FROM orders";
		$result = mysqli_query($db, $sql);
		return $result;
	}

	function View_Search($Search){
		global $db;

		$sql = "SELECT * FROM datas WHERE ProductName LIKE '%";
		$sql .= "$Search";
		$sql .= "%'";
		$result = mysqli_query($db, $sql);
		return $result;
	}

?>