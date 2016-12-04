<?php
function check($page, $pages_count)
{
    for ($j = 1; $j <= $pages_count; $j++)
    {
        // Вывод ссылки
        if ($j == $page) {
            echo ' <a style="color: #808000;" ><b>'.$j.'</b></a> ';
        } else {
            echo ' <a style="color: #808000;" href='.$_SERVER['php_self'].'?page='.$j.'>'.$j.'</a> ';
        }
        // Выводим разделитель после ссылки, кроме последней
        // например, вставить "|" между ссылками
        if ($j != $pages_count) echo ' ';
    }
    return true;
} // Конец функции

// Подготовка к постраничному выводу
$perpage = 2; // Количество отображаемых данных из БД

if (empty(@$_GET['page']) || ($_GET['page'] <= 0)) {
$page = 1;
} else {
$page = (int) $_GET['page']; // Считывание текущей страницы
}
// Общее количество информации
$count = mysql_numrows(mysql_query('select * from news')) or die('error! Записей не найдено!');
$pages_count = ceil($count / $perpage); // Количество страниц

// Если номер страницы оказался больше количества страниц
if ($page > $pages_count) $page = $pages_count;
$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

// Вызов функции, для вывода ссылок на экран
check($page, $pages_count);

// Вывод информации из базы данных
echo '<p><b>Постраничный вывод информации</b></p>';
$result = mysql_query('SELECT * FROM news ORDER BY nDate DESC LIMIT '.$start_pos.', '.$perpage) or die('error!');
while ($row = mysql_fetch_array($result)) {
    echo <<<EOT
                            <div id="container">
                                    <div class="news">
                                        <p class="news-title">$row[title]</p>
                                        <p class="news-pic">$row[pic]</p>
                                        <p class="news-text">$row[text]... <a class='etc' href='view.php?type=news&id=$row[id]'>Подробнее</a></p>
                                        <p class="publication-date">Дата публикации: $row[nDate]</p>
                                        <p>&nbsp;</p>
                                </div>
                            </div>
EOT;
}
?>