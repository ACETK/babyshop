<?php

/**
 * Description of CDoChoi
 *
 * @author MinhHieu
 */
class CDoChoi {

    //put your code here
    private $MaDoChoi;
    private $TenDoChoi;
    private $MaLoai;
    private $DonGia;
    private $ThongTin;
    private $HinhAnh;
    private $SoLuotXem;

    ///
    public function getSoLuotXem() {
        return $this->SoLuotXem;
    }

    public function setSoLuotXem($SoLuotXem) {
        $this->SoLuotXem = $SoLuotXem;
    }

    public function getThongTin() {
        return $this->ThongTin;
    }

    public function setThongTin($ThongTin) {
        $this->ThongTin = $ThongTin;
    }

    public function getHinhAnh() {
        return $this->HinhAnh;
    }

    public function setHinhAnh($HinhAnh) {
        $this->HinhAnh = $HinhAnh;
    }

    public function getMaDoChoi() {
        return $this->MaDoChoi;
    }

    public function setMaDoChoi($MaDoChoi) {
        $this->MaDoChoi = $MaDoChoi;
    }

    public function getTenDoChoi() {
        return $this->TenDoChoi;
    }

    public function setTenDoChoi($TenDoChoi) {
        $this->TenDoChoi = $TenDoChoi;
    }

    public function getMaLoai() {
        return $this->MaLoai;
    }

    public function setMaLoai($MaLoai) {
        $this->MaLoai = $MaLoai;
    }

    public function getDonGia() {
        return $this->DonGia;
    }

    public function setDonGia($DonGia) {
        $this->DonGia = $DonGia;
    }

    ///
    public function __construct() {
        $this->MaDoChoi = "";
        $this->TenDoChoi = "";
        $this->MaLoai = "";
        $this->DonGia = "";
        $this->HinhAnh = "";
        $this->ThongTin = "";
        $this->SoLuotXem = 0;
    }

    public function ViewDetail() {
        $Temp = "";
        $Temp.='<script language="javascript"><!--
                    function popupWindow(url) {
                        window.open(url,\'popupWindow\',\'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150\')
                    }
                    //--></script>
            <form method="post" action="" name="">
                <table cellspacing="0" cellpadding="0" border="0" class="content_wrapper2_table"><tbody><tr><td class="content_wrapper2_td">
                                <div style="width: 210px;" class="main prod_info">
                                    <div style="width: 207px; height: 159px;" class="wrapper_pic2_div">
                                        <div class="wrapper_pic2_t">
                                            <div class="wrapper_pic2_r">
                                                <div class="wrapper_pic2_b">
                                                    <div class="wrapper_pic2_l">
                                                        <div class="wrapper_pic2_tl">
                                                            <div class="wrapper_pic2_tr">
                                                                <div class="wrapper_pic2_bl">
                                                                    <div class="wrapper_pic2_br">
                                                                        <div class="s_width2_100">
                                                                            <script type="tetext/javascript" language="javascript"><!--
                                                                            document.write(\'<a href="javascript:popupWindow(\'pages/popup_image.php?pID=' . $this->MaDoChoi . '\')"><img src="images/sanpham/' . $this->HinhAnh . '" border="0" alt="' . $this->TenDoChoi . '" title="' . $this->TenDoChoi . '" width="197" height="157"></a>\');
                                                                            //-->;</script>
                                                                            <a href="javascript:popupWindow(\'pages/popup_image.php?pID=' . $this->MaDoChoi . '\')" ><img src="images/sanpham/' . $this->HinhAnh . '" width="197" height="157" border="0" title="' . $this->TenDoChoi . '" alt="' . $this->TenDoChoi . '"></a>
                                                                            <noscript>
                                                                                <a href="images/sanpham/' . $this->HinhAnh . '" target="_blank"><img src="images/sanpham/' . $this->HinhAnh . '" border="0" alt="' . $this->TenDoChoi . '" title="' . $this->TenDoChoi . '" width="197" height="157"></a>
                                                                            </noscript>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></div>
                                    <script type="tetext/javascript" language="javascript"><!--
                                        document.write(\'<a class="enlarge" href="javascript:popupWindow(\'pages/popup_image.php?pID=' . $this->MaDoChoi . '\')">Click to enlarge</a>\');
                                        //--></script>
                                    <a href="javascript:popupWindow(\'pages/popup_image.php?pID=' . $this->MaDoChoi . '\')" class="enlarge">Click to enlarge</a>
                                    <noscript>
                                        <a class="enlarge" href="images/sanpham/' . $this->HinhAnh . '" target="_blank">Click to enlarge</a>
                                    </noscript>
                                </div>
                                <div class="main"><div class="desc2">' . $this->ThongTin . '<br>
                                    </div><br>
                                    <br><div><b class="productSpecialPrice">' . $this->DonGia . '</b></div></div><br>
                                <div style="clear: both;"></div>
                            </td></tr>
                    </tbody>
                </table>

                <div class="cart_line_x padd2_gg"><img width="1" height="2" border="0" alt="" src="images/spacer.gif"></div>

                <table cellspacing="0" cellpadding="0" border="0" class="content_wrapper2_table">
                    <tbody>
                        <tr><td class="content_wrapper2_td">
                                <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                                <table cellspacing="4" cellpadding="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td class="main">This product was added to our catalog on Tuesday 20 April, 2010.</td>
                                        </tr>
                                    </tbody></table>

                            </td></tr>
                    </tbody></table>

                <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>

                <div class="cart_line_x padd2_gg"><img width="1" height="2" border="0" alt="" src="images/spacer.gif"></div>

                <table cellspacing="0" cellpadding="0" border="0" class="content_wrapper2_table"><tbody><tr><td class="content_wrapper2_td">
                                <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div><div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td class="main button_marg"><a href="" ><img width="90" height="19" border="0" title=" Reviews " alt="Reviews" src="includes/english/images/buttons/button_reviews.gif"></a></td>
                                            <td align="right" class="main button_marg"><input type="hidden" value="104" name="products_id"><input type="image" title=" Add to Shopping Cart " alt="Add to Shopping Cart" src="includes/english/images/buttons/button_add_to_cart1.gif"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td></tr>
                    </tbody></table>
            </form>
    ';
        return $Temp;
    }

}
?>



