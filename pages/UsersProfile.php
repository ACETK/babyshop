<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
////////load du lieu
$bientam= $_SESSION['TenTaiKhoan'];
$sql = "SELECT * FROM nguoidung WHERE TenTaiKhoan = '$bientam'";
$result = MySQLHelper::executeQuery($sql);
$row = mysql_fetch_array($result);
////////////
$hoten= $row['TenNguoiDung'];
$matkhau = $row['MatKhau'];
$ngaysinh = $row['NgaySinh'];
/////ngay thang////
$thang1 = substr($ngaysinh,5,2);
$ngay1 = substr($ngaysinh,8,2);
$nam1 = substr($ngaysinh,0,4);
$ntn1 =  $ngay1."/".$thang1."/".$nam1;
$gioitinh = $row['GioiTinh'];
$dienthoai = $row['DienThoai'];
$diachi = $row['DiaChi'];
$email = $row['Email'];



//////////////xuli radio button
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



//////////////////////////
//////////////////////////
$Temp="";
$Temp.='
    <script language="javascript"><!--
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
        error_message = "Sai sót trong quá trình sửa thông tin của bạn.\n\nVui lòng kiểm tra những chỗ như sau:\n\n";
        check_radio("gender", "Xin vui lòng nhấn vào nút giới tính.");
        check_input("hoten", 2, "Họ và tên ít nhất 5 ký tự");
        check_input("dob", 10, ": Bạn phải đinh dạng ngày sinh theo mẫu DD/MM/YYYY (VD: 05/21/1970)");
        check_input("email_address", 6, "Địa chỉ mail ý nhất 6 ký tự");

        check_input("diachi", 5, "Địa chỉ ít nhất 5 ký tự");
        check_input("telephone", 9, "Quý khách vui lòng nhập điện thoại để chúng tôi có thể giao hàng. Điện thoại ít nhất 9 kí tự");
        check_password("matkhaucu", "confirmation1", 0,"", "Mật khẩu cũ không đúng");
        check_password("password", "confirmation", 5, "Mật khẩu ít nhất 5 ký tự", "Mật khẩu không giống nhau");
        check_password_new("password_current", "password_new", "password_confirmation", 5, "Mật khẩu ít nhất 5 ký tự", "Mật khẩu xác nhận ít nhất 5 ký tự", "Mật khẩu xác nhận phải giống mật khẩu ban đầu");

        if (error == true) {
            alert(error_message);
            return false;
        } else {
            submitted = true;
            return true;
        }
    }
    //--></script>
    <form onsubmit="return check_form(create_account);" method="post" action="" name="create_account"><input type="hidden" value="process" name="action">
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
            <tr>
                <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tbody><tr>
                <td class="main indent_2"><b>Thông tin cá nhân:</b></td>

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
                                                    <td class="main radio" >
                                                    <input type="radio" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="Nam" name="gender" '.$Nam.' > Nam
                                                    <input type="radio" style="background: url(&quot;images/spacer.gif&quot;) repeat scroll 0px 0px transparent; border: 0px none;" value="Nữ" name="gender" '.$Nu.'> Nữ</td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Họ và tên:</strong></td>
                                                    <td class="main width2_100"><input type="text" name="hoten" value="'.$hoten.'"></td>
                                                </tr>

                                                <tr>
                                                    <td class="main b_width"><strong>Ngày sinh:</strong></td>
                                                    <td class="main width2_100"><input type="text" name="dob" value="'.$ntn1.'">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>E-Mail :</strong></td>
                                                  <td class="main width2_100"><input type="text" name="email_address" value="'.$email.'">&nbsp;</td>
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
                                                    <td class="main width2_100"><input type="text" name="telephone" value="'.$dienthoai.'">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Địa chỉ:</strong></td>
                                                    <td class="main width2_100"><input type="text" name="diachi" value="'.$diachi.'">&nbsp;</td>
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
                                                    <td class="main b_width"><strong>Mật khẩu cũ:</strong></td>
                                                    <td class="main width2_100"><input type="password" name="matkhaucu">&nbsp;<span class="inputRequirement">*</span></td>
                                                    <td class="main width2_100"><input type="password" maxlength="40" name="confirmation1" value="'.$matkhau.'" style="visibility: hidden"></td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Mật khẩu mới:</strong></td>
                                                    <td class="main width2_100"><input type="password" maxlength="40" name="password">
                                                    &nbsp;<span class="inputRequirement">*</span></td>

                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Nhập lại mật khẩu mới:</strong></td>
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
                                <td><input type="submit" name="Luu" Cập nhật " alt="Cập nhật" value="Lưu"></td>
                                <td><a href="index.php?action=Home"><input type="button" title=" Hủy " alt="Hủy" value="Hủy"></a></td>
                            </tr>
                        </tbody></table>

                </td></tr>
        </tbody></table>
</form>
    ';
////lay du lieu tu trang tao tk///////////

if(isset ($_POST['Luu']) && isset ($_POST['hoten']) && isset ($_POST['password']) && isset ($_POST['dob']) && isset ($_POST['gender']) && isset ($_POST['diachi']) && isset ($_POST['telephone']) && isset ($_POST['email_address']) ){
    $ht=$_POST['hoten'];
    $mk=$_POST['password'];
    $ns=$_POST['dob'];
    $gt=$_POST['gender'];
    $dc=$_POST['diachi'];
    $dt=$_POST['telephone'];
    $em=$_POST['email_address'];
    /////////////
    $thang2 = substr($ns,3,2);
    $ngay2 = substr($ns,0,2);
    $nam2 = substr($ns,6,4);
    ///////////////////////
    $ntn2 =  $nam2."-".$thang2."-".$ngay2;
    $sql1 = sprintf("UPDATE nguoidung SET TenNguoiDung = '%s',MatKhau='%s',NgaySinh='%s',
    GioiTinh='%s',DiaChi='%s',DienThoai='%s',Email='%s' WHERE TenTaiKhoan = '%s'",$ht,$mk,$ntn2,$gt,$dc,$dt,$em,$bientam);
    $kq = MySQLHelper::executeQuery($sql1);
    if($kq==true){
        $Temp="";
        $Temp.="Lưu thông tin thành công";
      }
}
///////////////////////////

/** Khởi tạo content */
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Hiệu chỉnh thông tin $bientam ");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
