<?php

// подключение к базе данных
$host = mysql_connect('localhost', 'admin', "1234");
mysql_select_db('anywhereyouwant', $host);

// кодировка utf-8
mysql_query("set_client='utf8'");
mysql_query("set_character_set_results='utf8'");
mysql_query("set_collation_connection='utf8_general_ci'");
mysql_query("SET NAMES utf8");

?>