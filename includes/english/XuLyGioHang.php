<?php

if (isset($_GET['action'])) {
    session_start();
    if ($_GET['action'] == "add") {
        $id = $_GET['idproduct'];
        if (isset($_SESSION['cart'][$id])) {
            $qty = $_SESSION['cart'][$id] + 1;
        } else {
            $qty = 1;
        }
        $_SESSION['cart'][$id] = $qty;

//        if($_POST['prevpage'] != ""){
//            $prevpage = "../../index.php?".$_POST['prevpage'];
//        }else{
//            $prevpage = "../../index.php";
//        }
//        header("location:$prevpage");

    }else if ($_GET['action'] == "update") {
        require_once '../../Class/MySQLHelper.php';

        $productsID = $_POST['products_id'];
        $cart_quantity = $_POST['cart_quantity'];
        foreach ($cart_quantity as $key => $value) {
            if(is_numeric($value)){
                $sql = "SELECT Sum(SoLuong) as SoLuongHang FROM hdnhap WHERE MaDoChoi = '$productsID[$key]'";
                $result = MySQLHelper::executeQuery($sql);
                $SoLuongHang = mysql_fetch_row($result);
                if($SoLuongHang[0]==NULL){
                    $SoLuongHang[0] = 0;
                }
                if(intval($value)<=$SoLuongHang[0]){
                    $_SESSION['cart'][$productsID[$key]] = intval($value);
                }else{
                    $_SESSION['tomuch'][$productsID[$key]] = $SoLuongHang[0];
                    $_SESSION['cart'][$productsID[$key]] = $SoLuongHang[0];
                }
            }
        }
        if(isset($_POST['cart_delete'])){
            $cart_delete = $_POST['cart_delete'];
            if(count($cart_delete) == count($productsID)){
//                unset($_SESSION['cart']);
            }else{
                foreach ($cart_delete as $ID){
//                    unset ($_SESSION['cart'][$ID]);
                }
            }
        }

    }
}
//header("location:../../index.php?action=ShoppingCart");
?>
