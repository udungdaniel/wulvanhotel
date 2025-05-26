<?php include 'header.php';?>




<!-- banner -->
<div class="banner">
    <img src="images/photos/banner.jpg" class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1 class="animated fadeInDown">Experience Modest Comfort And Luxury At Wulvan Hotels</h1>
                <p class="animated fadeInUp">we're delighted to have you with us. </p>
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>


<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-8">
                <div class="embed-responsive embed-responsive-16by9 wowload fadeInLeft"><iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.4914476779645!2d7.5829540724455855!3d9.018853189153008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0f346dadd90b%3A0x9dbe83f64c012b81!2s65%20Sani%20Abacha%20Rd%2C%20Abuja%20900101%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1747817895768!5m2!1sen!2sng"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>"></iframe></div>
            </div>
            <div class="col-sm-5 col-md-4">
                <h3 style="color:goldenrod">Reservation </h3><?php require_once('db.php');
                    $error="";
                    $color="red";

                    if(isset($_POST['submit'])) {
                        $name=mysqli_real_escape_string($con, $_POST['name']);
                        $email=mysqli_real_escape_string($con, $_POST['email']);
                        $phone=mysqli_real_escape_string($con, $_POST['phone']);
                        $day=$_POST['day'];
                        $month=$_POST['month'];
                        $year=$_POST['year'];
                        $adults=$_POST['no_adults'];
                        $rooms=$_POST['no_rooms'];
                        $message=mysqli_real_escape_string($con, $_POST['message']);

                        $q="SELECT * FROM requests ORDER BY requests.id DESC LIMIT 1";
                        $r=mysqli_query($con, $q);

                        if(mysqli_num_rows($r) > 0) {
                            $row=mysqli_fetch_array($r);
                            $id=$row['id'];
                            $id=$id+1;
                        }

                        else {
                            $id=1;
                        }


                        if(empty($name) or empty($email) or empty($phone) or $adults=="no"or $rooms=="no"or empty($message) or $day=="no"or $month=="no"or $year=="no") {
                            $error="All Feild is Required, Try Again";

                        }

                        else {
                            $insert_query="INSERT INTO `requests`(`id`, `name`, `email`, `phone`, `day`, `month`, `year`, `adults`, `rooms`, `message`) VALUES ('$id','$name','$email','$phone','$day','$month','$year','$adults','$rooms','$message')";

                            if(mysqli_query($con, $insert_query)) {
                                $error="We've got your request";
                                $color="green";
                            }

                            else {
                                $error="Error occured";
                            }
                        }
                    }

                    ?><label style="color: <?php echo $color; ?>"><?php echo $error;
                    ?></label>
                <form role="form" class="wowload fadeInRight" method="post">
                    <div class="form-group"><input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group"><input type="Phone" name="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6"><select class="form-control" name="no_rooms">
                                    <option value="no">No. of Rooms</option>
                                    <option value="i">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></div>
                            <div class="col-xs-6"><select class="form-control" name="no_adults">
                                    <option value="no">No. of Adults</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-4"><select class="form-control col-sm-2" name="day" id="day">
                                    <option value="no">Day</option>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select></div>
                            <div class="col-xs-4"><select class="form-control col-sm-2" name="month" id="month">
                                    <option value="no">Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select></div>
                            <div class="col-xs-4"><select class="form-control" name="year">
                                    <option value="no">Year</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="form-group"><textarea class="form-control" name="message" placeholder="Message"
                            rows="4"></textarea></div><input type="submit" class="btn"
                        style="background-color: goldenrod; color: black; border: none" value="Request a reservation"
                        name="submit">
                </form>
            </div>
        </div>
    </div>
</div><?php include 'footer.php';
                    ?>