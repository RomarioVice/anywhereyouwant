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

            <div style="clear:both;height:50px;width:100%"></div>

                <div class="row">
                    <div class="au_bg col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                        <h1 class="font-h1">&nbsp;</h1>
                    </div>
                    <div style="clear:both;height:30px;width:100%"></div>
        
                    <div class="col-xs-12 col-xs-offset-0">

                        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 main">
                            <?php
                                $result = R::getRow("SELECT * FROM main"); //выбираем все строки из таблицы main
//                                $result = mysql_query("SELECT * FROM main");
//                                $myrow = mysql_fetch_array($result); //обрабатываем полученные строки main как массив
                            echo <<< EOT
                                <p class="main-pic-txt text-center"><img class="hvr-buzz-out main_pic" src="$result[main_pic]"></p>
                                <p class="main_txt">$result[content]</p>
EOT;
                            ?>
                        </div>
                    </div>
                </div>

                </div>

                <div class="parallax-window" data-parallax="scroll" data-image-src="img/scroll_11.jpg">
                
                <div style="clear:both;height:50px;width:100%"></div>

                <div class="row">
                <div class="ns_bg col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                        <h1 class="font-h1">&nbsp;</h1>
                    </div>
                    <div class="col-xs-12 col-xs-offset-0">

                        <div style="clear:both;height:50px;width:100%"></div>
                        
                        <div id="content-rds" class="content mCustomScrollbar">
                        <div style="height:20px;"></div>
                        <div class="segue">
                            <a class="segue-a faa-parent animated-hover" href="news.php?page=1">Перейти к блоку новостей <i class="fa fa-arrow-right faa-horizontal" aria-hidden="true"></i></a>
                        </div>
                        <?php
                            $i = 0;
                            $result = R::GetAll("SELECT id, DATE_FORMAT(nDate, '%d.%m.%Y') as formated_date, title FROM news ORDER BY nDate DESC");
                                foreach ($result as $row)  {    
                                    echo <<<EOT
                                        <p><span class="date_format">$row[formated_date]</span> 
                                        <br>
                                        <a class='etc-main2' href='view.php?type=news&id=$row[id]'>Подробнее</a>
                                        <br>
                                        <span class="title">$row[title]</span></p>                                     
EOT;
                                }
                        ?>
                       
                        </div>
                    </div>
                </div>
                 <div style="clear:both;height:50px;width:100%"></div>
                </div>
                <div class="parallax-window" data-parallax="scroll" data-image-src="img/scroll_3.jpg">

                <div style="clear:both;height:50px;width:100%"></div>

                <div class="row">
                    <div class="co_bg col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                        <h1 class="font-h1">&nbsp;</h1>
                    </div>

                    <div style="height:30px;width:100%"></div>
                    <div class="col-xs-12 col-xs-offset-0">
                        <div class="contacts">
                            <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0 col-lg-4">
                                <div class="bg_cont_1">
                                    <img class="con1h" src="img/cont1.svg" width="150px" height="150px">
                                    <p class="cont-text faa-parent animated-hover"><i class="fa fa-phone-square fa-2x faa-shake" aria-hidden="true"></i>&nbsp <span>+38 (063) 795-76-95</span></p>
                                    <p class="cont-text faa-parent animated-hover"><i class="fa fa-phone-square fa-2x faa-shake" aria-hidden="true"></i>&nbsp <span>+38 (071) 301-65-08</span></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-0 col-lg-4">
                                <div class="bg_cont_2">
                                    <img src="img/cont2.svg" width="150" height="150">
                                    <p class="cont-text faa-parent animated-hover"><img src="img/viber.png" class="faa-shake" style="weidth: 30px; height: 30px;">&nbsp <span>+38 (050) 565-44-50</span></p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0 col-lg-4">
                                <div class="bg_cont_3">
                                    <img src="img/cont3.svg" width="150" height="150">
                                    <p class="cont-link faa-parent animated-hover"><i class="fa fa-vk fa-2x faa-shake" aria-hidden="true"></i>&nbsp <span><a href="http://vk.com/perevozki_dnr_rossiya">vk.com/perevozki_dnr_rossiya</a></span></p>
                                    <p class="cont-link faa-parent animated-hover"><i class="fa fa-odnoklassniki fa-2x faa-shake" aria-hidden="true"></i>&nbsp <span><a href="https://ok.ru/group52624225927358">ok.ru/group52624225927358</a></span></p>
                                </div>
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