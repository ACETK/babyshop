<?php
//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Loi="";
 $Temp='
                    <form method="post" action="" name="login">
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
if(isset($_POST['ok']))
{      
         $u=$_POST['taikhoan'];
         $p=$_POST['password'];
       	 if($_POST['taikhoan'] == NULL)
            {
              $Temp.="Tên tài khoản không được bỏ trống </br>";}
         if($_POST['password'] == NULL)
            {  
                 $Temp.= "Mật khẩu không được bỏ trống";
            }
         if($u!= NULL && $p!= NULL)
            {
              $sql="select TenTaiKhoan,MatKhau from nguoidung where TenTaiKhoan='".$u."' and MatKhau='".$p."'";
              $result = MySQLHelper::executeQuery($sql);
                  if(mysql_num_rows($result) == 0)
                  {
                      $Temp.= "Tên tài khoản hoặc mật khẩu sai, vui lòng nhập lại";
                  }
                  else
                  {
                      $row=mysql_fetch_array($result);
//                      session_start();
//                       session_register("tentk");
                     session_start();
                    if(isset ($tentk)){
                          unset($tentk['TenTaiKhoan']);
                     }
                     session_register("tentk");
                     $tentk['TenTaiKhoan'] = $row['TenTaiKhoan'];

                //	   $_SESSION['level'] = $row[level];
                       $Temp="";
                        $Temp.='
                            <form name = "frmLogout" method ="post" action = "">
                            <table> 
                            <tr> <td> Chào '.$tentk['TenTaiKhoan'].' | <a href="">Thoát </a> </td></tr>
                               </form>
                                 </table>';
                       
                        
                   }

                   

          }
            
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
