<?php
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
//lam lai:

$Temp='
    <script language="javascript" type="text/javascript">
	function KiemTra()
	{
		var txtUserName = document.getElementById("txtTaiKhoan");
		var txtPassword = document.getElementById("txtMatKhau");
		var strErrorMessage = "";
		if (txtUserName.value == "")
		  	strErrorMessage = "Tài khoản không được trống! ";
		if (txtPassword.value == "")
			strErrorMessage += "Mật khẩu không được trống!";
		if (strErrorMessage != "")
		{
			var divErrorMessage = document.getElementById("divErrorMessage");
			divErrorMessage.innerHTML = strErrorMessage;
			return false;
		}
		else
			return true;
	}
</script>';
$TuaDe= "Đăng nhập";
session_start();
if ( !isset($_SESSION['isLogin']) || $_SESSION['isLogin'] == 0) {
    
    $Temp.=' <form method="post" action="includes/english/XuLyDangNhap.php" onSubmit="return KiemTra()" >
             <table width="100%" cellspacing="5" cellpadding="0" border="0" style="height: 150px">
             <tbody><tr>
              <td class="main"><b>Tên tài khoản:</b></td></tr>
               <tr><td class="main width3_100"><input type="text" name="txtTaiKhoan" id="txtTaiKhoan"></td></tr>
                <tr>
                  <td class="main"><b>Mật khẩu:</b></td></tr>
                   <tr><td class="main width3_100"><input type="password" maxlength="40" name="txtMatKhau" id="txtMatKhau"></td></tr>
                    <tr><td colspan="2"><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td></tr>
                    <tr><td class="smallText"><a href="index.php?action=PasswordForgotten">Quên mật khẩu? Nhấp vào đây.</a></td></tr>
                     <tr><td>
                   <table width="100%" cellspacing="0" cellpadding="2" border="0">
                               <tbody><tr>
                             <td align="center"><input type="submit" name="ok" value="Đăng nhập" title=" Đăng nhập " alt="Đăng nhập"></td>
                               </tr>
                                     </tbody></table>
                                       </td></tr>
                                       </tbody></table> 
                                   <div id="divErrorMessage"></div>';?>
                     <?php
                    if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == 0) {
                        $Temp.='Sai tài khoản hoặc mật khẩu';  ?>
                        <?php
                        $Temp.=' </form>';
                    }



}
    else {
            if(isset ($_SESSION['TenTaiKhoan'])){
            $TuaDe= "Đăng xuất";
            $tentk = $_SESSION['TenTaiKhoan'];
            $Temp.=' <form name = "Logout" method ="post" action="includes/english/XuLyDangXuat.php">
                           <table>
                            <tr> <td> Chào <a href="">'.$tentk.' </a> | <input type="submit" name="thoat" value="Thoát" title=" Đăng xuất " alt="Đăng xuất"> </td></tr>
                            </table></form>';
            }
    
                }


////////////

//Kết thúc nghiệp vụ
    /** Khởi tạo box */
    $btpl = new XTemplate('./template/incInfoBox.html');
    $btpl->assign('BoxTitle',''.$TuaDe.'');
//đưa dữ liệu vào box
    $btpl->assign('BoxInfo', $Temp);
    $btpl->parse('box');
    $Login = $btpl->text('box');
    /** Kết thúc box */
?>
