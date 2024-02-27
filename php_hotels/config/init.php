<?php

    require_once __DIR__ . "/../data/hotels.php";

    $form_sent = !empty($_GET);

    if ($form_sent) {
     
        $filteredHotels = array_filter($hotels, function ($hotel) {
            
            $filterParking = $_GET['parking'];
            $filterVote = $_GET['vote'];

            return ($filterParking === '') && ($hotel['vote'] >= $filterVote) || 
            ($hotel['parking'] == $filterParking) && ($hotel['vote'] >= $filterVote);
        });
    } else {
        $filteredHotels = $hotels;
    }