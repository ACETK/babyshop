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
    } else if ($_GET['action'] == "update") {
        require_once '../../Class/MySQLHelper.php';
        $productsID = $_POST['products_id'];
        $cart_quantity = $_POST['cart_quantity'];
        foreach ($cart_quantity as $key => $value) {
            if (is_numeric($value)) {
                if($value==0){
                    unset ($_SESSION['cart'][$productsID[$key]]);
                }else{
                    $_SESSION['cart'][$productsID[$key]] = intval($value);
                }
            }
        }
        if (isset($_POST['cart_delete'])) {
            $cart_delete = $_POST['cart_delete'];
            if (count($cart_delete) == count($productsID)) {
                unset($_SESSION['cart']);
            } else {
                foreach ($cart_delete as $ID) {
                    unset($_SESSION['cart'][$ID]);
                }
            }
        }
    }
}
header("location:../../index.php?action=ShoppingCart");
?>
