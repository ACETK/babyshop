<?php

class MySQLHelper {

    public static function executeQuery($sql) {
        
        $hostName = "localhost";
        $databaseName = "SHOPDOCHOI";
        $username = "root";
        $password = "";

        function showError() {
            die("Error " . mysql_errno( ) . " : " . mysql_error( ));
        }

        // Tao ket noi CSDL
        if (!($connection = mysql_connect($hostName, $username, $password)))
            die("couldn't connect to $hostName");

        if (!(mysql_select_db($databaseName, $connection)))
            showError();

        // Thiet lap font Unicode
        if (!(mysql_query("set names 'utf8'")))
            showError();

        // Thuc thi cau truy van
        if (!($result = mysql_query($sql, $connection)))
            showError();

        // Dong ket noi CSDL
        if (!(mysql_close($connection)))
            showError();

        return $result;
    }

}
?>
