<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//load du lieu
$tentkcapnhat = $_GET['tentaikhoan'];
$sql = "SELECT* FROM nguoidung Where TenTaiKhoan='$tentkcapnhat'";
$res = MySQLHelper::executeQuery($sql);
$mangnd = mysql_fetch_array($res);
$gioitinh = $mangnd['GioiTinh'];
$ngaysinh = $mangnd['NgaySinh'];
/////ngay thang////
$thang1 = substr($ngaysinh,5,2);
$ngay1 = substr($ngaysinh,8,2);
$nam1 = substr($ngaysinh,0,4);
$ntn1 =  $ngay1."/".$thang1."/".$nam1;
if($gioitinh!=NULL){
    if($gioitinh=="Nam"){
        $Nam = "checked";
        $Nu="";
    }else{
        $Nu="checked";
        $Nam="";
    }
}else{
    $CNam="";
    $CNu= "";
}
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
    alert("Thông tin cập nhật đã được gởi. Vui lòng đợi trong giây lát.");
    return false;
}

error = false;
form = form_name;
error_message = "Có lỗi đã xảy ra trong quá trình đăng kí.\n\nVui lòng kiểm tra nhưng thông tin sau:\n\n";

check_radio("gender", "Xin vui lòng chọn giới tính.");

check_input("hoten", 2, "Họ tên ít nhất 2 ký tự .");

check_input("dob", 10, "Vui lòng nhập ngày sinh theo định dạng: MM/DD/YYYY (VD: 12/02/1970)");

check_input("email_address", 6, "Địa chỉ email ít nhất 6 ký tự.");
check_input("diachi", 5, "Địa chỉ ít nhất 5 ký tự");

check_input("telephone", 3, "Điện thoại ít nhất 3 kí tụ.");
check_input("taikhoan", 5, "Tài khoản ít nhất 5 ký tự .");
check_password("password", "confirmation", 5, "Mật khẩu ít nhất 5 ký tự", "Mật khẩu nhập lại phải giống mật khẩu ban đầu.");
check_password_new("password_current", "password_new", "password_confirmation", 5, "Mật khẩu cũ ít nhất 5 ký tự.", "Mật khẩu mới cũng ít nhất 5 ký tự.", "2 mật khẩu mới phải trùng nhau.");

if (error == true) {
    alert(error_message);
    return false;
} else {
    submitted = true;
    return true;
}
}

function toggle_pass(passid) {
if (window.XMLHttpRequest) {
    http = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    http = new ActiveXObject("Microsoft.XMLHTTP");
}
handle = document.getElementById(passid);
var url = "ajax_check_pass.php?";
if(handle.value.length > 0) {
    var fullurl = url + "do=check_password_strength&pass=" + encodeURIComponent(handle.value);
    http.open("GET", fullurl, true);
    http.send(null);
    http.onreadystatechange = statechange_password;
}else{
    document.getElementById("password_strength").innerHTML = "";
}
}

function statechange_password() {
if (http.readyState == 4) {
    var xmlObj = http.responseXML;
    var html = xmlObj.getElementsByTagName("result").item(0).firstChild.data;
    document.getElementById("password_strength").innerHTML = html;
}
}

