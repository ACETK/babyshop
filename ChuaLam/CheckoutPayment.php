<?php
$Temp="";
$Temp.='<script language="javascript"><!--
    var selected;

    function selectRowEffect(object, buttonSelect) {
        if (!selected) {
            if (document.getElementById) {
                selected = document.getElementById(\'defaultSelected\');
            } else {
                selected = document.all[\'defaultSelected\'];
            }
        }

        if (selected) selected.className = \'moduleRow\';
        object.className = \'moduleRowSelected\';
        selected = object;

        // one button is not an array
        if (document.checkout_payment.payment[0]) {
            document.checkout_payment.payment[buttonSelect].checked=true;
        } else {
            document.checkout_payment.payment.checked=true;
        }
    }

    function rowOverEffect(object) {
        if (object.className == \'moduleRow\') object.className = \'moduleRowOver\';
    }

    function rowOutEffect(object) {
        if (object.className == \'moduleRowOver\') object.className = \'moduleRow\';
    }
    //--></script>
<script language="javascript"><!--
    function check_form() {
        var error = 0;
        var error_message = "Errors have occured during the process of your form.\n\nPlease make the following corrections:\n\n";
        var payment_value = null;
        if (document.checkout_payment.payment.length) {
            for (var i=0; i<document.checkout_payment.payment.length; i++) {
                if (document.checkout_payment.payment[i].checked) {
                    payment_value = document.checkout_payment.payment[i].value;
                }
            }
        } else if (document.checkout_payment.payment.checked) {
            payment_value = document.checkout_payment.payment.value;
        } else if (document.checkout_payment.payment.value) {
            payment_value = document.checkout_payment.payment.value;
        }


        if (payment_value == null) {
            error_message = error_message + "* Please select a payment method for your order.\n";
            error = 1;
        }

        if (error == 1) {
            alert(error_message);
            return false;
        } else {
            return true;
        }
    }
    //--></script>
<div class="cont_heading_tl">
    <div class="cont_heading_tr">
        <div class="cont_heading_t"></div>
    </div>
</div>
<div class="cont_heading_l"><div class="cont_heading_r">
        <div class="cont_heading_c">
            <table cellspacing="0" cellpadding="0" border="0" class="cont_heading_table">
                <tbody><tr><td class="cont_heading_td">
				Payment Information
                        </td></tr>
                </tbody></table>
        </div>
    </div></div>
<div class="cont_heading_bl">
    <div class="cont_heading_br">
        <div class="cont_heading_b"></div>
    </div>
</div>

<div class="content_wrapper_r">
    <div class="content_wrapper_b">
        <div class="content_wrapper_l">
            <div class="content_wrapper_bl s_width2_100">
                <div class="content_wrapper_br content_wrapper1_padd">
                    <div class="s_width2_100">
                        <table width="100%" cellspacing="0" cellpadding="2" border="0">
                            <tbody><tr><td class="main indent_2"><b>Billing Address</b></td></tr>
                            </tbody></table>


                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tbody><tr>
                                                                        <td width="50%" class="main">Please choose from your address book where you would like the invoice to be sent to.<br><br><a href="#" ><img width="135" height="19" border="0" title=" Change Address " alt="Change Address" src="includes/languages/english/images/buttons/button_change_address1.gif"></a></td>
                                                                        <td width="50%" align="right"><table cellspacing="0" cellpadding="2" border="0">
                                                                                <tbody><tr>
                                                                                        <td align="center" class="main"><b>Billing Address:</b><br><img width="50" height="53" border="0" alt="" src="images/arrow_south_east.gif"></td>
                                                                                        <td><img width="10" height="1" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                                        <td class="main">pin pin<br> Tô hi&amp;#7871;n Thành<br> Ho Chi Minh, 7000<br> 12456, Viet Nam</td>
                                                                                        <td><img width="10" height="1" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                                    </tr>
                                                                                </tbody></table></td>
                                                                    </tr>
                                                                </tbody></table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table width="100%" cellspacing="0" cellpadding="2" border="0">
                            <tbody><tr><td class="main indent_2"><b>Payment Method</b></td></tr>
                            </tbody></table>


                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table width="100%" cellspacing="0" cellpadding="2" border="0">              <tbody><tr>
                                                                        <td width="50%" class="main">Please select the preferred payment method to use on this order.</td>
                                                                        <td width="50%" align="right" class="main"><b>Please Select</b><br><img width="52" height="57" border="0" alt="" src="images/arrow_east_south.gif"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><table width="100%" cellspacing="0" cellpadding="2" border="0">
                                                                                <tbody><tr onclick="selectRowEffect(this, 0)" onmouseout="rowOutEffect(this)" onmouseover="rowOverEffect(this)" class="moduleRow">
                                                                                        <td width="10"><img width="10" height="24" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                                        <td colspan="3" style="vertical-align: middle;" class="main"><b>Credit Card</b></td>
                                                                                        <td align="right" style="vertical-align: middle;" class="main">
                                                                                            <input type="radio" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="cc" name="payment">                    </td>
                                                                                        <td width="10"><img width="10" height="1" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                                    </tr>
                                                                                </tbody></table></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><table width="100%" cellspacing="0" cellpadding="2" border="0">
                                                                                <tbody><tr onclick="selectRowEffect(this, 1)" onmouseout="rowOutEffect(this)" onmouseover="rowOverEffect(this)" class="moduleRow">
                                                                                        <td width="10"><img width="10" height="24" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                                        <td colspan="3" style="vertical-align: middle;" class="main"><b>Cash on Delivery</b></td>
                                                                                        <td align="right" style="vertical-align: middle;" class="main">
                                                                                            <input type="radio" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="cod" name="payment">                    </td>
                                                                                        <td width="10"><img width="10" height="1" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                                    </tr>
                                                                                </tbody></table></td>
                                                                    </tr>
                                                                </tbody></table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table width="100%" cellspacing="0" cellpadding="2" border="0">
                            <tbody><tr>
                                    <td class="main indent_2"><b>Add Comments About Your Order</b></td>
                                </tr>
                            </tbody></table>


                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table width="100%" cellspacing="0" cellpadding="2" border="0"><tbody><tr>
                                                                        <td><textarea rows="5" cols="60" wrap="soft" name="comments">chan wa di</textarea></td>
                                                                    </tr>
                                                                </tbody></table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table cellspacing="5" cellpadding="0" border="0"><tbody><tr><td>
                                        <table width="100%" cellspacing="0" cellpadding="2" border="0">
                                            <tbody><tr><td class="main"><b>Continue Checkout Procedure</b><br>to confirm this order.</td>
                                                    <td align="right" class="main vam"><input type="image" title=" Continue " alt="Continue" src="includes/languages/english/images/buttons/button_continue.gif"></td></tr>
                                            </tbody></table>

                                    </td></tr></tbody></table>
                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                    <td width="25%" class="vam"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                                    <td width="50%" align="right" class="vam"><img width="1" height="5" border="0" alt="" src="images/pixel_silver.gif"></td>
                                                    <td width="50%" class="vam"><img width="100%" height="1" border="0" alt="" src="images/pixel_silver.gif"></td>
                                                </tr>
                                            </tbody></table></td>
                                    <td width="25%" class="vam"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                                    <td width="50%" class="vam"><img width="100%" height="1" border="0" alt="" src="images/pixel_silver.gif"></td>
                                                    <td><img width="20" height="20" border="0" alt="" src="images/checkout_bullet.gif"></td>
                                                    <td width="50%" class="vam"><img width="100%" height="1" border="0" alt="" src="images/pixel_silver.gif"></td>
                                                </tr>
                                            </tbody></table></td>
                                    <td width="25%" class="vam"><img width="100%" height="1" border="0" alt="" src="images/pixel_silver.gif"></td>
                                    <td width="25%" class="vam"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                                    <td width="50%" class="vam"><img width="100%" height="1" border="0" alt="" src="images/pixel_silver.gif"></td>
                                                    <td width="50%" class="vam"><img width="1" height="5" border="0" alt="" src="images/pixel_silver.gif"></td>
                                                </tr>
                                            </tbody></table></td>
                                </tr>
                                <tr>
                                    <td width="25%" align="center" class="checkoutBarFrom"><a class="checkoutBarFrom" href="CheckoutShipping.php">Delivery Information</a></td>
                                    <td width="25%" align="center" class="checkoutBarCurrent">Payment Information</td>
                                    <td width="25%" align="center" class="checkoutBarTo">Confirmation</td>
                                    <td width="25%" align="center" class="checkoutBarTo">Finished!</td>
                                </tr>
                            </tbody></table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
?>