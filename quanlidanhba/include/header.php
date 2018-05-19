<h1>Quản lí danh bạ điện thoại </h1>
<?php 
	if(isset($_SESSION['user'])){
 ?>
 <p>Xin chao <?php echo $_SESSION['user'] ?></p>
 <button><a href="logout.php">Logout</a></button>
 <?php 
	}else{
 ?>
 <button><a href="login.php">Login</a></button>
 <?php } ?>
