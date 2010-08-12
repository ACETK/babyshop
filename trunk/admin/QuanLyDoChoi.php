<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$sql = "SELECT* FROM loaidochoi ldc join dochoi dc on dc.MaLoai=ldc.MaLoai join nhasanxuat nsx on nsx.MaNSX=dc.MaNSX Where dc.TinhTrang=0";
$kq = MySQLHelper::executeQuery($sql);
$Temp="";
$Temp.='
    <script type="text/javascript">
            function xacNhan(){
                var xacnhan = confirm("Bạn chắc chắn muốn xóa này chứ ?");
                if(xacnhan==true) return true;
                return false;
            }
            </script>
     
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tbody>
         <tr> <font color="#ff0000"><b>Chú ý:</b></font><small> Quản trị phải thêm dữ liệu loại đồ chơi và nhà sản xuất mới được thêm đồ chơi.</small>
        </tr>
        
        <tr>
        <table cellspacing="4" cellpadding="2" border="0" >
            <tbody><tr style="color: blue">
                                                    <td><strong>STT</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td><strong>Tên đồ chơi</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong >Loại đồ chơi</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Nhà sản xuất</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Đơn giá</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td ><strong>Thông tin</strong></td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td align="center" colspan="2"><a href="admin.php?action=ThemDoChoi"><input type="image" name="insert" title="thêm" alt="thêm"  src="images/insert.png"></a></td>
                                                </tr>
                                               <tr>
                            <td class="prod_line_x padd_gg" colspan="14"><img src="template/images/spacer.gif" border="0" alt="" width="1" height="1"></td>
                          </tr>';
                                               $a=1;
                                            while($mang = mysql_fetch_array($kq)) {
                                                $Temp.='
                                                <tr>
                                                    <td>'.$a++.'</td>
                                                      <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                      <td>'.$mang['TenDoChoi'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['TenLoai'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['TenNSX'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['DonGia'].'</td>
                                                        <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>
                                                    <td>'.$mang['ThongTin'].'</td>
                                                    <td class="prod_line_y padd_vv"><img height="1" border="0" width="1" alt="" src="template/images/spacer.gif"/></td>                                                    
    <td><a href="admin.php?action=CapNhatDoChoi&iddochoi='.$mang['MaDoChoi'].'"><img  name="update" title="cập nhật" alt="cập nhật"  src="images/edit.png" border="0"></a></td>
    <td><a onclick="return xacNhan();" href="admin.php?action=XuLyDoChoi&iddochoi='.$mang['MaDoChoi'].'"><img  name="delete" title="xóa" alt="xóa" src="images/delete.png" border="0"></a></td>
                                                </tr>
                                               <tr>
                            <td class="prod_line_x padd_gg" colspan="14"><img src="template/images/spacer.gif" border="0" alt="" width="1" height="1"></td>
                          </tr> ';
                                                }
                                                $Temp.='

                                            </tbody>
                                        </table>
        </tr>
        </tbody>
    </table>
    <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
    <table cellspacing="5" cellpadding="0" border="0">
        <tbody><tr><td>
                    <table width="100%" cellspacing="0" cellpadding="2" border="0">
                        <tbody><tr>
                                <td><a href=""><img width="71" height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a></td>
                                
                            </tr>
                        </tbody></table>

                </td></tr>
        </tbody></table>';
//////////

    

/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
