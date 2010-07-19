<?php
$Temp="";
$Temp.='<script language="javascript"><!--
    var form = "";
    var submitted = false;
    var error = false;
    var error_message = "";

    function check_input(field_name, field_size, message) {
        if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
            var field_value = form.elements[field_name].value;

            if (field_value.length < field_size) {
                error_message = error_message + "* " + message + "\n";
                error = true;
            }
        }
    }

    function check_radio(field_name, message) {
        var isChecked = false;

        if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
            var radio = form.elements[field_name];

            for (var i=0; i<radio.length; i++) {
                if (radio[i].checked == true) {
                    isChecked = true;
                    break;
                }
            }

            if (isChecked == false) {
                error_message = error_message + "* " + message + "\n";
                error = true;
            }
        }
    }

    function check_select(field_name, field_default, message) {
        if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
            var field_value = form.elements[field_name].value;

            if (field_value == field_default) {
                error_message = error_message + "* " + message + "\n";
                error = true;
            }
        }
    }

    function check_password(field_name_1, field_name_2, field_size, message_1, message_2) {
        if (form.elements[field_name_1] && (form.elements[field_name_1].type != "hidden")) {
            var password = form.elements[field_name_1].value;
            var confirmation = form.elements[field_name_2].value;

            if (password.length < field_size) {
                error_message = error_message + "* " + message_1 + "\n";
                error = true;
            } else if (password != confirmation) {
                error_message = error_message + "* " + message_2 + "\n";
                error = true;
            }
        }
    }

    function check_password_new(field_name_1, field_name_2, field_name_3, field_size, message_1, message_2, message_3) {
        if (form.elements[field_name_1] && (form.elements[field_name_1].type != "hidden")) {
            var password_current = form.elements[field_name_1].value;
            var password_new = form.elements[field_name_2].value;
            var password_confirmation = form.elements[field_name_3].value;

            if (password_current.length < field_size) {
                error_message = error_message + "* " + message_1 + "\n";
                error = true;
            } else if (password_new.length < field_size) {
                error_message = error_message + "* " + message_2 + "\n";
                error = true;
            } else if (password_new != password_confirmation) {
                error_message = error_message + "* " + message_3 + "\n";
                error = true;
            }
        }
    }

    function check_form(form_name) {
        if (submitted == true) {
            alert("This form has already been submitted. Please press Ok and wait for this process to be completed.");
            return false;
        }

        error = false;
        form = form_name;
        error_message = "Errors have occured during the process of your form.\n\nPlease make the following corrections:\n\n";

        check_radio("gender", "Please select your Gender.");

        check_input("firstname", 2, "Your First Name must contain a minimum of 2 characters.");
        check_input("lastname", 2, "Your Last Name must contain a minimum of 2 characters.");

        check_input("dob", 10, "Your Date of Birth must be in this format: MM/DD/YYYY (eg 05/21/1970)");

        check_input("email_address", 6, "Your E-Mail Address must contain a minimum of 6 characters.");
        check_input("street_address", 5, "Your Street Address must contain a minimum of 5 characters.");
        check_input("postcode", 4, "Your Post Code must contain a minimum of 4 characters.");
        check_input("city", 3, "Your City must contain a minimum of 3 characters.");

        check_input("state", 2, "Your State must contain a minimum of 2 characters.");

        check_select("country", "", "You must select a country from the Countries pull down menu.");

        check_input("telephone", 3, "Your Telephone Number must contain a minimum of 3 characters.");

        check_password("password", "confirmation", 5, "Your Password must contain a minimum of 5 characters.", "The Password Confirmation must match your Password.");
        check_password_new("password_current", "password_new", "password_confirmation", 5, "Your Password must contain a minimum of 5 characters.", "Your new Password must contain a minimum of 5 characters.", "The Password Confirmation must match your new Password.");

        if (error == true) {
            alert(error_message);
            return false;
        } else {
            submitted = true;
            return true;
        }
    }
    //--></script>';
?>