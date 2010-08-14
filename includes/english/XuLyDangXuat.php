<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//        setcookie("TenTaiKhoan","",time()-3600);
	session_start();
	session_destroy();
	header("location:../../index.php");


?>
