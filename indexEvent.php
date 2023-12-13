<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Event Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            justify-content: center;
            background-image: url("bg.jpg");
            background-repeat: no-repeat;
            background-size: cover; /* Adjust as needed: cover, contain, etc. */
            background-position: center center;
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: auto;
            
        }
        .wrapper {
            width: 900px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
        table {
            justify-content:center;
        }
    </style>
    <script>echo "<th>Event</th>";
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Event Details</h2>
                        <a href="eventReg/eventCreate.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add A New Event</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM events";
                    if ($result = $mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Event ID</th>";
                            echo "<th>Event Name</th>";
                            echo "<th>Event Description</th>";
                            echo "<th>Event Type</th>";
                            echo "<th>Date</th>";
                            echo "<th>Start Time</th>";
                            echo "<th>End Time</th>";
                            echo "<th>Registration Fee</th>";
                            echo "<th>Venue</th>";
                            echo "<th>Officer-in-charge</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch_array()) {
                                echo "<tr>";
                                echo "<td>" . $row['event_id'] . "</td>";
                                echo "<td>" . $row['event_name'] . "</td>";
                                echo "<td>" . $row['event_description'] . "</td>";
                                echo "<td>" . $row['event_type'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['start_time'] . "</td>";
                                echo "<td>" . $row['end_time'] . "</td>";
                                echo "<td>" . $row['registration_fee'] . "</td>";
                                echo "<td>" . $row['venue'] . "</td>";
                                echo "<td>" . $row['oic'] . "</td>";
                                echo "<td>";

                                echo '<a href="read.php?id=' . $row['event_id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo '<a href="update.php?id=' . $row['event_id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['event_id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>