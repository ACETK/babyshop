<?php
$Temp = '<style type="text/css" >
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
                width:50px;
            }
        </style>

        <script type="text/javascript">
            function xacNhan(){
                var xacnhan = confirm("Bạn chắc chắn muốn xóa loại đồ chơi này chứ ?");
                if(xacnhan==true) return true;
                return false;
            }
            function capNhat(formname,tenloaiOLD){
                var TenLoaiNEW = prompt("Thay đổi tên loại đồ chơi:",tenloaiOLD);
                if(TenLoaiNEW == null || TenLoaiNEW == tenloaiOLD) return false;
                formname.TenLoai.value = TenLoaiNEW;
                return true;
            }
            function themMoi(formname){
                var TenLoai = prompt("Thêm mới tên loại đồ chơi:");
                if(TenLoai == null || TenLoai == "") return false;
                formname.TenLoai.value = TenLoai;
                return true;
            }
        </script>
    <table cellspacing="0" cellpadding="0" border="0" class="tableBox_shopping_cart main">
    <tbody>
        <tr><td colspan="6"><b>Chú ý:&nbsp; </b> Chỉ có thể xóa loại đồ chơi không chứa bất kì món đồ chơi nào.</td></tr>
        <tr>
            <td style=" color: blue; font-weight:bold;" align="center" class="loaiheader">STT</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">Loại đồ chơi</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td colspan="2" align="center" class="loaibutton">
                <form name="them" method="post" action="admin/QuanLyLoaiDoChoi_XuLy.php?action=insert" onsubmit="return themMoi(this);">
                    <input type="hidden" name="TenLoai" value="">
                    <input type="image" border="0" alt="Thêm mới" src="images/insert.png">
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
        </tr>';
$sql = "SELECT * FROM loaidochoi";
$result = MySQLHelper::executeQuery($sql);
$STT = 1;
while ($row = mysql_fetch_assoc($result)) {
    $Temp.='<tr>
            <td align="center" style="text-align:center; padding: 10px 0 0;">' . $STT . '</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="loainame"><a href="index.php?action=productslist&idloai='.$row['MaLoai'].'" >' . $row['TenLoai'] . '</a></td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="loaibutton">
                <form name="update' . $STT . '" method="post" action="admin/QuanLyLoaiDoChoi_XuLy.php?action=update" onsubmit="return capNhat(this,\'' . $row['TenLoai'] . '\');">
                  <input type="hidden" name="MaLoai" value="' . $row['MaLoai'] . '">
                  <input type="hidden" name="TenLoai" value="">
                  <input type="image" border="0" alt="Cập nhật" src="images/edit.png">
                </form>
            </td>';
    $sql = "SELECT maloai FROM dochoi WHERE maloai = {$row['MaLoai']}";
    $check = MySQLHelper::executeQuery($sql);
    if (mysql_num_rows($check) == false) {
        $Temp.='<td align="center" class="loaibutton">
                            <form name="delete' . $STT . '" method="post" action="admin/QuanLyLoaiDoChoi_XuLy.php?action=delete" onsubmit="return xacNhan();">
                              <input type="hidden" name="MaLoai" value="' . $row['MaLoai'] . '">
                              <input type="image" border="0" alt="Xóa" src="images/delete.png">
                            </form>
                       </td>';
    }

    $Temp.='</tr>
        <tr>
            <td colspan="6" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
        </tr>';
    $STT++;
}
$Temp.='<tr>
            <td colspan="6" style="text-align:right; padding:10px 0 0;" ><a href="javascript:history.go(-1);"><img border="0" alt="" src="template/images/english/button_back1.gif"></a></td>
        </tr>
     </tbody>
</table>';

/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBoxAdmin.html');
$ctpl->assign('ContentTitle', "Quản lý danh mục loại đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>