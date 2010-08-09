<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
///xu li ma san pham tang tu dong
    $Temp="";
    //Xu li gia tri sau khi post
    $q = "SELECT MaDoChoi FROM dochoi ORDER BY MaDoChoi";
    $rs = MySQLHelper::executeQuery($q);
    $num = 0;
    while($m=mysql_fetch_assoc($rs)){
        $t = intval(substr($m['MaDoChoi'], 2));
        if($t != $num){
            break;
        }
        $num++;
    }
    //Quy định chữ đầu của MaDoChoi; nếu csdl đầy có thể đổi sau
    $maNew = "SP";

    if(strlen($num)==1){
        $maNew .="000".$num;
    }else if(strlen($num)==2){
        $maNew .="00".$num;
    }else if(strlen($num)==3){
        $maNew .="0".$num;
    }else if(strlen($num)==4){
        $maNew .=$num;
    }else{
        $ThongBao = "Số lượng sản phẩm đã vượt wá mức lưu trữ";
    }
    echo $maNew;
        $tendochoi= $_POST['tendochoi'];
        $maloaidochoi=  $_POST['loaidochoi'];
        $masanxuat =  $_POST['nhasanxuat'];
        $giaban= $_POST['giaban'];
        $thongtin = $_POST['thongtin'];
        $tenfile =$_FILES['file_upload']['name'];
        $cofile =$_FILES['file_upload']['size']/1024;
        $loaifile =$_FILES['file_upload']['type'];
        $choluufiletam =$_FILES['file_upload']['tmp_name'];
        $loiupload = $_FILES["file_upload"]["error"];
        $ngaycapnhat= date("Y-m-d");
        if ( $cofile > 300 ) {
        //thông báo lỗi
            $Temp.="Kích thướt file quá lớn";
        }else{
            $tam = preg_split('/[\/\\\\]-/', $tenfile);
            $filename = $tam[count($tam)-1];
            // kiem tra co phai la file anh ko?
            if ( !preg_match('/\.(gif|jpg)$/i',$filename)) {
                    $Temp.="File không phải là dạng GIF hoặc JPG";
            }else{
                    if(preg_match('/\.(gif)$/i',$filename))
                    {
                        $tenhinhmoi = $maNew.".gif";
                    }else if(preg_match('/\.(jpg)$/i',$filename))
                    {
                        $tenhinhmoi = $maNew.".jpg";
                    }
                    $upload_file = "./images/sanpham/".$tenhinhmoi;
                    if ( !isset($loiupload) || $loiupload != 0 ) {
                             $Temp.="Lỗi trong quá trình upload";
                    }else if( move_uploaded_file($_FILES["file_upload"]["tmp_name"], $upload_file) ) {
                      //////file đã được upload và thư mục lưu trữ thành công
                            $truyvan = sprintf("INSERT INTO dochoi (MaDoChoi, TenDoChoi, MaLoai, MaNSX, DonGia, ThongTin, HinhAnh,NgayNhap) VALUES ('%s', '%s',%d, %d, '%s', '%s', '%s', '%s')",$maNew,$tendochoi,$maloaidochoi,$masanxuat,$giaban,$thongtin,$tenhinhmoi,$ngaycapnhat);
                            $kq = MySQLHelper::executeQuery($truyvan);
                            if($kq==1){
                                    header( "refresh:5; url=index.php?action=ProductsAdmin" );
                                    $Temp.="Thêm đồ chơi thành công! <a href='index.php?action=ProductsAdmin'>Quay lại</a> ";
                                }else{
                                    $Temp.="Thêm thất bại";
                                }
                          } else {
                                $Temp.="Quá trình thêm đồ chơi thất bại";
                          }
                        }
                }
/** Khởi tạo content */
$ctpl = new XTemplate('./template/incContentBox.html');
$ctpl->assign('ContentTitle',"Quản lý đồ chơi - Thêm đồ chơi");
//đưa dữ liệu vào content
$ctpl->assign('ContentInfo', $Temp);
$ctpl->parse('box');
$Content = $ctpl->text('box');
/** Kết thúc content */
?>
