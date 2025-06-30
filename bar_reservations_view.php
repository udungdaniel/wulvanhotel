<?php
require_once('db.php');

// Handle delete request
if (isset($_GET['del'])) {
    $del = intval($_GET['del']);
    $q = "DELETE FROM bar_reservations WHERE id = $del";
    mysqli_query($con, $q);
}
?>

<?php include('header-admin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Bar Reservations</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
<style>
    h2 {
        margin: 20px 0;
        color: goldenrod;
        text-align: center;
    }
    .table-responsive {
        margin-top: 20px;
        overflow-x: auto;
    }
    th, td {
        text-align: center;
        vertical-align: middle !important;
    }
    .fa-times {
        color: red;
        cursor: pointer;
    }
    @media screen and (max-width: 768px) {
        th, td {
            font-size: 13px;
            padding: 8px;
        }
    }
</style>
</head>
<body>

<div class="container">
    <h2><i class="fa fa-glass"></i> All Bar Reservations</h2>
    <p class="text-center text-muted">View or delete bar reservation requests below.</p>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-warning">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Guests</th>
                    <th>Special Requests</th>
                    <th>Booked On</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = "SELECT * FROM bar_reservations ORDER BY created_at DESC";
                $run = mysqli_query($con, $q);

                if (mysqli_num_rows($run) > 0) {
                    while ($row = mysqli_fetch_assoc($run)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['phone']) . "</td>
                            <td>{$row['date']}</td>
                            <td>{$row['time']}</td>
                            <td>{$row['guests']}</td>
                            <td>" . nl2br(htmlspecialchars($row['special_requests'])) . "</td>
                            <td>{$row['created_at']}</td>
                            <td><a href='bar_reservations.php?del={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this booking?');\"><i class='fa fa-times'></i></a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No bar reservations found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer-admin.php'); ?>
</body>
</html>
