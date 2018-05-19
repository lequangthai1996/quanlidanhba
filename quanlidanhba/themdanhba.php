<?php 
    session_start(); 
    $conn = mysqli_connect("localhost","root","") or die("connect fail");
    mysqli_select_db($conn,"quanlidanhba");
    mysqli_set_charset($conn,"utf8");
    $listQH = mysqli_query($conn, "select * from quanhe ");
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
     
        
         <form name="xuly" action="xulithemdanhba.php" method="post" enctype = "multipart/form-data">
        <table border="0" cellpadding="0" cellspacing="0">
        <tr class="table">
            <td class="left"><p>Tên</p></td>
            <td class="right"><p><input size = '40' type="text" name="ten"></p></td>
        </tr>
       
        <tr class="table">
            <td class="left"><p>Số di động</p></td>
            <td class="right"><p><input size = '40' type="text" name="sodidong"></p></td>
        </tr>
        <tr class="table">
            <td class="left"><p>Số cơ quan</p></td>
            <td class="right"><p><input size = '40' type="text" name="socoquan"></p></td>
        </tr>
        <tr class="table">
            <td class="left"><p>Địa chỉ</p></td>
            <td class="right"><p><input size = '40' type="text" name="diachi"></p></td>
        </tr>
        <tr class="table">
            <td class="left"><p>Email</p></td>
            <td class="right"><p><input size = '40' type="text" name="email"></p></td>
        </tr>   
        <tr class="table">
            <td class="left"><p>Hình ảnh</p></td>
            <td class="right"><p><input type="file" name="imageName" id = "imageName" ></p></td>
        </tr>             
        <tr class="table">
            <td class="left"><p>Quan hệ</p></td>
            <td class="right">
                <p>

                <select name="quanhe">
                  <?php while($row = mysqli_fetch_array($listQH) ) {?>
                  <option value="<?php echo $row['idQH'] ?>"><?php echo $row['loaiquanhe'] ?></option>                  
                   <?php } ?>       
                </select>
                </p>
            </td>
        </tr>

        <tr class="table">
            <td class="left"><p>Ghi chú cá nhân</p></td>
            <td class="right"><p><textarea  cols="40s"  style="height:100px;width:auto" name="ghichu"></textarea></p></td>
        </tr>
        <tr>
        <td colspan="2">
          <center><input type="submit" value="Thêm" name="them"> <input type="reset" value="Nhập lại" name="nhaplai"></center>
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





