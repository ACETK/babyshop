<?php
$s = new XTemplate('./template/incInfoBox.html');
$s->assign('BoxTitle','Specials');

$Temp = '<table cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr><td class="name_padd"><span><a href="#" >Product #005</a></span></td></tr>
        <tr><td class="pic_padd">
                <div style="width: 197px; height: 157px;" class="wrapper_pic_div">
                    <a style="width: 197px; height: 157px;" href="#" ><img width="197" height="157" border="0" title=" Product #005 " alt="Product #005" src="images/005.jpg">
                        <div class="wrapper_box_pic_t">
                            <div class="wrapper_box_pic_r">
                                <div class="wrapper_box_pic_b">
                                    <div class="wrapper_box_pic_l">
                                        <div class="wrapper_box_pic_tl">
                                            <div class="wrapper_box_pic_tr">
                                                <div class="wrapper_box_pic_bl">
                                                    <div style="width: 197px; height: 157px;" class="wrapper_box_pic_br"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
            </td></tr>
        <tr><td class="price_padd">
                <font style="font-size: 12pt; font-weight: bold;">Our price:</font> <strike style="color: red; font-size: 14pt; font-weight: bold;">$35.99</strike> <span class="productSpecialPrice">$30.00</span>
            </td></tr>
    </tbody></table>';

$s->assign('TEXT', $Temp);
$s->parse('box');
$Specials = $s->text('box');
?>
