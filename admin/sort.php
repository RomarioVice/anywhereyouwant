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

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/pushy.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/style.css">
    

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

    <!-- js -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/parallax.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
    <script type="text/javascript" src="js/jquery.slicebox.js"></script>
    <script type="text/javascript" src="https://vk.com/js/api/share.js?94" charset="windows-1251"></script>

</head>
    <body>
<div class="parallax-window" data-parallax="scroll" data-image-src="img/bg-admin2.jpg">
    <?php
    include('blocks/site-header.php');
    include('blocks/menu.php');
    include('blocks/connect.php');
    ?>
    <div class="wrapper">
    <div class="bg-container">
    <div style="height:25px;width:100%"></div>
                <div class="row">
                    <div class="or_admin col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                        <h1 class="font-h1">&nbsp;</h1>
                    </div>
                </div>
                <div style="height:25px;width:100%"></div>
    <!-- Your Content -->
    <div id="container">
    <a class="back-button" href="index.php"><img src="img/back_button.svg" width="50px" height="50px" style="position: absolute;
    top: 5px; left: 10px;" title="На главную" alt="На главную"></a>
        <div id = "center-plz">
            <form id="sort_f" action="sort.php" method="POST">
                <input type="date-mask" name="sort" placeholder="Введите запрос"/>
                <input class="delbut1" type="submit" name="do_sort" value="Поиск"/>
            </form>
            <br>
        </div>
    <form id="orders" action="del.php" method="POST">
    <table class="orders">
    <tr>
        <th><input type="checkbox" name='check-all' onClick='var o=this.form.elements;for(var i=0;i<o.length-1;i++)if(o[i].type="checkbox")o[i].checked=this.checked'></th>
        <th>№</th>
        <th>ФИО</th>
        <th>Количетство мест</th>
        <th>Место отправки</th>
        <th>Место назначения</th>
        <th>Дата поездки</th>
        <th>Телефон</th>
        <th>Дата отправки запроса</th>
<?php
$data = $_POST['sort'];
if( isset($data) ) {
    require "connect1.php";
    $num = 0;
    $result = mysql_query("SELECT *, DATE_FORMAT(date_ord,'%H:%i %d/%m/%Y') as eurodate FROM orders WHERE date_t_ord LIKE '%$data%' OR surname_ord LIKE '%$data%' OR name_ord LIKE '%$data%' OR otc_ord LIKE '%$data%' OR destination_ord LIKE '%$data%' OR phone_ord LIKE '%$data%' ORDER BY date_ord DESC");
    while ($myrow = mysql_fetch_array($result)) { //выводим обработанные строки на экран
        $num++;
        echo "<tr>";
        $v = $myrow['id'];
        ?>
        <td><input class="check-id" type="checkbox" name=dfile[] value="<?php echo $v ?>"></td>
        <?php
        echo <<<EOT
                                    <td class="order-num">$num</td>
                                    <td class="order-name">$myrow[surname_ord] $myrow[name_ord] $myrow[otc_ord]</td>
                                    <td class="order-plac">$myrow[places_ord]</td>
                                    <td class="order-dep">$myrow[departure_ord]</td>
                                    <td class="order-des">$myrow[destination_ord]</td>
                                    <td class="order-date">$myrow[date_t_ord]</td>
                                    <td class="order-ph">$myrow[phone_ord]</td>
                                    <td class="order-date">$myrow[eurodate]</td>
                                </tr>
EOT;
    }
}
?>
    </table>
        <div class="delbut">
            <input class="delbut1" type="submit" name="del" value="Удалить отмеченный элемент"/>

        </div>

    </form>
    </div>
    </div>
    </div>
    <div style="height:50px;width:100%"></div>
<?php
include('blocks/footer-1.php');
?>
</div>
<?php else : header('Location: login.php');?>
<?php endif; ?>
    </body>
</html>