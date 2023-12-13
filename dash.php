<?php
//include config file
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DASHBOARD</title>
<!--FOR DARK VARIANT-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    /* background picture */
    body {
        background-image: url("bg.jpg");
    }

    .lead {
        margin: auto;
    }
    .btn-lg{
        margin: auto;
    }

    h1 {
        font-family:'Times New Roman', Times, serif;
    }
    h2 {
        font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 50px;
        color: #f5f5f5;
    }

    h3 {
        font-family: fantasy;
        padding:2rem;
        font-size: 25px;
        color: black;
    }
   

   h5 {
    color: black;
    justify-content: center;
   }


    /*margin*/
    card-group {
        padding: 4rem;
    }

    /* space in-between cards */
    .card {
        margin:2rem;
        background-color:#f5f5f5;
        padding: 7px;
    }

    /*font of cards*/
    .card-text {
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .myCarousel {
        margin: 2rem;
    }

    #act {
        padding-left: 2rem;
    }
    

</style>
<body>
    <div class="container-lg my-4">    
    
        <div class="p-5 mb-4 bg-dark text-white rounded-3">
            <h1>Welcome</h1>
            <h2>User!</h2>
            <!-- <p class="lead">Admissions are open for STEM and non-STEM students. <a href="https://www.ue.edu.ph/mla/" target="_blank" class="text-white">Tomorrow begins in the East.</p> -->
        </div>

        <div class="m-5">
        <h3>DASHBOARD</h3>
        <div class="container">
        <div class="card-group">
            <!--First Card-->
            <div class="card">
                <img src="lahat.jpg" class="card-img-top" alt="picOne">
                <div class="card-body">
                    <h5 class="card-title">Event Creation</h5>
                    <a href="eventReg/eventCreate.php" class="btn btn-success">Click</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">University of the East - Manila Campus</small>
                    
                </div>
            </div>
            
            <!--Second Card-->
            <div class="card">
                <img src="seminar.jpg" class="card-img-top" alt="picTwo">
                <div class="card-body">
                    <h5 class="card-title">Attendee Registration</h5>
                    <a href="attend.php" class="btn btn-success">Click</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">University of the East - Manila Campus</small>
                </div>
            </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    </div>





       


</body>
</html>

<!--oo-->

