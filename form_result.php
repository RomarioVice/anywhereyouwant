<?php
    include('blocks/head.php');
?>
<body>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/bg_parallax.jpg">
            <?php
                include('/blocks/site-header.php');
                include('/blocks/menu.php');
                include('/blocks/connect.php');
            ?>
            <div class="wrapper-result">
                <div class="bg-container">
                    <h1 class="font-h1">Форма заполнения</h1>
                    <!-- Your Content -->
                    <div id="container-result">
                        <?php
                            include('/blocks/functionClean.php');
                            include('/blocks/checkLength.php');

                            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $surname = $_POST['surname_ord'];
                                $name = $_POST['name_ord'];
                                $otc = $_POST['otc_ord'];
                                $places = $_POST['places_ord'];
                                $phone = $_POST['phone_ord'];
                                $destination = $_POST['destination_ord'];
                                $departure = $_POST['departure_ord'];

                                $surname = clean($surname);
                                $name = clean($name);
                                $otc = clean($otc);
                                $places = clean($places);
                                $phone = clean($phone);
                                $destination = clean($destination);
                                $departure = clean($departure);

                                if(!empty($surname) && !empty($name) && !empty($places) && !empty($phone) && !empty($departure) && !empty($destination)){
                                    if(check_length($surname,2,45) && check_length($name,2,25) && check_length($places,1,4) && check_length($phone,6,12) && check_length($departure,3,45) && check_length($destination,3,45)){
                                        $result = mysql_query("INSERT INTO orders(surname_ord, name_ord, otc_ord, departure_ord, destination_ord, phone_ord, places_ord, date_ord) VALUES('$surname','$name','$otc','$departure', '$destination','$phone', '$places', now())");
                                        echo "Ваша заявка в ближайшее время будет обработана. Наши сотрудники с Вами свяжуться";
                                    } else {
                                        echo "Введенные данные некорректные";
                                    }
                                } else {
                                    echo "Заполните пустые поля!";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                include('blocks/footer.php');
            ?>
        </div>
    </body>
</html>