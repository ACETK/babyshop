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
                $row = mysql_fetch_assoc($result);
                mysql_free_result($result);

                $Temp .= '<td align="left"  style="width:50%;">
                    <table cellpadding="0" cellspacing="0" border="0" class="prod_div">
                        <tr><td class="prod_padd2">
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tr><td class="name name2_padd"><a href="">' . $this->arrDoChoi[$i]->getTenDoChoi() . '</a></td></tr>
                                    <tr><td class="pic2_padd"><div class="wrapper_pic_div" style="width:197px;height:157px;"><a href="" style="width:197px;height:157px;"><img src="images/sanpham/' . $this->arrDoChoi[$i]->getHinhAnh() . '" border="0" alt="' . $this->arrDoChoi[$i]->getTenDoChoi() . '" title="' . $this->arrDoChoi[$i]->getTenDoChoi() . '" width="197" height="157"  style="width:197px;height:157px;">
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
                                    <tr><td class="desc desc2_padd"><b>Categories:</b> ' . $row['TenLoai'] . '<br/>
                                                                    <b>Views:</b> ' . $this->arrDoChoi[$i]->getSoLuotXem() . '</td></tr>
                                    <tr><td class="price2_padd"><span class="productSpecialPrice">' . $this->arrDoChoi[$i]->getDonGia() . '</span></td></tr>
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