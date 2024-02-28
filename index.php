<?php
    
    require_once __DIR__ . "/config/init.php";
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
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="parkingFilter" 
                    name="parking"
                    <?= $filter_parking ? 'checked' : '' ?>  
                >
            </div>
            <div class="mb-3">
                <label for="voteFilter" class="form-label">Filter by Vote:</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="voteFilter" 
                    name="vote" 
                    min="1" max="5"
                    value="<?= $filter_vote ?>"
                >
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
                <?php foreach ($hotels as $hotel): ?>
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


