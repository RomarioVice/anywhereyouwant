<?php
    require 'connect.php';

    $data = $_POST;

    if( isset($data['do_login']) ){
        $errors = array();
        $admin = R::findOne('admins', 'login = ?', array($data['login']));
        if( $admin ){
            //  логин сущесвтует в БД
            if( password_verify($data['password'], $admin->password) ){
                // логинимся
                $_SESSION['logged_user'] = $admin;
                header('Location: index.php');
            } else {
                $errors[] = 'Введен неверный пароль!';
            }
        }
        else {
            //  логин не сущесвтует в БД
            $errors[] = 'Введен неверный логин!';
        }
    }
?>

<?php if( isset($_SESSION['logged_user']) ) :  header('Location: index.php');?>
<?php else : ;?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Авторизация - Увезём - куда захочешь!</title>
        <meta name="description" content="Пассажирские перевозки между Россией и ДНР.">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/form.css">
        

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
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">

            <div style="height:25px;width:100%"></div>
                <div class="row">
                    <div class="enter_admin col-xs-12 col-xs-0 col-md-10 col-md-offset-1 col-lg-12 col-lg-offset-0">
                        <h1 class="font-h1">&nbsp;</h1>
                    </div>
                </div>
            <div style="height:25px;width:100%"></div>
        <form class="contact_form" action="login.php" method="POST">

            <ul>
                <li>
                    <?php
                        if( ! empty($errors) ){
                            echo '<div class="canceled">'.array_shift($errors).'</div>';
                        }
                    ?>
                </li>
                <li>
                    <p class="t_login">Логин</p>
                    <input type="text" name="login" value="<?php echo @$data['login'];?>">
                </li>

                <li>
                    <p class="t_login">Пароль</p>
                    <input type="password" name="password" value="<?php echo @$data['password'];?>">
                </li>

                <li class="buttons">
                    <button class="submit" type="submit" name="do_login">Войти</button>
                </li>
        </form>
</div>
</body>
</html>
<?php endif; ?>