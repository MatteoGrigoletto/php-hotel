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

    $park = empty($_GET['parking']) ? null : $_GET['parking'];
    $vote = empty($_GET['vote']) ? null : $_GET['vote'];
    $research = false;
    $ParkSloat = ($park == 'si') ? 'true' : 'false';



   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Hotel</title>
</head>
<body>

<!-- form get -->

<form action="index.php" method="GET">
    <label for="parking">Parcheggio: </label>
    <input name="parking" type="text" placeholder="Inserisci SI o NO">
    <label for="vote">Voto: </label>
    <input name="vote" type="text">
    <button type="submit">Richiedi  </button>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Parking</th>
      <th scope="col">Vote</th>
      <th scope="col">Distance to center</th>
    </tr>
  </thead>
  <tbody>
    <?php  foreach ( $hotels as $key => $hotel ) { ?>  
           <?php if($research == false ){   ?>
            <tr>
                 <th scope="row"><?php echo $hotel['name']?></th>
                    <td><?php echo $hotel['description']?></td>
                    <td><?php echo $hotel['parking']?></td>
                    <td><?php echo $hotel['vote']?></td>
                    <td><?php echo $hotel['distance_to_center']?></td>
           </tr>
            <?php }; ?>

            <?php if(!empty($park || $vote)) {
            $research = true;} ?>

            <?php if ($research === true) { 
                if ($hotel['vote'] >= $vote && $hotel['parking'] == $ParkSloat ){   ?>
                <tr>
                    <th scope="row"><?php echo $hotel['name']?></th>
                        <td><?php echo $hotel['description']?></td>
                        <td><?php echo $hotel['parking']?></td>
                        <td><?php echo $hotel['vote']?></td>
                        <td><?php echo $hotel['distance_to_center']?></td>
                </tr>
            <?php }; }; ?>    
    <?php  }; ?>
  </tbody>
</table>
</body>
</html>

