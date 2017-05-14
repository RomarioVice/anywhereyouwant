<?php
    require "connect.php";
    $email_to = 'Romario_12395@mail.ru';
    $base_url='localhost/www/anywhereyouwant/admin/';


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

        $activation=md5($email_to.time()); // Encrypted email_to+timestamp

        if( empty($errors) ){
            // ошибок нет - можно регистрировать
            $admin = R::dispense('admins');
            $admin->login = $data['login'];
            $admin->email = $data['email'];
            $admin->password = password_hash($data['password'],PASSWORD_DEFAULT);
            $admin->activation = $activation;
            R::store($admin);

            include 'smtp/Send_Mail.php';
            $to=$email_to;
            $subject="Подтверждение нового сотрудника, " . $data['login'];
            $body='Сотрудник ' . $data['login'] . ' запрашивает подтверждение аккаунта. 
            <br/> <br/> E-mail сотрудника: ' .$data['email'].'
            <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';
            Send_Mail($to,$subject,$body);
        }

    }

?>

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
    <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg-admin2.jpg">
            
            <div style="height:25px;width:100%"></div>
            <div class="row">
                <div class="new_admin col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                    <h1 class="font-h1">&nbsp;</h1>
                </div>
            </div>
            <div style="height:25px;width:100%"></div>
                        <?php
                        if( isset($data['do_signup']) ) {
                            if (empty($errors)) {
                                echo '<div class="success"">Успех! Ожидайте подтверждение аккаунта главным администратором</div>';
                            } else {
                                echo '<div class="canceled">' . array_shift($errors) . '</div>';
                            }
                        }
                            ?>
            <div style="height:25px;width:100%"></div>
                <div class="contact-form-bg">

                    <form class="contact_form" action="signup.php" method="POST" autocomplete="off">
                        <ul>
                        <br>
                        <br>
                            <div class="LP-bg">
                                <li>
                                     <img src="img/login_icon.svg" height="20px" width="30px"><input class="log-mask" type="text" name="login" value="<?php echo @$data['login']?>" pattern="^[a-zA-Z0-9]{4,20}$" required placeholder="Логин">
                                    <span class="form_hint">Верный формат "SomeNikname" от 4 до 20 символов</span>
                                    <script>
                                        $.jMaskGlobals = {translation: {
                                            'x': {pattern: /\w/},
                                        }
                                        };
                                        $('.log-mask').mask('xxxxxxxxxxxxxxxxxxxx');
                                    </script>
                                    <hr>
                        
                                     <img src="img/email_icon.svg" height="20px" width="30px"><input type="email" name="email" value="<?php echo @$data['email']?>" required placeholder="Электронная почта">
                                    <span class="form_hint">Верный формат "SomeEmail@mail.com"</span>
                                    <hr>

                                     <img src="img/password_icon.svg" height="20px" width="30px"><input class="pas-mask" type="password" name="password" pattern="^[a-zA-Z0-9]{6,20}$" required placeholder="Пароль">
                                    <span class="form_hint">Верный формат "OkRtfd4q от 6 до 20 символов"</span>
                                    <hr>
                           
                                     <img src="img/password_icon.svg" height="20px" width="30px"><input class="pas-mask" type="password" name="password_2" pattern="^[a-zA-Z0-9]{6,20}$" required placeholder="Подтвердите пароль">

                                    <span class="form_hint">Верный формат "OkRtfd4q от 6 до 20 символов"</span>
                                    <script>
                                        $.jMaskGlobals = {translation: {
                                            'x': {pattern: /\w/},
                                        }
                                        };
                                        $('.pas-mask').mask('xxxxxxxxxxxxxxxxxxxx');
                                    </script>
                                </li>
                            </div>
                            <li class="buttons">
                                <button class="submit faa-parent animated-hover" type="submit" name="do_signup"><i class="fa fa-check fa-2x faa-ring" aria-hidden="true"></i> Регистрация</button>
                            </li>
                            </ul>
                    </form>
                </div>
                <br>
                    <a href="login.php">
                        <div class="back-to-login faa-parent animated-hover">
                            <i class="fa fa-sign-in fa-2x faa-ring" aria-hidden="true"></i> Войти
                        </div>
                    </a>
            </div>
            <script type="text/javascript" src="js/pushy.min.js"></script>
        </body>
    </html>