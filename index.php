<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
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
            margin: auto;
            padding: auto;
            
        }
        .wrapper {
            width: 100%;
            margin: 0 auto;
            padding: 40px;
        }

        table tr td:last-child {
            width: 100px;
        }
    </style>
    <script>echo "<th>Surname</th>";
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
                    <div class="mt-3 mb-3 clearfix">
                        <h2 class="pull-left">Student Details</h2>
                        <a href="testReg.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Student</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if ($result = $mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Student Number</th>";
                            echo "<th>Surname</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Middle Name</th>";
                            echo "<th>Contact Number</th>";
                            echo "<th>Email Address</th>";
                            echo "<th>Birthday</th>";
                            echo "<th>Year Level</th>";
                            echo "<th>Program</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch_array()) {
                                echo "<tr>";
                                echo "<td>" . $row['stud_Num'] . "</td>";
                                echo "<td>" . $row['surname'] . "</td>";
                                echo "<td>" . $row['first_name'] . "</td>";
                                echo "<td>" . $row['middle_name'] . "</td>";
                                echo "<td>" . $row['contact_number'] . "</td>";
                                echo "<td>" . $row['email_address'] . "</td>";
                                echo "<td>" . $row['birthday'] . "</td>";
                                echo "<td>" . $row['year_level'] . "</td>";
                                echo "<td>" . $row['program'] . "</td>";
                                echo "<td>";
                                echo '<a href="read.php?id=' . $row['stud_Num'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo '<a href="update.php?id=' . $row['stud_Num'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['stud_Num'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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