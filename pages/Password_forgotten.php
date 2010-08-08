<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$Temp="";
$Temp.='
    <script language="javascript" type="text/javascript">
	function checkinput()
	{
		var txtUserName = document.getElementById("txtTaiKhoan");
		var txtEmail = document.getElementById("txtEmail");
		var strErrorMessage = "";
		if (txtUserName.value == "")
		  	strErrorMessage = "Tài khoản không được trống! ";
		if (txtEmail.value == "")
			strErrorMessage += "Email không được trống!";
		if (strErrorMessage != "")
		{
			var divErrorMessage = document.getElementById("divErrorMessage");
			divErrorMessage.innerHTML = strErrorMessage;
			return false;
		}
		else
			return true;
	}
</script>
<form method="post" action="index.php?action=XuLyQuenMT" name="password_forgotten" onsubmit="return checkinput()">
                               <table width="100%" cellspacing="0" cellpadding="2" border="0">
                                <tbody><tr>
                                        <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="main">Nếu bạn quên mật khẩu của bạn, hãy nhập tên đăng nhập và e-mail của bạn  dưới đây và chúng tôi sẽ giúp bạn đổi mật khẩu mới.</td>
                                    </tr>
                                    <tr>
                                        <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                                    </tr>
                                    <tr>
                                        <td class="main"> <b>Tên tài khoản:</b> </td><td><input type="text" name="taikhoan" id="txtTaiKhoan"></td>
                                    </tr>
                                    <tr>
                                    <td class="main"><b>E-Mail:</b> </td><td><input type="text" name="email" id="txtEmail"></td>
                                    </tr>
                                    <tr>
                                        <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                                    </tr>
                                     
                                </tbody></table>
<div id="divErrorMessage"></div>
                            <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                            <table cellspacing="5" cellpadding="0" border="0"><tbody><tr><td>
                                            <table width="100%" cellspacing="0" cellpadding="2" border="0">
                                                <tbody><tr><td><a href="index.php?action=Home"><img width="71" height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a></td>
                                                        <td align="right"><input type="image" title=" Continue " alt="Continue" src="template/images/english/button_continue.gif"></td></tr>
                                                </tbody></table>
                                        </td></tr></tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>';

/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Thông tin quên mật khẩu");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */

?>
