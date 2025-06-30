<?php 

session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

require_once('db.php');

// Handle delete request
if (isset($_GET['del'])) {
    $del = intval($_GET['del']);
    $stmt = $con->prepare("DELETE FROM hall_requests WHERE id = ?");
    $stmt->bind_param("i", $del);
    $stmt->execute();
    $stmt->close();
}
?>

<?php include('header-admin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hall Booking Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        h2 {
            margin: 20px 0;
            color: goldenrod;
            text-align: center;
        }
        th, td {
            text-align: center;
            vertical-align: middle !important;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .fa-times {
            color: red;
            cursor: pointer;
        }
        .fa-times:hover {
            color: darkred;
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
    <h2><i class="fa fa-calendar"></i> Hall Booking Requests</h2>
    <p class="text-center text-muted">View or delete hall booking requests below.</p>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-warning">
                <tr>
                    <th>ID</th>
                    <th>Organizer</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Attendees</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM hall_requests ORDER BY id DESC";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>" . htmlspecialchars($row['organizer_name']) . "</td>
                                <td>" . htmlspecialchars($row['contact_person']) . "</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['email']}</td>
                                <td>" . htmlspecialchars($row['event_name']) . "</td>
                                <td>{$row['event_date']}</td>
                                <td>{$row['start_time']} - {$row['end_time']}</td>
                                <td>" . ucfirst($row['attendees']) . "</td>
                                <td>
                                    <a href='hall_requests_view.php?del={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this hall booking?');\">
                                        <i class='fa fa-times'></i>
                                    </a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No hall booking requests found.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer-admin.php'); ?>
</body>
</html>
