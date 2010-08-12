<?php
$Temp = '<script type="text/javascript">
            function xacNhanXoa(){
                var xacnhan = confirm("Bạn chắc chắn muốn xóa nhà sản xuất này?");
                if(xacnhan==true) return true;
                return false;
            }
            function xacNhanHien(){
                var xacnhan = confirm("NSX này sẽ hiển thị trong danh sách ngoài trang chủ?");
                if(xacnhan==true) return true;
                return false;
            }
            function xacNhanAn(){
                var xacnhan = confirm("NSX này sẽ được loại khỏi danh sách ngoài trang chủ?");
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

<table width="" cellspacing="0" cellpadding="0" border="0" class="tableBox_shopping_cart main">
    <tbody>
        <tr><td colspan="12"><b>Chú ý:&nbsp; </b> Chỉ có thể xóa loại đồ chơi không chứa bất kì món đồ chơi nào.</td></tr>
        <tr>
            <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">STT</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">Tên NSX</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">Địa chỉ</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">Số điện thoại</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">Email</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td colspan="2" align="center" class="loaibutton">
                <a href="admin.php?page=QuanLyNhaSanXuat_XuLy&action=insert" title="Thêm nhà sản xuất"><img border="0" alt="Thêm mới" src="images/insert.png"></a>
            </td>
        </tr>
        <tr>
            <td colspan="12" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
        </tr>
';
$sql = "SELECT * FROM nhasanxuat";
$result = MySQLHelper::executeQuery($sql);
$STT = 1;
while ($row = mysql_fetch_assoc($result)) {
    if($row['HienThi']==0){
        $Temp .= '<tr style="background-color:#ffd2d2;">';
    }else{
        $Temp .= '<tr>';
    }
  $Temp .= '<td align="center" style="text-align:center; padding: 10px 0 0;">' . $STT . '</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td class="loainame" align="center" ><a href="index.php?action=productslist&idnsx=' . $row['MaNSX'] . '" >' . $row['TenNSX'] . '</a></td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td class="loainame" align="center" >&nbsp;' . $row['DiaChi'] . '</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td class="loainame" align="center" >&nbsp;' . $row['DienThoai'] . '</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td class="loainame" align="center" >&nbsp;' . $row['Email'] . '</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="loaibutton">
                  <a href="admin.php?page=QuanLyNhaSanXuat_XuLy&action=update&id=' . $row['MaNSX'] . '" title="Thêm NSX mới">
                  <input type="image" border="0" alt="Cập nhật" src="images/edit.png"></a>
            </td>';
            $sql = "SELECT MaNSX FROM dochoi WHERE MaNSX = {$row['MaNSX']}";
            $check = MySQLHelper::executeQuery($sql);
            if(mysql_num_rows($check)==false){
                $Temp.='<td align="center" class="loaibutton">
                              <a href="admin.php?page=QuanLyNhaSanXuat_XuLy&action=delete&id=' . $row['MaNSX'] . '" title="Xóa khỏi CSDL" onclick="return xacNhanXoa();">
                              <input type="image" border="0" alt="Xóa" src="images/delete.png"></a>
                        </td>';
            }else if($row['HienThi']==1){
                $Temp.='<td align="center" class="loaibutton">
                              <a href="admin.php?page=QuanLyNhaSanXuat_XuLy&action=hide&id=' . $row['MaNSX'] . '" title="Loại khỏi danh sách" onclick="return xacNhanAn();">
                              <input type="image" border="0" alt="Xóa" src="images/hide.png"></a>
                        </td>';
            }
            else if($row['HienThi']==0){
                $Temp.='<td align="center" class="loaibutton">
                              <a href="admin.php?page=QuanLyNhaSanXuat_XuLy&action=show&id=' . $row['MaNSX'] . '" title="Đưa vào danh sách" onclick="return xacNhanHien();">
                              <input type="image" border="0" alt="Xóa" src="images/show.png"></a>
                        </td>';
            }
    $Temp.='</tr>
        <tr>
            <td colspan="12" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
        </tr>';
    $STT++;
}
$Temp.='<tr>
            <td colspan="12" style="text-align:right; padding:10px 0 0;" ><a href="javascript:history.go(-1);"><img border="0" alt="" src="template/images/english/button_back1.gif"></a></td>
        </tr>
     </tbody>
</table>';

/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBoxAdmin.html');
$ctpl->assign('ContentTitle', "Quản lý danh mục nhà sản xuất");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>