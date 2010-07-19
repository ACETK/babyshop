<?php
$Temp="";
$Temp.='<script language="javascript"><!--
    function check_form() {
        var error_message = "Errors have occured during the process of your form.\n\nPlease make the following corrections:\n\n";
        var error_found = false;
        var error_field;
        var keywords = document.advanced_search.keywords.value;
        var dfrom = document.advanced_search.dfrom.value;
        var dto = document.advanced_search.dto.value;
        var pfrom = document.advanced_search.pfrom.value;
        var pto = document.advanced_search.pto.value;
        var pfrom_float;
        var pto_float;

        if ( ((keywords == \'\') || (keywords.length < 1)) && ((dfrom == \'\') || (dfrom == \'mm/dd/yyyy\') || (dfrom.length < 1)) && ((dto == \'\') || (dto == \'mm/dd/yyyy\') || (dto.length < 1)) && ((pfrom == \'\') || (pfrom.length < 1)) && ((pto == \'\') || (pto.length < 1)) ) {
            error_message = error_message + "* At least one of the fields in the search form must be entered.\n";
            error_field = document.advanced_search.keywords;
            error_found = true;
        }

        if ((dfrom.length > 0) && (dfrom != \'mm/dd/yyyy\')) {
            if (!IsValidDate(dfrom, \'mm/dd/yyyy\')) {
                error_message = error_message + "* Invalid From Date.\n";
                error_field = document.advanced_search.dfrom;
                error_found = true;
            }
        }

        if ((dto.length > 0) && (dto != \'mm/dd/yyyy\')) {
            if (!IsValidDate(dto, \'mm/dd/yyyy\')) {
                error_message = error_message + "* Invalid To Date.\n";
                error_field = document.advanced_search.dto;
                error_found = true;
            }
        }

        if ((dfrom.length > 0) && (dfrom != \'mm/dd/yyyy\') && (IsValidDate(dfrom, \'mm/dd/yyyy\')) && (dto.length > 0) && (dto != \'mm/dd/yyyy\') && (IsValidDate(dto, \'mm/dd/yyyy\'))) {
            if (!CheckDateRange(document.advanced_search.dfrom, document.advanced_search.dto)) {
                error_message = error_message + "* To Date must be greater than or equal to From Date.\n";
                error_field = document.advanced_search.dto;
                error_found = true;
            }
        }

        if (pfrom.length > 0) {
            pfrom_float = parseFloat(pfrom);
            if (isNaN(pfrom_float)) {
                error_message = error_message + "* Price From must be a number.\n";
                error_field = document.advanced_search.pfrom;
                error_found = true;
            }
        } else {
            pfrom_float = 0;
        }

        if (pto.length > 0) {
            pto_float = parseFloat(pto);
            if (isNaN(pto_float)) {
                error_message = error_message + "* Price To must be a number.\n";
                error_field = document.advanced_search.pto;
                error_found = true;
            }
        } else {
            pto_float = 0;
        }

        if ( (pfrom.length > 0) && (pto.length > 0) ) {
            if ( (!isNaN(pfrom_float)) && (!isNaN(pto_float)) && (pto_float < pfrom_float) ) {
                error_message = error_message + "* Price To must be greater than or equal to Price From.\n";
                error_field = document.advanced_search.pto;
                error_found = true;
            }
        }

        if (error_found == true) {
            alert(error_message);
            error_field.focus();
            return false;
        } else {
            RemoveFormatString(document.advanced_search.dfrom, "mm/dd/yyyy");
            RemoveFormatString(document.advanced_search.dto, "mm/dd/yyyy");
            return true;
        }
    }

    function popupWindow(url) {
        window.open(url,\'popupWindow\',\'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,height=515,width=485,screenX=150,screenY=150,top=150,left=150\')
    }
    //--></script>
<form name="advanced_search" action="index.php?action=AdvancedSearch" method="get" onSubmit="return check_form(this);">
<div class="cont_heading_tl">
    <div class="cont_heading_tr">
        <div class="cont_heading_t"></div>
    </div>
</div>
<div class="cont_heading_l"><div class="cont_heading_r">
        <div class="cont_heading_c">
            <table cellspacing="0" cellpadding="0" border="0" class="cont_heading_table">
                <tbody><tr><td class="cont_heading_td">
				Advanced Search
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


                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody><tr>
                                                                        <td><table width="100%" cellspacing="0" cellpadding="3" border="0">
                                                                                <tbody><tr>
                                                                                        <td align="right" class="main search_in"><input type="text" style="width: 100%;" name="keywords"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right" class="main search_in"><input type="checkbox" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="1" name="search_in_description"> Search In Product Descriptions</td>
                                                                                    </tr>
                                                                                </tbody></table>
                                                                        </td>
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
                        <table width="100%" cellspacing="4" cellpadding="2" border="0">
                            <tbody><tr>
                                    <td class="smallText"><a href="javascript:popupWindow(\'http://localhost/BabyShop/pages/PopupSearchHelp.php\')"><u>Search Help</u> [?]</a></td>
                                    <td align="right" class="smallText"><input type="image" title=" Search " alt="Search" src="includes/languages/english/images/buttons/button_search.gif"></td>
                                </tr>
                            </tbody></table>

                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>

                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table width="100%" cellspacing="4" cellpadding="2" border="0"><tbody><tr>
                                                                        <td class="fieldKey">Categories:</td>
                                                                        <td class="fieldValue">
                                                                            <select name="categories_id">
                                                                                <option selected="" value="">All Categories</option>
                                                                                <option value="1">Toys on SALE</option>
                                                                                <option value="2">Toys by Age</option>
                                                                                <option value="11">&nbsp;&nbsp;Aliquam suscipit</option>
                                                                                <option value="12">&nbsp;&nbsp;Proin dui</option>
                                                                                <option value="13">&nbsp;&nbsp;Quisque accumsan</option>
                                                                                <option value="14">&nbsp;&nbsp;Ullamco porta</option>
                                                                                <option value="15">&nbsp;&nbsp;Etiam dui arcu</option>
                                                                                <option value="3">Animals &amp; Wildlife</option>
                                                                                <option value="4">Arts, Crafts &amp; Music</option>
                                                                                <option value="5">Bath Toys</option>
                                                                                <option value="6">Building Blocks</option>
                                                                                <option value="7">Classic &amp; Retro</option>
                                                                                <option value="8">Cool Vehicles</option>
                                                                                <option value="9">Games</option>
                                                                                <option value="10">Outdoor Toys</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fieldKey">&nbsp;</td>
                                                                        <td class="smallText"><input type="checkbox" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" checked="" value="1" name="inc_subcat"> Include Subcategories</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fieldKey">Manufacturers:</td>
                                                                        <td class="fieldValue"><select name="manufacturers_id"><option selected="" value="">All Manufacturers</option><option value="1">Example_1</option><option value="2">Example_2</option><option value="3">Example_3</option></select></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fieldKey">Price From:</td>
                                                                        <td class="fieldValue"><input type="text" name="pfrom"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fieldKey">Price To:</td>
                                                                        <td class="fieldValue"><input type="text" name="pto"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fieldKey">Date From:</td>
                                                                        <td class="fieldValue"><input type="text" onfocus="RemoveFormatString(this, \'mm/dd/yyyy\')" value="mm/dd/yyyy" name="dfrom"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fieldKey">Date To:</td>
                                                                        <td class="fieldValue"><input type="text" onfocus="RemoveFormatString(this, \'mm/dd/yyyy\')" value="mm/dd/yyyy" name="dto"></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>';
?>

