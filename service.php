<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your hotel in Sani Abacha Road, Mararaba offers luxury rooms like Breeze, Sterling, and Aura at affordable rates. Book now for an unforgettable stay.">
<meta name="keywords" content="hotel in Mararaba, hotels in Karu L.G.A, affordable hotel, affordable rooms, Breeze Room, Sterling Room, Aura Room, hotel booking">
    <title>Our Services</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        h2 {
            text-align: center;
            margin-top: 20px;
            color: goldenrod;
        }
        .services-hold {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .hold {
            flex: 1 1 300px;
            max-width: 320px;
            background: #f9f9f9;
            box-shadow: 4px 4px 5px 4px goldenrod;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .hold img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .hold h4 {
            margin-top: 10px;
            color: #333;
        }
        .hold p {
            font-size: 14px;
            color: #555;
        }
        .servicebook {
            background-color: goldenrod;
            color: white;
            padding: 8px;
            border-radius: 4px;
        }
        .btn {
            background-color: goldenrod;
            color: white;
            padding: 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h2>Our Services</h2>

<div class="services-hold">
    <div class="hold">
        <img src="images/room2.jpg" alt="Rooms">
        <h4>Rooms</h4>
        <p>Relax in our comfortable rooms, featuring modern amenities and pristine cleanliness for a restful stay.</p>
        <a href="index.php#book" class= "servicebook" > Book Now</a>
    </div>

    <div class="hold">
        <img src="images/events-centre.jpg" alt="Event Centre">
        <h4>Event Centre</h4>
        <p>Spacious and equipped for weddings, meetings, and conferences with full event support.</p>
       <a href="index.php#book" class= "servicebook" > Book Now</a>
    </div>

    <div class="hold">
        <img src="images/barrest.jpg" alt="Restaurant & Bar">
        <h4>Bar/Restaurant</h4>
        <p>Enjoy local and international meals alongside a wide variety of drinks in our stylish bar and restaurant.</p>
        <a href="rooms-tariff.php#book" class="btn"> Book Now</a>
    </div>

    <div class="hold">
        <img src="images/laundrysc.webp" alt="Laundry Service">
        <h4>Laundry Service</h4>
        <p>Fast, professional laundry service with same-day options for items picked up before 10:00 AM.</p>
    </div>

    <div class="hold">
        <img src="images/barbing saloon.jpg" alt="Barbing Saloon">
        <h4>Barbing Saloon</h4>
        <p>Expert barbers available for haircuts, shaves, and grooming no appointment needed.</p>
    </div>

    <div class="hold">
        <img src="images/arabic-coffee.webp" alt="Coffee">
        <h4>Coffee / Arabian Tea</h4>
        <p>Freshly brewed coffee and aromatic Arabian tea served daily to start or unwind your day.</p>
    </div>

    <div class="hold">
        <img src="images/wulvansuper.jpg" alt="Supermarket">
        <h4>Supermarket</h4>
        <p>A convenient in-house supermarket with snacks, beverages, and personal essentials for your stay.</p>
    </div>

    <div class="hold">
        <img src="images/cue..jpeg" alt="Babique">
        <h4>Barbecue</h4>
        <p>Delicious grilled dishes and sides served hot and fresh for a satisfying dining experience.</p>
    </div>

    
    <div class="hold">
        <img src="images/wulvanswim.jpg" alt="Swimming Pool">
        <h4>Swimming Pool</h4>
        <p>Take a dip in our clean and refreshing pool—perfect for relaxation and leisure.</p>
    </div>
</div>

</body>
</html>
<?php include 'footer.php'; ?>
