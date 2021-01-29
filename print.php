<?php 
include ("init.php"); 
date_default_timezone_set("Asia/Kuching");
$date = date("Y-m-d");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>KLIA EXPRESS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <?php include("login.header.php"); ?>

    <div class="row mx-1 my-1">

        <div class="col-sm-2 col-lg-2 mb-5 pb-5">
            <?php include("user.sidebar.php") ?>
        </div>

        <div class="col-sm-9 col-lg-9 text-secondary my-3">

            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">Name: <?php echo $_SESSION["full_name"]; ?></div>
                    <div class="card-body">Ticket Number: <?php echo $_SESSION["ticket_number"]; ?></div>
                    <div class="card-footer">Departure: <?php echo $_SESSION["departure"]; ?></div>
                    <div class="card-footer">Deastination: <?php echo $_SESSION["destination"]; ?></div>
                    <div class="card-footer">Time: <?php echo $_SESSION["val"]; ?></div>
                    <div class="card-footer">Date: <?php echo $date; ?></div>
                </div>

                <button class="btn btn-info my-4" onclick="window.print()">Print ticket</button>

            </div>

        </div>

    </div>


    <?php include("footer.php"); ?>


    <script>
        // Disable form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</body>

</html>