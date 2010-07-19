<?php
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Contact Us");

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Temp = '<form name="contact_us" action="" method="post">
    <div class="wrapper_pic2_t infoBox_">
        <div class="wrapper_pic2_r">
            <div class="wrapper_pic2_b">
                <div class="wrapper_pic2_l">
                    <div class="wrapper_pic2_tl s_width2_100">
                        <div class="wrapper_pic2_tr">
                            <div class="wrapper_pic2_bl">
                                <div class="wrapper_pic2_br wrapper_pic2_padd">
                                    <div class="s_width2_100">
                                        <table border="0" width="100%" cellspacing="5" cellpadding="0" class="infoBox2_">
                                            <tr>
                                                <td class="main">Full Name:</td>
                                                <td class="main" style="width:100%;"><input type="text" name="name"></td>
                                            </tr>
                                            <tr>
                                                <td class="main" style="white-space:nowrap;">E-Mail Address:</td>
                                                <td class="main"><input type="text" name="email"></td>
                                            </tr>
                                            <tr>
                                                <td class="main">Enquiry:</td>
                                                <td><textarea name="enquiry" wrap="soft" cols="50" rows="15"></textarea></td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="padding:0px 0px 4px 0px;">
        <img src="images/spacer.gif" border="0" alt="" width="1" height="1">
    </div>
    <table cellpadding="0" cellspacing="5" border="0">
        <tr><td>
                <table border="0" width="100%" cellspacing="0" cellpadding="2">
                    <tr><td align="right"><input type="image" src="includes/english/images/buttons/button_continue.gif" border="0" alt="Continue" title=" Continue "></td></tr>
                </table>
            </td></tr>
    </table>
</form>';
    //Kết thúc nghiệp vụ

//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>