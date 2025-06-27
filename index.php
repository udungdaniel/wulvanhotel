<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your hotel in Sani Abacha Road, Mararaba offers luxury rooms like Breeze, Sterling, and Aura at affordable rates. Book now for an unforgettable stay.">
<meta name="keywords" content="hotel in Mararaba, hotels in Karu L.G.A, affordable hotel, affordable rooms, Breeze Room, Sterling Room, Aura Room, hotel booking">
<meta name="robots" content="index, follow">

    <title>Reservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
        .form-control, textarea {
            width: 100% !important;
        }
        .btn {
            background-color: goldenrod;
            color: white;
            border: none;
        }
        .btn:hover {
            background-color: black;
            color: white;
        }
        @media screen and (max-width: 768px) {
            .row > div {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Banner -->
<div class="banner">
    <img src="images/photos/banner.jpg" class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1 class="animated fadeInDown"> .... Luxury Redefined</h1>
                <p class="animated fadeInUp">No. 65, Sani Abacha Road, Mararaba, Karu L.G.A, Nasarawa State</p>
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>

<!-- Responsive Autoplay Video Section -->
<div class="container">
    <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item" autoplay muted controls playsinline preload="auto">
            <source src="videos/wulvanvideo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>

<!-- Reservation Info -->
<div id="information" class="spacer reserve-info">
    <div class="container">
        <div class="row">
            <!-- Map -->
            <div class="col-sm-12 col-md-8">
                <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>

            <!-- Reservation Form -->
            <div class="col-sm-12 col-md-4" id = "book">
                <h3 style="color:goldenrod">Reservation</h3>
                <?php
                require_once('db.php');
                $error = "";
                $color = "red";

                if (isset($_POST['submit'])) {
                    $name = mysqli_real_escape_string($con, $_POST['name']);
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $phone = mysqli_real_escape_string($con, $_POST['phone']);
                    $day = $_POST['day'];
                    $month = $_POST['month'];
                    $year = $_POST['year'];
                    $adults = $_POST['no_adults'];
                    $rooms = $_POST['no_rooms'];
                    $message = mysqli_real_escape_string($con, $_POST['message']);

                    if (empty($name) || empty($email) || empty($phone) || $adults == "no" || $rooms == "no" || empty($message) || $day == "no" || $month == "no" || $year == "no") {
                        $error = "Please fill all fields.";
                    } else {
                        $id = 1;
                        $q = "SELECT * FROM requests ORDER BY id DESC LIMIT 1";
                        $r = mysqli_query($con, $q);
                        if (mysqli_num_rows($r) > 0) {
                            $row = mysqli_fetch_array($r);
                            $id = $row['id'] + 1;
                        }

                        $insert_query = "INSERT INTO requests (id, name, email, phone, day, month, year, adults, rooms, message)
                                        VALUES ('$id', '$name', '$email', '$phone', '$day', '$month', '$year', '$adults', '$rooms', '$message')";

                        if (mysqli_query($con, $insert_query)) {
                            $error = "We've received your reservation request.";
                            $color = "green";
                        } else {
                            $error = "An error occurred.";
                        }
                    }
                }
                ?>
                <label style="color: <?php echo $color; ?>"><?php echo $error; ?></label>

                <form method="post">
                    <div class="form-group"><input type="text" name="name" class="form-control" placeholder="Name"></div>
                    <div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email"></div>
                    <div class="form-group"><input type="text" name="phone" class="form-control" placeholder="Phone"></div>
                    <div class="form-group row">
                        <div class="col-xs-6"><select name="no_rooms" class="form-control">
                            <option value="no">No. of Rooms</option>
                            <?php for ($i = 1; $i <= 5; $i++) echo "<option value='$i'>$i</option>"; ?>
                        </select></div>
                        <div class="col-xs-6"><select name="no_adults" class="form-control">
                            <option value="no">No. of Adults</option>
                            <?php for ($i = 1; $i <= 5; $i++) echo "<option value='$i'>$i</option>"; ?>
                        </select></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-4"><select name="day" class="form-control"><option value="no">Day</option><?php for ($d = 1; $d <= 31; $d++) echo "<option value='".str_pad($d, 2, '0', STR_PAD_LEFT)."'>$d</option>"; ?></select></div>
                        <div class="col-xs-4"><select name="month" class="form-control"><option value="no">Month</option><?php foreach (range(1, 12) as $m) echo "<option value='".str_pad($m, 2, '0', STR_PAD_LEFT)."'>".date("F", mktime(0, 0, 0, $m, 10))."</option>"; ?></select></div>
                        <div class="col-xs-4"><select name="year" class="form-control"><option value="no">Year</option><?php for ($y = 2025; $y <= 2031; $y++) echo "<option value='$y'>$y</option>"; ?></select></div>
                    </div>
                    <div class="form-group"><textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea></div>
                    <input type="submit" class="btn btn-block" value="Make a Reservation" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
