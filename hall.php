<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Reservation</title>
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
        .dateholder {
            display: flex;
        }
        .timeholder{
            display: flex;
            gap: 80px;
        }
        #book {
            background-color: goldenrod;
            border-radius: 4px;
        }
        
        @media screen and (max-width: 768px) {
            .row > div {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
</head>
<body>
    <!-- Hall Info -->
<div id="information" class="spacer reserve-info">
    <div class="container">
            <!-- Hall Reservation Form -->
            <div class="col-sm-12 col-md-4" id = "book">
                <h3 style="color:black">Hall Booking Form</h3>
                <?php
                require_once('db.php');
                $error = "";
                $color = "red";

                if (isset($_POST['submit'])) {
                    $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $phone = mysqli_real_escape_string($con, $_POST['phone']);
                    $event_type = mysqli_real_escape_string($con, $_POST['event_type']);
                    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
                    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
                    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
                    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);
                    

                    if (empty($full_name) || empty($email) || empty($phone) || empty ($event_type) || $start_date == "no" || empty($hall_holder) || $end_date == "no" || $start_time == "no" || $end_time == "no") {
                        $error = "Please fill all fields.";
                    } else {
                        $id = 1;
                        $q = "SELECT * FROM requests ORDER BY id DESC LIMIT 1";
                        $r = mysqli_query($con, $q);
                        if (mysqli_num_rows($r) > 0) {
                            $row = mysqli_fetch_array($r);
                            $id = $row['id'] + 1;
                        }

                        $insert_query = "INSERT INTO requests (id, full_name, email, phone, start_day, End_date, start_time, end_time, event_type, hall_holder)
                                        VALUES ('$id', '$Full_name', '$email', '$phone', '$start_day', '$end_date', '$start_time', '$end_time', '$event_type', '$hall_holder')";

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
                    <h4>Contact Person Information</h4>
                    <div class="form-group"><input type="text" name="full_name" class="form-control" placeholder="Full Name"></div>
                    <div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email"></div>
                    <div class="form-group"><input type="text" name="phone" class="form-control" placeholder="Phone"></div>
                    <h4>Event Type</h4>
                    <div class="form-group"><input type="text" name="event_type" class="form-control" placeholder="Event Type"></div>
                    <h4>Event Date and Time</h4>
                    <div class="dateholder">
                        <div class="time">
                            <label for="date">Start date:</label>
                            <input type="date" id="event" name="start_date">
                        </div>
                        <div class="time">
                            <label for="date">End date:</label>
                            <input type="date" id="event" name="end_date">
                        </div>
                    </div><br>
                    <div class="timeholder">
                        <div class="time">
                            <label for="time">Start time:</label><br>
                            <input type="time" id="start_time" name="start_time" placeholder= "Start Time">
                        </div>
                        <div class="time">
                            <label for="time">End time:</label><br>
                            <input type="time" id="event" name="end_time" placeholder= "Start Time">
                        </div>
                    </div><br>
                    <h4> Hall Preference:</h4>
                    <div class="form-group"> 
                        <label>
                            <select name="hall_holder">
                            <option value="">Mini Hall (1-150 People)</option>
                            <option value=""> Conference Hall (151-500 People)</option> 
                        </label>
                    </div>
                    <input type="submit" class="btn btn-block" value="Make a Reservation" name="submit">
                </form>
            </div>
    </div>
</div>


</body>
</html>