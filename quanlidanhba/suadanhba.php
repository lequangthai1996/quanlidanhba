<?php 
    session_start(); 
    $conn = mysqli_connect("localhost","root","") or die("connect fail");
    mysqli_select_db($conn,"quanlidanhba");
    mysqli_set_charset($conn,"utf8");
    $listQH = mysqli_query($conn, "select * from quanhe ");
    $idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
    if(empty($idDB)){
        header('location: quanlidanhba');
        exit();
    }
    $query = mysqli_query($conn,"select * from danhba inner join quanhe on danhba.idquanhe = quanhe.idQH where danhba.id= $idDB");

?>
<!DOCTYPE html>
<html >
<head>
    <title>CSS Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src = "ajax.js" type = "text/javascript"> </script>
    <link rel="stylesheet" href="css/style2.css" type = "text/css">
    
</head>
<body>

    <div class="header">
       <?php include 'include/header.php' ?>
    </div>

    <div class="row">
      <div class="column side" style="background-color:#aaa;">
        
        <?php include 'include/menu.php' ?>
        
     </div>

     <div class="column middle" style="background-color:#bbb;">   
     
        
         <form name="xuly" action="xulisuadanhba.php?id=<?php echo $idDB ?>" method="post"  enctype = "multipart/form-data" >
        <table border="0" cellpadding="0" cellspacing="0">
        <?php 
            if(mysqli_num_rows($query) > 0)
            {

                $row = mysqli_fetch_array($query);
         ?>
        <tr class="table">
            <td class="left"><p>Tên</p></td>
            <td class="right"><p><input size = '40' type="text" name="ten" value = "<?php echo $row['ten'] ?>"></p></td>
        </tr>
       
        <tr class="table">
            <td class="left"><p>Số di động</p></td>
            <td class="right"><p><input  size = '40' type="text" name="sodidong" value = "<?php echo  $row['sodidong'] ?>" ></p></td>
        </tr>
        <tr class="table">
            <td class="left"><p>Số cơ quan</p></td>
            <td class="right"><p><input size = '40'  type="text" name="socoquan" value = "<?php echo  $row['socoquan'] ?>"></p></td>
        </tr>
        <tr class="table">
            <td class="left"><p>Địa chỉ</p></td>
            <td class="right"><p><input size = '40' type="text" name="diachi" value = "<?php echo  $row['diachi'] ?>"v></p></td>
        </tr>
        <tr class="table">
            <td class="left"><p>Email</p></td>
            <td class="right"><p><input size = '40' type="text" name="email" value = "<?php echo  $row['email'] ?>"></p></td>
        </tr>   
        <tr class="table">
            <td class="left"><p>Hình ảnh</p></td>

            <td class="right">
                <img  style = "width: 60px;height: 60px;"src="uploads/<?php echo $row['hinhanh'] ?>" alt="<?php echo $row['hinhanh'] ?>">
                <p><input type="file" name="imageName"></p>
            </td>
        </tr>             
        <tr class="table">
            <td class="left"><p>Quan hệ</p></td>
            <td class="right">
                <p>

                <select name="quanhe">
                  <?php while($list = mysqli_fetch_array($listQH) ) {?>
                  <option <?php if($row['idQH'] == $list['idQH']) echo "selected" ?> value="<?php echo $list['idQH'] ?>"><?php echo $list['loaiquanhe'] ?></option>                  
                   <?php } ?>       
                </select>
                </p>
            </td>
        </tr>

        <tr class="table">
            <td class="left"><p>Ghi chú cá nhân</p></td>
            <td class="right"><p><textarea  cols="40s"  style="height:100px;width:auto" name="ghichu"><?php echo $row['ghichu'] ?></textarea></p></td>
        </tr>
        <?php } ?>
        <tr>
        <td colspan="2">
          <center><input type="submit" value="Sửa" name="them"> <input type="reset" value="Nhập lại" name="nhaplai"></center>
        </td>
        </tr>
        </table>
        </form>       

        
    </div>
    <div class="column side" style="background-color:#ccc;">
        <?php include 'include/quangcao.php' ?>
    </div>
</div>

<div class="footer">
 <?php include 'include/footer.php' ?>
</div>

</body>
</html>





