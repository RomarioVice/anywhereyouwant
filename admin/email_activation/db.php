<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', '1234');
define('DB_DATABASE', 'anywhereyouwant');
$email_to = 'Romario_12395@mail.ru';
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$base_url='localhost/www/email_activation/';
?>