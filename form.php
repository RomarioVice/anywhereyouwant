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

                            <?php
                            if( isset($data['do_order']) ) {
                                if (empty($errors)) {
                                    echo '<div class="success">Заказ отправлен! После обработки - с вами свяжуться!</div>';
                                } else {
                                    echo '<div class="canceled">' . array_shift($errors) . '</div>';
                                }
                            }
                            ?>
            <div class="contact-form-bg">
            <!-- Your Content -->

                    <form class="contact_form" id="orders" action="form.php" method="POST" autocomplete="off">
                        <ul>
                        <div class="LP-bg">
                            <li>
                                <img src="img/login_icon.svg" height="20px" width="30px"><input type="text" name="surname_ord" placeholder="Ваша фамилия" value="" pattern="^[а-яА-Я]+$" required/>
                                <span class="form_hint">Верный формат "Киндров"</span>
                                <hr>
                            
                                <img src="img/login_icon.svg" height="20px" width="30px"><input type="text" name="name_ord" placeholder="Ваше имя" value="" pattern="^[а-яА-Я]+$" required/>
                                <span class="form_hint">Верный формат "Виктор"</span>
                                <hr>
                            
                                <img src="img/login_icon.svg" height="20px" width="30px"><input type="text" name="otc_ord" placeholder="Ваше отчество" value="" pattern="^[а-яА-Я]+$" required/>
                                <span class="form_hint">Верный формат "Никонович"</span>
                                <hr>
                            
                                <img src="img/seats_icon.svg" height="20px" width="30px"><input type="text" class="num-mask" name="places_ord" placeholder="Количество мест" value="" pattern="^[0-9]+$" required/>
                                <span class="form_hint">Верный формат "2"</span>
                                <script type="text/javascript">
                                    $.jMaskGlobals = {translation: {
                                        'x': {pattern: /\d/},
                                    }
                                    };
                                    $('.num-mask').mask('xxx');
                                </script>
                                <hr>

                                  <img src="img/phone_icon.svg" height="20px" width="30px"><input id="phone" type="text" name="phone_ord" placeholder="Контактный номер" value="" required/>
                                <span class="form_hint">Верный формат "(095) 123-45-67"</span>
       
                                <!-- <img src="img/phone_icon.svg" height="20px" width="30px"><input class="phone-mask" type="text" name="phone_ord" placeholder="Контактный номер" value="" required/>
                                <span class="form_hint">Верный формат "(095)-123-45-67"</span>
                                <script type="text/javascript">
                                    $.jMaskGlobals = {translation: {
                                        'x': {pattern: /\d/},
                                    }
                                    };
                                    $('.phone-mask').mask('(xxx)-xxx-xx-xx');
                                </script> -->
                                <hr>
                            
                                <img src="img/calendar_icon.svg" height="20px" width="30px"><!-- <input class="date-mask" type="text" name="date_t_ord" placeholder="Дата поездки" value="" required/> -->
                                <input type="text" class="date-mask" id="datetimepicker1" type="text" name="date_t_ord" placeholder="Дата поездки" value="" required/>
                                <span class="form_hint">Верный формат "01.01.2000"</span>
                                <script type="text/javascript">
                                    $('.date-mask').mask('xx.xx.xxxx');
                                </script>
                                <hr>
                           
                                <img src="img/destination_icon.svg" height="20px" width="30px"><select name="destination_ord" required>
                                    <option value="" disabled selected>Пункт назначения</option>
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
                                <hr>
                          
                                <img src="img/departure_icon.svg" height="20px" width="30px"><select name="departure_ord" required>
                                    <option value="" disabled selected>Пункт отправки</option>
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
                            </div>
                            <li class="buttons">
                                <button class="submit faa-parent animated-hover" type="submit" name="do_order"><i class="fa fa-envelope fa-2x faa-ring" aria-hidden="true"></i> Отправить</button>
                                <button class="reset faa-parent animated-hover" type="reset" name="reset"/><i class="fa fa-eraser fa-2x faa-ring" aria-hidden="true"></i> Очистить</button>
                            </li>
                        </ul>
                    </form>
        
        
            </div>
        </div>

    <?php
    include('/blocks/footer-1.php');
    ?>
        <script>
            $(document).ready(function(){
                $('#orders').trigger('reset');
            })
        </script>

        <script>

        $("#phone").mask("(999) 999-99-99");


        $("#phone").on("blur", function() {
            var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
    
            if( last.length == 3 ) {
                var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
                var lastfour = move + last;
        
                var first = $(this).val().substr( 0, 9 );
        
                $(this).val( first + '-' + lastfour );
            }
        });
        </script>
</div>
</body>
</html>