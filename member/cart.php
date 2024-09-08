<?php
session_start();
include '../condb.php';
include 'banner.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <?php include('../boot4.php');?>
    <?php
    error_reporting(0);
    ini_set('display_errors', 0);
?>
</head>
<body>
    <div class="container"> 
                <form id="form1" method="POST" action="insert_cart.php">
                <div class="row">
                <div class="col-md-10">
                <div class="alert alert-dark" role="alert">
                ตะกร้าสินค้า
                </div>
                <table class="table table-hover">
                    <tr>
                    <th> ลำดับที่ </th>
                    <th>รูปสินค้า</th>
                    <th> ชื่อสินค้า </th>
                    <th> ราคา </th>
                    <th> จำนวน </th>
                    <th> ราคารวม </th>
                    <th>เพิ่ม - ลด</th>
                    <th> ลบ </th>
                </tr>
                <?php
                $Total = 0;
                $sumprice = 0;
                $m=1;
                for ($i=0; $i <= (int)$_SESSION["intLine"] ; $i++) { 
                    if (!empty($_SESSION["strProductID"][$i])) {
                        $sql1 = "SELECT * FROM tbl_product WHERE p_id = '".$_SESSION["strProductID"][$i]."'";
                        $result1 = mysqli_query($con, $sql1);
                        $row_pro = mysqli_fetch_array($result1);
                    
                        $_SESSION["price"] = $row_pro['p_price'];
                        $Total = $_SESSION["strQty"][$i];
                        $sum = $Total * $row_pro['p_price'];
                        $sumPrice = $sumPrice + $sum;
                        $_SESSION["sum_price"] = $sumPrice;

                    ?>
                    
                <tr>
                    <td> <?=$m?> </td>
                    <td><img src="../p_img/<?=$row_pro['p_img']?>"width="80px" height="100" class="border" ></img> </td>
                    <td> <?=$row_pro['p_name']?></td>
                    <td> <?=$row_pro['p_price']?> </td>
                    <td> <?=$_SESSION["strQty"][$i]?> </td>
                    <td> <?=$sum?> </td>
                    <td> 
                        <a href="order.php?id=<?=$row_pro['p_id']?>" class="btn btn-danger">+</a>
                        <?php if ($_SESSION["strQty"][$i] > 1) { ?>
                        <a href="order_del.php?id=<?=$row_pro['p_id']?>" class="btn btn-danger">-</a>
                        <?php } ?>
                    </td>
                    <td><a href="pro_delete.php?Line=<?=$i?>"><img src="../p_img/delete.jpg" width="30"> </a></td>
                </tr>
                <?php
                $m=$m+1;
                }
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td >รวมเป็นเงิน</td>
                    <td><?=$sumPrice?></td>
                    <td>บาท</td>
                </tr>
            </table>
            <div style = "text-align:right">
            <a href="member/../index.php"><button type="button" class="btn btn-outline-secondary">เลือกสินค้า</button></a>
            <button type="submit" class="btn btn-outline-secondary">ยืนยันการสั่งซื้อ</button>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="alert alert-success" h4 role="alert">
        ข้อมูลการจัดส่งสินค้า
    </div>
    ชื่อ-นามสกุล:
    <input type="text" name="cus_name" class="form-control " required placeholder="ชื่อ-นามสกุล..."> <br>
    ที่อยู่จัดส่งสินค้า:    
    <textarea class="form-control " required placeholder="ที่อยู่..." name="cus_add" rows="3" > </textarea> <br>
    เบอร์โทรศัพท์:
    <input type="number" name="cus_tel" class="form-control " required placeholder="เบอร์โทรศัพท์..."> <br>
    <br><br><br>
    </div>
    </div>
</form>
    </div>
</body>
</html