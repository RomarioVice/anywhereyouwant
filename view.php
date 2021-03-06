<?php
    $id = $_GET['id'];
    $type = $_GET['type'];
?>

<?php
include('/blocks/connect.php');
$result = mysql_query("SELECT * FROM $type WHERE id = $id");
$myrow = mysql_fetch_array($result);
?>

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

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pushy.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/slicebox.css">
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

    <!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/parallax.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
    <script type="text/javascript" src="js/jquery.slicebox.js"></script>
    <script type="text/javascript" src="https://vk.com/js/api/share.js?94" charset="windows-1251"></script>

</head>
    <body>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
            <?php
                include('/blocks/site-header.php');
                include('/blocks/menu.php');

                include('/blocks/slider.php');
            ?>
            <div class="wrapper">
                <div class="bg-container">
                    <h1 class="font-h1"></h1>
                    <!-- Your Content -->
                    <div id="container-view">
                        <p class="view-title"><?php echo $myrow['title'] ?></p>
                        <img class="view-pic" src="<?php echo $myrow['pic'] ?>">
                        <p class="view-text"><?php echo $myrow['fullTxt']?></p>
                        <div class="social">
                            <p class="view-date">Дата публикации: <?php echo DateTime::createFromFormat('Y-m-d', $myrow['nDate'])->format('d-m-Y');?></p>
                            <p class="social-row">
                            <script type="text/javascript"><!--
                                document.write(VK.Share.button(false,{type: "custom", text: "<img src=\"https://vk.com/images/share_32.png\" width=\"30\" height=\"30\" />"}));
                            --></script>

                            <span id="ok_shareWidget"></span>
                            <script>
                                !function (d, id, did, st, title, description, image) {
                                    var js = d.createElement("script");
                                    js.src = "https://connect.ok.ru/connect.js";
                                    js.onload = js.onreadystatechange = function () {
                                        if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
                                            if (!this.executed) {
                                                this.executed = true;
                                                setTimeout(function () {
                                                    OK.CONNECT.insertShareWidget(id,did,st, title, description, image);
                                                }, 0);
                                            }
                                        }};
                                    d.documentElement.appendChild(js);
                                }(document,"ok_shareWidget",document.URL,'{"sz":30,"st":"straight","nc":1,"nt":1}',"","","");
                            </script>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                include('/blocks/footer.php');
            ?>
        </div>
    </body>
</html>