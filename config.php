<?php

$host = "localhost"; // Сервер
$db_name = "anywhereyouwant"; // Имя БД
$login = "admin";   // Логин пользователя БД
$password = "1234"; // Пароль пользователя БД

$connect = mysql_connect("$host","$login","$password"); // Переменная, с помощью которой мы подключаемся к БД

if (!$connect) {
    exit(mysql_error());
}
else {
    mysql_select_db("$db_name", $connect);
}

mysql_query("SET NAMES 'utf-8'");
?>