//--></script>
<form onsubmit="return check_form(create_account);" method="post" action="" name="create_account"><input type="hidden" value="process">
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
                <td class="smallText"><br>
                    <font color="#ff0000"><small><b>Chú ý:</b></small></font><small></small> nếu bạn đã có tài khoản vui lòng đăng nhập ô bên phải.</td>
            </tr>
            <tr>
                <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tbody><tr>
                <td class="main indent_2"><b>Thông tin cá nhân:</b></td>
                <td align="right" class="inputRequirement">* Thông tin bắt buộc</td>
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
                                                    <td class="main b_width"><strong>Giới tính:</strong></td>
                                                    <td class="main radio"><input type="radio" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="Nam" name="gender" '.$Nam.'> Nam
                                                                            <input type="radio" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="Nữ" name="gender" '.$Nu.'> Nữ&nbsp;<span class="inputRequirement">*</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Họ và tên:</strong></td>
                                                    <td class="main width2_100"><input type="text" name="hoten" value="'.$mangnd['TenNguoiDung'].'">&nbsp;<span class="inputRequirement">*</span></td>
                                                </tr>

                                                <tr>
                                                    <td class="main b_width"><strong>Ngày sinh:</strong></td>
                                                    <td class="main width2_100"><input type="text" name="dob" value="'.$ntn1.'">&nbsp;<span class="inputRequirement">* (vd. 12/02/1970)</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>E-Mail :</strong></td>
                                                    <td class="main width2_100"><input type="text" value="'.$mangnd['Email'].'" name="email_address">&nbsp;<span class="inputRequirement">*</span></td>
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
                <td class="main indent_2"><b>Thông tin liên hệ:</b></td>
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
                                                    <td class="main b_width"><strong>Điện thoại:</strong></td>
                                                    <td class="main width2_100"><input type="text" value="'.$mangnd['DienThoai'].'" name="telephone">&nbsp;<span class="inputRequirement">*</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Địa chỉ:</strong></td>
                                                    <td class="main width2_100"><input type="text" value="'.$mangnd['DiaChi'].'" name="diachi">&nbsp;<span class="inputRequirement">*</span></td>
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


    <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
                <td class="main indent_2"><b>Thông tin tài khoản:</b></td>
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
                                            <tbody>
                                                <tr>
                                                    <td class="main b_width"><strong>Tên tài khoản:</strong></td>
                                                    <td class="main width2_100">'.$mangnd['TenTaiKhoan'].'</td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Mật khẩu:</strong></td>
                                                    <td class="main width2_100"><input type="password" maxlength="40" name="password">
                                                        &nbsp;<span class="inputRequirement">*</span></td>

                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Nhập lại mật khẩu:</strong></td>
                                                    <td class="main width2_100"><input type="password" maxlength="40" name="confirmation">&nbsp;<span class="inputRequirement">*</span></td>
                                                </tr>
                                                 <tr>
                                                    <td class="main b_width"><strong>Loại tài khoản:</strong></td>
                                                    <td class="main width2_100">
                                                    <select name="loaitaikhoan">';
                                                                    $maloaitk=$mangnd['MaLoai'];
                                                                    $sql = "SELECT* FROM nguoidung a join loaitaikhoan b on a.MaLoai=b.MaLoai where a.MaLoai='$maloaitk'";
                                                                    $res1 = MySQLHelper::executeQuery($sql);
                                                                    $array = mysql_fetch_assoc($res1);
                                                                   $Temp.= '<option value="'.$array['MaLoai'].'">'.$array['TenLoai'].'</option>';
                                                                    $sql = "SELECT* FROM loaitaikhoan where MaLoai<>'$maloaitk'";
                                                                    $res2 = MySQLHelper::executeQuery($sql);
                                                                    while($r = mysql_fetch_assoc($res2)) {
                                                                        $Temp.=' <option value="'.$r['MaLoai'].'">'.$r['TenLoai'].'</option>';

                                                                    }

                                                    $Temp.='
                                              </select>
                                              <span class="inputRequirement">*</span></td>
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
                        <td><a href="admin.php?page=QuanLyNguoiDung"><img width="71" height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a></td>
                                <td><input type="image" title=" Continue " alt="Continue" src="template/images/english/button_continue.gif"></td>
                            </tr>
                        </tbody></table>

                </td></tr>
        </tbody></table>
</form>
';

if(isset ($_POST['hoten']) ){
    $ht=$_POST['hoten'];
    $mk=$_POST['password'];
    $ns=$_POST['dob'];
    $gt=$_POST['gender'];
    $dc=$_POST['diachi'];
    $dt=$_POST['telephone'];
    $em=$_POST['email_address'];
    $m=$_POST['loaitaikhoan'];
    /////////////
    $thang2 = substr($ns,3,2);
    $ngay2 = substr($ns,0,2);
    $nam2 = substr($ns,6,4);
    ///////////////////////
    $ntn2 =  $nam2."-".$thang2."-".$ngay2;
    $sql1 = sprintf("UPDATE nguoidung SET TenNguoiDung = '%s',MatKhau='%s',NgaySinh='%s',
    GioiTinh='%s',DiaChi='%s',DienThoai='%s',Email='%s',MaLoai='%s' WHERE TenTaiKhoan = '%s'",$ht,$mk,$ntn2,$gt,$dc,$dt,$em,$m,$tentkcapnhat);
    $kq = MySQLHelper::executeQuery($sql1);
    if($kq==true){
        header('location:admin.php?page=QuanLyNguoiDung');
      }
      else{
                                    $Temp.="Cập nhật thất bại";
     }
}
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý người dùng - Cập nhật tài khoản");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>