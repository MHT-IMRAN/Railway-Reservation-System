<?php 
include ("init.php"); 
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

        <div class="col-sm-2 col-lg-2">
            <?php include("user.sidebar.php") ?>
        </div>

        <div class="col-sm-9 col-lg-9 text-secondary font-weight-bold">

            <div class="row justify-content-center mb-5">
                <div class="col-lg-5 col-sm-5">

                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="needs-validation"
                        novalidate>
                        <div class="form-group">
                            <label for="departures">Departure:</label>
                            <input type="text" class="form-control" id="departures" placeholder="Enter departure"
                                name="departures" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination:</label>
                            <input type="text" class="form-control" id="destination" placeholder="Enter destination"
                                name="destination" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" placeholder="Enter date" name="date"
                                required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-info" value="Search">
                    </form>

                </div>
            </div>

            <h5 class="text-center text-white bg-dark py-2 my-1">Search Result</h5>

            <?php
                 if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])) {
                     $passenger = new Passenger();
                     $data = $passenger->search_train($_POST);
                     if (empty($data)) {
                         echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>"
                    ."<strong>No train!</strong>"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
                     }else{
                        foreach ($data as $key => $value) {

                        $travel_class = new TravelClass();
                        $data1 = $travel_class->search_class($value["id"]);

                        if (!empty($data1)) {
                            foreach ($data1 as $key1 => $value1) {
                                if ($value1["number_of_seats"] >=1) {
                                    ?>

            <div class="row justify-content-center">
                <div class="col-sm-7 col-lg-7 text-center">
                    <div class="border border-danger my-2 mx-2 py-2 px-2">
                        <h6 class="text-danger"><?php echo $value["name"]; ?></h6>
                        <h6><?php echo " From: ".$value["depart"]." to ".$value["dest"];?></h6>
                        <h6><?php echo "Departure Time: ".$value["depart_time"]." ARRIVAL: ".$value["arr_time"];?></h6>
                        <h6><?php echo "Date: ".$value["journey_date"];?></h6>
                        <h6><?php echo "Travel Class: ".$value1["class_name"];?></h6>
                        <?php $fare = $value1["fare"] * $value["distance"];?>
                        <h6 class="text-info"><?php echo "FARE: ".$fare." RM";?></h6>

                        <a href="check.out.php?id=<?php echo $value['id'];?>&&name=<?php echo $value1['class_name'];?>&&fare=<?php echo $fare;?>&&departure=<?php echo $value['depart'];?>&&destination=<?php echo $value['dest'];?>&&val=<?php echo $value['depart_time'];?>" class="btn btn-info my-2">Check Out</a>
                    </div>
                </div>
            </div>

            <?php
                                }
                            }
                        }
                        else{
                                    echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>"
                    ."<strong>No train!</strong>"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
                                }

                        }
                     }
                 }

               ?>

            <h5 class="text-center text-white bg-dark py-2 my-1">Today's Train</h5>

            <div class="row justify-content-center">
                <?php

               $train = new Train();
               $info = $train->daily_tain();

               if (empty($info)) {
                         echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>"
                    ."<strong>No train!</strong>"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
                     }else{
                        foreach ($info as $key => $value) {
                ?>
                <div class="col-sm-7 col-lg-7 text-center">
                    <div class="border border-danger my-2 mx-2 py-2 px-2">
                        <h6 class="text-danger"><?php echo $value["name"]; ?></h6>
                        <h6><?php echo " From: ".$value["depart"]." to ".$value["dest"];?></h6>
                        <h6><?php echo "Time: ".$value["depart_time"]." ARRIVAL: ".$value["arr_time"];?></h6>
                    </div>
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