<?php
    require "form_result_2.php";
?>

<?php
    include('/blocks/head.php');
?>

<body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
        <?php
            include('/blocks/site-header.php');
            include('/blocks/menu.php');
        ?>
        <div class="wrapper">
            <div class="bg-container-form">
            <h1 class="font-h1">Бронирование посадочных мест</h1>
            <!-- Your Content -->
            <div id="container-form">

                    <form class="contact_form" id="orders" action="form.php" method="POST">
                        <ul>
                            <?php
                            if( isset($data['do_order']) ) {
                                if (empty($errors)) {
                                    echo '<div class="success"">Заказ отправлен!</div>';
                                } else {
                                    echo '<div class="canceled">' . array_shift($errors) . '</div>';
                                }
                            }
                            ?>
                            <li>
                                <span class="required_notification">* обозначает обязательные поля</span>
                            </li>
                            <li>
                                <label for="loginU">Логин:</label>
                                <input type="text" name="surname_ord" placeholder="Ваш логин" value="" pattern="^[a-zA-Z0-9]+$" required/>
                                <span class="form_hint">Верный формат "SomeNikname"</span>
                            </li>
                            <li>
                                <label for="emailU">E-mail:</label>
                                <input type="email" name="name_ord" placeholder="Ваш E-mail" value="" pattern="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/" required/>
                                <span class="form_hint">Верный формат "SomeEmail@post.su"</span>
                            </li>
                            <li>
                                <label for="pasU">Пароль:</label>
                                <input type="password" name="otc_ord" placeholder="Ваш пароль" value="" pattern="^[а-яА-Я0-9]+$" required/>
                                <span class="form_hint">Верный формат "udMe63iw"</span>
                            </li>
                            <li>
                                <label for="pasU2">Повторный пароль:</label>
                                <input type="password" class="num-mask" name="places_ord" placeholder="Повторите пароль" value="" pattern="^[a-zA-Z0-9]+$" required/>
                                <span class="form_hint">Верный формат "udMe63iw"</span>        
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
                            <li class="buttons">
                                <button class="reset" type="reset" name="reset"/>Очистить</button>
                                <button class="submit" type="submit" name="do_order">Отправить</button>
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