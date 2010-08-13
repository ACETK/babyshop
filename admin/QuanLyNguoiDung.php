<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor...
 */

$sql = "SELECT* FROM nguoidung";
$kq = MySQLHelper::executeQuery($sql);
$Temp="";
$Temp.='

     <script type="text/javascript">
            function xacNhanXoa(){
                var xacnhan = confirm("Bạn chắc chắn muốn tài khoản này?");
                if(xacnhan==true) return true;
                return false;
            }
            function xacNhanHien(){
                var xacnhan = confirm("Tài khoản này sẽ được khởi tạo lại để sử dụng!");
                if(xacnhan==true) return true;
                return false;
            }
            function xacNhanAn(){
                var xacnhan = confirm("Tài khoản  này sẽ không được sử dụng nữa!");
                if(xacnhan==true) return true;
                return false;
            }
        </script>
        <style type="text/css" >
            .loaiheader{
                color: blue;
                font-weight: bold;
                vertical-align: middle;
                text-align: center;
            }
            .loainame{
                padding:0px 5px 0px 5px;
                text-align:center;
                vertical-align:middle;
            }
            .loaibutton{
                padding:5px 0px 5px 0px;
                text-align:center;
                vertical-align:middle;
            }
        </style>

    <table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tbody>
         <tr>
         <font color="#ff0000"><b>Chú ý:</b></font><small> Quản trị phải thêm dữ liệu loại đồ chơi và nhà sản xuất trước khi thêm đồ chơi.</small>
        </tr>
        <tr style="color: blue; font-weight:bold;" align="center" class="loaiheader">
                                                    <td><strong>STT</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td><strong>Tên tài khoản</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong >Tên người dùng</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Mật khẩu</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Ngày sinh</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Giới tính</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Địa chỉ</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Điện thoại</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Email</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Mã Loại</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td align="center" colspan="2"><a href="admin.php?page=ThemNguoiDung"><input type="image" name="insert" title="thêm" alt="thêm"  src="images/insert.png"></a></td>
                                                </tr>
                              <tr>
                            <td class="prod_line_x padd_gg" colspan="20"><img src="template/images/spacer.gif" border="0" alt="" width="1" height="1"></td>
                          </tr>';
                                               $a=1;
                                            while($mang = mysql_fetch_array($kq)) {
                                                    if($mang['TinhTrang']==1){
                                                        $Temp .= '<tr style="background-color:#ffd2d2;">';
                                                    }else
                                                    {
                                                     $Temp .= '<tr>';
                                                    }
                                               $Temp.='
                                                      <td>'.$a++.'</td>
                                                      <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                      <td>'.$mang['TenTaiKhoan'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['TenNguoiDung'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['MatKhau'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['NgaySinh'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['GioiTinh'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['DiaChi'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['DienThoai'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['Email'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['MaLoai'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td align="center" class="loaibutton">
                                                      <a href="admin.php?page=CapNhatNguoiDung&tentaikhoan='.$mang['TenTaiKhoan']. '" title="Cập nhật đồ chơi">
                                                      <input type="image" border="0" alt="Cập nhật" src="images/edit.png"></a>
                                                </td>
                                                ';
                                                $sql = "SELECT a.TenTaiKhoan FROM nguoidung a join hdxuat b on a.TenTaiKhoan=b.TenTaiKhoan Where a.TenTaiKhoan='{$mang['TenTaiKhoan']}'";
                                                $check = MySQLHelper::executeQuery($sql);
                                                if(mysql_num_rows($check)==false){
                                                            $Temp.='<td align="center" class="loaibutton">
                                                                          <a href="admin.php?page=XuLyNguoiDung&action=delete&tentaikhoan=' . $mang['TenTaiKhoan'] . '" title="Xóa khỏi CSDL" onclick="return xacNhanXoa();">
                                                                          <input type="image" border="0" alt="Xóa" src="images/delete.png"></a>
                                                                    </td>';
                                                        }else if($mang['TinhTrang']==0){
                                                            $Temp.='<td align="center" class="loaibutton">
                                                                          <a href="admin.php?page=XuLyNguoiDung&action=hide&tentaikhoan=' . $mang['TenTaiKhoan'] . '" title="Loại khỏi danh sách" onclick="return xacNhanAn();">
                                                                          <input type="image" border="0" alt="Ẩn" src="images/hide.png"></a>
                                                                    </td>';
                                                        }
                                                        else if($mang['TinhTrang']==1){
                                                            $Temp.='<td align="center" class="loaibutton">
                                                                          <a href="admin.php?page=XuLyNguoiDung&action=show&tentaikhoan=' . $mang['TenTaiKhoan'] . '" title="Đưa vào danh sách" onclick="return xacNhanHien();">
                                                                          <input type="image" border="0" alt="Hiện" src="images/show.png"></a>
                                                                    </td>';
                                                        }
                                            $Temp.='   <tr>
                            <td class="prod_line_x padd_gg" colspan="20"><img src="template/images/spacer.gif" border="0" alt="" width="1" height="1"></td>
                          </tr> ';
                                                }
                                                $Temp.='

                                            </tbody>
                                        </table>

    <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
    <table cellspacing="5" cellpadding="0" border="0">
        <tbody><tr>
                    <td><a href=""><img width="71" height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a></td>

                            </tr>

        </tbody></table>';
//////////



/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý người dùng");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>

