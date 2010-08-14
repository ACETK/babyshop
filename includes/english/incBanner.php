<?php

$sql = "SELECT MaDoChoi,Banner FROM khuyenmai WHERE Banner <> NULL OR Banner <> '' ORDER BY RAND() LIMIT 4";
$result = MySQLHelper::executeQuery($sql);
if (mysql_num_rows($result) >= 4) {
    while ($row = mysql_fetch_assoc($result)) {
        $BannerImg[] = 'images/banners/' . $row['Banner'];
        $BannerLink[] = 'index.php?action=detail&id=' . $row['MaDoChoi'];
    }
    $BannerName = "Click để xem chi tiết";
    /** Khởi tạo banner */
    $btpl = new XTemplate('./template/english/incBanner.html');
    $btpl->assign('BannerLink1', $BannerLink[0]);
    $btpl->assign('BannerLink2', $BannerLink[1]);
    $btpl->assign('BannerLink3', $BannerLink[2]);
    $btpl->assign('BannerLink4', $BannerLink[3]);

    $btpl->assign('BannerImg1', $BannerImg[0]);
    $btpl->assign('BannerImg2', $BannerImg[1]);
    $btpl->assign('BannerImg3', $BannerImg[2]);
    $btpl->assign('BannerImg4', $BannerImg[3]);

    $btpl->assign('BannerName1', $BannerName);
    $btpl->assign('BannerName2', $BannerName);
    $btpl->assign('BannerName3', $BannerName);
    $btpl->assign('BannerName4', $BannerName);

    $btpl->parse('banner');
    $Banner = $btpl->text('banner');
    /** Kết thúc box */
}else{
    $Banner = "";
}
?>
