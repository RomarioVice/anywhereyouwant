<?php
    include "blocks/db.php";


    $data = $_POST;
    if( isset($data['do_add']) ) {
        // регистрируем

        $errors = array();
        if (trim($data['departure'] == '')) {
            $errors[] = 'Введите место отправки!';
        }

        if (trim($data['destination'] == '')) {
            $errors[] = 'Введите место прибытия!';
        }

        if (trim($data['cost'] == '')) {
            $errors[] = 'Введите стоимость!';
        }

        if (trim($data['g_map'] == '')) {
            $errors[] = 'Введите ссулку на карту!';
        }

        if( empty($errors) ){
            // ошибок нет - можно регистрировать
            $services = R::dispense('services');
            $services->departure = $data['departure'];
            $services->destination = $data['destination'];
            $services->cost = $data['cost'];
            $services->g_map = $data['g_map'];
            $services->description = $data['description'];
            R::store($services);
        }
    }