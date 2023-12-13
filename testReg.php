<?php
// Include config file
require_once "config.php";

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


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Student number
    $input_stud_Num = trim($_POST["stud_Num"]);
    if (empty($input_stud_Num)) {
        $stud_Num_err = "Please enter your student number.";
    } elseif (!filter_var($input_stud_Num, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $stud_Num = $input_stud_Num;
    } else {
        $stud_Num = $input_stud_Num;
    }
    //Valicontact_number event name
    $input_surname = trim($_POST["surname"]);
    if (empty($input_surname)) {
        $surname_err = "Please enter a name.";
    } elseif (!filter_var($input_surname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $surname = $input_surname;
    } else {
        $surname = $input_surname;
    }
    //Valicontact_number event description
    $input_first_name = trim($_POST["first_name"]);
    if (empty($input_first_name)) {
        $first_name_err = "Please enter a first_name.";
    } elseif (!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $first_name = $input_first_name;
    } else {
        $first_name = $input_first_name;
    }
    //Valicontact_number event type
    $input_middle_name = trim($_POST["middle_name"]);
    if (empty($input_middle_name)) {
        $middle_name_err = "Please enter a middle_name.";
    } elseif (!filter_var($input_middle_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $middle_name = $input_middle_name;
    } else {
        $middle_name = $input_middle_name;
    }

    //Valicontact_number event contact_number
    $input_contact_number = trim($_POST["contact_number"]);
    if (empty($input_contact_number)) {
        $contact_number_err = "Please enter a valid event contact_number";
    } elseif (!filter_var($input_contact_number, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $contact_number = $input_contact_number;
    } else {
        $contact_number = $input_contact_number;
    }

    //Valicontact_number email_address.
    $input_email_address = trim($_POST["email_address"]);
    if (empty($input_email_address)) {
        $email_address_err = "Please enter a email_address.";
    } elseif (!filter_var($input_email_address, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $email_address = $input_email_address;
    } else {
        $email_address = $input_email_address;
    }

    // Valicontact_number end time.
    $input_birthday = trim($_POST["birthday"]);
    if (empty($input_birthday)) {
        $birthday_err = "Please enter the birthday amount.";
    } elseif (!filter_var($input_birthday, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $birthday = $input_birthday;
    } else {
        $birthday = $input_birthday;
    }

    // Valicontact_number registration fee.
    $input_year_level = trim($_POST["year_level"]);
    if (empty($input_year_level)) {
        $year_level_err = "Please enter an year_level.";
    } elseif (!filter_var($input_year_level, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $year_level = $input_year_level;
    } else {
        $year_level = $input_year_level;
    }

    // Valicontact_number program.
    $input_program = trim($_POST["program"]);
    if (empty($input_program)) {
        $program_err = "Please enter the program amount.";
    } elseif (!filter_var($input_stud_Num, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $program = $input_program;
    } else {
        $program = $input_program;
    }



    // Check input errors before inserting in database
    if  (empty($stud_Num_err) && empty($surname_err) && empty($first_name_err) && empty($middle_name_err) && empty($contact_number_err) && empty($email_address_err) && empty($birthday_err) && empty($year_level_err) && empty($program_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO employees (stud_Num, surname, first_name, middle_name, contact_number, email_address, birthday, year_level, program) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssissss", $param_stud_Num, $param_surname, $param_first_name, $param_middle_name, $param_contact_number, $param_email_address, $param_birthday, $param_year_level, $param_program);

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
}
// END OF PHP PART
// START OF HTML PART
?>

<html>
    <head>
        <title>Student Registration</title>
        <!-- <link rel="stylesheet" href="styles.css"/> -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    </head>
    <body> 


<div class="container">
    <div class="row">
        <!--NEED NETO PARA MAGWORK, MAG-ADD SA TABLE HANE-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
<fieldset>


<div class="container">
    <legend>Student Registration</legend>
    <!-- STUDENT NUMBER-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Student Number</label>  
        <div class="col-md-4">
        <input id="stud_Num" name="stud_Num" type="text" placeholder="20102365478" class="form-control input-md" <?php echo (!empty($stud_Num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stud_Num; ?>" name="stud_Num" required="required">  
        </div>
    </div> 

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Surname</label>  
        <div class="col-md-4">
        <input id="surname" name="surname" type="text" placeholder="Ancheta" class="form-control input-md" <?php echo (!empty($surname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $surname; ?>" name="surname" required="required">  
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">First Name</label>  
        <div class="col-md-4">
        <input id="first_name" name="first_name" type="text" placeholder="Mark Adriane" class="form-control input-md"<?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>" name="first_name" required="required">  
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Middle Name</label>  
        <div class="col-md-4">
        <input id="middle_name" name="middle_name" type="text" placeholder="Mercado" class="form-control input-md"<?php echo (!empty($middle_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $middle_name; ?>" name="middle_name" required="required">  
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Contact Number</label>  
        <div class="col-md-4">
        <input id="contact_number" name="contact_number" type="text" placeholder="09166919150" class="form-control input-md"<?php echo (!empty($contact_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact_number; ?>" name="contact_number" required="required">  
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Email Address</label>  
        <div class="col-md-4">
        <input id="email_address" name="email_address" type="text" placeholder="sexyCh37Sa3a3@gmail.com" class="form-control input-md" <?php echo (!empty($email_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_address; ?>" name="email_address" required="required">  
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Birthday</label>  
        <div class="col-md-4">
        <input id="birthday" name="birthday" type="date" placeholder="Enter your birth date." class="form-control input-md"<?php echo (!empty($birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthday_id; ?>" name="birthday" required="required">  
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Select Year Level</label>
        <div class="col-md-4">
            <select id="year_level" name="year_level" class="form-control"<?php echo (!empty($year_level_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $year_level; ?>" name="year_level" required="required">
            <option value="Freshman">First Year</option>
            <option value="Sophomore">Second Year</option>
            <option value="Junior">Third Year</option>
            <option value="Senior">Fourth Year</option>
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Select Program</label>
        <div class="col-md-4">
            <select id="program" name="program" class="form-control" <?php echo (!empty($program_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $program; ?>" name="program" required="required">
            <option value="BSCPE">Computer Engineering</option>
            <option value="BSCE">Civil Engineering</option>
            <option value="BSME">Mechanical Enginering</option>
            <option value="BSEE">Electrical Engineering</option>
            </select>
        </div>
    </div>
    <br>
    
    <!-- Button (Double) -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="button1id"></label>
    <div class="col-md-4">
        <button id="button1id" name="button1id" class="btn btn-success" href="index.php">Submit</button>
        <button id="button2id" name="button2id" class="btn btn-danger" href="index.php">Cancel</button>
        
    </div>
    </div>

</fieldset>
</form>
<img src="softwareDev.jpg" alt="Description of the image" class="right-aligned-image">
</div> <!--ito dulo  ng continer-->


</div>
</div>

<style>
    body {
        display: flex;
        justify-content: center;
        background-image: url("bg.jpg");
        width: 100%;
        height: 10vh%;
        margin: 0;
        padding: 10px;
    }
    /* Adjust the styling to position the image to the right */
    .right-aligned-image {
            float: right;
            margin: 10px;
            width:700;
            height:500;
            padding-top: 40px;
    } 
    form {
        flex: 4;
        
    } 
    .form-group {
        width: 300%;
    }  
    @font-face {
        font-family: "Offside";
        src: url("Offside-Refular.ttf");
    }    
    title {
        font-family: "Offside", sans-serif;
    }
    button {
        padding-top: 40px;
    }
</style>