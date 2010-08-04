<?php

/**
 * Description of CDanhSachDoChoi
 *
 * @author DarkMagikian
 */
require_once 'Class/CDoChoi.php';

class CDanhSachDoChoi {

    private $arrDoChoi;

    public function __construct() {
        $this->arrDoChoi = array();
    }

    public function add(CDoChoi $dc) {
        $array_keys = array_keys($this->arrDoChoi, $dc);
        if (count($array_keys) > 1) {
            return -1;
        } else {
            $kq = array_push($this->arrDoChoi, $dc);
            return $kq;
        }
    }

    public function viewList() {
        //bắt đầu bảng
        if(count($this->arrDoChoi)<1){
            $Temp = '<table cellspacing="0" cellpadding="0" class="main">
					<tbody><tr><td style="padding: 25px 20px 20px;">Chưa có sản phẩm nào trong chuyên mục. Vui lòng quay lại sau.</td></tr>
				</tbody></table>';
            return $Temp;
        }
        $Temp = '
         <table border="0" width="" cellspacing="0" cellpadding="0" class="tableBox_output_table">
            <tr><td  class="main">
                    <table border="0" width="" cellspacing="0" cellpadding="0">';

        $col = 0; // dùng để kẻ line dọc và xuống hàng
        $num = count($this->arrDoChoi); //dùng để kẻ line ngang 
        $n = $num; // dùng cho dòng lặp for

        for ($i = 0; $i < $n; $i++) {
            //bắt đầu hàng
            if ($col == 0) {
                $Temp.="<tr>";
            }
            //xuất dữ liệu
            if ($this->arrDoChoi[$i] instanceof CDoChoi) {
                $sql = 'select TenLoai from loaidochoi where maloai =' . $this->arrDoChoi[$i]->getMaLoai();
                $result = MySQLHelper::executeQuery($sql);
                $loai = mysql_fetch_assoc($result);

                $sql = 'select TenNSX from nhasanxuat where mansx =' . $this->arrDoChoi[$i]->getMaNSX();
                $result = MySQLHelper::executeQuery($sql);
                $nsx = mysql_fetch_assoc($result);
                mysql_free_result($result);

                $Temp .= '<td align="left"  style="width:50%;">
                    <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                        <tr><td class="prod_padd2">
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tr><td class="name name2_padd"><a href="index.php?action=detail&id=' . $this->arrDoChoi[$i]->getMaDoChoi() . '">' . $this->arrDoChoi[$i]->getTenDoChoi() . '</a></td></tr>
                                    <tr><td class="pic2_padd"><div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="index.php?action=detail&id=' . $this->arrDoChoi[$i]->getMaDoChoi() . '" style="width:197px;height:157px;"><img src="images/sanpham/' . $this->arrDoChoi[$i]->getHinhAnh() . '" border="0" alt="' . $this->arrDoChoi[$i]->getTenDoChoi() . '" title="' . $this->arrDoChoi[$i]->getTenDoChoi() . '" width="197" height="157"  style="width:197px;height:157px;">
                                                    <div class="wrapper_pic_t">
                                                        <div class="wrapper_pic_r">
                                                            <div class="wrapper_pic_b">
                                                                <div class="wrapper_pic_l">
                                                                    <div class="wrapper_pic_tl">
                                                                        <div class="wrapper_pic_tr">
                                                                            <div class="wrapper_pic_bl">
                                                                                <div class="wrapper_pic_br" style="width:197px;height:157px;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div></a></div></td></tr>
                                    <tr><td class="listing2_padd">
                                            <table cellspacing="0" cellpadding="0" border="0" class="listing">
                                                <tbody>
                                                    <tr>
                                                        <td><b><font>Loại đồ chơi&nbsp;:</font></b></td>
							<td align="right"><font><a href="index.php?action=productslist&idloai=' . $this->arrDoChoi[$i]->getMaLoai().'">' . $loai['TenLoai'] . '</a></font></td>
                                                    </tr>
                                                    <tr>
							<td><b><font style="">Nhà sản xuất&nbsp;:</font></b></td>
							<td align="right"><font><a href="index.php?action=productslist&idnsx=' . $this->arrDoChoi[$i]->getMaNSX().'">' . $nsx['TenNSX'] . '</a></font></td>
                                                    </tr>
                                                    <tr>
							<td><b><font>Số lượt xem&nbsp;:</font></b></td>
							<td align="right"><font>' . $this->arrDoChoi[$i]->getSoLuotXem() . '</font></td>
                                                    </tr>
                                                </tbody></table>
                                        </td></tr>
                                    <tr><td class="price2_padd"><span class="productSpecialPrice">' . number_format($this->arrDoChoi[$i]->getDonGia()) . '&nbsp;VNĐ</span></td></tr>
                                    <tr><td class="button2_padd button2_marg"><a href="index.php?action=detail&id=' . $this->arrDoChoi[$i]->getMaDoChoi() . '" ><img src="template/images/english/button_details.gif" border="0" alt="" width="81" height="19"  class="btn1"></a> <a href="" ><img src="template/images/english/button_add_to_cart1.gif" border="0" alt="" width="104" height="19"  class="btn2"></a></td></tr>
                                </table>
                            </td></tr>
                    </table></td>';

                $col++;
            }
            $num--;
            //kẻ line dọc
            if ($col == 1) {
                $Temp .= '<td class="prod_line_y padd_vv"><img src="template/images/spacer.gif" border="0" alt="" width="1" height="1"></td>';
            }
            // kết thúc hàng, kẻ line ngang
            if ($col > 1 && $num > 0) {
                $Temp .= '</tr>';
                $Temp .= '<tr>
                            <td class="prod_line_x padd_gg" colspan="3"><img src="template/images/spacer.gif" border="0" alt="" width="1" height="1"></td>
                          </tr>';
                $col = 0;
            }
        }
        $Temp.='    </table>
                </td></tr>
        </table>';

        return $Temp;
    }

}
?>
