<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$truyvan = "SELECT* FROM loaidochoi";
$kq = MySQLHelper::executeQuery($truyvan);
$sql = "SELECT* FROM nhasanxuat";
$result = MySQLHelper::executeQuery($sql);


$Temp='<script language="javascript">
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
    function check_comboldc(field_name,message) {
            var field_value = form.elements[field_name].value;
            if (field_value == "keyldc") {
                error_message = error_message + "* " + message + "\n";
                error = true;
            }
        }
        function check_combonsx(field_name,message) {
            var field_value = form.elements[field_name].value;
            if (field_value == "keynsx") {
                error_message = error_message + "* " + message + "\n";
                error = true;
            }
        }

       

function check_form(form_name) {
    if (submitted == true) {
        alert("Thông tin đăng kí đã được gởi. Vui lòng đợi trong giây lát.");
        return false;
    }

    error = false;
    form = form_name;
    error_message = "Có lỗi đã xảy ra trong quá trình đăng kí.\n\nVui lòng kiểm tra nhưng thông tin sau:\n\n";
    check_comboldc("loaidochoi","Bạn phải chọn loại đồ chơi");
    check_combonsx("nhasanxuat","Bạn phải chọn nhà sản xuất");
    check_input("tendochoi",3, "Họ tên ít nhất 2 ký tự .");
    check_input("giaban",3, "Giá bán ít nhất 3 ký tự .");

    if (error == true) {
        alert(error_message);
        return false;
    } else {
        submitted = true;
        return true;
    }
}



</script>
<form onsubmit="return check_form(themdochoi);" method="post" action="index.php?action=InsertAdminManage" enctype="multipart/form-data" name="themdochoi">
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tbody><tr>
                <td class="main indent_2"><b>Thông tin sản phẩm:</b></td>
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
                                                    <td class="main b_width"><strong>Tên đồ chơi:</strong></td>
                                                     <td class="main width2_100"><input type="text" name="tendochoi" /><span class="inputRequirement">*
                                                    </span></td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Loại đồ chơi:</strong></td>
                                                    <td class="main width2_100">
                                                    <select name="loaidochoi">
                                                                   <option value="keyldc" SELECTED>Vui lòng chọn</option>';
                                                                   while($mang = mysql_fetch_array($kq)) {
                                                                    $ldc = new CLoaiDoChoi();
                                                                    $ldc->setMaLoai($mang['MaLoai']);
                                                                    $ldc->setTenLoai($mang['TenLoai']);
                                                                    $Temp.= $ldc->View(2);
                                                                  
                                                                    }

                                                    $Temp.='
                                              </select><span class="inputRequirement">*</span></td>
                                                </tr>

                                                <tr>
                                                    <td class="main b_width"><strong>Nhà sản xuất</strong></td>
                                                    <td class="main width2_100">
                                                    <select name="nhasanxuat">
                                                    <option value="keynsx" SELECTED>Vui lòng chọn</option>';
                                                    while($row = mysql_fetch_array($result)) {
                                                    $nsx = new CNhaSanXuat();
                                                    $nsx->setMaNSX($row['MaNSX']);
                                                    $nsx->setTenNSX($row['TenNSX']);
                                                    $Temp.= $nsx->View();
                                                    }
                                                    $Temp.='
                                                    </select><span class="inputRequirement">*</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Đơn giá bán:</strong></td>
                                                    <td class="main width2_100"><input type="text" name="giaban">
                                                    &nbsp;<span class="inputRequirement">*</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Thông tin:</strong></td>
                                                    <td class="main width2_100"><input type="text" name="thongtin">
                                                    &nbsp;</td>
                                                </tr>

                                                <tr>
                                                    <td class="main b_width"><strong>Upload Hình:</strong></td>
                                                    <td class="main width2_100"><input name="file_upload" type="file" /></td>
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
    <table cellspacing="5" cellpadding="0" border="0">
        <tbody><tr><td>
                    <table width="100%" cellspacing="0" cellpadding="2" border="0">
                        <tbody><tr>
                                <td><a href="index.php?action=QuanLyDoChoi"><img width="71" height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a></td>
                                <td><input type="image" name="submit" title="Continue" alt="Continue" src="template/images/english/button_continue.gif"></td>
                            </tr>
                        </tbody></table>

                </td></tr>
        </tbody></table>
</form>
';


/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý đồ chơi - Thêm đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
