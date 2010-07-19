<?php

include_once 'xtemplate.class.php';
$tpl = new XTemplate('template/template.html');

//include 'includes/english/incCategories.php';
$tpl->assign('BoxTitle', 'Categories');
$tpl->assign_file('BoxInfo', 'includes/english/incCategories.php');
$tpl->parse('main.body.left.box');

include 'includes/english/incTwitter.php';
$tpl->assign('BoxInfo', $Twitter);
$tpl->parse('main.body.left.box');

include 'includes/english/incBestSellers.php';
$tpl->assign('BoxInfo', $BestSellers);
$tpl->parse('main.body.left.box');

$tpl->parse('main.body.left');

include 'includes/english/incManufacturers.php';
$tpl->assign('BoxInfo', $Manufacturers);
$tpl->parse('main.body.right.box');

include 'includes/english/incSpecials.php';
$tpl->assign('BoxInfo', $Specials);
$tpl->parse('main.body.right.box');

include 'includes/english/incShipping.php';
$tpl->assign('BoxInfo', $Shipping);
$tpl->parse('main.body.right.box');

$tpl->parse('main.body.right');

if (isset($_GET['action'])) {
    $page = $_GET['action'];
    switch ($page) {
        case "Home":
            $tpl->assign('TitleContent', "What's New Here?");
            $tpl->assign_file('PageName', 'pages/HomePage.html');
            break;
        case "WhatsNew":
            $tpl->assign('TitleContent', "New Products");
            $tpl->assign_file('PageName', 'pages/WhatsNew.html');
            break;
        case "Specials":
            $tpl->assign('TitleContent', "Get Them While They're Hot!");
            $tpl->assign_file('PageName', 'pages/Specials.html');
            break;
        case "Review":
            $tpl->assign('TitleContent', 'Read What Others Are Saying');
            $tpl->assign_file('PageName', 'pages/Review.html');
            break;
        case "Contact":
            $tpl->assign('TitleContent', 'Contact Us');
            $tpl->assign_file('PageName', 'pages/Contact.html');
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
//        case "AdvancedSearch":
//            include 'pages/AdvancedSearch.php';
//            break;
//        case "CreateAccount":
//            include 'pages/CreateAccount.php';
//            break;
//        case "LogIn":
//            include 'pages/LogIn.php';
//            break;
//        case "PasswordForgotten":
//            include 'pages/PasswordForgotten.php';
//            break;

        default:
            $tpl->assign('PagesName', 'pages/HomePage.html');
            break;
    }
}else{
    $tpl->assign('TitleContent', 'What\'s New Here?');
    $tpl->assign_file('PageName', 'pages/HomePage.html');
}

$tpl->parse('main.body.content');
$tpl->parse('main.body');
$tpl->parse('main.header');
$tpl->parse('main.footer');
$tpl->parse('main');
$tpl->out('main');
?>