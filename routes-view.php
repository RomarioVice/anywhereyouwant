<?php
    $id = $_GET['id'];
    $type = $_GET['type'];
?>

<?php
include('/blocks/connect.php');
$result = mysql_query("SELECT * FROM $type WHERE id_route = $id");
$myrow = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo ($myrow['departure']. ' - ' .$myrow['destination'])?></title>
    <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/scroll.css" media="all">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pushy.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/hover-min.css" media="all">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

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
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
            <?php
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
            ?>
            <div class="wrapper">
                <div class="bg-container">
                    <div class="row">
                    <div style="clear:both;height:15px;width:100%"></div>
                        <div class="ro_desc col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                            <h1 class="font-h1">&nbsp;</h1>
                        </div>
                    </div>
                    <div id="container-r-v">
                        <p class="view-text"><span class="desc">Маршрут</span></p>
                        <div class="left-right">
                            <div class="left-block">
                                <p class="view-text"><span>Пункт отправки:</span> <?php echo $myrow['departure'] ?></p>
                                <p class="view-text"><span>Пункт назначения:</span> <?php echo $myrow['destination']?></p>
                                <p class="view-text"><span>Стоимость проезда:</span> <?php echo $myrow['cost']?> рублей</p>
                            </div>
                            <div class="right-block">
                                <p class="view-text"><span>Пункт отправки:</span> <?php echo $myrow['destination'] ?></p>
                                <p class="view-text"><span>Пункт назначения:</span> <?php echo $myrow['departure']?></p>
                                <p class="view-text"><span>Стоимость проезда:</span> <?php echo $myrow['cost']?> рублей</p>
                            </div>
                            <div class="cleaner"></div>
                        </div>
                        <p class="view-text"><span class="desc">Карта маршрута</span></p>
                        <br>
                        <p class="view-pic"><iframe src="<?php echo $myrow['g_map']?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                        <p class="view-text"><span class="desc">Описание</span></p>
                        <p class="view-text"><?php echo $myrow['description']?></p>
                        <br>
                        <br>
                        <a href="form.php" class="etc">Перейти к форме бронирования</a>
                    </div>
                </div>
            </div>
            <?php
                include('/blocks/footer-1.php');
            ?>
        </div>
    </body>
</html>