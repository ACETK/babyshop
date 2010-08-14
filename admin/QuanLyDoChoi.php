<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_SESSION['isLogin']) && $_SESSION['LoaiTK']=="admin"){
$sql = "SELECT dc.MaDoChoi,dc.TenDoChoi,dc.TinhTrang,dc.ThongTin,dc.DonGia,ldc.TenLoai,nsx.TenNSX FROM loaidochoi ldc join dochoi dc on dc.MaLoai=ldc.MaLoai join nhasanxuat nsx on nsx.MaNSX=dc.MaNSX";
$kq = MySQLHelper::executeQuery($sql);
$Temp="";
$Temp.='
   
     <script type="text/javascript">
            function xacNhanXoa(){
                var xacnhan = confirm("Bạn chắc chắn muốn xóa đồ chơi này?");
                if(xacnhan==true) return true;
                return false;
            }
            function xacNhanHien(){
                var xacnhan = confirm("Đồ chơi này sẽ hiển thị trong danh sách ngoài trang chủ?");
                if(xacnhan==true) return true;
                return false;
            }
            function xacNhanAn(){
                var xacnhan = confirm("Đồ chơi này sẽ được loại khỏi danh sách ngoài trang chủ?");
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
                                                    <td align="center" colspan="2"><a href="admin.php?page=ThemDoChoi"><input type="image" name="insert" title="thêm" alt="thêm"  src="images/insert.png"></a></td>
                                                </tr>
                              <tr>
                            <td class="prod_line_x padd_gg" colspan="14"><img src="template/images/spacer.gif" border="0" alt="" width="1" height="1"></td>
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
                                                    <td align="center" class="loaibutton">
                                                      <a href="admin.php?page=CapNhatDoChoi&id='.$mang['MaDoChoi']. '" title="Cập nhật đồ chơi">
                                                      <input type="image" border="0" alt="Cập nhật" src="images/edit.png"></a>
                                                </td>
                                                ';
                                                $sql = "SELECT b.MaDoChoi FROM hdxuat a join dochoi b on a.MaDoChoi=b.MaDoChoi Where b.MaDoChoi='{$mang['MaDoChoi']}'
                                                    UNION
                                                    SELECT b.MaDoChoi FROM hdnhap c join dochoi b on c.MaDoChoi=b.MaDoChoi Where b.MaDoChoi='{$mang['MaDoChoi']}'";
                                                $check = MySQLHelper::executeQuery($sql);
                                                if(mysql_num_rows($check)==false){
                                                            $Temp.='<td align="center" class="loaibutton">
                                                                          <a href="admin.php?page=XuLyDoChoi&action=delete&id=' . $mang['MaDoChoi'] . '" title="Xóa khỏi CSDL" onclick="return xacNhanXoa();">
                                                                          <input type="image" border="0" alt="Xóa" src="images/delete.png"></a>
                                                                    </td>';
                                                        }else if($mang['TinhTrang']==0){
                                                            $Temp.='<td align="center" class="loaibutton">
                                                                          <a href="admin.php?page=XuLyDoChoi&action=hide&id=' . $mang['MaDoChoi'] . '" title="Loại khỏi danh sách" onclick="return xacNhanAn();">
                                                                          <input type="image" border="0" alt="Ẩn" src="images/hide.png"></a>
                                                                    </td>';
                                                        }
                                                        else if($mang['TinhTrang']==1){
                                                            $Temp.='<td align="center" class="loaibutton">
                                                                          <a href="admin.php?page=XuLyDoChoi&action=show&id=' . $mang['MaDoChoi'] . '" title="Đưa vào danh sách" onclick="return xacNhanHien();">
                                                                          <input type="image" border="0" alt="Hiện" src="images/show.png"></a>
                                                                    </td>';
                                                        }                                               
                                            $Temp.='   <tr>
                            <td class="prod_line_x padd_gg" colspan="14"><img src="template/images/spacer.gif" border="0" alt="" width="1" height="1"></td>
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
                                            
}else{
       header("location:index.php");
  }

/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
