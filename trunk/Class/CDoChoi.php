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
    private $MaNSX;
    private $DonGia;
    private $ThongTin;
    private $HinhAnh;
    private $SoLuotXem;
    private $NgayNhap;
    private $SoLuong;

    ///
    public function getSoLuong() {
        return $this->SoLuong;
    }

    public function setSoLuong($SoLuong) {
        $this->SoLuong = $SoLuong;
    }

    public function getNgayNhap() {
        $NgayNhap = explode("-", $this->NgayNhap);
        $NgayNhap = $NgayNhap[0]."-".$NgayNhap[1]."-".$NgayNhap[2];
        return $NgayNhap;
    }

    public function setNgayNhap($NgayNhap) {
        $NgayNhap = explode("-", $NgayNhap);
        $NgayNhap = $NgayNhap[2]."-".$NgayNhap[1]."-".$NgayNhap[0];
        $this->NgayNhap = $NgayNhap;
    }

    public function getMaNSX() {
        return $this->MaNSX;
    }

    public function setMaNSX($MaNSX) {
        $this->MaNSX = $MaNSX;
    }

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
        $this->MaNSX = 0;
        $this->NgayNhap = "";
        $this->SoLuong = 0;
    }

    public function ViewDetail() {
        $sql = 'select TenLoai from loaidochoi where maloai =' . $this->MaLoai;
        $result = MySQLHelper::executeQuery($sql);
        $loai = mysql_fetch_assoc($result);

        $sql = 'select TenNSX from nhasanxuat where mansx =' . $this->MaNSX;
        $result = MySQLHelper::executeQuery($sql);
        $nsx = mysql_fetch_assoc($result);

        $sql = "SELECT DonGia FROM khuyenmai WHERE MaDoChoi = '{$this->MaDoChoi}'";
        $result = MySQLHelper::executeQuery($sql);
        $khuyenmai = mysql_fetch_assoc($result);
        mysql_free_result($result);
        if($khuyenmai['DonGia']!=NULL)
            $DonGia = '<strike style="color: red; font-size: 11pt; font-weight: bold;">'.number_format($this->DonGia).'</strike>&nbsp;' . number_format($khuyenmai['DonGia']) . '&nbsp;VNĐ';
        else
            $DonGia = number_format($this->DonGia) . '&nbsp;VNĐ';

        $Temp = "";
        $Temp.='<script language="javascript"><!--
                    function popupWindow(url) {
                        window.open(url,\'popupWindow\',\'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150\')
                    }
                    //--></script>
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
                                        <br><div><b class="productSpecialPrice">' . $DonGia. '</b></div></div><br>
                                    <div style="clear: both;"></div>
                                </td></tr>
                        </tbody>
                    </table>

                    <div class="cart_line_x padd2_gg"><img width="1" height="2" border="0" alt="" src="template/images/spacer.gif"></div>

                    <table cellspacing="0" cellpadding="0" border="0" class="content_wrapper2_table">
                        <tbody>
                            <tr><td class="content_wrapper2_td">
                                    <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></div>
                                    <table cellspacing="4" cellpadding="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td class="main">
                                                    <table cellspacing="0" cellpadding="0" border="0" class="listing">
                                                        <tbody>
                                                            <tr>
                                                                <td><b><font>Loại đồ chơi&nbsp;:</font></b></td>
                                                                <td align="right"><font><a href="index.php?action=productslist&idloai=' . $this->MaLoai.'">' . $loai['TenLoai'] . '</a></font></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b><font style="">Nhà sản xuất&nbsp;:</font></b></td>
                                                                <td align="right"><font><a href="index.php?action=productslist&idnsx=' . $this->MaNSX.'">' . $nsx['TenNSX'] . '</a></font></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b><font>Ngày nhập&nbsp;:</font></b></td>
                                                                <td align="right"><font>' . $this->NgayNhap . '</font></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b><font>Số lượt xem&nbsp;:</font></b></td>
                                                                <td align="right"><font>' . $this->SoLuotXem . '</font></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b><font>Số lượng bán&nbsp;:</font></b></td>
                                                                <td align="right"><font>' . $this->SoLuongBan . '</font></td>
                                                            </tr>
                                                        </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>

                                </td></tr>
                        </tbody></table>

                    <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></div>

                    <div class="cart_line_x padd2_gg"><img width="1" height="2" border="0" alt="" src="template/images/spacer.gif"></div>

                    <table cellspacing="0" cellpadding="0" border="0" class="content_wrapper2_table"><tbody><tr><td class="content_wrapper2_td">
                                    <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></div><div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="template/images/spacer.gif"></div>
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td class="main button_marg"><a href="javascript:history.back();" ><img height="19" border="0" title=" Quay lại " alt="Quay lại" src="template/images/english/button_back.gif"></a></td>
                                                <td align="right" class="main button_marg">
                                                    <a href="includes/english/XuLyGioHang.php?action=add&idproduct=' . $this->MaDoChoi . '" ><img title=" Thêm vào giỏ hàng " alt="Thêm vào giỏ hàng" src="template/images/english/button_add_to_cart1.gif" border="0"></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                              </table>
                                </td></tr>
                        </tbody></table>
    ';
        return $Temp;
    }

}
?>



