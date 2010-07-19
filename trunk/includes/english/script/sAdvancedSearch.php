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
    //--></script>';
?>
