<?php
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"New Products");

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Temp = '<div class="result1_top"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></div>
<table border="0" cellspacing="0" cellpadding="0" class="result result_top_padd">
    <tr>
        <td>Displaying <b>1</b> to <b>3</b> (of <b>104</b> new products)</td>
        <td class="result_right">Result Pages: &nbsp;
            <b>1</b>&nbsp;&nbsp;
            <a href="" class="pageResults" title=" Page 2 "><u>2</u></a>&nbsp;&nbsp;<a href="" class="pageResults" title=" Page 3 "><u>3</u></a>&nbsp;&nbsp;<a href="" class="pageResults" title=" Page 4 "><u>4</u></a>&nbsp;&nbsp;<a href="" class="pageResults" title=" Page 5 "><u>5</u></a>&nbsp;<a href="" class="pageResults" title=" Next Set of 5 Pages ">...</a>&nbsp;&nbsp;<a href="" class="pageResults" title=" Next Page "><u>[Next&nbsp;&gt;&gt;]</u></a>&nbsp;</td>
    </tr>
</table>
<div class="result1_bottom"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></div>
<table border="0" width="" cellspacing="0" cellpadding="0">
    <tr><td  class="tableBox_output1_td main">
            <table border="0" width="" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"  class="left">
                        <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                            <tr><td class="prod_padd">
                                    <div  class="pic_padd">
                                        <div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="" style="width:197px;height:157px;"><img src="images/001.jpg" border="0" alt="Product #001" title=" Product #001 " width="197" height="157">
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
                                                </div></a></div>
                                    </div>
                                    <div>
                                        <div class="name name_padd"><b><a href="">Product #001</a></b></div>
                                        <div class="desc desc_padd">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque ut quam. Pellentesque vestibulum, velit eget venenatis auctor, quam turpis consequat quam, et ultricies leo neque et tortor. Quisque ut nulla non neque facilisis mattis. Sed quis nibh blandit lacus laoreet feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris tincidunt erat nec risus accumsan tincidunt. Nunc augue massa, accumsan a, mollis vitae, porttitor eu, leo. Vestibulum ...</div>
                                        <div class="ofh">
                                            <div class="price_padd vam">&nbsp;&nbsp;<span class="productSpecialPrice">$299.99</span></div>
                                            <div class="data data_padd"><em>Date Added: Tuesday 20 April, 2010<br>Manufacturer: Example_1</em></div>
                                        </div><br>
                                        <div class="button_padd ofh">
                                            <div class="fl_right"><a href=""><img src="includes/english/images/buttons/button_add_to_cart1.gif" border="0" alt="" width="104" height="19"></a></div>
                                            <div class="fl_left"><a href=""><img src="includes/english/images/buttons/button_details.gif" border="0" alt="" width="81" height="19"></a></div>
                                        </div>
                                    </div></td></tr>
                        </table>
                    </td></tr>
                <tr><td class="prod_line_x padd_gg" colspan="1"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td></tr>   <tr>
                    <td align="left"  class="right">
                        <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                            <tr><td class="prod_padd">
                                    <div  class="pic_padd">
                                        <div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="" style="width:197px;height:157px;"><img src="images/002.jpg" border="0" alt="Product #002" title=" Product #002 " width="197" height="157">
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
                                                </div></a></div>
                                    </div>
                                    <div>
                                        <div class="name name_padd"><b><a href="">Product #002</a></b></div>
                                        <div class="desc desc_padd">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque ut quam. Pellentesque vestibulum, velit eget venenatis auctor, quam turpis consequat quam, et ultricies leo neque et tortor. Quisque ut nulla non neque facilisis mattis. Sed quis nibh blandit lacus laoreet feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris tincidunt erat nec risus accumsan tincidunt. Nunc augue massa, accumsan a, mollis vitae, porttitor eu, leo. Vestibulum ...</div>
                                        <div class="ofh">
                                            <div class="data data_padd"><em>Date Added: Tuesday 20 April, 2010<br>Manufacturer: Example_2</em></div>
                                            <div class="price_padd vam">&nbsp;&nbsp;<span class="productSpecialPrice">$499.99</span></div>
                                        </div><br>
                                        <div class="button_padd ofh">
                                            <div class="fl_right"><a href=""><img src="includes/english/images/buttons/button_details.gif" border="0" alt="" width="81" height="19"></a></div>
                                            <div class="fl_left"><a href=""><img src="includes/english/images/buttons/button_add_to_cart1.gif" border="0" alt="" width="104" height="19"></a></div>
                                        </div>

                                    </div></td></tr>
                        </table></td>
                </tr>
                <tr><td class="prod_line_x padd_gg" colspan="1"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></td></tr>   <tr>
                    <td align="left"  class="left">
                        <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                            <tr><td class="prod_padd">
                                    <div  class="pic_padd">
                                        <div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="" style="width:197px;height:157px;"><img src="images/004.jpg" border="0" alt="Product #004" title=" Product #004 " width="197" height="157">
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
                                                </div></a></div>
                                    </div>
                                    <div>
                                        <div class="name name_padd"><b><a href="">Product #004</a></b></div>
                                        <div class="desc desc_padd">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque ut quam. Pellentesque vestibulum, velit eget venenatis auctor, quam turpis consequat quam, et ultricies leo neque et tortor. Quisque ut nulla non neque facilisis mattis. Sed quis nibh blandit lacus laoreet feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris tincidunt erat nec risus accumsan tincidunt. Nunc augue massa, accumsan a, mollis vitae, porttitor eu, leo. Vestibulum ...</div>
                                        <div class="ofh">
                                            <div class="price_padd vam">&nbsp;&nbsp;<span class="productSpecialPrice">$42.00</span></div>
                                            <div class="data data_padd"><em>Date Added: Tuesday 20 April, 2010<br>Manufacturer: Example_2</em></div>
                                        </div><br>
                                        <div class="button_padd ofh">
                                            <div class="fl_right"><a href=""><img src="includes/english/images/buttons/button_add_to_cart1.gif" border="0" alt="" width="104" height="19"></a></div>
                                            <div class="fl_left"><a href=""><img src="includes/english/images/buttons/button_details.gif" border="0" alt="" width="81" height="19"></a></div>
                                        </div>
                                    </div></td></tr>
                        </table></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="result2_top"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></div>
<table border="0" width="100%" cellspacing="0" cellpadding="0" class="result result_bottom_padd">
    <tr>
        <td>Displaying <b>1</b> to <b>3</b> (of <b>104</b> new products)</td>
        <td class="result_right">Result Pages: &nbsp;
            <b>1</b>&nbsp;&nbsp;
            <a href="" class="pageResults" title=" Page 2 "><u>2</u></a>&nbsp;&nbsp;<a href="" class="pageResults" title=" Page 3 "><u>3</u></a>&nbsp;&nbsp;<a href="" class="pageResults" title=" Page 4 "><u>4</u></a>&nbsp;&nbsp;<a href="" class="pageResults" title=" Page 5 "><u>5</u></a>&nbsp;<a href="" class="pageResults" title=" Next Set of 5 Pages ">...</a>&nbsp;&nbsp;<a href="" class="pageResults" title=" Next Page "><u>[Next&nbsp;&gt;&gt;]</u></a>&nbsp;
        </td>
    </tr>
</table>
<div class="result2_bottom"><img src="images/spacer.gif" border="0" alt="" width="1" height="1"></div>';
    //Kết thúc nghiệp vụ

//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
