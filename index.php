<?php
    include('blocks/head.php');
?>
    <body>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
            <?php
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
                include('/blocks/db.php');
            ?>


            <!-- bootstrap -->

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                        <h1 class="font-h1">О нас</h1>
                    </div>
                    <div class="col-xs-12 col-xs-offset-0 bg">
                        <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 main">
                            <?php
                                $result = R::getRow("SELECT * FROM main"); //выбираем все строки из таблицы main
//                                $result = mysql_query("SELECT * FROM main");
//                                $myrow = mysql_fetch_array($result); //обрабатываем полученные строки main как массив
                            echo <<< EOT
                                <p class="main-pic-txt text-center"><img class="hvr-buzz-out main_pic" src="$result[main_pic]"></p>
                                <p>$result[content]</p>
EOT;
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row hidden-xs">
                    <h1 class="font-h1">Последние новости</h1>
                    <div class="col-xs-12 bg">
                        <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0 col-lg-4">
                            <div class="news-block-bg">

                                <?php
                                    $i = 0;
                                    $result = R::GetAll('SELECT * FROM news ORDER BY nDate DESC');
                                    foreach ($result as $row)  {
                                        $i++;
                                        if ($i==1) {
                                            require 'blocks/echoForIndex.php';
                                        }
                                    }
                                ?>

                            </div>
                        </div>

                        <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0 col-lg-4">

                            <?php
                            $i = 0;
                            $result = R::GetAll('SELECT * FROM news ORDER BY nDate DESC');
                            foreach ($result as $row) {
                                $i++;
                                if ($i==2) {
                                    require 'blocks/echoForIndex.php';
                                }} ?>

                        </div>


                        <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0">
                            <?php
                            $i = 0;
                            $result = R::GetAll('SELECT * FROM news ORDER BY nDate DESC');
                            foreach ($result as $row) {
                                $i++;
                                if ($i==3) {
                                    require 'blocks/echoForIndex.php';
                                }
                            } ?>

                        </div>

                        <div class="segue">
                            <a class="segue-a faa-parent animated-hover" href="news.php?page=1">Перейти к блоку новостей <i class="fa fa-arrow-right faa-horizontal" aria-hidden="true"></i></a>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <h1 class="font-h1">Контактные данные</h1>
                    <div class="col-xs-12 col-xs-offset-0 bg">
                        <div class="contacts">
                            <p class="cont-text faa-parent animated-hover"><img src="img/viber1.png" class="faa-shake" style="weidth: 30px; height: 30px;">&nbsp <span>+38 (050) 565-44-50</span></p>
                            <p class="cont-text faa-parent animated-hover"><i class="fa fa-phone-square fa-2x faa-shake" aria-hidden="true"></i>&nbsp <span>+38 (063) 795-76-95</span></p>
                            <p class="cont-text faa-parent animated-hover"><i class="fa fa-phone-square fa-2x faa-shake" aria-hidden="true"></i>&nbsp <span>+38 (071) 301-65-08</span></p>
                            <p class="cont-link faa-parent animated-hover"><i class="fa fa-vk fa-2x faa-shake" aria-hidden="true"></i>&nbsp <span><a href="http://vk.com/perevozki_dnr_rossiya">vk.com/perevozki_dnr_rossiya</a></span></p>
                            <p class="cont-link faa-parent animated-hover"><i class="fa fa-odnoklassniki fa-2x faa-shake" aria-hidden="true"></i>&nbsp <span><a href="https://ok.ru/group52624225927358">ok.ru/group52624225927358</a></span></p>
                        </div>
                    </div>
                </div>

            </div>


            <?php
                include('/blocks/footer-1.php');
            ?>
        </div>
    </body>
</html>