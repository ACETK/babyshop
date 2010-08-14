<?php
$sql = "SELECT dc.MaDoChoi,TenDoChoi,HinhAnh,dc.DonGia AS DonGiaCu,km.DonGia AS DonGiaKM
        FROM dochoi dc JOIN khuyenmai km ON dc.MaDoChoi=km.MaDoChoi
        ORDER BY RAND()
        LIMIT 1";
$result = MySQLHelper::executeQuery($sql);
$DoChoi = mysql_fetch_assoc($result);
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Temp = '<table cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr><td class="name_padd"><span><a href="index.php?action=detail&id='.$DoChoi['MaDoChoi'].'" >'.$DoChoi['TenDoChoi'].'</span></td></tr>
        <tr><td class="pic_padd">
                <div style="width: 197px; height: 157px;" class="wrapper_pic_div">
                    <a style="width: 197px; height: 157px;" href="index.php?action=detail&id='.$DoChoi['MaDoChoi'].'" ><img width="197" height="157" border="0" title=" '.$DoChoi['TenDoChoi'].' " alt="'.$DoChoi['TenDoChoi'].'" src="images/sanpham/'.$DoChoi['HinhAnh'].'">
                        <div class="wrapper_box_pic_t">
                            <div class="wrapper_box_pic_r">
                                <div class="wrapper_box_pic_b">
                                    <div class="wrapper_box_pic_l">
                                        <div class="wrapper_box_pic_tl">
                                            <div class="wrapper_box_pic_tr">
                                                <div class="wrapper_box_pic_bl">
                                                    <div style="width: 197px; height: 157px;" class="wrapper_box_pic_br"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a></div>
            </td></tr>
        <tr><td class="price_padd">
                <strike style="color: red; font-size: 11pt; font-weight: bold;">'.number_format($DoChoi['DonGiaKM']).'</strike>&nbsp;<span class="productSpecialPrice">'.number_format($DoChoi['DonGiaCu']).'&nbsp;VND</span>
            </td></tr>
    </tbody></table>';
    //Kết thúc nghiệp vụ

/** Khởi tạo box */
$btpl = new XTemplate('./template/incInfoBox.html');
$btpl->assign('BoxTitle','Đang khuyến mãi');
//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$Specials = $btpl->text('box');
/** Kết thúc box */
?>