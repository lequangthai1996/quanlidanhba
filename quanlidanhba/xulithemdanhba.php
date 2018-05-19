<?php 
	session_start();
	if(empty($_SESSION['user'])){
		header("location: quanlidanhba.php");
		exit();
	}
	$ten = $sodidong = $socoquan =$diachi = $email = $hinhanh = $quanhe = $ghichu = "";
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
	$sql = "insert into danhba values(0,?,?,?,?,?,?,?,?)";
	if($query = $conn->prepare($sql))
	{
		$query->bind_param('ssssssis',$ten,$sodidong,$socoquan,$diachi,$email,$hinhanh,$quanhe,$ghichu);
		$query->execute();
		header('location: quanlidanhba.php?msg=1');
		exit();
	}else{
		header('location: quanlidanhba.php?msg=2');
		exit();
	}

 ?>