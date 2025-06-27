<?php include 'header.php';?>
<div class="container">

       <h1 class="title">Gallery</h1>
       <div class="row gallery">
              
              <?php
                require_once('db.php');
                $q = "SELECT * FROM rooms ORDER BY rooms.id ASC";
                $run = mysqli_query($con, $q);
                $count = 0;
                if(mysqli_num_rows($run) > 0){
                    while($row = mysqli_fetch_array($run)){
              ?>
              
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/<?php echo $row['image1']; ?>" title="<?php echo $row['title']; ?>" class="gallery-image" data-gallery><img src="images/photos/<?php echo $row['image1']; ?>" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/<?php echo $row['image2']; ?>" title="<?php echo $row['title']; ?>" class="gallery-image" data-gallery><img src="images/photos/<?php echo $row['image2']; ?>" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/<?php echo $row['image3']; ?>" title="<?php echo $row['title']; ?>" class="gallery-image" data-gallery><img src="images/photos/<?php echo $row['image3']; ?>" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/<?php echo $row['image4']; ?>" title="<?php echo $row['title']; ?>" class="gallery-image" data-gallery><img src="images/photos/<?php echo $row['image4']; ?>" class="img-responsive"></a></div>
              <?php
                    }
                }
              ?>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/maingate.jpg" title="Main Gate" class="gallery-image" data-gallery><img src="images/maingate.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/welcomefront.jpg" title="Frontage" class="gallery-image" data-gallery><img src="images/welcomefront.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/wulvanhotel.webp" title="Frontage" class="gallery-image" data-gallery><img src="images/wulvanhotel.webp" class="img-responsive"></a></div>

              <div class="col-sm-4 wowload fadeInUp"><a href="images/conferencecenter1.jpg" title="Conference Center" class="gallery-image" data-gallery><img src="images/conferencecenter1.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/wulvansuper.jpg" title="Super Market" class="gallery-image" data-gallery><img src="images/wulvansuper.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/wulvanswim.jpg" title="swimmingPool" class="gallery-image" data-gallery><img src="images/wulvanswim.jpg" class="img-responsive"></a></div>

              <div class="col-sm-4 wowload fadeInUp"><a href="images/auraroom.webp" title="Aura Room" class="gallery-image" data-gallery><img src="images/auraroom.webp" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/sterlingroom.webp" title="Sterling Room" class="gallery-image" data-gallery><img src="images/sterlingroom.webp" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/room.webp" title="Breeze Room" class="gallery-image" data-gallery><img src="images/room.webp" class="img-responsive"></a></div>

              <div class="col-sm-4 wowload fadeInUp"><a href="images/bar1.jpg" title="Bar" class="gallery-image" data-gallery><img src="images/bar1.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/conferencecenter3.jpg" title="Conference Center" class="gallery-image" data-gallery><img src="images/conferencecenter3.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/bar2.jpg" title="Bar" class="gallery-image" data-gallery><img src="images/bar2.jpg" class="img-responsive"></a></div>

              <div class="col-sm-4 wowload fadeInUp"><a href="images/pine.jpg" title="The Pine Lounge" class="gallery-image" data-gallery><img src="images/pine.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/babique1.jpg" title="Babique" class="gallery-image" data-gallery><img src="images/babique1.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/bar.jpg" title="Bar" class="gallery-image" data-gallery><img src="images/bar.jpg" class="img-responsive"></a></div>

              <div class="col-sm-4 wowload fadeInUp"><a href="images/conferencecenter1.jpg" title="Conference Center" class="gallery-image" data-gallery><img src="images/conferencecenter1.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/saloon.jpg" title="Barbing Saloon" class="gallery-image" data-gallery><img src="images/saloon.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/laundry.jpg" title="Laundry" class="gallery-image" data-gallery><img src="images/laundry.jpg" class="img-responsive"></a></div>

              <div class="col-sm-4 wowload fadeInUp"><a href="images/eventcenter.jpg" title="Event Center" class="gallery-image" data-gallery><img src="images/eventcenter.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/wulvan6.jpg" title="The Pine" class="gallery-image" data-gallery><img src="images/wulvan6.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/powerhouse.jpg" title="Power House" class="gallery-image" data-gallery><img src="images/powerhouse.jpg" class="img-responsive"></a></div>

       </div>
</div>
<?php include 'footer.php';?>