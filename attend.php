<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image and Form Example</title>
    <!-- Link to Bootstrap CSS for styling (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            background-image: url("lahatOpacity.png");
            background-repeat: no-repeat;
            background-size: cover; /* Adjust as needed: cover, contain, etc. */
            background-position: center center;
            width: 100%;
            height: 100%;
            margin: 0;
            padding:200px;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 100%;
        }

        .image-container {
            max-width: 50%;
            max-height: 50%;
            display: left;
            margin: 2rem;
        }
        /* textbox ito */
        .form-control {
            float: left;
            padding-left: 10px;
            width: 200%;
        }

        /* Optional styling for form elements */
        form {
            max-width: 300px; /* Adjust the max-width of the form as needed */
            margin: 0 auto;
            /* float: right;
            display: right; */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="image-container">
        <img src="qr.png" alt="QR Code" width="300px" height="300px">
    </div>
    <div class="form-container">
        <form>
            <!-- Your form elements go here -->
            <legend>Attendee Registration</legend>
            <label for="stud_Num">Student Number:</label>
            <input type="text" id="stud_Num" name="stud_Num" class="form-control mb-2" placeholder="20146532145">
            <div class="col-md-4">
            <button id="button1id" name="button1id" class="btn btn-success">Register</button>
            </div>
        </form>
    </div>
</div>
</body>
</style>
</html>
