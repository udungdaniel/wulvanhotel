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
$error = "";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, strtolower($_POST['username']));
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Simple hardcoded login check - consider using DB and hashed passwords for production
    if ($username === "wulvanhotel" && $password === "wulvan2025") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        header('Location: requests.php');
        exit();
    } else {
        $error = "Wrong Username or Password";
    }
}


require_once('header.php');
?>

<div class="container" style="margin-top: 60px;">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form class="form-signin animated shake" action="" method="post" autocomplete="off">
                <h2 class="form-signin-heading text-center mb-4">Login Panel</h2>

                <?php if ($error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign In</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign In</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
