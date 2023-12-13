<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
// Define variables and initialize with empty values
// Define variables and initialize with empty values
$event_id = "";
$event_name = "";
$event_description = "";
$event_type = "";
$date = "";
$start_time = "";
$end_time = "";
$registration_fee = "";
$venue = "";
$officer = "";

$event_id_err = "";
$event_name_err = "";
$event_description_err = "";
$event_type_err = "";
$date_err = "";
$start_time_err = "";
$end_time_err = "";
$registration_fee_err = "";
$venue_err = "";
$officer_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Student number
    $input_event_id = trim($_POST["event_id"]);
    if (empty($input_event_id)) {
        $event_id_err = "Auto generate raw.";
    } else {
        $event_id = $input_event_id;
    }
    //Validate event name
    $input_event_name = trim($_POST["event_name"]);
    if (empty($input_event_name)) {
        $event_name_err = "Please enter an event name.";
    } else {
        $event_name = $input_event_name;
    }
    //Validate event description
    $input_event_description = trim($_POST["event_description"]);
    if (empty($input_event_description)) {
        $event_description_err = "Please enter the description of the event.";
    } else {
        $event_description = $input_event_description;
    }
    //Validate event type
    $input_event_type = trim($_POST["event_type"]);
    if (empty($input_event_type)) {
        $event_type_err = "Please enter the event type.";
    } else {
        $event_type = $input_event_type;
    }

    //Validate event date
    $input_date = trim($_POST["date"]);
    if (empty($input_date)) {
        $date_err = "Please enter a date";
    } else {
        $date = $input_date;
    }

    //Validate start_time.
    $input_start_time = trim($_POST["start_time"]);
    if (empty($input_start_time)) {
        $start_time_err = "Please enter the start time.";
    } else {
        $start_time = $input_start_time;
    }

    // Validate end time.
    $input_end_time = trim($_POST["end_time"]);
    if (empty($input_end_time)) {
        $end_time_err = "Please enter the end time.";
    } else {
        $end_time = $input_end_time;
    }

    // Validate registration fee.
    $input_registration_fee = trim($_POST["registration_fee"]);
    if (empty($input_registration_fee)) {
        $registration_fee_err = "Please enter registration fee.";
    } else {
        $registration_fee = $input_registration_fee;
    }

    // Validate venue.
    $input_venue= trim($_POST["venue"]);
    if (empty($input_venue)) {
        $venue_err = "Please enter the venue.";
    } else {
        $venue = $input_venue;
    }

     // Validate officer
    $input_officer= trim($_POST["oic"]);
    if (empty($input_officer)) {
        $officer_err = "Please enter the officer-in-charge";
    } else {
        $officer = $input_officer;
    }






    // Check input errors before inserting in database
    if  (empty($event_id_err) && empty($event_name_err) && empty($event_description_err) && empty($event_type_err) && empty($date_err) && empty($start_time_err) && empty($end_time_err) && empty($registration_fee_err) && empty($venue_err) && empty($officer_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO events (event_id, event_name, event_description, event_type, date, start_time, end_time, registration_fee, venue, oic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssssssss", $param_event_id, $param_event_name, $param_event_description, $param_event_type, $param_date, $param_start_time, $param_end_time, $param_registration_fee, $param_venue, $param_officer);

            // Set parameters
            $param_event_id = $event_id;
            $param_event_name = $event_name;
            $param_event_description = $event_description;
            $param_event_type = $event_type;
            $param_date = $date;
            $param_start_time = $start_time;
            $param_end_time = $end_time;
            $param_registration_fee = $registration_fee;
            $param_venue = $venue;
            $param_officer = $officer;
            

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: ../indexEvent.php");
                exit();
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Event ID</label>
                            <input type="number" name="name" class="form-control <?php echo (!empty($event_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_id; ?>">
                            <span class="invalid-feedback"><?php echo $event_id_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Event Name</label>
                            <textarea name="surname" class="form-control <?php echo (!empty($event_name_err)) ? 'is-invalid' : ''; ?>"><?php echo $event_name; ?></textarea>
                            <span class="invalid-feedback"><?php echo $event_name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Event Description</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($event_description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_description; ?>">
                            <span class="invalid-feedback"><?php echo $event_description_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Event Type</label>
                            <input type="text" name="event_type" class="form-control <?php echo (!empty($event_type_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_type; ?>">
                            <span class="invalid-feedback"><?php echo $event_type_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date; ?>">
                            <span class="invalid-feedback"><?php echo $date_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="timr" name="start_time" class="form-control <?php echo (!empty($start_time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $start_time; ?>">
                            <span class="invalid-feedback"><?php echo $start_time_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>End Time</label>
                            <input type="time" name="end_time" class="form-control <?php echo (!empty($end_time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $end_time; ?>">
                            <span class="invalid-feedback"><?php echo $end_time_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Registration Fee</label>
                            <input type="float" name="registration_fee" class="form-control <?php echo (!empty($registration_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $registration_fee; ?>">
                            <span class="invalid-feedback"><?php echo $registration_fee_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Venue</label>
                            <input type="text" name="venue" class="form-control <?php echo (!empty($venue_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $venue; ?>">
                            <span class="invalid-feedback"><?php echo $venue_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Officer-in-charge</label>
                            <input type="text" name="officer" class="form-control <?php echo (!empty($officer_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $officer; ?>">
                            <span class="invalid-feedback"><?php echo $officer_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>