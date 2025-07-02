<?php
session_start();
include 'header.php';
require_once('db.php');
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        img { max-width: 100%; height: auto; }
        .form-control, textarea { width: 100% !important; }
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
            .row > div { margin-bottom: 20px; }
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
            <div class="col-sm-12 col-md-4" id="book">
                <h3 style="color:goldenrod">Reservation</h3>

                <?php
                $message = "";
                $alertClass = "danger";

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

                    $name = trim($_POST['name']);
                    $email = trim($_POST['email']);
                    $phone = trim($_POST['phone']);
                    $checkin = $_POST['checkin'];
                    $checkout = $_POST['checkout'];
                    $room_type = $_POST['room_type'];
                    $user_message = trim($_POST['message']);

                    if (empty($name) || empty($email) || empty($phone) || empty($checkin) || empty($checkout) || empty($room_type) || empty($user_message)) {
                        $message = "Please fill all fields.";
                    } else {
                        // Use prepared statement
                        $stmt = $con->prepare("INSERT INTO requests (name, email, phone, checkin, checkout, room_type, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssssss", $name, $email, $phone, $checkin, $checkout, $room_type, $user_message);

                        if ($stmt->execute()) {
                            $message = "We've received your reservation request.";
                            $alertClass = "success";
                        } else {
                            $message = "An error occurred. Please try again.";
                        }
                        $stmt->close();
                    }
                }
                ?>

                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?php echo $alertClass; ?>"><?php echo $message; ?></div>
                <?php endif; ?>

                <form method="post">
                    <!-- Uncomment below for CSRF protection -->
                    <!-- <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"> -->

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" required value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Check-In</label>
                        <input type="date" name="checkin" class="form-control" required value="<?php echo isset($_POST['checkin']) ? $_POST['checkin'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Check-Out</label>
                        <input type="date" name="checkout" class="form-control" required value="<?php echo isset($_POST['checkout']) ? $_POST['checkout'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Room Type</label>
                        <select name="room_type" class="form-control" required>
                            <option value="">Select Room Type</option>
                            <option value="Breeze Room" <?php if (isset($_POST['room_type']) && $_POST['room_type'] == "Breeze Room") echo "selected"; ?>>Breeze Room</option>
                            <option value="Sterling Room" <?php if (isset($_POST['room_type']) && $_POST['room_type'] == "Sterling Room") echo "selected"; ?>>Sterling Room</option>
                            <option value="Aura Room" <?php if (isset($_POST['room_type']) && $_POST['room_type'] == "Aura Room") echo "selected"; ?>>Aura Room</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="4" placeholder="Message" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-block" value="Make a Reservation" name="submit">
                </form>

            </div>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
