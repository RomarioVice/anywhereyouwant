<?php
function clean($value) {
    $value = trim($value); //удаление пробелов из начала и конца строки
    $value = str_replace(" ", "",$value);
    $value = stripslashes($value); //удаление экранированных символов
    $value = strip_tags($value); //удаление PHP и HTML тегов
    $value = htmlspecialchars($value); //преобразует специальные символы в HTML сущности

    return $value;
}
?>