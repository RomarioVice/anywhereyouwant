<?php
    include('blocks/head.php');
?>
    <body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
        <?php
            require_once('blocks/config.php');
            include('/blocks/site-header.php');
            include('/blocks/menu.php');
            include('/blocks/connect.php');
            include('/blocks/slider.php');
            ?>

        <div class="wrapper">
            <h1 class="font-h1">Контактные данные</h1>
            <!-- Your Content -->
            <div id="container">
                <h2><i class="fa fa-phone-square fa-1x" aria-hidden="true"></i>&nbsp Телефонный номер: +38-(050)-565-44-50</h2>
                <h2><img src="img/viber.png" style="weidth: 45px; height: 45px;">&nbsp Viber: +38-(063)-795-76-95</h2>
                <h2><img src="img/viber.png" style="weidth: 45px; height: 45px; ">&nbsp Viber: +071-301-65-08</h2>
            </div>

        </div>

        <?php
            include('blocks/footer.php');
        ?>

    </div>

    </body>
</html>