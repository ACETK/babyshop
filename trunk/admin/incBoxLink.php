<?php
$Temp ='<ul class="categories" >
    <li class="bg_list"><a href="admin.php?action=QuanLyLoaiDoChoi">Loại đồ chơi</a></li>
    <li class="bg_list"><a href="admin.php?action=QuanLyNhaSanXuat">Nhà sản xuất</a></li>
    <li class="bg_list"><a href="admin.php?action=QuanLyDoChoi">Danh sách đồ chơi</a></li>
    <li class="bg_list"><a href="admin.php?action=DoChoiGiamGia">Đồ chơi giảm giá</a></li>
</ul>';
/** Khởi tạo box */
$btpl = new XTemplate('template/incInfoBoxAdmin.html');
$btpl->assign('BoxTitle', 'Trang quản lý khác');
//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$Link = $btpl->text('box');
/** Kết thúc box */

?>
