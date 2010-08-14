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
                                            <tbody><tr><td align="right"><a href="index.php?action=Home" ><img width="92" height="19" border="0" title=" Continue " alt="Continue" src="template/images/english/button_continue.gif"></a></td></tr>
                                            </tbody></table>

                                    </td></tr></tbody></table>
                    ';
        return $Temp;
    }
    public function ViewThongTin() {
        $Temp ="";
        $Temp.='<form>
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
            <tr>
                <td><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tbody><tr>
                <td class="main indent_2"><b>Thông tin cá nhân:</b></td>

            </tr>
        </tbody>
    </table>
    <div class="wrapper_pic2_t infoBox_">
        <div class="wrapper_pic2_r">
            <div class="wrapper_pic2_b">
                <div class="wrapper_pic2_l">
                    <div class="wrapper_pic2_tl s_width2_100">
                        <div class="wrapper_pic2_tr">
                            <div class="wrapper_pic2_bl">
                                <div class="wrapper_pic2_br wrapper_pic2_padd">
                                    <div class="s_width2_100">
                                        <table cellspacing="4" cellpadding="2" border="0">
                                            <tbody><tr>
                                                    <td class="main b_width"><strong>Giới tính:</strong></td>
                                                    <td class="main radio">'.$this->GioiTinh.'  </td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Họ và tên:</strong></td>
                                                    <td class="main width2_100">'.$this->TenNguoiDung.'</td>
                                                </tr>

                                                <tr>
                                                    <td class="main b_width"><strong>Ngày sinh:</strong></td>
                                                    <td class="main width2_100">'.$this->NgaySinh.'</td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>E-Mail :</strong></td>
                                                  <td class="main width2_100">'.$this->Email.'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
    <table cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
                <td class="main indent_2"><b>Thông tin liên hệ:</b></td>
            </tr>
        </tbody>
    </table>
    <div class="wrapper_pic2_t infoBox_">
        <div class="wrapper_pic2_r">
            <div class="wrapper_pic2_b">
                <div class="wrapper_pic2_l">
                    <div class="wrapper_pic2_tl s_width2_100">
                        <div class="wrapper_pic2_tr">
                            <div class="wrapper_pic2_bl">
                                <div class="wrapper_pic2_br wrapper_pic2_padd">
                                    <div class="s_width2_100">
                                        <table cellspacing="4" cellpadding="2" border="0">
                                            <tbody><tr>
                                                    <td class="main b_width"><strong>Điện thoại:</strong></td>
                                                    <td class="main width2_100">'.$this->DienThoai.'</td>
                                                </tr>
                                                <tr>
                                                    <td class="main b_width"><strong>Địa chỉ:</strong></td>
                                                    <td class="main width2_100">'.$this->DiaChi.'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding: 0px 0px 4px;"><img width="1" height="1" border="0" alt="" src="images/spacer.gif"></div>
    <table cellspacing="5" cellpadding="0" border="0">
        <tbody><tr><td>
                    <table width="100%" cellspacing="0" cellpadding="2" border="0">
                        <tbody><tr>
                                <td><a href="index.php?action=userprofile">Cập nhật</a></td>
                                <td><a href="index.php?action=Home">Trở về trang chủ></a></td>
                            </tr>
                        </tbody></table>

                </td></tr>
        </tbody></table>
</form>  ';
        return $Temp;
    }


}
?>
