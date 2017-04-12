<?php
    require "connect.php";
?>

<?php if( isset($_SESSION['logged_user']) ) :  ?>

   <?php 
    require "blocks/head.php";
    ?>
    <body>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
            <?php
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
                include('/blocks/connect.php');
            ?>
            <div class="wrapper">
                <div class="row">
                <div style="clear:both;height:15px;width:100%"></div>
                    <div class="ro_bg col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                        <h1 class="font-h1">&nbsp;</h1>
                    </div>
                </div>
                <div class="bg-container-routes">
                    <!-- Your Content -->
                    <div id="container-routes">
                        <div class="normalazer">

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
                            $perpage = 12; // Количество отображаемых данных из БД
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
                                    <a href="route_update.php?id=$row[id_route]" class="info">
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
    <?php else : header('Location: login.php');?>
    <?php endif; ?>
    </body>
</html>