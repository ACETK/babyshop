<!-- BEGIN: cart #{TotalPrice}-->
<table width="" cellspacing="0" cellpadding="0" border="0" class="tableBox_shopping_cart main">
    <tbody>
        <tr>
            <td align="center" class="s_cart_head s_cart_head_padd remove">Xóa bỏ</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="s_cart_head s_cart_head_padd products">Sản phẩm</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="s_cart_head s_cart_head_padd quantity">Số lượng</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="s_cart_head s_cart_head_padd total">Thành tiền</td>
        </tr>

        <tr>
            <td colspan="7" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
        </tr>

        <!-- BEGIN: product #{ProductID}, {ProductLink}, {ProductName}, {ProductImgURL},{ProductQty},{ProductPrice} -->
        <tr>
            <td align="center" class="s_cart_td"><input type="checkbox" value="{ProductID}" name="cart_delete[]"></td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td>
                <table cellspacing="10" cellpadding="0" border="0">
                    <tbody>
                        <tr><td class="name name3_padd"><a href="{ProductLink}" >{ProductName}</a></td></tr>
                        <tr><td class="pic3_padd">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" style="width: 1px; margin: 0px auto;">
                                    <tbody><tr><td>
                                                <div style="width: 197px; height: 157px;" class="wrapper_pic_div">
                                                    <a style="width: 197px; height: 157px;" href="{ProductLink}" ><img width="197" height="157" border="0" title=" {ProductName} " alt="{ProductName}" src="{ProductImgURL}">
                                                        <div class="wrapper_pic_t">
                                                            <div class="wrapper_pic_r">
                                                                <div class="wrapper_pic_b">
                                                                    <div class="wrapper_pic_l">
                                                                        <div class="wrapper_pic_tl">
                                                                            <div class="wrapper_pic_tr">
                                                                                <div class="wrapper_pic_bl">
                                                                                    <div style="width: 197px; height: 157px;" class="wrapper_pic_br"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></a></div></td></tr></tbody>
                                </table>
                            </td></tr>
                    </tbody>
                </table>
                <br>
            </td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="s_cart_td"><input type="text" size="2" value="{ProductQty}" name="cart_quantity[]"><input type="hidden" value="{ProductID}" name="products_id[]"></td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="s_cart_td"><span class="productSpecialPrice">{ProductPrice}</span></td>
        </tr>
        <!-- END: product -->

        <!-- BEGIN: line -->
        <tr>
            <td colspan="7" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
        </tr>
        <!-- END: line -->

    </tbody>
</table>

<div class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></div>
<table cellspacing="0" cellpadding="0" border="0">
    <tbody><tr>
            <td width="80%" align="right" class="cart_total_left">Tổng cộng:</td>
            <td width="20%" align="center" class="cart_total_right main">
                <span class="productSpecialPrice">{TotalPrice}</span>
            </td>
        </tr>
    </tbody></table>
<div class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></div>

<table cellspacing="0" cellpadding="0" border="0">
    <tbody><tr>
            <td class="cart_button_padd button2_marg bg_input">
                <input type="image" title=" Cập nhật giỏ hàng " alt="Cập nhật giỏ hàng" src="template/images/english/button_update_cart1.gif">&nbsp;
                <a href="index.php" ><img width="147" height="19" border="0" title=" Tiếp tục shopping " alt="Tiếp tục shopping" src="template/images/english/button_continue_shopping.gif"></a>&nbsp;
                <a href="index.php?action=CheckOut" ><img width="96" height="19" border="0" title=" Thanh toán " alt="Thanh toán" src="template/images/english/button_checkout1.gif"></a>
            </td>
        </tr>
    </tbody></table>
<!-- END: cart -->