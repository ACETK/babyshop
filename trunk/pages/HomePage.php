<?php
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"What's New Here?");

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Temp = '<table border="0" width="" cellspacing="0" cellpadding="0" class="tableBox_output_table">
    <tr>
        <td  class="main"><table border="0" width="" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"  style="width:50%;">
                        <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                            <tr><td class="prod_padd2">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr><td class="name name2_padd"><a href="">Product #104</a></td></tr>
                                        <tr><td class="pic2_padd"><div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="" style="width:197px;height:157px;"><img src="images/104.jpg" border="0" alt="Product #104" title=" Product #104 " width="197" height="157"  style="width:197px;height:157px;">
                                                        <div class="wrapper_pic_t">
                                                            <div class="wrapper_pic_r">
                                                                <div class="wrapper_pic_b">
                                                                    <div class="wrapper_pic_l">
                                                                        <div class="wrapper_pic_tl">
                                                                            <div class="wrapper_pic_tr">
                                                                                <div class="wrapper_pic_bl">
                                                                                    <div class="wrapper_pic_br" style="width:197px;height:157px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></a></div></td></tr>
                                        <tr><td class="desc desc2_padd">Lorem ipsum dolor sit ame ...</td></tr>
                                        <tr><td class="price2_padd"><span class="productSpecialPrice">$42.00</span></td></tr>
                                        <tr><td class="button2_padd button2_marg"><a href="" ><img src="includes/english/images/buttons/button_details.gif" border="0" alt="" width="81" height="19"  class="btn1"></a> <a href="" ><img src="includes/english/images/buttons/button_add_to_cart1.gif" border="0" alt="" width="104" height="19"  class="btn2"></a></td></tr>
                                    </table>
                                </td></tr>
                        </table></td>
                    <td class="prod_line_y padd_vv"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td>    <td align="left"  style="width:50%;">
                        <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                            <tr><td class="prod_padd2">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr><td class="name name2_padd"><a href="">Product #103</a></td></tr>
                                        <tr><td class="pic2_padd"><div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="" style="width:197px;height:157px;"><img src="images/103.jpg" border="0" alt="Product #103" title=" Product #103 " width="197" height="157"  style="width:197px;height:157px;">
                                                        <div class="wrapper_pic_t">
                                                            <div class="wrapper_pic_r">
                                                                <div class="wrapper_pic_b">
                                                                    <div class="wrapper_pic_l">
                                                                        <div class="wrapper_pic_tl">
                                                                            <div class="wrapper_pic_tr">
                                                                                <div class="wrapper_pic_bl">
                                                                                    <div class="wrapper_pic_br" style="width:197px;height:157px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></a></div></td></tr>
                                        <tr><td class="desc desc2_padd">Lorem ipsum dolor sit ame ...</td></tr>
                                        <tr><td class="price2_padd"><span class="productSpecialPrice">$49.99</span></td></tr>
                                        <tr><td class="button2_padd button2_marg"><a href="" ><img src="includes/english/images/buttons/button_details.gif" border="0" alt="" width="81" height="19"  class="btn1"></a> <a href="" ><img src="includes/english/images/buttons/button_add_to_cart1.gif" border="0" alt="" width="104" height="19"  class="btn2"></a></td></tr>
                                    </table>
                                </td></tr>
                        </table></td>
                </tr>
                <tr><td class="prod_line_x padd_gg" colspan="3"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td></tr>   <tr>
                    <td align="left"  style="width:50%;" class="padd">
                        <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                            <tr><td class="prod_padd2">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr><td class="name name2_padd"><a href="">Product #102</a></td></tr>
                                        <tr><td class="pic2_padd"><div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="" style="width:197px;height:157px;"><img src="images/102.jpg" border="0" alt="Product #102" title=" Product #102 " width="197" height="157"  style="width:197px;height:157px;">
                                                        <div class="wrapper_pic_t">
                                                            <div class="wrapper_pic_r">
                                                                <div class="wrapper_pic_b">
                                                                    <div class="wrapper_pic_l">
                                                                        <div class="wrapper_pic_tl">
                                                                            <div class="wrapper_pic_tr">
                                                                                <div class="wrapper_pic_bl">
                                                                                    <div class="wrapper_pic_br" style="width:197px;height:157px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></a></div></td></tr>
                                        <tr><td class="desc desc2_padd">Lorem ipsum dolor sit ame ...</td></tr>
                                        <tr><td class="price2_padd"><span class="productSpecialPrice">$499.99</span></td></tr>
                                        <tr><td class="button2_padd button2_marg"><a href=""><img src="includes/english/images/buttons/button_details.gif" border="0" alt="" width="81" height="19"  class="btn1"></a> <a href=""><img src="includes/english/images/buttons/button_add_to_cart1.gif" border="0" alt="" width="104" height="19"  class="btn2"></a></td></tr>
                                    </table>
                                </td></tr>
                        </table></td>
                    <td class="prod_line_y padd_vv"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td>    <td align="left"  style="width:50%;" class="padd">
                        <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                            <tr><td class="prod_padd2">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr><td class="name name2_padd"><a href="" >Product #101</a></td></tr>
                                        <tr><td class="pic2_padd"><div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="" style="width:197px;height:157px;"><img src="images/101.jpg" border="0" alt="Product #101" title=" Product #101 " width="197" height="157"  style="width:197px;height:157px;">
                                                        <div class="wrapper_pic_t">
                                                            <div class="wrapper_pic_r">
                                                                <div class="wrapper_pic_b">
                                                                    <div class="wrapper_pic_l">
                                                                        <div class="wrapper_pic_tl">
                                                                            <div class="wrapper_pic_tr">
                                                                                <div class="wrapper_pic_bl">
                                                                                    <div class="wrapper_pic_br" style="width:197px;height:157px;"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></a></div></td></tr>
                                        <tr><td class="desc desc2_padd">Lorem ipsum dolor sit ame ...</td></tr>
                                        <tr><td class="price2_padd"><span class="productSpecialPrice">$299.99</span></td></tr>
                                        <tr><td class="button2_padd button2_marg"><a href="" ><img src="includes/english/images/buttons/button_details.gif" border="0" alt="" width="81" height="19"  class="btn1"></a> <a href="" ><img src="includes/english/images/buttons/button_add_to_cart1.gif" border="0" alt="" width="104" height="19"  class="btn2"></a></td></tr>
                                    </table>
                                </td></tr>
                        </table></td>
                </tr>
            </table>
        </td>
    </tr>
</table>';
    //Kết thúc nghiệp vụ

//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>