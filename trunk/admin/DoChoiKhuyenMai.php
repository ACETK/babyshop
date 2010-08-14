<?php
$Temp = '
    <script type="text/javascript"><!--
        function xacNhanXoa(){
            var xacnhan = confirm("Loại sản phẩm này khỏi danh sách khuyến mãi?");
            if(xacnhan==true) return true;
            return false;
        }
        function xacNhanXoaTatCa(){
            var xacnhan = confirm("Xóa tất cả các sản phẩm đang giảm giá?");
            if(xacnhan==true) return true;
            return false;
        }
        function phanTramGiamGia(formname){
            var PhanTram = prompt("Giảm toàn bộ bao nhiêu % ?");
            if(PhanTram == null || PhanTram == "") return false;
            formname.PhanTram.value = PhanTram;
            return true;
        }
        //-->
    </script>
    <style type="text/css" >
        <!--
        .loaiheader{
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
        //-->
    </style>
    <table>
        <tr><td style="width:40%;">
                <table width="" cellspacing="0" cellpadding="0" border="0" class="tableBox_shopping_cart main">
                    <tr><td colspan="7">Danh sách đồ chơi</td></tr>
                    <tr>
                        <td style="color: blue;" class="loaiheader">STT</td>
                        <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                        <td style="color: blue;" class="loaiheader">Tên đồ chơi</td>
                        <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                        <td style="color: blue;" class="loaiheader">Đơn giá</td>
                        <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                        <td align="center" class="loaibutton">
                            <form method="post" action="admin.php?page=DoChoiKhuyenMai_XuLy&action=insertall" onsubmit="return phanTramGiamGia(this);">
                                <input type="hidden" name="PhanTram" value="">
                                <input type="image" border="0" alt="Giảm tất cả theo %" title="Giảm tất cả theo %" src="images/saleall.png">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                    </tr>';
$sql = "SELECT MaDoChoi,TenDoChoi,DonGia,HinhAnh,MaNSX,SoLuong FROM dochoi WHERE TinhTrang=0 AND MaDoChoi NOT IN (SELECT MaDoChoi FROM khuyenmai)  ORDER BY TenDoChoi";
$result = MySQLHelper::executeQuery($sql);
$STT = 1;
while ($row = mysql_fetch_assoc($result)) {
    $sql = "SELECT TenNSX FROM nhasanxuat WHERE MaNSX={$row['MaNSX']}";
    $result_temp = MySQLHelper::executeQuery($sql);
    $nsx = mysql_fetch_assoc($result_temp);
    $popup_message_dc = "<b>Mã đồ chơi:</b> {$row['MaDoChoi']}<br/><b>Nhà sản xuất:</b> {$nsx['TenNSX']}<br/><b>Số lượng còn:</b> {$row['SoLuong']}<br/><hr width=180px /><img src=images/sanpham/{$row['HinhAnh']} width=200px >";

    $Temp.='<tr>
                <td align="center" style="text-align:center; padding: 10px 0 0;">' . $STT . '</td>
                <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                <td class="loainame" align="center" ><a href="index.php?action=detail&id=' . $row['MaDoChoi'] . '" onmouseover="popup(\''.$popup_message_dc.'\');" onmouseout="kill();">' . $row['TenDoChoi'] . '</a></td>
                <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                <td class="loainame" align="center" >' . number_format($row['DonGia']) . '</td>
                <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                <td align="center" class="loaibutton">
                    <a href="admin.php?page=DoChoiKhuyenMai_XuLy&action=insert&id=' . $row['MaDoChoi'] . '" title="Đưa vào ds giảm giá">
                    <input type="image" border="0" alt="Giảm giá" src="images/insert.png"></a>
                </td>
            </tr>';
    $Temp.='<tr>
                <td colspan="7" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            </tr>';
    $STT++;
}
$Temp.= '</table>
        </td>';

$Temp.= '<td style="padding: 0 5px 0 5px;">&nbsp;</td>';

$Temp.= '<td><table width="" cellspacing="0" cellpadding="0" border="0" class="tableBox_shopping_cart main">
                <tr><td colspan="7">Đồ chơi đang giảm giá</td></tr>
                <tr>
                    <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">STT</td>
                    <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                    <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">Tên đồ chơi</td>
                    <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                    <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">Giá cũ</td>
                    <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                    <td style="color: blue; font-weight:bold;" align="center" class="loaiheader">Giá đã giảm</td>
                    <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                    <td align="center" class="loaibutton" colspan="2">
                        <a href="admin.php?page=DoChoiKhuyenMai_XuLy&action=deleteall" title="Xóa toàn bộ" onclick="return xacNhanXoaTatCa();"><img border="0" alt="Xóa toàn bộ" src="images/unsaleall.png"></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="10" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                </tr>';
$sql = "SELECT km.MaDoChoi,TenDoChoi,dc.DonGia AS GiaCu,km.DonGia AS GiaKM,Banner,GhiChu FROM dochoi dc JOIN khuyenmai km ON dc.MaDoChoi=km.MaDoChoi WHERE TinhTrang=0  ORDER BY TenDoChoi";
$result = MySQLHelper::executeQuery($sql);
$STT = 1;
while ($row = mysql_fetch_assoc($result)) {
    $popup_message_km="<b>Mã dồ chơi:</b> {$row['MaDoChoi']}<br/><b>Ghi chú:</b>{$row['GhiChu']}<br/>";
    if(isset($row['Banner']) && $row['Banner'] !="" ) $popup_message_km .= "<img src=images/banners/{$row['Banner']} width=200px >";
    else $popup_message_km .= "Chưa có banner.";

    $Temp.='<tr>
                <td align="center" style="text-align:center; padding: 10px 0 0;">' . $STT . '</td>
                <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                <td class="loainame" align="center" ><a href="index.php?action=detail&id=' . $row['MaDoChoi'] . '" onmouseover="popup(\''.$popup_message_km.'\');" onmouseout="kill();" >' . $row['TenDoChoi'] . '</a></td>
                <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                <td class="loainame" align="center" >' . number_format($row['GiaCu']) . '</td>
                <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                <td class="loainame" align="center" >' . number_format($row['GiaKM']) . '</td>
                <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
                <td align="center" class="loaibutton">
                    <a href="admin.php?page=DoChoiKhuyenMai_XuLy&action=edit&id=' . $row['MaDoChoi'] . '" title="Cập nhật thông tin khuyến mãi">
                    <input type="image" border="0" alt="Sửa" src="images/edit.png"></a>
                </td>
                <td align="center" class="loaibutton">
                    <a href="admin.php?page=DoChoiKhuyenMai_XuLy&action=delete&id=' . $row['MaDoChoi'] . '" title="Xóa khỏi ds giảm giá" onclick="return xacNhanXoa();">
                    <input type="image" border="0" alt="Xóa" src="images/delete.png"></a>
                </td>
            </tr>';
    $Temp.='<tr>
                <td colspan="10" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            </tr>';
    $STT++;
}
$Temp.='</table>
        </td></tr>
</table>';

/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBoxAdmin.html');
$ctpl->assign('ContentTitle', "Quản lý danh mục đồ chơi đang được khuyến mãi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>