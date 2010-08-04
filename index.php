<?php
include_once 'Class/MySQLHelper.php';
/////////////////////////////

/** Khởi tạo giao diện */
include_once 'xtemplate.class.php';
$tpl = new XTemplate('template/template.html');

//Thiết kế cột trái
include 'includes/english/incCategories.php';
$tpl->assign('BlockInfo', $Categories);
$tpl->parse('main.body.left.block');

include 'includes/english/incTwitter.php';
$tpl->assign('BlockInfo', $Twitter);
$tpl->parse('main.body.left.block');

include 'includes/english/incBestSellers.php';
$tpl->assign('BlockInfo', $BestSellers);
$tpl->parse('main.body.left.block');

$tpl->parse('main.body.left');//Kết thúc cột trái

//Thiết kế cột phải
include 'includes/english/incLogin.php';
$tpl->assign('BlockInfo', $Login);
$tpl->parse('main.body.right.block');

include 'includes/english/incManufacturers.php';
$tpl->assign('BlockInfo', $Manufacturers);
$tpl->parse('main.body.right.block');

include 'includes/english/incSpecials.php';
$tpl->assign('BlockInfo', $Specials);
$tpl->parse('main.body.right.block');

include 'includes/english/incShipping.php';
$tpl->assign('BlockInfo', $Shipping);
$tpl->parse('main.body.right.block');

$tpl->parse('main.body.right');//Kết thúc cột phải

//Bắt đầu cột chính
if (isset($_GET['action'])) {
    $page = $_GET['action'];
    switch ($page) {
        case "Home":
            include 'pages/HomePage.php';
            $tpl->parse('main.header.banner');
            break;
        case "WhatsNew":
            include 'pages/WhatsNew.php';
            break;
        case "Specials":
            include 'pages/Specials.php';
            break;
        case "Review":
            include 'pages/Review.php';
            break;
        case "Contact":
            include 'pages/Contact.php';
            break;
         case"productslist":
            include "pages/Products.php";
            break;
        case"detail":
            include "pages/Detail.php";
            break;
        case"manufacturers":
            include "pages/Manufacturers.php";
            break;
         case "CreateAccount":
            include 'pages/CreateAccount.php';
            break;
         case "CASuccess":
            include 'pages/CreateAccountSuccess.php';
            break;
        case "LogIn":
            include 'pages/LogIn.php';
            break;
        case "TimKiem":
            include 'pages/AdvancedSearch.php';
            break;
        case "KetQuaTimKiem":
            include 'pages/SearchResults.php';
            break;
//        case "ShoppingCart":
//            include 'pages/ShoppingCart.php';
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
//            include 'pages/PasswordForgotten.php';
//            break;

        default:
            $tpl->assign('PagesName', 'pages/HomePage.html');
            break;
    }
}else{
    include 'pages/HomePage.php';
    $tpl->parse('main.header.banner');
}
$tpl->assign('ContentInfo', $Content);
$tpl->parse('main.body.content');
$tpl->parse('main.body');
$tpl->parse('main.header');
$tpl->parse('main.footer');
$tpl->parse('main');
$tpl->out('main');
?>