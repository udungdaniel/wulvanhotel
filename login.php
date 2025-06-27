<?php
ob_start();
session_start();
require_once('db.php');

$error = "";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, strtolower($_POST['username']));
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Simple hardcoded login check - consider using DB and hashed passwords for production
    if ($username === "wulvanhotel" && $password === "wulvan2025") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        header('Location: all-rooms.php');
        exit();
    } else {
        $error = "Wrong Username or Password";
    }
}

require_once('header.php');
?>


    <div class="container">
      <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
              <form class="form-signin animated shake" action="" method="post">
                <h2 class="form-signin-heading">Admin Login</h2>
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <div class="checkbox">
                  <label>
                    <?php
                      if(isset($error)){
                          echo "$error";
                      }
                      ?>
                  </label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign In</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
