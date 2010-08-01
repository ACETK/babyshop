<?php

class MySQLHelper {

    public static function executeQuery($sql) {
        
        $hostName = "localhost";
        $databaseName = "SHOPDOCHOI";
        $username = "root";
        $password = "";

        // Tao ket noi CSDL
        if (!($connection = mysql_connect($hostName, $username, $password)))
            die("couldn't connect to $hostName");

        if (!(mysql_select_db($databaseName, $connection)))
            die("Error " . mysql_errno( ) . " : " . mysql_error( ));

        // Thiet lap font Unicode
        if (!(mysql_query("set names 'utf8'")))
           die("Error " . mysql_errno( ) . " : " . mysql_error( ));

        // Thuc thi cau truy van
        if (!($result = mysql_query($sql, $connection)))
           die("Error " . mysql_errno( ) . " : " . mysql_error( ));

        // Dong ket noi CSDL
        if (!(mysql_close($connection)))
            die("Error " . mysql_errno( ) . " : " . mysql_error( ));

        return $result;
    }

}
?>
