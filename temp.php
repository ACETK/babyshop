<?php

function set_page($sql, $per_page=1, $page_url, $link="") {
    global $num_pages, $page, $pageindex;
    if ($page_url == "") {
        $page_url = "main.php";
    }
//List IMG
    $number_select_img = "images/page/pagingon.gif";
    $number_img = "images/page/paging.gif";
    $first_img = "images/page/dau.gif";
    $back_img = "images/page/truoc.gif";
    $next_img = "images/page/sau.gif";
    $last_img = "images/page/cuoi.gif";
//End List ImG
    if (!$page)
        $page = 1;
    $query = mysql_query($sql);
    $page_start = ($per_page * $page) - $per_page;
    $num_rows = mysql_num_rows($query);
    if ($per_page) {
        if ($num_rows <= $per_page)
            $num_pages = 1;
        else {
            if (($num_rows % $per_page) == 0)
                $num_pages = ($num_rows / $per_page);
            else
                $num_pages = ($num_rows / $per_page) + 1;
        }
        $num_pages = (int) $num_pages;
        if (($page > $num_pages) || ($page < 0))
            exit("Page doesn't exist !!");
        $sql = $sql . " LIMIT $page_start, $per_page";
    }
    else
        $num_pages = 1;
    $total = $num_pages;
    if ($page > $per_page) {
        $num_page = ceil($page / $per_page);
        $showpage = ($num_page - 1) * $per_page;
        $end = $showpage + $per_page;
        $showpage++;
    } else {
        $thispage = 1;
        $showpage = 1;
        $end = $per_page;
    }
    $startpage = $showpage;
    for ($showpage; $showpage < $end + 1; $showpage++) {
        if ($showpage <= $total) {
            if ($page == $showpage) {
                $pageindex.="<b><font face=\"verdana\" size=1 style=\"padding: 5px;padding-bottom: 4px; background-image: url('$number_select_img'); background-repeat: no-repeat; background-position: center \">" . $showpage . "</font></b>";
            } else {
                $pageindex.="<b><a href=\"javascript:void(0);\" onclick=\"m('$page_url?time='+new Date().getTime()+'&page=$showpage&" . $link . "');\" style=\"padding: 5px;padding-bottom: 4px; background-image: url('$number_img'); background-repeat: no-repeat; background-position: center; text-decoration: none\"><font face=\"verdana\" size=1 color=\"#000000\">" . $showpage . "</font></a></b>";
            }
        }
    }
    if ($num_page > 1) {
        $back = $startpage - 1;
        if ($num_page > 2) {
            $list_page1 = "<a href=\"javascript:void(0);\" onclick=\"m('$page_url?time='+new Date().getTime()+'&page=1&" . $link . "');\"><img src='$first_img' border=0></a> ";
        }
        $list_page1.="<a href=\"javascript:void(0);\" onclick=\"m('$page_url?time='+new Date().getTime()+'&&page=$back&$" . link . "');\"><img src='$back_img' border=0></a> ";
    }
    if ($num_page < ceil($total / $per_page) && ($total > $per_page)) {
        $next = $showpage;
        $list_page2.=" <a href=\"javascript:void(0);\" onclick=\"m('$page_url?time='+new Date().getTime()+'&page=$next&" . $link . "');\"><img src='$next_img' border=0></a>";
        $list_page2.=" <a href=\"javascript:void(0);\" onclick=\"m('$page_url?time='+new Date().getTime()+'&page=$total&" . $link . "');\"><img src='$last_img' border=0></a>";
    }
    $pageindex = $list_page1 . $pageindex . $list_page2;
    return $sql;
}
?>