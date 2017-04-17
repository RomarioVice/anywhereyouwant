<?php
    include('/blocks/head.php');
?>
    <body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
        <?php
            require_once('/blocks/config.php');
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
                include('/blocks/connect.php');
            ?>

        <div class="wrapper">
            <div class="bg-container">
                <div class="row">
                <div style="clear:both;height:15px;width:100%"></div>
                    <div class="news_bg col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                        <h1 class="font-h1">&nbsp;</h1>
                    </div>
                </div>
                <!-- Your Content -->
                <?php
                function yandex_link_bar($page, $count, $pages_count, $show_link)
                {
                // $show_link - это количество отображаемых ссылок;
                // нагляднее будет, когда это число будет парное
                // Если страница всего одна, то вообще ничего не выводим
                if ($pages_count == 1) return false;
                $sperator = '|'; // Разделитель ссылок;
                // Для придания ссылкам стиля
                $style = 'style="color: #FFFFFF; text-decoration: none;"';
                $styleActivated = 'style="color: #FF0000; font-size:  20px;"';
                $begin = $page - intval($show_link / 2);
                unset($show_dots); // На всякий случай
                // Сам постраничный вывод
                // Если количество отображ. ссылок больше кол. страниц
                if ($pages_count <= $show_link + 1) $show_dots = 'no';
                // Вывод ссылки на первую страницу
                if (($begin > 2) && ($pages_count - $show_link > 2)) {
                echo '<a '.$style.' href='.$_SERVER['PHP_SELF'].'?page=1> |< </a> ';
                }
                for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок
                {
                $i = $begin + $j; // Номер ссылки
                // Если страница рядом с началом, то увеличить цикл для того,
                // чтобы количество ссылок было постоянным
                if ($i < 1) continue;
                // Подобное находится в верхнем цикле
                if (!isset($show_dots) && $begin > 1) {
                echo ' <a '.$style.' href='.$_SERVER['PHP_SELF'].'?page='.($i-1).'><b>...</b></a> ';
                $show_dots = "no";
                }
                // Номер ссылки перевалил за возможное количество страниц
                if ($i > $pages_count) break;
                if ($i == $page) {
                echo ' <a '.$styleActivated.' ><b>'.$i.'</b></a> ';
                } else {
                echo ' <a '.$style.' href='.$_SERVER['PHP_SELF'].'?page='.$i.'>'.$i.'</a> ';
                }
                // Если номер ссылки не равен кол. страниц и это не последняя ссылка
                if (($i != $pages_count) && ($j != $show_link)) echo $sperator;
                // Вывод "..." в конце
                if (($j == $show_link) && ($i < $pages_count)) {
                echo ' <a '.$style.' href='.$_SERVER['PHP_SELF'].'?page='.($i+1).'><b>...</b></a> ';
                }
                }
                // Вывод ссылки на последнюю страницу
                if ($begin + $show_link + 1 < $pages_count) {
                echo ' <a '.$style.' href='.$_SERVER['PHP_SELF'].'?page='.$pages_count.'> >| </a>';
                }
                return true;
                } // Конец функции

                // Подготовка к постраничному выводу
                $perpage = 10; // Количество отображаемых данных из БД
                if (empty($_GET['page']) || ($_GET['page'] <= 0)) {
                $page = 1;
                } else {
                $page = (int) $_GET['page']; // Считывание текущей страницы
                }
                // Общее количество информации
                $count = mysql_numrows(mysql_query('SELECT * FROM news')) or die('error! Записей не найдено!');
                $pages_count = ceil($count / $perpage); // Количество страниц
                // Если номер страницы оказался больше количества страниц
                if ($page > $pages_count) $page = $pages_count;
                $start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД
                // Вызов функции, для вывода ссылок на экран

                // Вывод информации из базы данных
                $result = mysql_query("SELECT id, title, text, pic, DATE_FORMAT(nDate, '%d.%m.%Y') as formated_date FROM news ORDER BY nDate DESC LIMIT ".$start_pos.', '.$perpage) or die('error!');
                while ($row = mysql_fetch_array($result)) {
                    echo <<<EOT
                            <a class="news_link" href='view.php?type=news&id=$row[id]'>
                                <div class="row">
                                    <div class="col-xs-12 col-md-10 col-md-offset-1 news-block">
                                        <div class="col-sm-2 col-md-2 hidden-xs">
                                            <img class="news-img" src="$row[pic]">
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-sm-offset-3 col-md-7 col-md-offset-3 col-lg-8 col-lg-offset-2">
                                            <p class="news-title">$row[title]</p>
                                            <p class="publication-date">$row[formated_date]</p>
                                            <p class="news-text">$row[text]...</p>
                                        </div>
                                    </div>
                                </div>  
                            </a>  
                        <br>                                    
EOT;
                }
                ?>



            </div>
            <div class="news-pages-bg">
                <div class="news-pages">
                    <?php
                    // Вызов функции, для вывода ссылок на экран
                    yandex_link_bar($page, $count, $pages_count, 10);
                    ?>
                </div>
            </div>
        </div>
        <?php
            include('blocks/footer-1.php');
        ?>
    </div>
    </body>
</html>