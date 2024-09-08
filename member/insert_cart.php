<?php
session_start();
include '../condb.php';
$cusName=$_POST['cus_name'];
$cusAddress=$_POST['cus_add'];
$cusTel=$_POST['cus_tel'];

$sql="insert into tb_order(cus_name,address,telephone,total_price,order_status)
values('$cusName','$cusAddress','$cusTel', '" . $_SESSION["sum_price"]. "' ,'1')";
mysqli_query($con,$sql);

$orderID = mysqli_insert_id($con);

for ($i=0; $i <= (int)$_SESSION["intLine"] ; $i++) {
    if (($_SESSION["strProductID"][$i]) != "" ) {
        $sql1="select * from tbl_product where p_id =' " . $_SESSION["strProductID"][$i] ." ' ";
        $result1=mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_array($result1);
        $price =$row1['p_price'];
        $total = $_SESSION["strQty"][$i] * $price;

        $sql2 = "insert into order_detail(orderID,p_id,orderPrice,orderQty,Total)
        values('$orderID','". $_SESSION["strProductID"][$i] ."','$price','".$_SESSION["strQty"][$i]."','$total')";
        if(mysqli_query($con,$sql2)) {
            $sql3 = "UPDATE tbl_product SET p_qty = p_qty - '".$_SESSION["strQty"][$i]."' WHERE p_id = '".$_SESSION["strProductID"][$i]."'";
            mysqli_query($con,$sql3);
            echo "<script>alert('บันทึกข้อมูลเรียบร้อยเเล้ว')</script>";
        }
    }

}
mysqli_close($con);
unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_price"]);
session_destroy();
?>