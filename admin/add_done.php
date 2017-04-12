<?php
    require "connect.php";
?>

<?php if( isset($_SESSION['logged_user']) ) :  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Администраторская панель - Увезём - куда захочешь!</title>
    <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pushy.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/form.css">

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

    <!--    <link rel="stylesheet" href="css/bootstrap.css">-->

    <!-- js -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/parallax.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
    <script type="text/javascript" src="js/jquery.slicebox.js"></script>
    <script type="text/javascript" src="https://vk.com/js/api/share.js?94" charset="windows-1251"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>

</head>
    <body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
        <?php
        include('blocks/site-header.php');
        include('blocks/menu.php');
        include('blocks/connect.php');
        ?>
        <div class="wrapper">

        <?php
            $result = mysql_query("INSERT INTO services (departure, destination, cost, g_map, description) VALUES ('$_POST[departure]', '$_POST[destination]', '$_POST[cost]', '$_POST[g_map]','$_POST[description]')");
            ?>
        <div class="bg-container">
                <h1 class="font-h1"><a name="about">Добавить маршрут</a></h1>
                <!-- Your Content -->
                <div id="container">
                    <div id = "center-plz">
                        <form id="add" class="contact_form" action="add_done.php" method="POST">
                            <ul>
                                <li>
                                    <label for="departure">Пукнт отправки:</label>
                                    <input type="text" name="departure" placeholder="Пункт отправки" size="50" value="" pattern="^[а-яА-Я]+$" required/>
                                    <span class="form_hint">Верный формат "Санкт-Петербург"</span>
                                </li>
                                <li>
                                    <label for="destination">Пункт назначения:</label>
                                    <input type="text" name="destination" placeholder="Пункт назначения" size="50" value="" pattern="^[а-яА-Я]+$" required/>
                                    <span class="form_hint">Верный формат "Донецк"</span>
                                </li>
                                <li>
                                    <label for="cost">Стоимость:</label>
                                    <input type="text" name="cost" placeholder="Стоимость" size="6" value="" pattern="^[0-9]+$" required/>
                                    <span class="form_hint">Верный формат "2100"</span>
                                </li>
                                <li>
                                    <label for="g_map">Ссылка на карту:</label>
                                    <textarea name="g_map" placeholder="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d17691238.392362777!2d18.160900128900717!3d57.229761736698315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x40e0909500919a2d%3A0x36335efdc5856f84!2z0JTQvtC90LXRhtC6!3m2!1d48.015882999999995!2d37.80285!4m5!1s0x44341030ed0c22d5%3A0x98c6ba30cbc321a5!2z0JzRg9GA0LzQsNC90YHQuiwg0JzRg9GA0LzQsNC90YHQutCw0Y8g0L7QsdC7Liwg0KDQvtGB0YHQuNGP!3m2!1d68.9585244!2d33.0826598!5e0!3m2!1sru!2sua!4v1491845889930" required></textarea>
                                </li>
                                <li>
                                    <label for="description">Описание:</label>
                                    <textarea name="description" placeholder="Необходимая информация..."></textarea>
                                </li>
                    
                                <li class="buttons">
                                    <button class="submit" type="submit" name="add">Сохранить</button>
                                </li>
                            </ul>
                        </form>
                    </div>
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