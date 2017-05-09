<?php
    include "connect.php";
?>

<?php if( isset($_SESSION['logged_user']) ) :  ?>


<?php 
    require "blocks/head.php";
?>
    <body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_admin.jpg">
        <?php
        include('blocks/site-header.php');
        include('blocks/menu.php');
        ?>
        <div class="wrapper">
            <div class="bg-container">
            
                <!-- Your Content -->
                <div id="container_no_bg">
                    <div id = "center-plz">

                        <form enctype="multipart/form-data" id="add" class="add_form" action="add-news-done.php" method="POST">
                            <ul>
                                <li>
                                    <label for="title">Заголовок:</label>
                                    <input style="width: 100%;" type="text" name="title" placeholder="Заголовок" size="200" value="" required/>
                                    <span class="add_form_hint">Верный формат "Добро пожаловать, дорогой Гость!"</span>
                                </li>
                                
                                <li>
                                    <label for="pic">Изображение:</label> 
                                    <input style="width: 90%; margin: 0 auto;" type="file" name="picture" placeholder="" required/>
                                    <span class="add_form_hint">Изображение должно быть в разрешении 604 x 329</span>
                                </li>
                                <!-- <li>
                                    <label for="text">Краткое описание:</label>
                                    <textarea class="add_form_textarea" name="text" placeholder="Необходимая информация..." required></textarea>
                                </li> -->

                                <li>
                                <label for="fullTxt">Описание:</label>
                                    <textarea class="add_form_textarea2" name="fullTxt" placeholder="Необходимая информация..." required></textarea>
                                </li>
                    
                        <li class="buttons">
                            <button class="submit" type="submit" name="submit">Сохранить</button>
                        </li>
                        </ul>
                    </form>
               
                    </div>
                </div>
            </div>
        
        <?php
        include('blocks/footer-1.php');
        ?>
<?php else : header('Location: login.php');?>
<?php endif; ?>
            </div>
        </div>
    </body>
</html>