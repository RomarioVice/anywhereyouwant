<!-- Pushy Menu -->
<nav class="pushy pushy-left">
    <ul>
        <div class=menu-center>
            <a id="another" class="faa-parent animated-hover" href="../index.php"><i class="fa fa-globe fa-2x faa-tada faa-fast" aria-hidden="true"></i></a> <a id="another" class="faa-parent animated-hover" href="https://vk.com/perevozki_dnr_rossiya"><i class="fa fa-vk fa-2x faa-tada faa-fast" aria-hidden="true"></i></a> <a id="another" class="faa-parent animated-hover" href="https://ok.ru/group52624225927358"><i class="fa fa-odnoklassniki fa-2x faa-tada faa-fast" aria-hidden="true"></i></a>
            <hr style="margin: 0px;">
        </div>
        <li class="log-name"><img src="img/admin.svg" height="30px" weight="30px"> <?php echo $_SESSION['logged_user']->login; ?></li>
        <li class="pushy-link"><a class="faa-parent animated-hover" href="index.php"><img src="img/admin-orders-menu.svg" heigh="30p" width="30px" class="faa-pulse faa-fast" aria-hidden="true"></i> <strong>Стол заказов</strong></a></li>
        <li class="pushy-submenu">
        <button class="faa-parent animated-hover"><i class="fa fa-road fa-2x faa-pulse faa-fast" aria-hidden="true"></i> <strong>Маршруты</strong></button>
            <ul>
                <li class="pushy-link"><a class="faa-parent animated-hover" href="add.php"><img class="faa-pulse faa-fast" src="img/new-road-menu.svg" height="30px" weight="30px"> Добавить</a></li>
                <li class="pushy-link"><a class="faa-parent animated-hover" href="routes.php?page=1"><i class="fa fa-pencil-square-o fa-2x faa-pulse faa-fast" aria-hidden="true"></i> Изменить</a></li>    
            </ul>
        </li>
        <li class="pushy-submenu">
        <button class="faa-parent animated-hover"><i class="fa fa-newspaper-o fa-2x faa-pulse faa-fast" aria-hidden="true"></i> <strong>Новости</strong></button>
            <ul>
                <li class="pushy-link"><a class="faa-parent animated-hover" href="add-news.php"><img class="faa-pulse faa-fast" src="img/new-news-menu.svg" height="30px" weight="30px"> Добавить</a></li>
                <li class="pushy-link"><a class="faa-parent animated-hover" href="news.php?page=1"><i class="fa fa-pencil-square-o fa-2x faa-pulse faa-fast" aria-hidden="true"></i> Изменить</a></li>    
            </ul>
        </li>
        <li class="pushy-link"><a class="faa-parent animated-hover" href="logout.php"><i class="fa fa-sign-out fa-2x faa-pulse faa-fast" aria-hidden="true"></i> <strong>Выйти</strong></a></li>
    </ul>
</nav>
<!-- Site Overlay -->
<div class="site-overlay"></div>