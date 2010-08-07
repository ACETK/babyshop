<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CloaiDoChoi
 *
 * @author MinhHieu
 */
class CLoaiDoChoi {
    //put your code here
    private $MaLoai;
    private $TenLoai;
    ////
    public function getMaLoai() {
        return $this->MaLoai;
    }

    public function setMaLoai($MaLoai) {
        $this->MaLoai = $MaLoai;
    }

    public function getTenLoai() {
        return $this->TenLoai;
    }

    public function setTenLoai($TenLoai) {
        $this->TenLoai = $TenLoai;
    }
    //
    function __construct() {
        $this->MaLoai = "";
        $this->TenLoai = "";
    }
    public function View($Type) {
            $Temp = "";
            if($Type==1) {
                 $Temp .='<li class="bg_list"><a href="index.php?action=productslist&idloai='.$this->MaLoai.'" >'.$this->TenLoai.'</a></li>';
            }
            if($Type==2){
                $Temp.= '<option value="'.$this->MaLoai.'">'.$this->TenLoai.'</option>';
            }
        return $Temp;
    }


    }
?>
