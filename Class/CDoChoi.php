<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

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
    private $MaNSX;
    private $SoLuong;
    private $DonGiaNhap;
    private $DonGiaBan;
    private $ThongTin;
    private $HinhAnh;

    ///
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

    public function getMaNSX() {
        return $this->MaNSX;
    }

    public function setMaNSX($MaNSX) {
        $this->MaNSX = $MaNSX;
    }

    public function getSoLuong() {
        return $this->SoLuong;
    }

    public function setSoLuong($SoLuong) {
        $this->SoLuong = $SoLuong;
    }

    public function getDonGiaNhap() {
        return $this->DonGiaNhap;
    }

    public function setDonGiaNhap($DonGiaNhap) {
        $this->DonGiaNhap = $DonGiaNhap;
    }

    public function getDonGiaBan() {
        return $this->DonGiaBan;
    }

    public function setDonGiaBan($DonGiaBan) {
        $this->DonGiaBan = $DonGiaBan;
    }
    ///
    function __construct() {
        $this->MaDoChoi = "";
        $this->TenDoChoi = "";
        $this->MaLoai = "";
        $this->MaNSX = "";
        $this->SoLuong = "";
        $this->DonGiaNhap = "";
        $this->DonGiaBan = "";
        $this->HinhAnh ="";
        $this->ThongTin="";
    }
    // xu li nghiep vu
    public function view($style) {
        $Temp = "";
        if($style==1) {
            $Temp.=sprintf('<table cellspacing="" cellpadding="0" border="0">
                                        <tbody><tr><td class="name name2_padd"><a href="index.php?action=chitiet&idmadochoi=%s">%s</a></td></tr>
                                        <tr><td class="pic2_padd"><div style="width: 197px; height: 157px;" class="wrapper_pic_div"><a style="width: 197px; height: 157px;" href=""><img height="157" border="0" width="197" style="width: 197px; height: 157px;" title="" alt="Product #101" src="images/sanpham/%s"/>
                                                        <div class="wrapper_pic_t">
                                                            <div class="wrapper_pic_r">
                                                                <div class="wrapper_pic_b">
                                                                    <div class="wrapper_pic_l">
                                                                        <div class="wrapper_pic_tl">
                                                                            <div class="wrapper_pic_tr">
                                                                                <div class="wrapper_pic_bl">
                                                                                    <div style="width: 197px; height: 157px;" class="wrapper_pic_br"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></a></div></td></tr>
                                        <tr><td class="desc desc2_padd">%s</td></tr>
                                        <tr><td class="price2_padd"><span class="productSpecialPrice">%s</span></td></tr>
                                        <tr><td class="button2_padd button2_marg"><a href="index.php?action=chitiet&idmadochoi=%s"><img height="19" border="0" width="81" class="btn1" alt="" src="includes/english/images/buttons/button_details.gif"/></a> <a href=""><img height="19" border="0" width="104" class="btn2" alt="" src="includes/english/images/buttons/button_add_to_cart1.gif"/></a></td></tr>
                                    </tbody></table>',$this->MaDoChoi,$this->TenDoChoi,$this->HinhAnh,$this->ThongTin,$this->DonGiaBan,$this->MaDoChoi);
        }

        return $Temp;
    }
    public function ViewDetail() {
        $Temp="";
        $Temp.='<script language="javascript"><!--
    function popupWindow(url) {
        window.open(url,\'popupWindow\',\'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150\')
    }
    //--></script>
<form method="post" action="" name="cart_quantity">
    <div class="cont_heading_tl">
        <div class="cont_heading_tr">
            <div class="cont_heading_t"></div>
        </div>
    </div>
    <div class="cont_heading_l"><div class="cont_heading_r">
            <div class="cont_heading_c">
                <table cellspacing="0" cellpadding="0" border="0" class="cont_heading_table">
                    <tbody><tr><td class="cont_heading_td">
                                <div class="left_part"><a class="headerNavigation" href="index.php?action=Home">Home</a> » <a class="headerNavigation" href="index.php?action=productslist&idloai='.$this->MaLoai.'">Toys by Age</a> »'.$this->TenDoChoi.'<br> <span class="smallText">'.$this->MaDoChoi.'</span></div><div class="right_part"><span class="productSpecialPrice">'.$this->DonGiaBan.'</span></div>

                            </td></tr>
                    </tbody></table>
            </div>
        </div></div>
    <div class="cont_heading_bl">
        <div class="cont_heading_br">
            <div class="cont_heading_b"></div>
        </div>
    </div>

    <div class="content_wrapper_r">
        <div class="content_wrapper_b">
            <div class="content_wrapper_l">
                <div class="content_wrapper_bl s_width2_100">
                    <div class="content_wrapper_br content_wrapper4_td">
                        <div class="s_width2_100"><br>
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
                                                                                    <div class="s_width2_100"><script language="javascript"><!--
                                                                                        document.write(\'<a href="javascript:popupWindow(\'pages/popup_image.php?pID='.$this->MaDoChoi.'\')"><img src="images/sanpham/'.$this->HinhAnh.'" border="0" alt="'.$this->TenDoChoi.'" title="'.$this->TenDoChoi.'" width="197" height="157"></a>\');
                                                                                        //-->;</script>
                                                                                        <a href="javascript:popupWindow(\'pages/popup_image.php?pID='.$this->MaDoChoi.'\')" ><img src="images/sanpham/'.$this->HinhAnh.'" width="197" height="157" border="0" title="'.$this->TenDoChoi.'" alt="'.$this->TenDoChoi.'"></a><noscript>
                                                                                            <a href="images/sanpham/'.$this->HinhAnh.'" target="_blank"><img src="images/sanpham/'.$this->HinhAnh.'" border="0" alt="'.$this->TenDoChoi.'" title="'.$this->TenDoChoi.'" width="197" height="157"></a></noscript></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div></div>
                                                <script language="javascript"><!--
                                                    document.write(\'<a class="enlarge" href="javascript:popupWindow(\'pages/popup_image.php?pID='.$this->MaDoChoi.'\')">Click to enlarge</a>\');
                                                    //--></script>
                                                <a href="javascript:popupWindow(\'pages/popup_image.php?pID='.$this->MaDoChoi.'\')" class="enlarge">Click to enlarge</a>
                                                <noscript><a class="enlarge" href="images/sanpham/'.$this->HinhAnh.'" target="_blank">Click to enlarge</a></noscript>
                                            </div>
                                            <div class="main"><div class="desc2">'.$this->ThongTin.'<br>
                                                    </div><br>
                                                <br><div><b class="productSpecialPrice">'.$this->DonGiaBan.'</b></div></div><br>
                                            <div style="clear: both;"></div>


                                        </td></tr></tbody></table>
                            <div class="cart_line_x padd2_gg"><img width="1" height="2" border="0" alt="" src="images/spacer.gif"></div>

                            <table cellspacing="0" cellpadding="0" border="0" class="content_wrapper2_table"><tbody><tr><td class="content_wrapper2_td">



                                            <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                                            <table cellspacing="4" cellpadding="0" border="0">
                                                <tbody><tr>
                                                        <td class="main">This product was added to our catalog on Tuesday 20 April, 2010.</td>
                                                    </tr>
                                                </tbody></table>

                                        </td></tr></tbody></table>
                            <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>

                            <div class="cart_line_x padd2_gg"><img width="1" height="2" border="0" alt="" src="images/spacer.gif"></div>

                            <table cellspacing="0" cellpadding="0" border="0" class="content_wrapper2_table"><tbody><tr><td class="content_wrapper2_td">
                                            <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div><div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>

                                            <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr>
                                                        <td class="main button_marg"><a href="" ><img width="90" height="19" border="0" title=" Reviews " alt="Reviews" src="includes/english/images/buttons/button_reviews.gif"></a></td>
                                                        <td align="right" class="main button_marg"><input type="hidden" value="104" name="products_id"><input type="image" title=" Add to Shopping Cart " alt="Add to Shopping Cart" src="includes/english/images/buttons/button_add_to_cart1.gif"></td>
                                                    </tr>
                                                </tbody></table>
                                        </td></tr></tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>';

        return $Temp;
    }


}
?>
