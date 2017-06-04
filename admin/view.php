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
    <meta http-equiv="content-type" content="text/html; charset=windows-1251">
    <title><?php echo $myrow['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta property="og:type" content="profile"/>
    <meta property="og:title" content="<?php echo addslashes($myrow['title']) ?>"/>
    <meta property="og:description" content="<?php echo $myrow['text']?>"/>
    <meta property="og:image" content="img/slide_1.jpg"/>
    <meta property="og:url" content="http://www.site.com"/>
    <meta property="og:site_name" content="Название сайта"/>
    <meta property="og:see_also" content="http://www.website.com"/>
    <meta property="fb:admins" content="Facebook_ID"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pushy.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
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

    <!--    <link rel="stylesheet" href="css/bootstrap.css">-->

    <!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/parallax.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="https://vk.com/js/api/share.js?94" charset="windows-1251"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
    <body>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg-admin2.jpg">
            <?php
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
            ?>
            <div class="wrapper">
                <div class="bg-container">
                    <br>
                    <br>
                    <!-- Your Content -->
                    <div id="container-view">
                        <br>
                        <div id="container-links">
                            <a class="a-news a-arrow-right" href="news.php?page=1">Новости</a>&nbsp;&nbsp;&nbsp;<a class="a-news a-arrow-right" href=""><?php echo $myrow['title'] ?></a>
                        </div>
                        <p class="view-date"><?php echo DateTime::createFromFormat('Y-m-d', $myrow['nDate'])->format('d-m-Y');?></p>
                        <br>
                        <br>
                        <img class="view-pic" src="<?php echo $myrow['pic'] ?>">
                        <div style="width: 95%; margin: 0 auto;">
                            <hr class="view-rules">
                        </div>
                        <p class="view-title"><?php echo $myrow['title'] ?></p>
                        <p class="view-text"><?php echo $myrow['fullTxt']?></p>
                        <div style="width: 95%; margin: 0 auto;">
                            <hr class="view-rules">
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <div style="clear:both;height:50px;width:100%"></div>
            <?php
                include('blocks/footer-1.php');
            ?>
    <?php else : header('Location: login.php');?>
    <?php endif; ?>
        </div>
    </body>
</html>