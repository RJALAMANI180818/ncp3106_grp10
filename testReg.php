<?php
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$stud_Num = "";
$surname = "";
$first_name = "";
$middle_name = "";
$contact_number = "";
$email_address = "";
$birthday = "";
$year_level = "";
$program = "";
$stud_Num_err = "";
$surname_err = "";
$first_name_err = "";
$middle_name_err = "";
$contact_number_err = "";
$email_address_err = "";
$birthday_err = "";
$year_level_err = "";
$program_err = "";
$oic_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Student number
    $input_stud_Num = trim($_POST["stud_Num"]);
    if (empty($input_stud_Num)) {
        $stud_Num_err = "Please enter your student number.";
    } else {
        $stud_Num = $input_stud_Num;
    }
    //Valicontact_number event name
    $input_surname = trim($_POST["surname"]);
    if (empty($input_surname)) {
        $surname_err = "Please enter a name.";
    } else {
        $surname = $input_surname;
    }
    //Valicontact_number event description
    $input_first_name = trim($_POST["first_name"]);
    if (empty($input_first_name)) {
        $first_name_err = "Please enter a first_name.";
    } else {
        $first_name = $input_first_name;
    }
    //Valicontact_number event type
    $input_middle_name = trim($_POST["middle_name"]);
    if (empty($input_middle_name)) {
        $middle_name_err = "Please enter a middle_name.";
    } else {
        $middle_name = $input_middle_name;
    }

    //Valicontact_number event contact_number
    $input_contact_number = trim($_POST["contact_number"]);
    if (empty($input_contact_number)) {
        $contact_number_err = "Please enter a valid event contact_number";
    } else {
        $contact_number = $input_contact_number;
    }

    //Valicontact_number email_address.
    $input_email_address = trim($_POST["email_address"]);
    if (empty($input_email_address)) {
        $email_address_err = "Please enter a email_address.";
    } else {
        $email_address = $input_email_address;
    }

    // Valicontact_number end time.
    $input_birthday = trim($_POST["birthday"]);
    if (empty($input_birthday)) {
        $birthday_err = "Please enter the birthday amount.";
    } else {
        $birthday = $input_birthday;
    }

    // Valicontact_number registration fee.
    $input_year_level = trim($_POST["year_level"]);
    if (empty($input_year_level)) {
        $year_level_err = "Please enter an year_level.";
    } else {
        $year_level = $input_year_level;
    }

    // Valicontact_number program.
    $input_program = trim($_POST["program"]);
    if (empty($input_program)) {
        $program_err = "Please enter the program amount.";
    } else {
        $program = $input_program;
    }



    // Check input errors before inserting in database
    if  (empty($stud_Num_err) && empty($surname_err) && empty($first_name_err) && empty($middle_name_err) && empty($contact_number_err) && empty($email_address_err) && empty($birthday_err) && empty($year_level_err) && empty($program_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO employees (stud_Num, surname, first_name, middle_name, contact_number, email_address, birthday, year_level, program) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssss", $param_stud_Num, $param_surname, $param_first_name, $param_middle_name, $param_contact_number, $param_email_address, $param_birthday, $param_year_level, $param_program);

            // Set parameters
            $param_stud_Num = $stud_Num;
            $param_surname = $surname;
            $param_first_name = $first_name;
            $param_middle_name = $middle_name;
            $param_contact_number = $contact_number;
            $param_email_address = $email_address;
            $param_birthday = $birthday;
            $param_year_level = $year_level;
            $param_program = $program;
            

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: ../index.php");
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
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group">
                <div class="form-group">
                    <label>Student Number</label><br>
                    <input type="text" class="form-control <?php echo (!empty($stud_Num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stud_Num; ?>" name="stud_Num" required="required">
                    <span class="invalid-feedback"><?php echo $stud_Num_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Surname</label><br>
                    <input type="text" class="form-control <?php echo (!empty($surname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $surname; ?>" name="surname" required="required">
                    <span class="invalid-feedback"><?php echo $surname_err; ?></span>
                </div>
                <div class="form-group">
                    <label>First Name</label><br>
                    <textarea type="text" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>" name="first_name" required="required"></textarea>
                    <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
                </div>
                <div class="form-group">
                <div class="row">
                    <div class="col">
                    <label>Middle Name</label>
                    <textarea type="text" class="form-control <?php echo (!empty($middle_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $middle_name; ?>" name="middle_name" required="required"></textarea>
                    <span class="invalid-feedback"><?php echo $middle_name_err; ?></span>
                </div>
                    <div class="col">
                        <label>Contact Number</label><br>
                        <input type="contact_number" class="form-control <?php echo (!empty($contact_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact_number; ?>" name="contact_number" required="required">
                        <span class="invalid-feedback"><?php echo $contact_number_err; ?></span>
                    </div>
                </div>        	
                </div>  
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Email Address</label><br>
                            <input type="text" class="form-control <?php echo (!empty($email_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_address; ?>" name="email_address" required="required">
                            <span class="invalid-feedback"><?php echo $email_address_err; ?></span>
                        </div>
                        <div class="col">
                            <label>Birthday</label><br>
                            <input type="date" class="form-control <?php echo (!empty($birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthday; ?>" name="birthday" required="required">
                            <span class="invalid-feedback"><?php echo $birthday_err; ?></span>
                        </div>
                    </div>        	
                </div>  
                </div>
                <div class="form-group">
                <label>Year Level</label><br>
                <select name="year_level" class="form-control <?php echo (!empty($year_level_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $middle_name; ?>" required="required">
                    <span class="invalid-feedback"><?php echo $year_level_err; ?></span>
                        <option value="Freshman">1st Year</option>
                        <option value="Sophomore">2nd Year</option>
                        <option value="Junior">3rd Year</option>
                        <option value="Senior">4th Year</option>
                    </select>
                </div>
                <div class="form-group">
                <label>Program</label><br>
                <select name="program" class="form-control <?php echo (!empty($program_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $middle_name; ?>" required="required">
                    <span class="invalid-feedback"><?php echo $program_err; ?></span>
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