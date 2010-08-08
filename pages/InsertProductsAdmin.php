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
<form onsubmit="return check_form(themdochoi);" method="post" action="" enctype="multipart/form-data" name="themdochoi">
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
                                <td><input type="image" name="ok" title=" Continue " alt="Continue" src="template/images/english/button_continue.gif"></td>
                            </tr>
                        </tbody></table>

                </td></tr>
        </tbody></table>
</form>
';
///xu li ma san pham tang tu dong

    $q = "SELECT MaDoChoi FROM dochoi ORDER BY MaDoChoi";
    $rs = MySQLHelper::executeQuery($q);
    $num = 0;
    while($m=mysql_fetch_assoc($rs)){
        $t = intval(substr($m['MaDoChoi'], 2));
        if($t != $num){
            break;
        }
        $num++;
    }
    //Quy định chữ đầu của MaDoChoi; nếu csdl đầy có thể đổi sau
    $maNew = "SP";

    if(strlen($num)==1){
        $maNew .="000".$num;
    }else if(strlen($num)==2){
        $maNew .="00".$num;
    }else if(strlen($num)==3){
        $maNew .="0".$num;
    }else if(strlen($num)==4){
        $maNew .=$num;
    }else{
        $ThongBao = "Số lượng sản phẩm đã vượt wá mức lưu trữ";
    }
    echo $maNew;

    //Xu li gia tri sau khi post
    $tendochoi= $_POST['tendochoi'];
    $maloaidochoi=  $_POST['loaidochoi'];
    $masanxuat =  $_POST['nhasanxuat'];
    $giaban= $_POST['giaban'];
    $thongtin = $_POST['thongtin'];

    $tenfile =$_FILES['file_upload']['name'];
    $cofile =$_FILES['file_upload']['size']/1024;
    $loaifile =$_FILES['file_upload']['type'];
    $choluufiletam =$_FILES['file_upload']['tmp_name'];
    $loiupload = $_FILES["file_upload"]["error"];
    $ngaycapnhat= date("Y-m-d");

    if ( !isset($loiupload) || $loiupload != 0 ) {
           $Temp.="Lỗi trong quá trình upload";
    }else{
        if ( $cofile >100 ) {
        //thông báo lỗi
            $Temp.="Kích thướt file quá lớn";
        }else{
            $tam = preg_split('/[\/\\\\]-/', $tenfile);
            $filename = $tam[count($tam)-1];
            // kiem tra co phai la file anh ko?
            if ( !preg_match('/\.(gif|jpg)$/i',$filename)) {
                    $Temp.="File không phải là dạng GIF hoặc JPG";
            }else{
                    if(preg_match('/\.(gif)$/i',$filename))
                    {
                        $tenhinhmoi = $maNew.".gif";
                    }else if(preg_match('/\.(jpg)$/i',$filename))
                    {
                        $tenhinhmoi = $maNew.".jpg";
                    }
                    $upload_file = "".$tenhinhmoi;
                    if ( move_uploaded_file($_FILES["file_upload"]["tmp_name"], $upload_file) ) {
                      //////file đã được upload và thư mục lưu trữ thành công
                            $truyvan = sprintf("INSERT INTO dochoi (MaDoChoi, TenDoChoi, MaLoai, MaNSX, DonGia, ThongTin, HinhAnh,NgayNhap) VALUES ('%s', '%s',%d, %d, '%s', '%s', '%s', '%s')",$maNew,$tendochoi,$maloaidochoi,$masanxuat,$giaban,$thongtin,$tenhinhmoi,$ngaycapnhat);
                            $kq = MySQLHelper::executeQuery($truyvan);
                            if($kq==1){
                                 $Temp.="Thêm đồ chơi thành công";
                            }else{
                                $Temp.="Thêm thất bại";
                            }
                    } else {
                        $Temp.="Quá trình thêm thất bại";
                    }
            }

    
        }
    }



/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý đồ chơi - Thêm đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
