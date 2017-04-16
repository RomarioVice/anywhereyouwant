<?php
    require "connect.php";
?>

<?php if( isset($_SESSION['logged_user']) ) :  ?>

<?php
    $id = $_GET['id'];
?>

<?php
include('/blocks/connect.php');
$result = mysql_query("SELECT * FROM services WHERE id_route = $id");
$myrow = mysql_fetch_array($result);
?>
<?php
include('blocks/head.php');
?>
    <body>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_admin.jpg">
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
                    <form action="route_update_done.php?id=<?php echo $_GET['id']?>" method="POST">
                        <p class="view-text"><span class="desc">Маршрут</span></p>
                        <div class="left-right">
                            <div class="left-block">
                                <p class="view-text"><span>Пункт отправки:</span> <input type="text" name="departure" value="<?php echo $myrow['departure'] ?>" size="20"></p>
                                <p class="view-text"><span>Пункт назначения:</span> <input type="text" name="destination" value="<?php echo $myrow['destination']?>" size="20"></p>
                                <p class="view-text"><span>Стоимость проезда:</span> <input type="text" name="cost" value="<?php echo $myrow['cost']?>" size="7"> рублей</p>
                            </div>
                            <div class="right-block">
                                <p class="view-text"><span>Пункт отправки:</span> <?php echo $myrow['destination'] ?></p>
                                <p class="view-text"><span>Пункт назначения:</span> <?php echo $myrow['departure']?></p>
                                <p class="view-text"><span>Стоимость проезда:</span> <?php echo $myrow['cost']?> рублей</p>
                            </div>
                            <div class="cleaner"></div>
                        </div>
                        <p class="view-text"><span class="desc">Карта маршрута</span></p>
                        <p class="view-pic"><textarea name="g_map" style="max-width: 775px; max-height: 175px; min-width: 300px; min-height: 175px; width: 100%; height: 100%; resize: none;"><?php echo $myrow['g_map']?></textarea></p>
                        <p class="view-pic"><iframe src="<?php echo $myrow['g_map']?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                        <p class="view-text"><span class="desc">Описание</span></p>
                        <p class="view-pic"><textarea name="description" style="max-width: 775px; max-height: 300px; min-width: 300px; min-height: 300px; width: 100%; height: 100%; resize: none;"><?php echo $myrow['description']?></textarea></p>
                        <input class="delbut1" type="submit" name="submit" value="Сохранить"/>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                include('/blocks/footer-1.php');
            ?>
        </div>
  <?php else : header('Location: login.php');?>
    <?php endif; ?>
    </body>
</html>