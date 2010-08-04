<?php
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp


$Temp='
    <form method="post" action="" >
                    <table width="100%" cellspacing="5" cellpadding="0" border="0" style="height: 150px">
                                             <tbody>

                                                                                        <td class="main"><b>Tên tài khoản:</b></td></tr>
                                                                                        <tr><td class="main width3_100"><input type="text" name="taikhoan"></td></tr>
                                                                                        <tr>
                                                                                          <td class="main"><b>Mật khẩu:</b></td></tr>
                                                                                        <tr><td class="main width3_100"><input type="password" maxlength="40" name="password"></td></tr>
                                                                                        <tr><td colspan="2"><img width="100%" height="10" border="0" alt="" src="images/pixel_trans.gif"></td></tr>
                                                                                        <tr><td class="smallText"><a href="index.php?action=PasswordForgotten">Quên mật khẩu? Nhấp vào đây.</a></td></tr>

                                                                                        <tr><td>
                                                                                                <table width="100%" cellspacing="0" cellpadding="2" border="0">
                                                                                                    <tbody><tr>
                                                                                                            <td align="center"><input type="submit" name="ok" value="Đăng nhập" title=" Đăng nhập " alt="Đăng nhập"></td>
                                                                                                        </tr>
                                                                                                    </tbody></table>
                                                                                            </td></tr>
                                                                                            
                                                                                    </tbody></table>
                                                                                    </form>';
session_start();
    if(isset($_POST['ok']))
    {
        //// Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
             $username = $_POST['taikhoan'] ;
             $password =  $_POST['password']  ;
             // Lấy thông tin của username đã nhập trong table nguoidung
            $sql = "SELECT TenTaiKhoan,MatKhau FROM nguoidung WHERE TenTaiKhoan='$username'";
            $result = MySQLHelper::executeQuery($sql);
            $member = mysql_fetch_array($result);
        // Nếu username này không tồn tại thì....
            if($username == NULL && $password == NULL)
                {
                  $Temp.="Tên tài khoản và mật khẩu không được bỏ trống </br>";}
            else{
                if($username != $member['TenTaiKhoan']){
                    $Temp.= "Tên tài khoản chưa có! ";
                }else{
                    if($password != $member['MatKhau']){
                        $Temp.= "Sai mật khẩu";
                    }else{
                     // Khởi động phiên làm việc (session)
                    $_SESSION['user'] = $member['TenTaiKhoan'];
                    $Temp="";
                    $Temp.='
                     <form name = "Logout" method ="post" action = "">
                                        <table>
                                            <tr> <td> Chào <a href="">'.$member['TenTaiKhoan'].' </a> | <input type="submit" name="thoat" value="Thoát" title=" Đăng xuất " alt="Đăng xuất"> </td></tr>
                                        </form>
                                        </table>';
                                        if(isset ($_POST['thoat'])){
                                            if (session_destroy()){
                                                $Temp.= "Thoát thành công!";
                                            }
                                       }
                    }
                }
            }
               
            
                
                
            
                 
    //       	 if($_POST['taikhoan'] == NULL)
    //            {
    //              $Temp.="Tên tài khoản không được bỏ trống </br>";}
    //         if($_POST['password'] == NULL)
    //            {
    //                 $Temp.= "Mật khẩu không được bỏ trống";
    //            }
    //         if($u!= NULL && $p!= NULL)
    //            {
    //              $sql="select TenTaiKhoan,MatKhau from nguoidung where TenTaiKhoan='".$u."' and MatKhau='".$p."'";
    //              $result = MySQLHelper::executeQuery($sql);
    //                  if(mysql_num_rows($result) == 0)
    //                  {
    //                      $Temp.= "Tên tài khoản hoặc mật khẩu sai, vui lòng nhập lại";
    //                  }
    //                  else
    //                  {
    //                      // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    //
    //                      $row=mysql_fetch_array($result);
    //                      //bat dat phien lam viec
    //                     session_start();
    //                    if(isset ($tentk)){
    //                          unset($tentk['TenTaiKhoan']);
    //                     }
    //                     session_register("tentk");
    //                     $tentk['TenTaiKhoan'] = $row['TenTaiKhoan'];
    //
    //                //	   $_SESSION['level'] = $row[level];
    //                       $Temp="";
    //                        $Temp.='
    //                            <form name = "frmLogout" method ="post" action = "">
    //                            <table>
    //                            <tr> <td> Chào '.$member['TenTaiKhoan'].' | <a href="">Thoát </a> </td></tr>
    //                            </form>
    //                            </table>';
    //
    //
    //                   }
    //
    //
    //
    //          }

    }





//Kết thúc nghiệp vụ
/** Khởi tạo box */
$btpl = new XTemplate('./template/incInfoBox.html');
$btpl->assign('BoxTitle','Đăng nhập');
//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$Login = $btpl->text('box');
/** Kết thúc box */
?>
