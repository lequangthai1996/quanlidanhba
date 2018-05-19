<ul>
	<li><a href = "quanlidanhba.php">Quản lí danh bạ</a></li>	
	<?php	if(!empty($_SESSION['user'])){
	 ?>
	<li><a href = "themDanhBa.php">Thêm danh ba</a></li>	
	<?php } ?>
</ul>