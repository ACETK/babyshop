<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="LTR" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Favorite Toys {WebTitle}</title>
        <link rel="stylesheet" type="text/css" href="css/constants.css" >
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" >
        <link rel="stylesheet" type="text/css" href="css/stylesheet_boxes.css" >
        <link rel="stylesheet" type="text/css" href="css/stylesheet_content.css" >
        <link rel="stylesheet" type="text/css" href="css/style.css" >
        <script src="ie6_warning/ie6_script_other.js" type="text/javascript"></script>
<script language="javascript"><!--
var i=0;
function resize() {
  if (navigator.appName == 'Netscape') i=40;
  if (document.images[0]) window.resizeTo(document.images[0].width +60, document.images[0].height+60+i);
  self.focus();
}
//--></script>
</head>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Class/MySQLHelper.php';
$poID = $_GET['pID'];
$sql = "SELECT HinhAnh FROM dochoi where MaDoChoi='$poID'";
$result = MySQLHelper::executeQuery($sql);
$k= mysql_fetch_array($result);
$Image = $k['HinhAnh'];

?>
<body onLoad="resize();" style="padding:8px 10px 0px 10px;">

			<div class="wrapper_pic_t">
				<div class="wrapper_pic_r">
					<div class="wrapper_pic_b">
						<div class="wrapper_pic_l">
							<div class="wrapper_pic_tl">
								<div class="wrapper_pic_tr">
									<div class="wrapper_pic_bl">
										<div class="wrapper_pic_br" style="width:197px;height:157px;">
                                                                                 <?php   echo '<img src="../images/sanpham/'.$Image.'" border="0" alt="" title="" width="197" height="157"> '; ?>
                                                                                </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div></body>
</html>


