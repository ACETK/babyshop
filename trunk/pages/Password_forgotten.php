<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$Temp="";
$Temp.='<form method="post" action="" name="password_forgotten">
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
                                        <td class="main"> <b>Tên tài khoản:</b> </td><td><input type="text" name="tài khoản"></td>
                                    </tr>
                                    <tr>
                                    <td class="main"><b>E-Mail:</b> </td><td><input type="text" name="email_address"></td>
                                    </tr>
                                    <tr>
                                        <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                                    </tr>
                                </tbody></table>



                            <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                            <table cellspacing="5" cellpadding="0" border="0"><tbody><tr><td>
                                            <table width="100%" cellspacing="0" cellpadding="2" border="0">
                                                <tbody><tr><td><a href="index.php?action=Home"><img width="71" height="19" border="0" title=" Back " alt="Back" src="includes/english/images/buttons/button_back1.gif"></a></td>
                                                        <td align="right"><a href=""><input type="image" title=" Continue " alt="Continue" src="includes/english/images/buttons/button_continue.gif"></a></td></tr>
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
