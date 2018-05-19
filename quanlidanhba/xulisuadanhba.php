<?php 
	session_start();
	if(empty($_SESSION['user'])){
		header("location: quanlidanhba.php");
		exit();
	}
	$ten = $sodidong = $socoquan =$diachi = $email = $hinhanh = $quanhe = $ghichu = "";
	$idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
	
	if(empty($idDB)){
		header("location: quanlidanhba.php");
		exit();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$ten = $_POST['ten'];
		$sodidong = $_POST['sodidong'];
		$socoquan  = $_POST['socoquan'];
		$diachi  = $_POST['diachi'];
		$email  = $_POST['email'];		
		$quanhe  = $_POST['quanhe'];
		$ghichu  = $_POST['ghichu'];

		include "upload.php";		
		if($checkExist == 1 || $checkCompleteUpload == 1) $hinhanh = $tenfile;
	}
	$conn = new mysqli("localhost", "root","","quanlidanhba");
	if($conn->connect_error){
		die("connect eror".$conn->connect_error);
	}
	$conn->set_charset("utf8");
	$sql = "update danhba set ten = ?,sodidong = ?,socoquan = ?,diachi = ?,email = ?,hinhanh = ?,idquanhe = ?,ghichu = ? where id = ?";
	if($query = $conn->prepare($sql))
	{
		$query->bind_param('ssssssisi',$ten,$sodidong,$socoquan,$diachi,$email,$hinhanh,$quanhe,$ghichu,$idDB);
		$query->execute();
		header('location: quanlidanhba.php?msg=3');
		exit();
	}else{
		header('location: quanlidanhba.php?msg=4');
		exit();
	}

 ?>