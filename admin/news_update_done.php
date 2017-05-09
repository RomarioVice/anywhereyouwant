<?php
    require "connect.php";
?>

<?php if( isset($_SESSION['logged_user']) ) :  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Запись изменена</title>
    <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_admin.jpg">
        <?php
        include('blocks/site-header.php');
        include('blocks/menu.php');
        include('blocks/connect.php');
        ?>

        <div class="wrapper">
        <div style="clear:both;height:100px;width:100%"></div>
        <div class="row">
            <div class="edit_route_admin col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                <h1 class="font-h1">&nbsp;</h1>
            </div>
        </div>
        <?php
            //путь загрузки изображения
            global $picture_name; 
            $path = 'img/slider/';
            $tmp_path = 'tmp/';

            // Массив допустимых значений типа файла
            $types = array('image/gif', 'image/png', 'image/jpeg');

            // Максимальный размер файла
            $size = 3072000;
                                     
            //обработка запроса
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    // Проверяем тип файла
                    if (!empty($_FILES['picture']['type']) && !in_array($_FILES['picture']['type'], $types)) 
                        die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');

                    // Проверяем размер файла
                    if ($_FILES['picture']['size'] > $size)
                        die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');


                    // Загрузка файла и вывод сообщения
                    if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
                        echo '...';
                    else
                    {
                        // echo 'Загрузка удачна <a href="' . $path . $_FILES['picture']['name'] . '">Посмотреть</a>  ' ;
                        $picture_name = $path . $_FILES['picture']['name'];
                        
                    }
                    // echo $picture_name;
                }
        ?>

	<?php
		$id = $_GET['id'];
        $short_desc = substr($_POST['fullTxt'], 0, 295);
        $description = nl2br($_POST['fullTxt']);
		$result = mysql_query("UPDATE news SET title = '$_POST[title]', pic = '$picture_name', text = '$short_desc', fullTxt = '$description' WHERE id = '$_GET[id]'");
		echo '<meta http-equiv="Refresh" content="1; URL=news.php"';
	?>




        </div>
  <?php else : header('Location: login.php');?>
    <?php endif; ?>
    </div>
    </body>
</html>