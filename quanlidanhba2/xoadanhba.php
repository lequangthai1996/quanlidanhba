<?php 
	$idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
	if(empty($idDB)){
		header("location: quanlidanhba.php");
	}
	$conn = new mysqli("localhost","root","","quanlidanhba");
	if($conn->connect_error){
		die("connect error".$conn->connect_error);
	}
	$conn->set_charset("utf8");
	$sql = "delete from danhba where id =?";
	if($query = $conn->prepare($sql)){
		$query->bind_param("i",$idDB);
		$query->execute();
		header("location: quanlidanhba.php");
	}
 ?>