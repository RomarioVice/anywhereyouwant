<?php
    require "connect1.php";


    if( !empty($_POST["dfile"])) {
        $mass = $_POST["dfile"];

        $i = 0;
        while ($mass[$i]) {
            $result1 = mysql_query("DELETE FROM orders WHERE id=$mass[$i]") or die("Query failed");
            $i++;
        }
        Header("Location: index.php");
    } else {
    Header("Location: index.php");
    }