<?php 
require_once('db.php');

// Handle delete request
if (isset($_GET['del'])) {
    $del = intval($_GET['del']);
    $q = "DELETE FROM requests WHERE id = $del";
    $run = mysqli_query($con, $q);
}
?>

<?php include('header-admin.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
    <h2><i class="fa fa-plus-square"></i> All Requests</h2>
    <p class="text-center text-muted">View or delete reservation requests below.</p>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="bg-warning">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Adults</th>
                    <th>Rooms</th>
                    <th>Message</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $q = "SELECT * FROM requests ORDER BY id ASC";
                    $run = mysqli_query($con, $q);
                    if (mysqli_num_rows($run) > 0) {
                        while ($row = mysqli_fetch_assoc($run)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['day']}-{$row['month']}-{$row['year']}</td>
                                <td>{$row['adults']}</td>
                                <td>{$row['rooms']}</td>
                                <td>{$row['message']}</td>
                                <td><a href='requests.php?del={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this request?');\"><i class='fa fa-times'></i></a></td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No reservation requests found.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer-admin.php'); ?>
</body>
</html>
