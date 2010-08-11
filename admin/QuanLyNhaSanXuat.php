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
                <form name="them" method="post" action="admin.php?page=QuanLyNhaSanXuat_XuLy&action=insert">
                    <input type="hidden" name="TenLoai" value="">
                    <input type="image" border="0" alt="Thêm mới" src="images/insert.png">
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="12" class="cart_line_x padd2_gg"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
        </tr>
';
$sql = "SELECT * FROM nhasanxuat";
$result = MySQLHelper::executeQuery($sql);
$STT=1;
while($row = mysql_fetch_assoc($result)){
    $Temp .= '<tr>
            <td align="center" style="text-align:center; padding: 10px 0 0;">'.$STT.'</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td class="loainame" align="center" ><a href="index.php?action=productslist&idnsx='.$row['MaNSX'].'" >'.$row['TenNSX'].'</a></td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td class="loainame" align="center" >&nbsp;'.$row['DiaChi'].'</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td class="loainame" align="center" >&nbsp;'.$row['DienThoai'].'</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td class="loainame" align="center" >&nbsp;'.$row['Email'].'</td>
            <td class="cart_line_y padd2_vv"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></td>
            <td align="center" class="loaibutton">
                <form name="update'.$STT.'" method="post" action="admin.php?page=QuanLyNhaSanXuat_XuLy&action=update">
                  <input type="hidden" name="MaNSX" value="'.$row['MaNSX'].'">
                  <input type="image" border="0" alt="Cập nhật" src="images/edit.png">
                </form>
            </td>';
            $sql = "SELECT dc.mansx
                    FROM cthdnhap ctn JOIN dochoi dc ON ctn.MaDoChoi=dc.MaDoChoi
                        JOIN cthdxuat ctx ON dc.MaDoChoi=ctx.MaDoChoi
                    WHERE mansx = {$row['MaNSX']}";
            $check = MySQLHelper::executeQuery($sql);
            if(mysql_num_rows($check)==false){
                $Temp.='<td align="center" class="loaibutton">
                            <form name="delete'.$STT.'" method="post" action="admin.php?page=QuanLyNhaSanXuat_XuLy&action=delete" onsubmit="return xacNhan();">
                              <input type="hidden" name="MaNSX" value="'.$row['MaNSX'].'">
                              <input type="image" border="0" alt="Xóa" src="images/delete.png">
                            </form>
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
