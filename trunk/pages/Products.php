<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"What's New Here?");
require_once 'Class/CDoChoi.php';
///////////////////////

$IDMaLoai = $_GET['idloai'];
$sql = "SELECT* FROM dochoi where MaLoai=$IDMaLoai";
$result = MySQLHelper::executeQuery($sql);
//////////////////////

//////////////////////
$Temp='<div class="s_width2_100">
                        <table cellspacing="0" cellpadding="0" border="0" width="" class="tableBox_output_table">
    <tbody><tr>
        <td class="main"><table cellspacing="0" cellpadding="0" border="0" width="">
                <tbody><tr>
                    <td align="left" style="width: 50%;">
                        <table cellspacing="0" cellpadding="0" border="0" class="prod_div">
                            <tbody><tr><td class="prod_padd2">';
$col = 0;
while($m= mysql_fetch_array($result)) {
    $dc = new CDoChoi();
    $dc->setMaDoChoi($m['MaDoChoi']);
    $dc->setTenDoChoi($m['TenDoChoi']);
    $dc->setMaLoai($m['MaLoai']);
    $dc->setMaNSX($m['MaNSX']);
    $dc->setSoLuong($m['SoLuong']);
    $dc->setDonGiaNhap($m['DonGiaNhap']);
    $dc->setDonGiaBan($m['DonGiaBan']);
    $dc->setThongTin($m['ThongTin']);
    $dc->setHinhAnh($m['HinhAnh']);
    if($col==1){
                $Temp.= "<tr>";
                }
                $Temp.= $dc->view(1);
                $col++;
     if($col>2){
                $Temp.= "</tr>";
                $col=0;
      }
    
}
$Temp.=' </td></tr>
                        </tbody></table></td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>
                    </div>';

//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
?>
