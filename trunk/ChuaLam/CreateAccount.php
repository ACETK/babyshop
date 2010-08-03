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
    //--></script>
<form onsubmit="return check_form(create_account);" method="post" action="index.php?action=CreateAccount" name="create_account"><input type="hidden" value="process" name="action">
    <div class="cont_heading_tl">
    <div class="cont_heading_tr">
        <div class="cont_heading_t"></div>
    </div>
</div>
<div class="cont_heading_l">
    <div class="cont_heading_r">
        <div class="cont_heading_c">
            <table cellspacing="0" cellpadding="0" border="0" class="cont_heading_table">
                <tbody><tr>
                        <td class="cont_heading_td">My Account Information</td>
                    </tr></tbody>
            </table>
        </div>
    </div>
</div>
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
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                    <td class="smallText"><br><font color="#ff0000"><small><b>NOTE:</b></small></font><small></small> If you already have an account with us, please login at the <a href="index.php?action=LogIn"><u>login page</u></a>.</td>
                                </tr>
                                <tr>
                                    <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="2" border="0">
                            <tbody><tr>
                                    <td class="main indent_2"><b>Your Personal Details</b></td>
                                    <td align="right" class="inputRequirement">* Required information</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table cellspacing="4" cellpadding="2" border="0">
                                                                <tbody><tr>
                                                                        <td class="main b_width"><strong>Gender:</strong></td>
                                                                        <td class="main radio"><input type="radio" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="m" name="gender"> Male <input type="radio" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="f" name="gender"> Female&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>First Name:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="firstname">&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>Last Name:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="lastname">&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>Date of Birth:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="dob">&nbsp;<span class="inputRequirement">* (eg. 05/21/1970)</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>E-Mail Address:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="email_address">&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                </tbody>
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

                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                    <td class="main indent_2"><b>Company Details</b></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table cellspacing="4" cellpadding="2" border="0">
                                                                <tbody><tr>
                                                                        <td class="main b_width"><strong>Company Name:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="company">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
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

                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                    <td class="main indent_2"><b>Your Address</b></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table cellspacing="4" cellpadding="2" border="0">
                                                                <tbody><tr>
                                                                        <td class="main b_width"><strong>Street Address:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="street_address">&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>Suburb:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="suburb">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>Post Code:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="postcode">&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>City:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="city">&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>State/Province:</strong></td>
                                                                        <td class="main width2_100">
                                                                            <input type="text" name="state">&nbsp;<span class="inputRequirement">*                </span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>Country:</strong></td>
                                                                        <td class="main width2_100">
                                                                            <select name="country">
                                                                                <option selected="" value="">Please Select</option>
                                                                                <option value="1">Afghanistan</option>
                                                                                <option value="2">Albania</option>
                                                                                <option value="3">Algeria</option>
                                                                                <option value="4">American Samoa</option>
                                                                                <option value="5">Andorra</option>
                                                                                <option value="6">Angola</option>
                                                                                <option value="7">Anguilla</option>
                                                                                <option value="8">Antarctica</option>
                                                                                <option value="9">Antigua and Barbuda</option>
                                                                                <option value="10">Argentina</option>
                                                                                <option value="11">Armenia</option>
                                                                                <option value="12">Aruba</option>
                                                                                <option value="13">Australia</option>
                                                                                <option value="14">Austria</option>
                                                                                <option value="15">Azerbaijan</option>
                                                                                <option value="16">Bahamas</option>
                                                                                <option value="17">Bahrain</option>
                                                                                <option value="18">Bangladesh</option>
                                                                                <option value="19">Barbados</option>
                                                                                <option value="20">Belarus</option>
                                                                                <option value="21">Belgium</option>
                                                                                <option value="22">Belize</option>
                                                                                <option value="23">Benin</option>
                                                                                <option value="24">Bermuda</option>
                                                                                <option value="25">Bhutan</option>
                                                                                <option value="26">Bolivia</option>
                                                                                <option value="27">Bosnia and Herzegowina</option>
                                                                                <option value="28">Botswana</option>
                                                                                <option value="29">Bouvet Island</option>
                                                                                <option value="30">Brazil</option>
                                                                                <option value="31">British Indian Ocean Territory</option>
                                                                                <option value="32">Brunei Darussalam</option>
                                                                                <option value="33">Bulgaria</option>
                                                                                <option value="34">Burkina Faso</option>
                                                                                <option value="35">Burundi</option>
                                                                                <option value="36">Cambodia</option>
                                                                                <option value="37">Cameroon</option>
                                                                                <option value="38">Canada</option>
                                                                                <option value="39">Cape Verde</option>
                                                                                <option value="40">Cayman Islands</option>
                                                                                <option value="41">Central African Republic</option>
                                                                                <option value="42">Chad</option>
                                                                                <option value="43">Chile</option>
                                                                                <option value="44">China</option>
                                                                                <option value="45">Christmas Island</option>
                                                                                <option value="46">Cocos (Keeling) Islands</option>
                                                                                <option value="47">Colombia</option>
                                                                                <option value="48">Comoros</option>
                                                                                <option value="49">Congo</option>
                                                                                <option value="50">Cook Islands</option>
                                                                                <option value="51">Costa Rica</option>
                                                                                <option value="52">Cote D\'Ivoire</option>
                                                                                <option value="53">Croatia</option>
                                                                                <option value="54">Cuba</option>
                                                                                <option value="55">Cyprus</option>
                                                                                <option value="56">Czech Republic</option>
                                                                                <option value="57">Denmark</option>
                                                                                <option value="58">Djibouti</option>
                                                                                <option value="59">Dominica</option>
                                                                                <option value="60">Dominican Republic</option>
                                                                                <option value="61">East Timor</option>
                                                                                <option value="62">Ecuador</option>
                                                                                <option value="63">Egypt</option>
                                                                                <option value="64">El Salvador</option>
                                                                                <option value="65">Equatorial Guinea</option>
                                                                                <option value="66">Eritrea</option>
                                                                                <option value="67">Estonia</option>
                                                                                <option value="68">Ethiopia</option>
                                                                                <option value="69">Falkland Islands (Malvinas)</option>
                                                                                <option value="70">Faroe Islands</option>
                                                                                <option value="71">Fiji</option>
                                                                                <option value="72">Finland</option>
                                                                                <option value="73">France</option>
                                                                                <option value="74">France, Metropolitan</option>
                                                                                <option value="75">French Guiana</option>
                                                                                <option value="76">French Polynesia</option>
                                                                                <option value="77">French Southern Territories</option>
                                                                                <option value="78">Gabon</option>
                                                                                <option value="79">Gambia</option>
                                                                                <option value="80">Georgia</option>
                                                                                <option value="81">Germany</option>
                                                                                <option value="82">Ghana</option>
                                                                                <option value="83">Gibraltar</option>
                                                                                <option value="84">Greece</option>
                                                                                <option value="85">Greenland</option>
                                                                                <option value="86">Grenada</option>
                                                                                <option value="87">Guadeloupe</option>
                                                                                <option value="88">Guam</option>
                                                                                <option value="89">Guatemala</option>
                                                                                <option value="90">Guinea</option>
                                                                                <option value="91">Guinea-bissau</option>
                                                                                <option value="92">Guyana</option>
                                                                                <option value="93">Haiti</option>
                                                                                <option value="94">Heard and Mc Donald Islands</option>
                                                                                <option value="95">Honduras</option>
                                                                                <option value="96">Hong Kong</option>
                                                                                <option value="97">Hungary</option>
                                                                                <option value="98">Iceland</option>
                                                                                <option value="99">India</option>
                                                                                <option value="100">Indonesia</option>
                                                                                <option value="101">Iran (Islamic Republic of)</option>
                                                                                <option value="102">Iraq</option>
                                                                                <option value="103">Ireland</option>
                                                                                <option value="104">Israel</option>
                                                                                <option value="105">Italy</option>
                                                                                <option value="106">Jamaica</option>
                                                                                <option value="107">Japan</option>
                                                                                <option value="108">Jordan</option>
                                                                                <option value="109">Kazakhstan</option>
                                                                                <option value="110">Kenya</option>
                                                                                <option value="111">Kiribati</option>
                                                                                <option value="112">Korea, Democratic People\'s Republic of</option>
                                                                                <option value="113">Korea, Republic of</option>
                                                                                <option value="114">Kuwait</option>
                                                                                <option value="115">Kyrgyzstan</option>
                                                                                <option value="116">Lao People\'s Democratic Republic</option>
                                                                                <option value="117">Latvia</option>
                                                                                <option value="118">Lebanon</option>
                                                                                <option value="119">Lesotho</option>
                                                                                <option value="120">Liberia</option>
                                                                                <option value="121">Libyan Arab Jamahiriya</option>
                                                                                <option value="122">Liechtenstein</option>
                                                                                <option value="123">Lithuania</option>
                                                                                <option value="124">Luxembourg</option>
                                                                                <option value="125">Macau</option>
                                                                                <option value="126">Macedonia, The Former Yugoslav Republic of</option>
                                                                                <option value="127">Madagascar</option>
                                                                                <option value="128">Malawi</option>
                                                                                <option value="129">Malaysia</option>
                                                                                <option value="130">Maldives</option>
                                                                                <option value="131">Mali</option>
                                                                                <option value="132">Malta</option>
                                                                                <option value="133">Marshall Islands</option>
                                                                                <option value="134">Martinique</option>
                                                                                <option value="135">Mauritania</option>
                                                                                <option value="136">Mauritius</option>
                                                                                <option value="137">Mayotte</option>
                                                                                <option value="138">Mexico</option>
                                                                                <option value="139">Micronesia, Federated States of</option>
                                                                                <option value="140">Moldova, Republic of</option>
                                                                                <option value="141">Monaco</option>
                                                                                <option value="142">Mongolia</option>
                                                                                <option value="143">Montserrat</option>
                                                                                <option value="144">Morocco</option>
                                                                                <option value="145">Mozambique</option>
                                                                                <option value="146">Myanmar</option>
                                                                                <option value="147">Namibia</option>
                                                                                <option value="148">Nauru</option>
                                                                                <option value="149">Nepal</option>
                                                                                <option value="150">Netherlands</option>
                                                                                <option value="151">Netherlands Antilles</option>
                                                                                <option value="152">New Caledonia</option>
                                                                                <option value="153">New Zealand</option>
                                                                                <option value="154">Nicaragua</option>
                                                                                <option value="155">Niger</option>
                                                                                <option value="156">Nigeria</option>
                                                                                <option value="157">Niue</option>
                                                                                <option value="158">Norfolk Island</option>
                                                                                <option value="159">Northern Mariana Islands</option>
                                                                                <option value="160">Norway</option>
                                                                                <option value="161">Oman</option>
                                                                                <option value="162">Pakistan</option>
                                                                                <option value="163">Palau</option>
                                                                                <option value="164">Panama</option>
                                                                                <option value="165">Papua New Guinea</option>
                                                                                <option value="166">Paraguay</option>
                                                                                <option value="167">Peru</option>
                                                                                <option value="168">Philippines</option>
                                                                                <option value="169">Pitcairn</option>
                                                                                <option value="170">Poland</option>
                                                                                <option value="171">Portugal</option>
                                                                                <option value="172">Puerto Rico</option>
                                                                                <option value="173">Qatar</option>
                                                                                <option value="174">Reunion</option>
                                                                                <option value="175">Romania</option>
                                                                                <option value="176">Russian Federation</option>
                                                                                <option value="177">Rwanda</option>
                                                                                <option value="178">Saint Kitts and Nevis</option>
                                                                                <option value="179">Saint Lucia</option>
                                                                                <option value="180">Saint Vincent and the Grenadines</option>
                                                                                <option value="181">Samoa</option>
                                                                                <option value="182">San Marino</option>
                                                                                <option value="183">Sao Tome and Principe</option>
                                                                                <option value="184">Saudi Arabia</option>
                                                                                <option value="185">Senegal</option>
                                                                                <option value="186">Seychelles</option>
                                                                                <option value="187">Sierra Leone</option>
                                                                                <option value="188">Singapore</option>
                                                                                <option value="189">Slovakia (Slovak Republic)</option>
                                                                                <option value="190">Slovenia</option>
                                                                                <option value="191">Solomon Islands</option>
                                                                                <option value="192">Somalia</option>
                                                                                <option value="193">South Africa</option>
                                                                                <option value="194">South Georgia and the South Sandwich Islands</option>
                                                                                <option value="195">Spain</option>
                                                                                <option value="196">Sri Lanka</option>
                                                                                <option value="197">St. Helena</option>
                                                                                <option value="198">St. Pierre and Miquelon</option>
                                                                                <option value="199">Sudan</option>
                                                                                <option value="200">Suriname</option>
                                                                                <option value="201">Svalbard and Jan Mayen Islands</option>
                                                                                <option value="202">Swaziland</option>
                                                                                <option value="203">Sweden</option>
                                                                                <option value="204">Switzerland</option>
                                                                                <option value="205">Syrian Arab Republic</option>
                                                                                <option value="206">Taiwan</option>
                                                                                <option value="207">Tajikistan</option>
                                                                                <option value="208">Tanzania, United Republic of</option>
                                                                                <option value="209">Thailand</option>
                                                                                <option value="210">Togo</option>
                                                                                <option value="211">Tokelau</option>
                                                                                <option value="212">Tonga</option>
                                                                                <option value="213">Trinidad and Tobago</option>
                                                                                <option value="214">Tunisia</option>
                                                                                <option value="215">Turkey</option>
                                                                                <option value="216">Turkmenistan</option>
                                                                                <option value="217">Turks and Caicos Islands</option>
                                                                                <option value="218">Tuvalu</option>
                                                                                <option value="219">Uganda</option>
                                                                                <option value="220">Ukraine</option>
                                                                                <option value="221">United Arab Emirates</option>
                                                                                <option value="222">United Kingdom</option>
                                                                                <option value="223">United States</option>
                                                                                <option value="224">United States Minor Outlying Islands</option>
                                                                                <option value="225">Uruguay</option>
                                                                                <option value="226">Uzbekistan</option>
                                                                                <option value="227">Vanuatu</option>
                                                                                <option value="228">Vatican City State (Holy See)</option>
                                                                                <option value="229">Venezuela</option>
                                                                                <option value="230">Viet Nam</option>
                                                                                <option value="231">Virgin Islands (British)</option>
                                                                                <option value="232">Virgin Islands (U.S.)</option>
                                                                                <option value="233">Wallis and Futuna Islands</option>
                                                                                <option value="234">Western Sahara</option>
                                                                                <option value="235">Yemen</option>
                                                                                <option value="236">Yugoslavia</option>
                                                                                <option value="237">Zaire</option>
                                                                                <option value="238">Zambia</option>
                                                                                <option value="239">Zimbabwe</option>
                                                                            </select>&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                </tbody>
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
                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                    <td class="main indent_2"><b>Your Contact Information</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wrapper_pic2_t infoBox_">
                            <div class="wrapper_pic2_r">
                                <div class="wrapper_pic2_b">
                                    <div class="wrapper_pic2_l">
                                        <div class="wrapper_pic2_tl s_width2_100">
                                            <div class="wrapper_pic2_tr">
                                                <div class="wrapper_pic2_bl">
                                                    <div class="wrapper_pic2_br wrapper_pic2_padd">
                                                        <div class="s_width2_100">
                                                            <table cellspacing="4" cellpadding="2" border="0">
                                                                <tbody><tr>
                                                                        <td class="main b_width"><strong>Telephone Number:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="telephone">&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>Fax Number:</strong></td>
                                                                        <td class="main width2_100"><input type="text" name="fax">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
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
                                                            <table cellspacing="4" cellpadding="2" border="0">
                                                                <tbody><tr>
                                                                        <td class="main b_width"><strong>Newsletter:</strong></td>
                                                                        <td class="main radio"><input type="checkbox" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="1" name="newsletter">&nbsp;</td>
                                                                    </tr>
                                                                </tbody>
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
                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                    <td class="main indent_2"><b>Your Password</b></td>
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
                                                            <table cellspacing="4" cellpadding="2" border="0">
                                                                <tbody><tr>
                                                                        <td class="main b_width"><strong>Password:</strong></td>
                                                                        <td class="main width2_100"><input type="password" maxlength="40" name="password">&nbsp;<span class="inputRequirement">*</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="main b_width"><strong>Password Confirmation:</strong></td>
                                                                        <td class="main width2_100"><input type="password" maxlength="40" name="confirmation">&nbsp;<span class="inputRequirement">*</span></td>
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
                        <table cellspacing="5" cellpadding="0" border="0">
                            <tbody><tr><td>
                                        <table width="100%" cellspacing="0" cellpadding="2" border="0">
                                            <tbody><tr>
                                                    <td><input type="image" title=" Continue " alt="Continue" src="includes/languages/english/images/buttons/button_continue.gif"></td>
                                                </tr>
                                            </tbody></table>

                                    </td></tr>
                            </tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>';
echo $Temp;
?>