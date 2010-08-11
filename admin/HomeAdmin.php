<?php
$Temp = '<style type="text/css" >
            .list{
                vertical-align: middle;
                width: 250px;
            }
            .list a {
                font-family: Times New Roman;
                color: #000;
                font-size: 14pt;
                font-weight: bold;
                padding-left:10px;
                text-decoration: underline;
            }
            .list a:hover {
                text-decoration: none;
            }
            .head{
                font-family: Times New Roman;
                color: blue;
                font-size: 14pt;
                padding: 10px 0 15px 0;
            }
        </style>

        <table align="center" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <th colspan="4" scope="col" class="head">Các thao tác có thể thực hiện: Thêm ,xóa, cập nhật danh sách.</th>
          </tr>
          <tr>
            <td align="right" style="width:180px;" ><img src="template/images/admin/loai.png" alt=""></td>
            <td class="list"><a href="admin.php?action=QuanLyLoaiDoChoi" >Danh sách loại đồ chơi</a></td>
            <td align="left" style="width:100px;" ><img src="template/images/admin/dochoi.png" alt=""></td>
            <td class="list"><a href="admin.php?action=QuanLyDoChoi" >Danh sách đồ chơi</a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><img src="template/images/admin/nsx.png" alt=""></td>
            <td class="list"><a href="admin.php?action=QuanLyNhaSanXuat" >Danh sách nhà sản xuất</a></td>
            <td align="left"><img src="template/images/admin/sale.png" alt=""></td>
            <td class="list"><a href="#" >Sản phẩm giảm giá</a></td>
          </tr>
          <tr>
            <td colspan="4">&nbsp;</td>
          </tr>
        </table>';
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBoxAdmin.html');
$ctpl->assign('ContentTitle', "Quản lý các danh sách");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>