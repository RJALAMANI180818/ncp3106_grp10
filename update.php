<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
// Define variables and initialize with empty values
$studNum = $last_name = $first_name = $middle_name = $contact_number = $email_address = $birthday = $year_level = $program = "";
$studNum_err = $last_name_err = $first_name_err = $middle_name_err = $contact_number_err = $email_address_err = $birthday_err = $year_level_err = $program_err =  "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate student number
    $input_studNum = trim($_POST["stud_Num"]);
    if (empty($input_studNum)) {
        $studNum_err = "Please enter your student Number.";
    } elseif (!filter_var($input_studNum, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) { 
        $studNum_err = "Please enter a valid name.";
    } else {
        $studNum_err = $input_studNum;
    }
    // Validate surname
    $input_lastname = trim($_POST['surname']);
    if (empty($input_last_name)) {
        $last_name_err = "Please enter your surname.";
    } elseif (!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $last_name_err = "Please enter a valid name.";
    } else {
        $last_name = $input_last_name;
    }

    //Validate first name
    $input_first_name = trim($_POST['first_name']);
    if (empty($input_first_name)) {
        $first_name_err = "Please enter your first name.";
    } elseif (!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $first_name_err = "Please enter a valid name.";
    } else {
        $first_name = $input_first_name;
    }

    //Validate middle name
    $input_middle_name = trim($_POST['middle_name']);
    if (empty($input_middle_name)) {
        $middle_name_err = "Please enter your middle name. (OPTIONAL)";
    // } elseif (!filter_var($input_middle_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
    //     $middle_name_err = "Please enter a valid name.";
    // } else {
        $middle_name = $input_middle_name;
    }

    //Validate contact number
    $input_contact_number = trim($_POST['contact number']);
    if (empty($input_contact_number)) {
        $contact_number_err = "Please enter ypur contact number.";
    } elseif (!filter_var($input_contact_number, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $contact_number__err = "Please enter a valid number.";
    } else {
        $contact_number = $input_contact_number;
    }

    // Validate address
    $input_email_address = trim($_POST['email_address']);
    if (empty($input_email_address)) {
        $address_err = "Please enter your email address.";
    } else {
        $email_address = $input_email_address;
    }

    // Validate birthday
    $input_birthday = trim($_POST['birthday']);
    if (empty($input_birthday)) {
        $birthday_err = "Please enter your birthday.";
    } else {
        $birthday = $input_birthday;
    }

    //Validate year level
    $input_year_level = trim($_POST['year_level']);
    if (empty($input_year_level)) {
        $year_level_err = "Please enter a name.";
    } elseif (!filter_var($input_year_level, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $year_level_err = "Please enter a valid name.";
    } else {
        $year_level = $input_year_level;
    }

    //Validate program
    $input_program= trim($_POST['program']);
    if (empty($input_program)) {
        $program_err = "Please enter your program.";
    } elseif (!filter_var($input_program, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $program_err = "Please enter a valid name.";
    } else {
        $program = $input_program;
    }


    // Check input errors before inserting in database
    if ((empty($studNum_err)) && (empty($last_name_err)) && (empty($first_name_err)) && (empty($middle_name_err)) && (empty($contact_number__err)) && (empty($email_address_err)) && (empty($birthday_err)) && (empty($year_level_err)) && (empty($program_err))) {
        // Prepare an update statement
        $sql = "UPDATE employees SET stud_Num=?, surname=?, first_name=?, middle_name=?, contact_number=?, email_address=?, birthday=?, year_level=?, program=? WHERE id=?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssissss", $param_studNum, $param_last_name, $param_first_name, $param_middle_name, $param_contact_number, $param_email_address, $param_birthday, $param_year_level, $param_program, $param_id);

            // Set parameters
            $param_studNum = $studNum;
            $param_last_name = $last_name;
            $param_first_name = $first_name;
            $param_middle_name = $middle_name;
            $param_contact_number = $contact_number;
            $param_email_address = $email_address;
            $param_birthday = $birthday;
            $param_year_level = $year_level;
            $param_program = $program;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $studNum = $row["stud_Num"];
                    $surname = $row["surname"];
                    $first_name = $row["first_name"];
                    $middle_name = $row["middle_name"];
                    $contact_number = $row["contact_number"];
                    $email_address = $row["email_address"];
                    $birthday = $row["birthday"];
                    $year_level = $row["year_level"];
                    $program = $row["program"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
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
                            <label>Student Number</label>
                            <input type="number" name="name" class="form-control <?php echo (!empty($studNum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $studNum; ?>">
                            <span class="invalid-feedback"><?php echo $studNum_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <textarea name="surname" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>"><?php echo $last_name; ?></textarea>
                            <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                            <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name" class="form-control <?php echo (!empty($middle_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $middle_name; ?>">
                            <span class="invalid-feedback"><?php echo $middle_name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="number" name="d" class="form-control <?php echo (!empty($contact_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact_number; ?>">
                            <span class="invalid-feedback"><?php echo $contact_number_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="email_address" class="form-control <?php echo (!empty($email_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_address; ?>">
                            <span class="invalid-feedback"><?php echo $email_address_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Birthday</label>
                            <input type="date" name="birthday" class="form-control <?php echo (!empty($birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthday; ?>">
                            <span class="invalid-feedback"><?php echo $birthday_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Year Level</label>
                            <input type="text" name="year_level" class="form-control <?php echo (!empty($year_level_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $year_level; ?>">
                            <span class="invalid-feedback"><?php echo $year_level_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Program</label>
                            <input type="text" name="program" class="form-control <?php echo (!empty($program_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $program; ?>">
                            <span class="invalid-feedback"><?php echo $program_err; ?></span>
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