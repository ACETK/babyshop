<?php

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $k => $v) {
        if (isset($k)) {
            $ok = "OK";
        }
    }
}
if (!isset ($ok)) {
    $Temp = '<table cellspacing="0" cellpadding="0" class="main">
					<tbody><tr><td style="padding: 25px 20px 20px;">Bạn chưa có món đồ chơi nào trong giỏ hàng.<br/><br/><br/>
                                            <a href="index.php" ><img width="147" height="19" align="right" border="0" title=" Tiếp tục shopping " alt="Tiếp tục shopping" src="template/images/english/button_continue_shopping.gif"></a></td></tr>
				</tbody></table>';
//    unset ($_SESSION['cart']);
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

        $sql = "SELECT SoLuong FROM dochoi WHERE MaDoChoi = '{$row['MaDoChoi']}'";
        $result_temp = MySQLHelper::executeQuery($sql);
        $SoLuongHang = mysql_fetch_row($result_temp);

        if($SoLuongHang[0]==0){
            unset ($_SESSION['cart'][$row['MaDoChoi']]);
            $shoppingcart->assign('OutOfStock', 'Số lương trong kho đã hết.Sản phẩm này sẽ được tự động loại khỏi giỏ hàng.');
            $shoppingcart->parse('cart.product.OutOfStock');
            $ProductQty = 0;
        }else if($ProductQty>$SoLuongHang[0]){
            $shoppingcart->assign('OutOfStock', 'Số lượng trong kho chỉ còn '.$SoLuongHang[0]);
            $shoppingcart->parse('cart.product.OutOfStock');
            $ProductQty = $SoLuongHang[0];
        }

        $ProductTotalPrice =$ProductQty*intval($row['DonGia']);
        
        $shoppingcart->assign('ProductID', $ProductID);
        $shoppingcart->assign('ProductLink', $ProductLink);
        $shoppingcart->assign('ProductName', $ProductName);
        $shoppingcart->assign('ProductImgURL', $ProductImgURL);
        $shoppingcart->assign('ProductQty', $ProductQty);
        $shoppingcart->assign('ProductTotalPrice',  number_format($ProductTotalPrice)." VND");
        $shoppingcart->parse('cart.product');

        $TotalPrice += $ProductTotalPrice;
    }
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
