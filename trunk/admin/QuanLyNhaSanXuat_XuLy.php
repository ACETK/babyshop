<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'insert' || $_GET['action'] == 'update') {
        $check = "checked";
        if ($_GET['action'] == 'update') {
            $id = $_GET['id'];
            $sql = "SELECT * FROM nhasanxuat WHERE MaNSX =$id";
            $result = MySQLHelper::executeQuery($sql);
            $nsx = mysql_fetch_assoc($result);
            if($nsx['HienThi']==0){
                $check = "";
            }
            $TieuDe = "Cập nhật thông tin nhà sản xuất";
        } else {
            $nsx = null;
            $TieuDe = "Thêm mới nhà sản xuất";
        }

        $Temp = '<script type="text/javascript">
                    function check_form(form_name) {
                        if(form_name.tennsx.value.length<1){
                            alert("Tên nhà sản xuất ko được để trống");
                            return false;
                        }
                        return true;
                    }
                </script>
            <form onsubmit="return check_form(this);" method="post" action="" >
                <table cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr>
                            <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%" cellspacing="0" cellpadding="2" border="0">
                    <tbody><tr>
                            <td class="main indent_2"><b>Thông tin nhà sản xuất</b></td>
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
                                                                <td class="main b_width"><strong>Tên NSX:</strong></td>
                                                                <td class="main width2_100"><input type="text" name="tennsx" value="' . $nsx['TenNSX'] . '"/>
                                                                    <span class="inputRequirement">*</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Địa chỉ:</strong></td>
                                                                <td class="main width2_100"><input type="text" name="diachi" value="' . $nsx['DiaChi'] . '"/></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="main b_width"><strong>Điện thoại:</strong></td>
                                                                <td class="main width2_100"><input type="text" name="dienthoai" value="' . $nsx['DienThoai'] . '" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Email:</strong></td>
                                                                <td class="main width2_100"><input type="text" name="email" value="' . $nsx['Email'] . '"/></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Hiển thị ở trang chủ:</strong></td>
                                                                <td class="main width2_100"><input type="checkbox" name="HienThi" '.$check.'/></td>
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
                                            <td><a href="javascript:history.go(-1);"><img width="71" height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a></td>
                                            <td><input type="image" name="submit" title="Continue" alt="Continue" src="template/images/english/button_continue.gif"></td>
                                        </tr>
                                    </tbody></table>

                            </td></tr>
                    </tbody></table>
            </form>';
        if (isset($_POST['tennsx'])) {
            if(isset($_POST['HienThi'])){
                $check = '1';
            }else
                $check = '0';
            if ($_GET['action'] == 'update') {
                $sql = sprintf("UPDATE nhasanxuat SET TenNSX = '%s',DiaChi = '%s',DienThoai = '%s',Email = '%s', HienThi = '%s' 
                                WHERE MaNSX =%s", $_POST['tennsx'], $_POST['diachi'], $_POST['dienthoai'], $_POST['email'],$check, $_GET['id']);
            } else {
                $sql = sprintf("INSERT INTO nhasanxuat (TenNSX ,DiaChi ,DienThoai ,Email ,HienThi)
                            VALUES ('%s', '%s' , '%s' , '%s' , '%s')", $_POST['tennsx'], $_POST['diachi'], $_POST['dienthoai'], $_POST['email'],$check);
            }
            $result = MySQLHelper::executeQuery($sql);
            header('location:admin.php?page=QuanLyNhaSanXuat');
        }
    } else if ($_GET['action'] == 'delete') {
        $sql = "DELETE FROM nhasanxuat WHERE MaNSX={$_GET['id']}";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyNhaSanXuat');
    } else if ($_GET['action'] == 'show') {
        $sql = "UPDATE nhasanxuat SET HienThi=1 WHERE MaNSX={$_GET['id']}";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyNhaSanXuat');
    } else if ($_GET['action'] == 'hide') {
        $sql = "UPDATE nhasanxuat SET HienThi=0  WHERE MaNSX={$_GET['id']}";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=QuanLyNhaSanXuat');
    }
}
/** Khởi tạo content */
$ctpl = new XTemplate('template/incContentBoxAdmin.html');
$ctpl->assign('ContentTitle', $TieuDe);
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>