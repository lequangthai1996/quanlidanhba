<?php 
    session_start();
    $conn  = new mysqli("localhost","root","","quanlidanhba");
    if($conn->connect_error){
        die("connect error".$conn->connect_error);
    }
    $conn->set_charset("utf8");
    $listQuanHe;
    if($queryQuanHe = $conn->prepare("select * from quanhe")){
        $queryQuanHe->execute();
        $listQuanHe = $queryQuanHe->get_result();
    }
    $idDB = isset($_REQUEST['id'])?$_REQUEST['id']:"";
    $result;
    if(empty($idDB)){
        $sql = "select * from danhba inner join quanhe on danhba.idquanhe = quanhe.idQH";
        if($query = $conn->prepare($sql)){
            $query->execute();
            $result = $query->get_result();
        }
    }else{
        $sql = "select * from danhba inner join quanhe on danhba.idquanhe = quanhe.idQH where id = ?";
        if($query = $conn->prepare($sql)){
            $query->bind_param("i",$idDB);
            $query->execute();
            $result = $query->get_result();
        }
    }
 ?>
<!DOCTYPE html>
<html >
<head>
    <title>CSS Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src = "ajax.js" type = "text/javascript"> </script>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

    <div class="header">
       <?php include 'include/header.php' ?>
    </div>

    <div class="row" >
      <div class="column side" style="background-color:#aaa;">
        
        <?php include 'include/menu.php' ?>
        
     </div>

     <div class="column middle" style="background-color:#bbb;">   
        <h3>Danh sách danh bạ</h3>
        <div style="margin-left: 320px !important;padding: 20px;">
             <form >
            <select name="users" onchange="showUser(this.value)">
            <option value="">Lựa chọn phòng ban:</option>
            <?php 
                while($rowPB = mysqli_fetch_array($listPB)){
             ?>
            
            <option value="<?php echo $rowPB['IDPB'] ?>"><?php echo $rowPB['MoTa'] ?></option>            
            <?php } ?>
            </select>
            </form>         
        </div>         
      <table border="1px" align="center" width="700px" id = "result">
         
       

        <tr>
            <th>ID</th>
            <th>Tên </th>
            <th>Hình ảnh</th>
            <th>Số di động</th>
            <th>Số cơ quan</th>
            <th>Địa chỉ </th> 
            <th>Quan hệ</th>         
            <th>Chức năng</th>

        </tr>       

        <?php 
        while($rows = $result->fetch_array()){
        ?>       
        <tr>
            
            <td><?php echo $rows['id'] ?></td>
            <td><?php echo $rows['ten'] ?></td>
            <td ><img src = "uploads/<?php echo $rows['hinhanh'] ?>" alt = "<?php echo $rows['hinhanh'] ?>" style = "width: 60px;height: 60px" ></td>
            <td><?php echo $rows['sodidong'] ?></td>
            <td><?php echo $rows['socoquan'] ?></td>
            <td><?php echo $rows['diachi'] ?></td>
            <td><?php echo $rows['loaiquanhe'] ?></td>

            <td align="center">      
               <a href="chitietDanhba.php?id=<?php echo $rows['id'] ?>">Xem</a>          
                <a href="suadanhba.php?id=<?php echo $rows['id'] ?>">Sửa</a> 
                <a href="xoadanhba.php?id=<?php echo $rows['id'] ?>">Xóa</a>                
            </td>

        </tr>
        <?php } ?>

        </table>
        
        

        
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





