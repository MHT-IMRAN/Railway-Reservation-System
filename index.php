<!DOCTYPE html>
<html lang="en">

<head>
    <title>KLIA EXPRESS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="klia express ticket booking system">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Ajax">
    <meta name="author" content="Mohammad Imrah Hasan Tuhin, Asraful Islam, Minhazul Arefin">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        #main-title {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/train.jpg") no-repeat center;
        }

        #service {
            border-bottom: 5px solid tomato;
        }

        * {
            box-sizing: border-box;
        }

        /* The grid: Four equal columns that floats next to each other */
        .column {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row1:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container */
        .container1 {
            position: relative;
            display: none;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the expanded image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="m-0 p-0">
        <?php
            include("header.php");
        ?>
    </div>

    <div class="jumbotron jumbotron-fluid text-center m-0" id="main-title">
        <h1 class="text-white font-weight-bold font-italic">KLIA EXPRESS TICKET BOOKING SYSTEM</h1>
        <p class="text-white font-weight-bold text-uppercase">your satisfaction is our priority.</p>
        <div class="d-flex text-danger justify-content-center">
            <a class="font-weight-bold pl-4 pr-4 p-2 text-white btn btn-outline-primary" href="about_us.php">Learn about
                us...</a>
        </div>
    </div>

    <div class="pl-5 pr-5">
        <h3 class="text-info text-center pt-2" id="service">
            OUR SERVICES
        </h3>
        <div class="row justify-content-center">
            <div class="col-sm-3 col-lg-3 m-4">
                <img src="images/premier.jpg" alt="premier class seats" height="300px" width="100%">
                <h3 class="text-secondary text-center font-weight-bold pt-3 font-italic">Premier Class</h3>
                <p class="text-secondary text-center font-italic font-weight-bold">RM. 5.50 / KM</p>
            </div>
            <div class="col-sm-3 col-lg-3 m-4">
                <img src="images/superior.jpg" alt="Superior class seats" height="300px" width="100%">
                <h3 class="text-secondary text-center font-weight-bold pt-3 font-italic">Superior Class</h3>
                <p class="text-secondary text-center font-italic font-weight-bold">RM. 4.50 / KM</p>
            </div>
            <div class="col-sm-3 col-lg-3 m-4">
                <img src="images/economy.jpg" alt="Economy class seats" height="300px" width="100%">
                <h3 class="text-secondary text-center font-weight-bold pt-3 font-italic">Economy Class</h3>
                <p class="text-secondary text-center font-italic font-weight-bold">RM. 3.50 / KM</p>
            </div>
        </div>
    </div>

    <h3 class="text-info text-center pt-2 mx-5" id="service">
        PHOTO GALLERY
    </h3>

    <!-- The four columns -->
    <div class="row1">
        <div class="column">
            <img src="images/train101.jpg" alt="KLIA express" style="width:100%" height="170px"
                onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="images/train-102.jpg" alt="KLIA express" style="width:100%" height="170px"
                onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="images/train-103.jpg" alt="KLIA express" style="width:100%" height="170px"
                onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="images/train-104.jpg" alt="KLIA express" style="width:100%" height="170px"
                onclick="myFunction(this);">
        </div>
    </div>

    <div class="container1">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img class="mx-auto d-block" id="expandedImg" style="width:80%">
        <div id="imgtext"></div>
    </div>

    <div class="my-3">
        <?php
            include("footer.php");
        ?>
    </div>

    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "block";
        }
    </script>
</body>

</html>