<?php
/** Khởi tạo box */
$btpl = new XTemplate('./template/incInfoBox.html');
$btpl->assign('BoxTitle','Manufacturers');

//Sử lý nghiệp vụ -- yêu cầu gán vào biến $Temp
$Temp = '<form name="manufacturers" action="" method="get">
    <table cellpadding="0" cellspacing="0" border="0">
        <tr><td><select name="manufacturers_id" onChange="" size="1" class="select">
                    <option value="" SELECTED>Please Select</option>
                    <option value="1">Example_1</option>
                    <option value="2">Example_2</option>
                    <option value="3">Example_3</option>
                </select>
            </td></tr>
    </table>
</form>';
    //Kết thúc nghiệp vụ

//đưa dữ liệu vào box
$btpl->assign('BoxInfo', $Temp);
$btpl->parse('box');
$Manufacturers = $btpl->text('box');
/** Kết thúc box */
?>
