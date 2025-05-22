<?php include 'header.php'; ?>
<div class="container">
    <center><h1 class="title">Contact Us</h1></center>

    <?php
        require_once('db.php');
        $error = "";
        $color = "red";

        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            $message = mysqli_real_escape_string($con, $_POST['message']);

            $q = "SELECT * FROM feedback ORDER BY id DESC LIMIT 1";
            $r = mysqli_query($con, $q);
            $id = mysqli_num_rows($r) > 0 ? mysqli_fetch_array($r)['id'] + 1 : 1;

            if (empty($name) || empty($email) || empty($phone) || empty($message)) {
                $error = "All fields are required, please try again.";
            } else {
                $insert_query = "INSERT INTO feedback(id, name, email, phone, message) VALUES ('$id', '$name', '$email', '$phone', '$message')";
                if (mysqli_query($con, $insert_query)) {
                    $error = "Thank you for contacting us. We've received your feedback.";
                    $color = "green";
                } else {
                    $error = "An error occurred. Please try again.";
                }
            }
        }
    ?>

    <!-- Contact Section -->
    <div class="row" style="margin-top: 40px;">

    <!-- Google Map -->
        <div class="col-md-6">
            <div class="iframe" style="width: 100%; height: 100%;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.4914476779645!2d7.5829540724455855!3d9.018853189153008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0f346dadd90b%3A0x9dbe83f64c012b81!2s65%20Sani%20Abacha%20Rd%2C%20Abuja%20900101%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1747817895768!5m2!1sen!2sng" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-md-6">
            <h4>Write to us</h4>
            <label style="color: <?php echo $color; ?>;">
                <?php echo $error; ?>
            </label>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Message" rows="4"></textarea>
                </div>
                <input type="submit" class="btn" style="background-color: goldenrod; color: black; border: none; width: 100% " value="Send message" name="submit">

            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
