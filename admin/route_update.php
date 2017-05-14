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
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg-admin2.jpg">
            <?php
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
            ?>
            <br>
            <div class="wrapper">
                <div class="bg-container">
                    <form class="add_form" action="route_update_done.php?id=<?php echo $_GET['id']?>" method="POST">
                        <ul>
                            <li>
                                <label for="departure">Пункт отправки:</label>
                                <input type="text" name="departure" placeholder="Пункт отправки" size="50" value="<?php echo $myrow['departure'] ?>" pattern="^[а-яА-Я,\-]+$" required/>
                                <span class="add_form_hint">Верный формат "Санкт-Петербург"</span>
                            </li>
                            <li>
                                <label for="destination">Пункт назначения:</label>
                                <input type="text" name="destination" placeholder="Пункт назначения" size="50" value="<?php echo $myrow['destination']?>" pattern="^[а-яА-Я,\-]+$" required/>
                                <span class="add_form_hint">Верный формат "Донецк"</span>
                            </li>
                            <li>
                                <label for="cost">Стоимость:</label>
                                <input type="text" name="cost" placeholder="Стоимость" size="6" value="<?php echo $myrow['cost']?>" pattern="^[0-9]+$" required/>
                                <span class="add_form_hint">Верный формат "2100"</span>
                            </li>

                            <label for="g_map">Ссылка на карту:</label>
                                <textarea class="add_form_textarea" name="g_map" placeholder="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d17691238.392362777!2d18.160900128900717!3d57.229761736698315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x40e0909500919a2d%3A0x36335efdc5856f84!2z0JTQvtC90LXRhtC6!3m2!1d48.015882999999995!2d37.80285!4m5!1s0x44341030ed0c22d5%3A0x98c6ba30cbc321a5!2z0JzRg9GA0LzQsNC90YHQuiwg0JzRg9GA0LzQsNC90YHQutCw0Y8g0L7QsdC7Liwg0KDQvtGB0YHQuNGP!3m2!1d68.9585244!2d33.0826598!5e0!3m2!1sru!2sua!4v1491845889930" required><?php echo $myrow['g_map']?></textarea>
                            </li>
                            <li>
                                <label for="description">Описание:</label>
                                <textarea class="add_form_textarea" name="description" placeholder="Необходимая информация..." required><?php echo $myrow['description']?></textarea>
                            </li>
                            <li class="buttons">
                                <button class="submit" type="submit" name="submit">Редактировать</button>
                            </li>
                        </ul>
                    </form>
                    <br>
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