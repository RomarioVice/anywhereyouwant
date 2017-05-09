<?php
    require "connect.php";


    $data = $_POST;
    if( isset($data['do_signup']) ){
        // регистрируем

        $errors = array();
        if( trim($data['login'] == '') ){
            $errors[] = 'Введите логин!';
        }

        if( trim($data['email'] == '') ){
            $errors[] = 'Введите email!';
        }

        if( $data['password'] == '' ){
            $errors[] = 'Введите пароль!';
        }

        if( $data['password_2'] != $data['password'] ){
            $errors[] = 'Повторный пароль введён неверно!';
        }

        if( R::count('admins', "login = ?", array($data['login'])) > 0 ){
            $errors[] = 'Пользователь с таким логином уже существует!';
        }

        if( R::count('admins', "email = ?", array($data['email'])) > 0 ){
            $errors[] = 'Пользователь с таким Email уже существует!';
        }

        if( empty($errors) ){
            // ошибок нет - можно регистрировать
            $admin = R::dispense('admins');
            $admin->login = $data['login'];
            $admin->email = $data['email'];
            $admin->password = password_hash($data['password'],PASSWORD_DEFAULT);
            R::store($admin);
        }
    }

?>

<?php if( isset($_SESSION['logged_user']) ) :  ;?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Регистрация - Увезём - куда захочешь!</title>
        <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/pushy.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/form_reg.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome-animation.min.css">
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <link rel="manifest" href="favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <link rel="manifest" href="favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!--    <link rel="stylesheet" href="css/bootstrap.css">-->

        <!-- jQuery -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/parallax.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://vk.com/js/api/share.js?94" charset="windows-1251"></script>
        <script type="text/javascript" src="../js/jquery.mask.js"></script>

    </head>
    <body>
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_admin.jpg">
        <?php
            include('blocks/site-header.php');
            include('blocks/menu.php');
        ?>
            
            <div class="row">
                <div class="new_admin col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                    <h1 class="font-h1">&nbsp;</h1>
                </div>
            </div>
            

            <form class="contact_form" action="signup.php" method="POST">
                <ul>
                        <?php
                        if( isset($data['do_signup']) ) {
                            if (empty($errors)) {
                                echo '<div class="success"">Регистрация прошла успешно!</div>';
                            } else {
                                echo '<div class="canceled">' . array_shift($errors) . '</div>';
                            }
                        }
                            ?>
                    <li>
                        <p>Логин</p>
                        <input class="log-mask" type="text" name="login" value="<?php echo @$data['login']?>" pattern="^[a-zA-Z0-9]{4,20}$" required>
                        <span class="form_hint">Верный формат "SomeNikname" от 4 до 20 символов</span>
                        <script>
                            $.jMaskGlobals = {translation: {
                                'x': {pattern: /\w/},
                            }
                            };
                            $('.log-mask').mask('xxxxxxxxxxxxxxxxxxxx');
                        </script>
                    </li>
                    <li>
                        <p>Email</p>
                        <input type="email" name="email" value="<?php echo @$data['email']?>" required>
                        <span class="form_hint">Верный формат "SomeEmail@mail.com"</span>
                    </li>
                    <li>
                        <p>Пароль</p>
                        <input class="pas-mask" type="password" name="password" pattern="^[a-zA-Z0-9]{6,20}$" required>
                        <span class="form_hint">Верный формат "OkRtfd4q от 6 до 20 символов"</span>
                    </li>
                    <li>
                        <p>Подтвердите пароль</p>
                        <input class="pas-mask" type="password" name="password_2" pattern="^[a-zA-Z0-9]{6,20}$" required>
                        <span class="form_hint">Верный формат "OkRtfd4q от 6 до 20 символов"</span>
                        <script>
                            $.jMaskGlobals = {translation: {
                                'x': {pattern: /\w/},
                            }
                            };
                            $('.pas-mask').mask('xxxxxxxxxxxxxxxxxxxx');
                        </script>
                    </li>
                    <li class="buttons">
                        <button class="submit" type="submit" name="do_signup">Зарегистрироваться</button>
                    </li>
            </form>
            </div>
            <script type="text/javascript" src="js/pushy.min.js"></script>
        </body>
    </html>
<?php else : header('Location: login.php');?>
<?php endif; ?>