<?php
    include "blocks/connect.php";
?>

<?php
    $id = $_GET['id'];
    $type = $_GET['type'];
?>


<?php
$result = mysql_query("SELECT * FROM $type WHERE id = $id");
$myrow = mysql_fetch_array($result);
?>


<?php
    include "connect.php";
?>

<?php if( isset($_SESSION['logged_user']) ) :  ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $myrow['title'] ?></title>
    <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/normalize.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <link rel="stylesheet" href="../admin/css/pushy.css">
    <link rel="stylesheet" href="../admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="../admin/css/custom.css">
    <link rel="stylesheet" href="../admin/css/form_add.css">
    
    
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
        include('blocks/site-header.php');
        include('blocks/menu.php');
        ?>
        <div class="wrapper">
            <div class="bg-container">
            
                <!-- Your Content -->
                <div id="container_no_bg">
                    <div id = "center-plz">

                        <form enctype="multipart/form-data" id="add" class="add_form" action="news_update_done.php?type=<?php echo $_GET['type']?>&id=<?php echo $_GET['id']?>" method="POST">
                            <ul>
                                <li>
                                    <label for="title">Заголовок:</label>
                                    <input style="width: 100%;" type="text" name="title" placeholder="Заголовок" size="200" value="<?php echo $myrow['title'] ?>" autocomplete="off" required/>
                                    <span class="add_form_hint">Верный формат "Добро пожаловать, дорогой Гость!"</span>
                                </li>
                                
                                <li>
                                    <label for="pic">Изображение:</label> 
                                    <br>
                                    <img class="view-pic" src="<?php echo $myrow['pic'] ?>">
                                    <?php $pict = $myrow['pic'] ?>
                                    <br>
                                    <input style="width: 90%; margin: 0 auto;" type="file" name="picture" value = "<?php echo $pict ?>"/>
                                    <span class="add_form_hint">Изображение должно быть в разрешении 604 x 329</span>
                                </li>
                                <li>
                                <label for="fullTxt">Описание:</label>
                                    <textarea class="add_form_textarea2" name="fullTxt" placeholder="Необходимая информация..." autocomplete="off" required><?php echo $myrow['fullTxt'] ?></textarea>
                                </li>
                    
                        <li class="buttons">
                            <button class="submit" type="submit" name="submit">Редактировать</button>
                        </li>
                        </ul>
                    </form>
               
                    </div>
                </div>
            </div>
        
        <?php
        include('blocks/footer-1.php');
        ?>
<?php else : header('Location: login.php');?>
<?php endif; ?>
            </div>
        </div>
    </body>
</html>