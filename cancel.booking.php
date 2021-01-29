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

            <?php

            if (isset($_GET["ticket_number"])) {
                $_SESSION["ticket_number"] = $_GET["ticket_number"];
            }

            if (isset($_GET["amount"])) {
                $_SESSION["amount"] = $_GET["amount"];
            }

            $refund = $_SESSION["amount"]/2;

            $data = array(
                "ticket_number"=>$_SESSION["ticket_number"],
                "amount"=>$refund,
                "cancel_by"=>$_SESSION["email"]
            );

            

            $pass = new Passenger();

            if ($pass->cancellation("ticket",$_SESSION["ticket_number"])==true && $pass->booking("cancel",$data)==true) {
                echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>"
                    ."<strong>Success!</strong> your balnace will be retrun ".$refund." RM"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
            }
            else{
                    echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>"
                    ."<strong>Failed!</strong>"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
                 }

            ?>


            <div class="container-fluid">

                <?php
                $user = new Passenger();
                $data = $user->my_purchases("ticket",$_SESSION["email"]);
                if (empty($data)) {
                    echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>"
                    ."<strong>No data!</strong>"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
                }else{
                    foreach ($data as $key => $value) {
                        ?>
                        <a class="btn btn-danger" href="cancel.booking.php?ticket_number=<?php echo $value['ticket_number'];?>&&amount=<?php echo $value['amount'];?>">Cancel Booking</a>
                        <div class="border border-danger my-2 mx-2 py-2 px-2">
                        <h6><?php echo "Ticket Number: ".$value["ticket_number"];?></h6>
                        <h6><?php echo "Quantity: ".$value["quantity"];?></h6>
                        <h6><?php echo "Departure: ".$value["depart"];?></h6>
                        <h6><?php echo "Destination: ".$value["dest"];?></h6>
                        <h6><?php echo "Time: ".$value["time"];?></h6>
                        <h6><?php echo "Date: ".$value["date"];?></h6>
                        <h6><?php echo "Fare: ".$value["amount"]." RM";?></h6>
                        </div>
                        <?php
                    }
                }

                ?>

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