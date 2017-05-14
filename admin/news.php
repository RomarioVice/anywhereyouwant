<?php
    require "connect.php";
?>

<?php if( isset($_SESSION['logged_user']) ) :  ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Администраторская панель - Новости</title>
    <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/normalize.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <link rel="stylesheet" href="../admin/css/pushy.css">
    <link rel="stylesheet" href="../admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="css/hover-min.css" media="all">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    </head>
    <body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg-admin2.jpg">
        <?php
            require_once('/blocks/config.php');
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
                include('/blocks/connect.php');
            ?>

        <div class="wrapper-news">
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
                $sperator = '&nbsp;'; // Разделитель ссылок;
                // Для придания ссылкам стиля
                $style = 'class="not-active-link"';
                $styleActivated = 'class="active-link"';
                $styleDots = 'class="disabled-link"';
                $begin = $page - intval($show_link / 2);
                unset($show_dots); // На всякий случай
                // Сам постраничный вывод
                // Если количество отображ. ссылок больше кол. страниц
                if ($pages_count <= $show_link + 1) $show_dots = 'no';
                // Вывод ссылки на первую страницу
                if (($begin > 2) && ($pages_count - $show_link > 2)) {
                echo '<a '.$style.' href='.$_SERVER['PHP_SELF'].'?page=1> <i class="fa fa-step-backward" aria-hidden="true"></i> </a> ';
                }
                for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок
                {
                $i = $begin + $j; // Номер ссылки
                // Если страница рядом с началом, то увеличить цикл для того,
                // чтобы количество ссылок было постоянным
                if ($i < 1) continue;
                // Подобное находится в верхнем цикле
                if (!isset($show_dots) && $begin > 1) {
                echo ' <a '.$styleDots.' href='.$_SERVER['PHP_SELF'].'?page='.($i-1).'><b>...</b></a> ';
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
                echo ' <a '.$styleDots.' href='.$_SERVER['PHP_SELF'].'?page='.($i+1).'><b>...</b></a> ';
                }
                }
                // Вывод ссылки на последнюю страницу
                if ($begin + $show_link + 1 < $pages_count) {
                echo ' <a '.$style.' href='.$_SERVER['PHP_SELF'].'?page='.$pages_count.'> <i class="fa fa-step-forward" aria-hidden="true"> </a>';
                }
                return true;
                } // Конец функции

                // Подготовка к постраничному выводу
                $perpage = 10; // Количество отображаемых данных из БД
                if (empty($_GET['page']) || ($_GET['page'] <= 0)) {
                $page = 10;
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
                            <div class="news_link">
                            
                                <div class="row">
                                    <div class="col-xs-12 col-md-10 col-md-offset-1 news-block">
                                        <div class="col-sm-2 col-md-2 hidden-xs">
                                            <img class="news-img" src="$row[pic]">
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-sm-offset-3 col-md-7 col-md-offset-3 col-lg-8 col-lg-offset-2">
                                            <div class="button-links">
                                <a href="view.php?type=news&id=$row[id]"><img class="watch_news_button" src="img/ic.svg" title="Просмотр"/></a>
                                            <a href="news_update.php?type=news&id=$row[id]"><img class="edit_news_button" src="img/edit.svg" title="Редактировать"/></a>
                                            <a href="delete_news_done.php?type=news&id=$row[id]"><img class="delete_news_button" src="img/delete.svg" onClick="document.location.reload(true)" title="Удалить"/></a>
                                </div>
                                            <p class="news-title">$row[title]</p>
                                            <p class="publication-date">$row[formated_date]</p>
                                            <p class="news-text">$row[text]...</p>
                                        </div>
                                    </div>
                                </div>  
                            </div>
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
    <?php else : header('Location: login.php');?>
    <?php endif; ?>
    </body>
</html>