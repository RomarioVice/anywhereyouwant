<?php
    require "form_result_2.php";
?>

<?php
    include('/blocks/head.php');
?>

<body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/1df78147c4a8f5f19867a1a0cd0ea3c1.gif">
        <?php
            include('/blocks/site-header.php');
            include('/blocks/menu.php');
        ?>
        <div class="wrapper">
            <div class="row">
                <div style="clear:both;height:15px;width:100%"></div>
                    <div class="or_bg col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                    <h1 class="font-h1">&nbsp;</h1>
                </div>
            </div>
            <div class="bg-container-form">
            <!-- Your Content -->
            <div id="container-form">

                    <form class="contact_form" id="orders" action="form.php" method="POST">
                        <ul>
                            <?php
                            if( isset($data['do_order']) ) {
                                if (empty($errors)) {
                                    echo '<div class="success">Заказ отправлен!</div>';
                                } else {
                                    echo '<div class="canceled">' . array_shift($errors) . '</div>';
                                }
                            }
                            ?>
                            <li>
                                <span class="required_notification">* обозначает обязательные поля</span>
                            </li>
                            <li>
                                <label for="surname">Фамилия:</label>
                                <input type="text" name="surname_ord" placeholder="Ваша фамилия" value="" pattern="^[а-яА-Я]+$" required/>
                                <span class="form_hint">Верный формат "Киндров"</span>
                            </li>
                            <li>
                                <label for="name">Имя:</label>
                                <input type="text" name="name_ord" placeholder="Ваше имя" value="" pattern="^[а-яА-Я]+$" required/>
                                <span class="form_hint">Верный формат "Виктор"</span>
                            </li>
                            <li>
                                <label for="otc">Отчество:</label>
                                <input type="text" name="otc_ord" placeholder="Ваше отчество" value="" pattern="^[а-яА-Я]+$" required/>
                                <span class="form_hint">Верный формат "Никонович"</span>
                            </li>
                            <li>
                                <label for="places">Количестов мест:</label>
                                <input type="text" class="num-mask" name="places_ord" placeholder="Количество мест" value="" pattern="^[0-9]+$" required/>
                                <span class="form_hint">Верный формат "2"</span>
                                <script type="text/javascript">
                                    $.jMaskGlobals = {translation: {
                                        'x': {pattern: /\d/},
                                    }
                                    };
                                    $('.num-mask').mask('xxx');
                                </script>
                            </li>
                            <li>
                                <label for="places">Контактный телефон:</label>
                                <input class="phone-mask" type="text" name="phone_ord" placeholder="Контактный телефон" value="" required/>
                                <span class="form_hint">Верный формат "(095)-123-45-67"</span>
                                <script type="text/javascript">
                                    $.jMaskGlobals = {translation: {
                                        'x': {pattern: /\d/},
                                    }
                                    };
                                    $('.phone-mask').mask('(xxx)-xxx-xx-xx');
                                </script>
                            </li>
                            <li>
                                <label for="date-t">Дата поездки:</label>
                                <input class="date-mask" type="text" name="date_t_ord" placeholder="Дата поездки" value="" required/>
                                <span class="form_hint">Верный формат "01.01.01"</span>
                                <script type="text/javascript">
                                    $('.date-mask').mask('xx.xx.xx');
                                </script>
                            </li>
                            <li>
                                <label for="destination">Пункт назначения:</label>
                                <select name="destination_ord" required>
                                    <option value=""></option>
                                    <option>Адлер</option>
                                    <option>Алушта</option>
                                    <option>Анапа</option>
                                    <option>Белгород</option>
                                    <option>Брянск</option>
                                    <option>Геленджик</option>
                                    <option>Гомель</option>
                                    <option>Донецк</option>
                                    <option>Керчь</option>
                                    <option>Краснодар</option>
                                    <option>Курск</option>
                                    <option>Минск</option>
                                    <option>Могилёв</option>
                                    <option>Москва</option>
                                    <option>Новгород</option>
                                    <option>Орел</option>
                                    <option>Санкт-Петербург</option>
                                    <option>Севастополь</option>
                                    <option>Симферополь</option>
                                    <option>Сочи</option>
                                    <option>Старый Оскол</option>
                                    <option>Тверь</option>
                                    <option>Тупсе</option>
                                    <option>Феодосия</option>
                                    <option>Ялта</option>
                                </select>
                            </li>
                            <li>
                                <label for="departure">Пункт отправки:</label>
                                <select name="departure_ord" required>
                                    <option value=""></option>
                                    <option>Адлер</option>
                                    <option>Алушта</option>
                                    <option>Анапа</option>
                                    <option>Белгород</option>
                                    <option>Брянск</option>
                                    <option>Геленджик</option>
                                    <option>Гомель</option>
                                    <option>Донецк</option>
                                    <option>Керчь</option>
                                    <option>Краснодар</option>
                                    <option>Курск</option>
                                    <option>Минск</option>
                                    <option>Могилёв</option>
                                    <option>Москва</option>
                                    <option>Новгород</option>
                                    <option>Орел</option>
                                    <option>Санкт-Петербург</option>
                                    <option>Севастополь</option>
                                    <option>Симферополь</option>
                                    <option>Сочи</option>
                                    <option>Старый Оскол</option>
                                    <option>Тверь</option>
                                    <option>Тупсе</option>
                                    <option>Феодосия</option>
                                    <option>Ялта</option>
                                </select>
                            </li>
                            <li class="buttons">
                                <button class="submit" type="submit" name="do_order">Отправить</button>
                                <button class="reset" type="reset" name="reset"/>Очистить</button>
                            </li>
                        </ul>
                    </form>

                </div>
            </div>
        </div>

    <?php
    include('blocks/footer-1.php');
    ?>
        <script>
            $(document).ready(function(){
                $('#orders').trigger('reset');
            })
        </script>
</div>
</body>
</html>