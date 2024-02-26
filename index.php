<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

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
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>hotels</title>
</head>
<body>
    
    <h1 class="text-center">HOTEL</h1>
    <div class="container">

        <!-- form -->
        <form method="GET" class="mb-4">
            <div class="mb-3">
                <label for="parkingFilter" class="form-label">Filter by Parking:</label>
                <select class="form-select" id="parkingFilter" name="parking">
                    <option value="">All</option>
                    <option value="1">With Parking</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="voteFilter" class="form-label">Filter by Vote:</label>
                <input type="number" class="form-control" id="voteFilter" name="vote" min="1" max="5">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- table -->
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">parking</th>
                    <th scope="col">vote</th>
                    <th scope="col">distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredHotels as $hotel): ?>
                <tr>
                    <td><?= $hotel['name'] ?></td>
                    <td><?= $hotel['description'] ?></td>
                    <td><?= $hotel['parking'] ? 'yes' : 'no' ?></td>
                    <td><?= $hotel['vote'] ?></td>
                    <td><?= $hotel['distance_to_center'] . ' km' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
</body>
</html>



