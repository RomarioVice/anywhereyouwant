<?php
    $id = $_GET['id'];
    $type = $_GET['type'];
?>

<?php
include('/blocks/connect.php');
$result = mysql_query("SELECT * FROM $type WHERE id_route = $id");
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
                        <p class="view-pic"><iframe src="<?php echo $myrow['g_map']?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                        <p class="view-text"><span class="desc">Описание</span></p>
                        <p class="view-text"><?php echo $myrow['description']?></p>
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