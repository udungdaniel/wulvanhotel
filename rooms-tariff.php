<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your hotel in Sani Abacha Road, Mararaba offers luxury rooms like Breeze, Sterling, and Aura at affordable rates. Book now for an unforgettable stay.">
<meta name="keywords" content="hotel in Mararaba, hotels in Karu L.G.A, affordable hotel, affordable rooms, Breeze Room, Sterling Room, Aura Room, hotel booking">

    <title>Room Rates</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .services-hold {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }
        .hold {
            flex: 1 1 300px;
            max-width: 320px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .hold img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            color: goldenrod;
            margin-top: 20px;
        }

        .hold .btn {
    background-color: goldenrod;
    border: none;
    color: white;
    margin-top: 10px;
}
.hold .btn:hover {
    background-color: black;
    color: white;
}

    </style>
</head>
<body>

    <h2>Room Rates</h2>

    <div class="services-hold">
        <?php
        $rooms = [
            ["Breeze Room", "₦15,000.00", "WEEK DAY RATE", "images/breeze room.webp"],
            ["Breeze Room", "₦20,000.00", "WEEKEND RATE", "images/breeze room.webp"],
            ["Sterling Room", "₦20,000.00", "WEEK DAY RATE", "images/sterlingroom.webp"],
            ["Strerling Room", "₦28,000.00", "WEEKEND RATE", "images/sterlingroom.webp"],
            ["Aura Room", "₦25,000.00", "WEEK DAY RATE", "images/auraroom.webp"],
            ["Aura Room", "₦32,000.00", "WEEKEND RATE", "images/auraroom.webp"]
        ];
        foreach ($rooms as $room) {
            echo '<div class="hold">
                <img src="'.$room[3].'" alt="'.$room[0].'">
                <h4><b>'.$room[0].'</b></h4>
                <p>Our rooms are designed with your comfort in mind, offering a relaxing atmosphere, modern facilities and cleanliness to ensure a restful stay.</p>
                <p><b>'.$room[2].' = '.$room[1].'</b></p>
                <a href="index.php#book" class="btn btn-primary">Book Now</a>
            </div>';
        }
        ?>
    </div>

</body>
</html>
<?php include 'footer.php'; ?>
