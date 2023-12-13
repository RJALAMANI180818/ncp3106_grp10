<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "config.php";  //tatawagin

    // Prepare a select statement
    $sql = "SELECT * FROM events WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve individual field value
                $event_id = $row['event_id'];
                $event_name = $row['event_name'];
                $event_description = $row['event_description'];
                $event_type = $row['event_type'];
                $date = $row['date'];
                $start_time = $row['start_time'];
                $end_time = $row['end_time'];
                $registration_fee = $row['registration_fee'];
                $venue = $row['venue'];
                $officer = $row['oic'];
                
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $mysqli->close();
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Event ID</label>
                        <p><b><?php echo $row["event_id"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Event Name</label>
                        <p><b><?php echo $row["event_name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Event Description</label>
                        <p><b><?php echo $row["event_description"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Event Type</label>
                        <p><b><?php echo $row["event_type"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <p><b><?php echo $row["date"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <p><b><?php echo $row["start_time"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <p><b><?php echo $row["end_time"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Registration Fee</label>
                        <p><b><?php echo $row["registration_fee"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Venue</label>
                        <p><b><?php echo $row["venue"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Officer-in-Charge</label>
                        <p><b><?php echo $row["oic"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>