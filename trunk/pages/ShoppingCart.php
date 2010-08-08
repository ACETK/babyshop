<?php

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $k => $v) {
        if (isset($k)) {
            $ok = "OK";
        }
    }
}
if (!isset ($ok)) {
    $Temp = '<p>Ban khong co mon hang nao trong gio hang</p>';
} else {
    //Khởi tạo giao diện giỏ hàng
    $shoppingcart = new XTemplate('./template/PageShoppingCart.html');
//    <!-- BEGIN: cart # TotalPrice-->
//        <!-- BEGIN: product # ProductID, ProductLink, ProductName, ProductImgURL, ProductQty, ProductTotalPrice -->
//        <!-- BEGIN: line -->
    foreach ($_SESSION['cart'] as $key => $value) {
        $MaDoChoi[] = $key;
    }
    $str = implode("','", $MaDoChoi);
    $sql = "SELECT * FROM dochoi WHERE MaDoChoi IN ('$str') ORDER BY MaDoChoi";
    $result = MySQLHelper::executeQuery($sql);
    $TotalPrice = 0;
    while ($row = mysql_fetch_assoc($result)){
        $ProductID = $row['MaDoChoi'];
        $ProductLink = 'index.php?action=detail&id='.$row['MaDoChoi'];
        $ProductName = $row['TenDoChoi'];
        $ProductImgURL = 'images/sanpham/'.$row['HinhAnh'];
        $ProductQty = $_SESSION['cart'][$row['MaDoChoi']];
        $ProductTotalPrice =$ProductQty*intval($row['DonGia']);

        $shoppingcart->assign('ProductID', $ProductID);
        $shoppingcart->assign('ProductLink', $ProductLink);
        $shoppingcart->assign('ProductName', $ProductName);
        $shoppingcart->assign('ProductImgURL', $ProductImgURL);
        $shoppingcart->assign('ProductQty', $ProductQty);
        $shoppingcart->assign('ProductTotalPrice',  number_format($ProductTotalPrice)." VND");

        if(isset ($_SESSION['tomuch'][$ProductID])){
            $shoppingcart->assign('OutOfStock', 'Số lượng trong kho chỉ còn '.$_SESSION['tomuch'][$ProductID]);
            $shoppingcart->parse('cart.product.OutOfStock');
        }

        $shoppingcart->parse('cart.product');

        $TotalPrice += $ProductTotalPrice;
    }
    unset ($_SESSION['tomuch']);
    $shoppingcart->assign('TotalPrice', number_format($TotalPrice)." VND");

    $shoppingcart->parse('cart');
    $Temp = $shoppingcart->text('cart');
}


/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle', "Giỏ hàng");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
