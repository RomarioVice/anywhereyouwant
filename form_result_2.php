<?php
    require "blocks/db.php";


    $data = $_POST;
    if( isset($data['do_order']) ) {
        // регистрируем

        $errors = array();
        if (trim($data['surname_ord'] == '')) {
            $errors[] = 'Введите фамилию!';
        }

        if (trim($data['name_ord'] == '')) {
            $errors[] = 'Введите имя!';
        }

        if (trim($data['places_ord'] == '')) {
            $errors[] = 'Введите количество мест!';
        }

        if (trim($data['phone_ord'] == '')) {
            $errors[] = 'Введите номер телефона!';
        }

        if (trim($data['departure_ord'] == '')) {
            $errors[] = 'Введите пункт отправки!';
        }

        if (trim($data['destination_ord'] == '')) {
            $errors[] = 'Введите пункт назначения!';
        }

        if (trim($data['date_t_ord'] == '')) {
            $errors[] = 'Введите дату поездки!';
        }

        if( empty($errors) ){
            // ошибок нет - можно регистрировать
            $order = R::dispense('orders');
            $order->surname_ord = $data['surname_ord'];
            $order->name_ord = $data['name_ord'];
            $order->otc_ord = $data['otc_ord'];
            $order->places_ord = $data['places_ord'];
            $order->phone_ord = $data['phone_ord'];
            $order->destination_ord = $data['destination_ord'];
            $order->departure_ord = $data['departure_ord'];
            $order->date_t_ord = $data['date_t_ord'];
            $date = date('Y-m-d H:i:s');
            $order->date_ord = $date;
            R::store($order);
            header("refresh: 2; form.php");
        }
    }