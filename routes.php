<?php
    include('blocks/head.php');
?>
    <body>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
            <?php
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
                include('/blocks/connect.php');
                include('/blocks/db.php');
                include('/blocks/slider.php');
            ?>
            <div class="wrapper">
                <h1 class="font-h1">Предоставляемые маршруты</h1>>
                <div class="bg-container-routes">
                    <!-- Your Content -->
                    <div id="container-routes">
                        <div class="normalazer">
<!--                        <iframe id="gmap" src="https://www.google.com/maps/embed?pb=!1m24!1m8!1m3!1d10249847.74089996!2d29.1239111!3d51.1563366!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x40e0909500919a2d%3A0x36335efdc5856f84!2z0JTQvtC90LXRhtC6LCDQlNC-0L3QtdGG0LrQsNGPINC-0LHQu9Cw0YHRgtGM!3m2!1d48.015882999999995!2d37.80285!4m5!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCwLCDQoNC-0YHRgdC40Y8!3m2!1d55.755826!2d37.6173!5e0!3m2!1sru!2sua!4v1475321707513" frameborder="0" style="border:0" allowfullscreen></iframe>-->
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
                            $perpage = 36; // Количество отображаемых данных из БД
                            if (empty($_GET['page']) || ($_GET['page'] <= 0)) {
                                $page = 1;
                            } else {
                                $page = (int) $_GET['page']; // Считывание текущей страницы
                            }
                            // Общее количество информации
                            $count = mysql_numrows(mysql_query('SELECT * FROM services ORDER BY destination ASC')) or die('error! Записей не найдено!');
                            $pages_count = ceil($count / $perpage); // Количество страниц
                            // Если номер страницы оказался больше количества страниц
                            if ($page > $pages_count) $page = $pages_count;
                            $start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД
                            // Вызов функции, для вывода ссылок на экран

                            // Вывод информации из базы данных
                            $result = R::getAll('SELECT * FROM services ORDER BY destination ASC LIMIT '.$start_pos.', '.$perpage) or die('error!');
                            foreach ($result as $row) {
                                echo <<<EOT
                                    <a href="routes-view.php?type=services&id=$row[id_route]" class="info">
                                        <div class="routes-table-bg">
                                            <table id="routes">
                                                <tr>
                                                    <td class="dd">$row[departure] <i class="fa fa-exchange" aria-hidden="true"></i> $row[destination]</td>
                                                </tr>
                                                <tr>
                                                    <td class="cost">$row[cost] рублей</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </a>
                              
EOT;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="news-pages-bg">
                <div class="news-pages">
                    <?php
                    // Вызов функции, для вывода ссылок на экран
                    yandex_link_bar($page, $count, $pages_count, 10);
                    ?>
                </div>
            </div>
            <?php
                include('blocks/footer-1.php');
            ?>
    </div>
    </body>
</html>