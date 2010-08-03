<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of CNguoiDung
 *
 * @author MinhHieu
 */
class CNguoiDung {
    //put your code here
    private $TenTaiKhoan;
    private $TenNguoiDung;
    private $MatKhau;
    private $NgaySinh;
    private $GioiTinh;
    private $DiaChi;
    private $DienThoai;
    private $Email;
    ///////
    public function getTenTaiKhoan() {
        return $this->TenTaiKhoan;
    }

    public function setTenTaiKhoan($TenTaiKhoan) {
        $this->TenTaiKhoan = $TenTaiKhoan;
    }

    public function getTenNguoiDung() {
        return $this->TenNguoiDung;
    }

    public function setTenNguoiDung($TenNguoiDung) {
        $this->TenNguoiDung = $TenNguoiDung;
    }

    public function getMatKhau() {
        return $this->MatKhau;
    }

    public function setMatKhau($MatKhau) {
        $this->MatKhau = $MatKhau;
    }

    public function getNgaySinh() {
        return $this->NgaySinh;
    }

    public function setNgaySinh($NgaySinh) {
        $this->NgaySinh = $NgaySinh;
    }

    public function getGioiTinh() {
        return $this->GioiTinh;
    }

    public function setGioiTinh($GioiTinh) {
        $this->GioiTinh = $GioiTinh;
    }

    public function getDiaChi() {
        return $this->DiaChi;
    }

    public function setDiaChi($DiaChi) {
        $this->DiaChi = $DiaChi;
    }

    public function getDienThoai() {
        return $this->DienThoai;
    }

    public function setDienThoai($DienThoai) {
        $this->DienThoai = $DienThoai;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    ////
    function __construct() {
        $this->TenTaiKhoan = "";
        $this->TenNguoiDung = "";
        $this->MatKhau = "";
        $this->NgaySinh = "";
        $this->GioiTinh = "";
        $this->DiaChi = "";
        $this->DienThoai = "";
        $this->Email = "";
    }
    public function View() {
        $Temp = "";
        $Temp .='
                        <table cellspacing="0" cellpadding="0" border="0" style="margin: 0px 10px 0px 0px;">
                            <tbody><tr><td align="center"><img width="172" height="88" border="0" title=" Your Account Has Been Created! " alt="Your Account Has Been Created!" src="images/table_background_man_on_board.gif"></td>
                                    <td style="padding: 30px 0px 0px; width: 100%;" class="main">Xin chúc mừng! Tài khoản <font style="font-size:16px; color:#F03">'.$this->TenTaiKhoan.'</font> đã tạo thành công!
                                        <br> <span id="result_box"><span title=""> </span><span title="">Bây giờ bạn đã là  thành viên và có thể  mua sắm trực tuyến trên website của chúng tôi. </span><span title="">Nếu bạn có bất kỳ câu hỏi nào về hoạt động của cửa hàng trực tuyến này, hãy gửi email cho </span></span> <a href="index.php?action=Contact" >Người quản lý</a>.<br>
                                    </td>
                                </tr>
                            </tbody></table>

                        <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
                        <table cellspacing="5" cellpadding="0" border="0"><tbody><tr><td>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr><td align="right"><a href="index.php?action=Home" ><img width="92" height="19" border="0" title=" Continue " alt="Continue" src="includes/languages/english/images/buttons/button_continue.gif"></a></td></tr>
                                            </tbody></table>

                                    </td></tr></tbody></table>
                    ';
        return $Temp;
    }

}
?>
