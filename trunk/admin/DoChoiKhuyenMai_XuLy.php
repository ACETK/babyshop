<?php
if(isset($_GET['action'])){
    /////////////////////////////////
    //THÊM ĐỒ CHƠI KHUYẾN MÃI
    if($_GET['action']=='insert'){
        //Xử lý sự kiện submit
        $error_message = "";
        if(isset($_POST['dongiakm'])){
            $id = $_GET['id'];
            $DonGia = str_replace(",", "", $_POST['dongiakm']);
            $GhiChu = $_POST['ghichu'];
            $Banner="";
            if(isset ($_FILES['banner']) && $_FILES['banner']['name']!=""){
                if($_FILES['banner']['type']=='image/png'){
                    $Banner = $id."BN.png";
                }else if($_FILES['banner']['type']=='image/jpeg'){
                    $Banner = $id."BN.jpg";
                }else if($_FILES['banner']['type']=='image/gif'){
                    $Banner = $id."BN.gif";
                }else {
                    $error_message = "<p>Banner phải là ảnh dạng .jpg hoặc .png hoặc .gif</p>";
                    $error=true;
                }
                if(!isset ($error) || $error!=true){
                    $WebFileFolder = "images/banners/$Banner";
                    move_uploaded_file($_FILES['banner']['tmp_name'], $WebFileFolder);
                }
            }
            if(!isset ($error) || $error!=true){
                $sql = sprintf("INSERT INTO khuyenmai(MaDoChoi,DonGia,Banner,GhiChu) VALUES('%s','%s','%s','%s')",$id,$DonGia,$Banner,$GhiChu);
                MySQLHelper::executeQuery($sql);
                header('location:admin.php?page=DoChoiKhuyenMai');
            }
        }

        //Tạo form nhập liệu
        $id = $_GET['id'];
        $sql="SELECT TenDoChoi,DonGia FROM dochoi WHERE MaDoChoi = '$id'";
        $result = MySQLHelper::executeQuery($sql);
        $dc=mysql_fetch_assoc($result);
        $Temp = '<script type="text/javascript">
                    function check_form(form_name) {
                        if(form_name.dongiakm.value.length<1){
                            alert("Đơn giá đã giảm ko được để trống");
                            return false;
                        }
                        return true;
                    }
                    function onlyNumber(e) {
                        if(e==null) e =  window.event;
                        var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
                        if ((keyCode>=48 && keyCode<=57) || keyCode==13 || keyCode==44 || keyCode==8){
                                return true;
                        }
                        return false;
                    }
                </script>
                <div style="width: 60%;">
            <form onsubmit="return check_form(this);" method="post" enctype="multipart/form-data" action="" >
                <table width="100%" cellspacing="0" cellpadding="2" border="0">
                    <tbody><tr>
                            <td class="main indent_2"><b>Thông tin khuyến mãi</b></td>
                            <td align="right" class="inputRequirement">* Thông tin bắt buộc</td>
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
                                                                <td class="main b_width"><strong>Tên đồ chơi:</strong></td>
                                                                <td class="main width2_100">'.$dc['TenDoChoi'].'</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Đơn giá cũ:</strong></td>
                                                                <td class="main width2_100">'.number_format($dc['DonGia']).'</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Đơn giá đã giảm:</strong></td>
                                                                <td ><input type="text" name="dongiakm" value="" size="20" onkeypress="return onlyNumber(event);"/>&nbsp;&nbsp;VND&nbsp;
                                                                    <span class="inputRequirement">*</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Ghi chú:</strong></td>
                                                                <td ><input type="text" name="ghichu" value="" size="63"/></td>
                                                            </tr>
                                                            <tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Banner:</strong></td>
                                                                <td ><input type="file" name="banner" size="50"/></td>
                                                            </tr>
                                                            <td colspan="2">
                                                                    <b>Chú ý:</b> Banner phải thuộc định dạng JPEG, PNG hoặc GIF. Kích thước 240x390. Dung lượng không quá 500kb.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><span class="inputRequirement">'.$error_message.'</span></td>
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
                                            <td><a href="admin.php?page=DoChoiKhuyenMai"><img width="71" height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a></td>
                                            <td><input type="image" name="submit" title="Continue" alt="Continue" src="template/images/english/button_continue.gif"></td>
                                        </tr>
                                    </tbody></table>

                            </td></tr>
                    </tbody></table>
            </form></div>';
/////////////////////////////////////////
// CẬP NHẬT THÔNG TIN KHUYẾN MÃI
    }else if($_GET['action']=='edit'){
        //Xử lý sự kiện submit
        if(isset ($_GET['id'])){
            $id = $_GET['id'];
        }else{
            header('location:admin.php');
        }
        $error_message = "";
        if(isset($_POST['dongiakm']) && !isset($_POST['xoabanner'])){
            $DonGia = str_replace(",", "", $_POST['dongiakm']);
            $GhiChu = $_POST['ghichu'];
            $Banner="";
            if(isset ($_FILES['banner']) && $_FILES['banner']['name']!=""){
                if($_FILES['banner']['type']=='image/png'){
                    $Banner = $id."BN.png";
                }else if($_FILES['banner']['type']=='image/jpeg'){
                    $Banner = $id."BN.jpg";
                }else if($_FILES['banner']['type']=='image/gif'){
                    $Banner = $id."BN.gif";
                }else {
                    $error_message = "<p>Banner phải là ảnh dạng .jpg hoặc .png hoặc .gif</p>";
                    $error=true;
                }
                if(!isset ($error) || $error!=true){
                    $WebFileFolder = "images/banners/$Banner";
                    move_uploaded_file($_FILES['banner']['tmp_name'], $WebFileFolder);
                }
            }
            if(!isset ($error) || $error!=true){
                if($Banner != ""){
                    $sql = sprintf("UPDATE khuyenmai SET DonGia='%s', Banner='%s',GhiChu='%s' WHERE MaDoChoi = '%s' LIMIT 1",$DonGia,$Banner,$GhiChu,$id);
                }else{
                    $sql = sprintf("UPDATE khuyenmai SET DonGia='%s', GhiChu='%s' WHERE MaDoChoi = '%s' LIMIT 1",$DonGia,$GhiChu,$id);
                }
//                echo $sql;
                MySQLHelper::executeQuery($sql);
                header('location:admin.php?page=DoChoiKhuyenMai');
            }
        }

        //Sự kiện xóa banner
        if(isset($_POST['xoabanner'])){
             $sql = "UPDATE khuyenmai SET Banner = NULL WHERE MaDoChoi= '$id'";
             MySQLHelper::executeQuery($sql);
        }
        //Tạo form nhập liệu
        $id = $_GET['id'];
        $sql="SELECT TenDoChoi,DonGia FROM dochoi WHERE MaDoChoi = '$id'";
        $result = MySQLHelper::executeQuery($sql);
        $dc=mysql_fetch_assoc($result);

        $sql="SELECT DonGia,Banner,GhiChu FROM khuyenmai WHERE MaDoChoi = '$id'";
        $result = MySQLHelper::executeQuery($sql);
        $km=mysql_fetch_assoc($result);
        mysql_free_result($result);

        if($km['Banner']==NULL || $km['Banner']==""){
            $ImgBanner = "Chưa có banner";
            $DeleteButton = "";
        }else{
            $ImgBanner = '<img src="images/banners/'.$km['Banner'].'" alt="" width="240" height="390" />';
            $DeleteButton = '<tr>
                                <td align="right" colspan="2">
                                    <form name="form" method="post" action="">
                                        <input type="hidden" name="flag" value="" />
                                        <input type="submit" name="xoabanner" value="Xóa banner" title=" Xóa banner " />
                                    </form>
                                </td>
                             </tr>';
        }
        $Temp = '<script type="text/javascript">
                    function check_form(form_name) {
                        if(form_name.dongiakm.value.length<1){
                            alert("Đơn giá đã giảm ko được để trống");
                            return false;
                        }
                        return true;
                    }
                    function onlyNumber(e) {
                        if(e==null) e =  window.event;
                        var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
                        if ((keyCode>=48 && keyCode<=57) || keyCode==13 || keyCode==44 || keyCode==8){
                                return true;
                        }
                        return false;
                    }
                </script>
         <form onsubmit="return check_form(this);" method="post" enctype="multipart/form-data" action="" >
            <table><tr><td style="width: 60%;">
                <table width="100%" cellspacing="0" cellpadding="2" border="0">
                    <tbody><tr>
                            <td class="main indent_2"><b>Thông tin khuyến mãi</b></td>
                            <td align="right" class="inputRequirement">* Thông tin bắt buộc</td>
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
                                                                <td class="main b_width"><strong>Tên đồ chơi:</strong></td>
                                                                <td class="main width2_100">'.$dc['TenDoChoi'].'</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Đơn giá cũ:</strong></td>
                                                                <td class="main width2_100">'.number_format($dc['DonGia']).'</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Đơn giá đã giảm:</strong></td>
                                                                <td ><input type="text" name="dongiakm" value="'.number_format($km['DonGia']).'" size="20"  onkeypress="return onlyNumber(event);"/>&nbsp;&nbsp;VND&nbsp;
                                                                    <span class="inputRequirement">*</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="main b_width"><strong>Ghi chú:</strong></td>
                                                                <td ><input type="text" name="ghichu" value="'.$km['GhiChu'].'" size="55"/></td>
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
                                            <td><a href="admin.php?page=DoChoiKhuyenMai"><img width="71" height="19" border="0" title=" Back " alt="Back" src="template/images/english/button_back1.gif"></a></td>
                                            <td><input type="image" title="Continue" alt="Continue" src="template/images/english/button_continue.gif"></td>
                                        </tr>
                                    </tbody></table>

                            </td></tr>
                    </tbody></table>
        </td>


        <td>
            <table width="100%" cellspacing="0" cellpadding="2" border="0">
                <tbody><tr>
                        <td class="main indent_2"><b>Banner</b></td>
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
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" colspan="2">
                                                                '.$ImgBanner.'
                                                            </td>
                                                        </tr>
                                                        '.$DeleteButton.'
                                                        <tr>
                                                            <td colspan="2">
                                                                <b>Chú ý:</b> Banner phải thuộc định dạng JPEG, PNG hoặc GIF. Kích thước 240x390. Dung lượng không quá 500kb.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="main b_width"><strong>Thay banner mới:</strong></td>
                                                            <td ><input type="file" name="banner" size="35"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><span class="inputRequirement">'.$error_message.'</span></td>
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
        </td></tr></table></form>';
/////////////////////////////////////////
// XÓA ĐỒ CHƠI KHỎI DANH SÁCH KHUYẾN MÃI
    }else if($_GET['action']=='delete'){
        $sql= "DELETE FROM khuyenmai WHERE MaDoChoi = '{$_GET['id']}'";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=DoChoiKhuyenMai');

/////////////////////////////////////////
// XÓA TOÀN BỘ DANH SÁCH KHUYẾN MÃI
    }else if($_GET['action']=='deleteall'){
        $sql= "DELETE FROM khuyenmai";
        MySQLHelper::executeQuery($sql);
        header('location:admin.php?page=DoChoiKhuyenMai');

/////////////////////////////////////////
// THÊM TẤT CẢ ĐỒ CHƠI VÀO DANH SÁCH KHUYẾN MÃI
    }else if($_GET['action']=='insertall'){
        $PhanTram = 100-intval($_POST['PhanTram']);
        $sql= "SELECT MaDoChoi,DonGia FROM dochoi WHERE MaDoChoi NOT IN (SELECT MaDoChoi FROM khuyenmai)";
        $result = MySQLHelper::executeQuery($sql);
        while($row = mysql_fetch_assoc($result)){
            $DonGia = intval($row['DonGia'])*$PhanTram/100;
            $sql = sprintf("INSERT INTO khuyenmai(MaDoChoi,DonGia) VALUES('%s','%d')",$row['MaDoChoi'],$DonGia);
            MySQLHelper::executeQuery($sql);
        }
        header('location:admin.php?page=DoChoiKhuyenMai');
    }
}

/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBoxAdmin.html');
$ctpl->assign('ContentTitle', "Thêm đồ chơi vào danh sách khuyến mãi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>