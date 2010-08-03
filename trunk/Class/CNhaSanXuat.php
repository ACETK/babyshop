<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CNhaSanXuat
 *
 * @author MinhHieu
 */
class CNhaSanXuat {
    //put your code here
    private $MaNSX;
    private $TenNSX;
    private $DiaChi;
    private $DienThoai;
    private $Email;
    //////
    public function getMaNSX() {
        return $this->MaNSX;
    }

    public function setMaNSX($MaNSX) {
        $this->MaNSX = $MaNSX;
    }

    public function getTenNSX() {
        return $this->TenNSX;
    }

    public function setTenNSX($TenNSX) {
        $this->TenNSX = $TenNSX;
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

    function __construct() {
        $this->MaNSX = "";
        $this->TenNSX = "";
        $this->DiaChi = "";
        $this->DienThoai = "";
        $this->Email = "";
    }
    public function View() {
        $Temp = "";

        $Temp .='<option value="'.$this->MaNSX.'">'.$this->TenNSX.'</option>
                   
                    ';
        return $Temp;
    }
    
}
?>
