<?php

    require_once __DIR__ . "/../data/hotels.php";

    $filter_parking = isset($_GET['parking']) ?? 'off';
    $filter_vote = $_GET['vote'] ?? 'false';

    if($filter_parking) $hotels = array_filter($hotels, fn($hotel) => $hotel['parking']);

    if($filter_vote) $hotels = array_filter($hotels, fn($hotel) => $hotel['vote'] >= $filter_vote);