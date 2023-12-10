<?php
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$event_id = "";
$event_name = "";
$event_description = "";
$event_type = "";
$date = "";
$start_time = "";
$end_time = "";
$reg_fee = "";
$venue = ""
$oic = "";

$event_id_err = "";
$event_name_err = "";
$event_description_err = "";
$event_type_err = "";
$date_err = "";
$start_time_err = "";
$end_time_err = "";
$reg_fee_err = "";
$venue_err = "";
$oic_err = ""

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
    $input_reg_fee = trim($_POST["reg_fee"]);
    if (empty($input_reg_fee)) {
        $reg_fee_err = "Please enter registration fee.";
    } else {
        $reg_fee = $input_reg_fee;
    }

    // Validate venue.
    $input_oic= trim($_POST["venue"]);
    if (empty($input_venue)) {
        $venue_err = "Please enter the venue amount.";
    } else {
        $venue = $input_venue;
    }

     // Validate venue.
     $input_oic= trim($_POST["oic"]);
     if (empty($input_venue)) {
         $venue_err = "Please enter the officer-in-charge";
     } else {
         $oic = $input_venue;
     }






    // Check input errors before inserting in database
    if  (empty($event_id_err) && empty($event_name_err) && empty($event_description_err) && empty($event_type_err) && empty($date_err) && empty($start_time_err) && empty($end_time_err) && empty($reg_fee_err) && empty($venue_err) && empty($oic_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO events (event_id, event_name, event_description, event_type, date, start_time, end_time, registration_fee, venue) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssss", $param_event_id, $param_event_name, $param_event_description, $param_event_type, $param_date, $param_start_time, $param_end_time, $param_registration_fee, $param_venue);

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
            $param_oic = $oic;
            

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
        // echo $stmt."close";
    }

    // Close connection
    // echo "$mysqli close";
    $mysqli->close();
}
// END OF PHP PART
// START OF HTML PART

//need SIMULAN BUKAS ASAP MGA 3-4AM EFFECTIVE
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group">
                <div class="form-group">
                    <label>Student Number</label><br>
                    <input type="text" class="form-control <?php echo (!empty($event_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_id; ?>" name="event_id" required="required">
                    <span class="invalid-feedback"><?php echo $event_id_err; ?></span>
                </div>
                <div class="form-group">
                    <label>event_name</label><br>
                    <input type="text" class="form-control <?php echo (!empty($event_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_name; ?>" name="event_name" required="required">
                    <span class="invalid-feedback"><?php echo $event_name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>First Name</label><br>
                    <textarea type="text" class="form-control <?php echo (!empty($event_description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_description; ?>" name="event_description" required="required"></textarea>
                    <span class="invalid-feedback"><?php echo $event_description_err; ?></span>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col">
                    <label>Middle Name</label>
                    <textarea type="text" class="form-control <?php echo (!empty($event_type_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_type; ?>" name="event_type" required="required"></textarea>
                    <span class="invalid-feedback"><?php echo $event_type_err; ?></span>
                </div>
                    <div class="col">
                        <label>Contact Number</label><br>
                        <input type="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date; ?>" name="date" required="required">
                        <span class="invalid-feedback"><?php echo $date_err; ?></span>
                    </div>
                </div>        	
                </div>  
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Email Address</label><br>
                            <input type="text" class="form-control <?php echo (!empty($start_time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $start_time; ?>" name="start_time" required="required">
                            <span class="invalid-feedback"><?php echo $start_time_err; ?></span>
                        </div>
                        <div class="col">
                            <label>end_time</label><br>
                            <input type="date" class="form-control <?php echo (!empty($end_time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $end_time; ?>" name="end_time" required="required">
                            <span class="invalid-feedback"><?php echo $end_time_err; ?></span>
                        </div>
                    </div>        	
                </div>  
                </div>
                <div class="form-group">
                <label>Year Level</label><br>
                <select name="registration_fee" class="form-control <?php echo (!empty($reg_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_type; ?>" required="required">
                    <span class="invalid-feedback"><?php echo $reg_fee_err; ?></span>
                        <option value="Freshman">1st Year</option>
                        <option value="Sophomore">2nd Year</option>
                        <option value="Junior">3rd Year</option>
                        <option value="Senior">4th Year</option>
                    </select>
                </div>
                <div class="form-group">
                <label>venue</label><br>
                <select name="venue" class="form-control <?php echo (!empty($venue_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_type; ?>" required="required">
                    <span class="invalid-feedback"><?php echo $venue_err; ?></span>
                        <option value="ComEng">Computer Engineering</option>
                        <option value="CivilEng">Civil Engineering</option>
                        <option value="ElecEng">Electrical Engineerng</option>
                        <option value="MechEng">Mechanical Engineering</option>
                    </select>
                </div>
                
                <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Register</button>
                </div>
            </form>