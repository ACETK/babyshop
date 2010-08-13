<?php
include_once 'Class/MySQLHelper.php';
/////////////////////////////

/** Khởi tạo giao diện */
include_once 'xtemplate.class.php';
$tpl = new XTemplate('template/template.html');

$tpl->assign_file('FileHeader','template/english/incHeaderAdmin.html');
$tpl->assign_file('FileMenu','template/english/incMenuAdmin.html');
if(isset ($_GET['page']) && $_GET['page']!='HomeAdmin'){
    $tpl->assign_file('FileNavigation','template/english/incNavigationAdmin.html');
    $tpl->parse('main.header.nav');
}

////Thiết kế cột trái
//include 'includes/english/incCategories.php';
//$tpl->assign('BlockInfo', $Categories);
//$tpl->parse('main.body.left.block');
//
//include 'includes/english/incTwitter.php';
//$tpl->assign('BlockInfo', $Twitter);
//$tpl->parse('main.body.left.block');
//
//include 'includes/english/incBestSellers.php';
//$tpl->assign('BlockInfo', $BestSellers);
//$tpl->parse('main.body.left.block');
//
//$tpl->parse('main.body.left');//Kết thúc cột trái
//
////Thiết kế cột phải
//include 'includes/english/incLogin.php';
//$tpl->assign('BlockInfo', $Login);
//$tpl->parse('main.body.right.block');
//
//include 'includes/english/incManufacturers.php';
//$tpl->assign('BlockInfo', $Manufacturers);
//$tpl->parse('main.body.right.block');
//
//include 'includes/english/incSpecials.php';
//$tpl->assign('BlockInfo', $Specials);
//$tpl->parse('main.body.right.block');
//
//include 'includes/english/incShipping.php';
//$tpl->assign('BlockInfo', $Shipping);
//$tpl->parse('main.body.right.block');
//
//$tpl->parse('main.body.right');//Kết thúc cột phải
//
////đếm số lượng sản phẩm trong giỏ hàng
//$numofitems = 0;
//if(isset ($_SESSION['cart'])){
//    foreach ($_SESSION['cart'] as $key => $value) {
//        $numofitems += $value;
//    }
//}
//$tpl->assign('NumOfCartItems', $numofitems);

//Bắt đầu cột chính
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case "HomeAdmin":
            include 'admin/HomeAdmin.php';
            break;
        case "QuanLyLoaiDoChoi":
            include 'admin/QuanLyLoaiDoChoi.php';
            include 'includes/english/incCategories.php';
            $tpl->assign('BlockInfo', $Categories);
            $tpl->parse('main.body.left.block');
            $tpl->parse('main.body.left');
            break;
        case "QuanLyNhaSanXuat":
            include 'admin/QuanLyNhaSanXuat.php';
            include 'includes/english/incManufacturers.php';
            $tpl->assign('BlockInfo', $Manufacturers);
            $tpl->parse('main.body.left.block');
            $tpl->parse('main.body.left');
            break;
        case "QuanLyNhaSanXuat_XuLy":
            include 'admin/QuanLyNhaSanXuat_XuLy.php';
            include 'includes/english/incManufacturers.php';
            $tpl->assign('BlockInfo', $Manufacturers);
            $tpl->parse('main.body.left.block');
            $tpl->parse('main.body.left');
            break;
        case "QuanLyDoChoi":
            include 'admin/QuanLyDoChoi.php';
            break;        
        case "ThemDoChoi":
            include 'admin/ThemDoChoi.php';
            break;
        case "XuLyDoChoi":
            include 'admin/XuLyDoChoi.php';
            break;
        case "CapNhatDoChoi":
            include 'admin/CapNhatDoChoi.php';
            break;
        case "DeleteProducts":
            include 'admin/XoaDoChoi.php';
            break;
        case "QuanLyLoaiDoChoi":
            include 'admin/QuanLyLoaiDoChoi.php';
            break;
        case "QuanLyNhaSanXuat":
            include 'admin/QuanLyNhaSanXuat.php';
            break;
        case "QuanLyNguoiDung":
            include 'admin/QuanLyNguoiDung.php';
            break;
         case "ThemNguoiDung":
            include 'admin/ThemNguoiDung.php';
            break;
        case "XuLyNguoiDung":
            include 'admin/XuLyNguoiDung.php';
            break;
         case "CapNhatNguoiDung":
            include 'admin/CapNhatNguoiDung.php';
            break;
//        case "WhatsNew":
//            include 'pages/WhatsNew.php';
//            break;
//        case "Specials":
//            include 'pages/Specials.php';
//            break;
//        case "Review":
//            include 'pages/Review.php';
//            break;
//        case "Contact":
//            include 'pages/Contact.php';
//            break;
//         case"productslist":
//            include "pages/Products.php";
//            break;
//        case"detail":
//            include "pages/Detail.php";
//            break;
//        case"manufacturers":
//            include "pages/Manufacturers.php";
//            break;
//         case "CreateAccount":
//            include 'pages/CreateAccount.php';
//            break;
//         case "CASuccess":
//            include 'pages/CreateAccountSuccess.php';
//            break;
//        case "LogIn":
//            include 'pages/LogIn.php';
//            break;
//        case "AdvancedSearch":
//            include 'pages/AdvancedSearch.php';
//            break;
//        case "KetQuaTimKiem":
//            include 'pages/SearchResults.php';
//            break;
//        case "userprofile":
//            include 'pages/UsersProfile.php';
//            break;
//        case "EditProfileSuccess":
//            include 'pages/UsersProfileSuccess.php';
//            break;
//        case "ShoppingCart":
//            include 'pages/ShoppingCart.php';
//            break;
//        case "XuLyQuenMT":
//            include 'pages/XuLyQuenMatKhau.php';
//            break;
//         case "ProductsAdmin":
//            include 'pages/InsertProductsAdmin.php';
//            break;
//        case "InsertAdminManage":
//            include 'pages/InsertAdminManage.php';
//            break;
//        case "UpdateProducts":
//            include 'pages/InsertProductsAdmin.php';
//            break;
//       case "QuanLyDoChoi":
//            include 'pages/QuanLyDoChoi.php';
//            break;
//        case "Shipping":
//            include 'pages/Shipping.php';
//            break;
//
//        case "Privacy":
//            include 'pages/Privacy.php';
//            break;
//        case "Conditions":
//            include 'pages/Conditions.php';
//            break;
//        case "PasswordForgotten":
//            include 'pages/Password_forgotten.php';
//            break;

        default:
            include 'admin/HomeAdmin.php';
            break;
    }
}else{
    include 'admin/HomeAdmin.php';
}

$tpl->assign('ContentInfo', $Content);
$tpl->parse('main.body.content');
$tpl->parse('main.body');
$tpl->parse('main.header');
//$tpl->parse('main.footer');
$tpl->parse('main');
$tpl->out('main');
?>