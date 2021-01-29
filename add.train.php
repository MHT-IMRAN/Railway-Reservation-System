<?php 
 include ("init.php");
 include ("login.header.php");
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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            overflow-x: hidden;
        }

        @media only screen and (max-width: 600px) {
            #login-form {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <h4 class="text-center">Add Train</h4>

    <div class="row justify-content-center">
        <div class="col-sm-2 col-lg-2 my-5">
            <?php include("admin.sidebar.php") ?>
        </div>

        <div class="col-lg-9 col-sm-9">

            <?php
            if (isset($_POST["submit"])) {

                $trainname = $_POST["name"];
                $depart = $_POST["depart"];
                $dest = $_POST["dest"];
                $distance = $_POST["distance"];
                $depart_time= $_POST["depart_time"];
                $arr_time = $_POST["arr_time"];
                $journey_date = $_POST["journey_date"];

                $data = array(
                    "name"=>$trainname,
                    "depart"=>$depart,
                    "dest"=>$dest,
                    "distance"=>$distance,
                    "depart_time"=>$depart_time,
                    "arr_time"=>$arr_time,
                    "journey_date"=>$journey_date
                );

                $train = new Train();
                if ($train->add_train("train",$data)==true) {
                    echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>"
                    ."<strong>Success!</strong>"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
                }else{
                    echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>"
                    ."<strong>Failed!</strong>"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
                }
                
            }
            ?>
            <form action="add.train.php" method="POST">
                <div class="form-group">
                    <label for="trainname">Train Name</label>
                    <input type="text" name="name" class="form-control" id="trainname" placeholder="Enter train name">
                </div>
                <div class="form-group">
                    <label for="trainname">Departure</label>
                    <input type="text" name="depart" class="form-control" id="trainname" placeholder="Enter Departure">
                </div>
                <div class="form-group">
                    <label for="trainname">Destination</label>
                    <input type="text" name="dest" class="form-control" id="trainname" placeholder="Enter Destination">
                </div>
                <div class="form-group">
                    <label for="trainname">Diastance</label>
                    <input type="text" name="distance" class="form-control" id="trainname" placeholder="Enter Diastance">
                </div>
                <div class="form-group">
                    <label for="trainname">Departure Time</label>
                    <input type="text" name="depart_time" class="form-control" id="trainname" placeholder="Enter Departure time">
                </div>
                <div class="form-group">
                    <label for="trainname">Arrival Time</label>
                    <input type="text" name="arr_time" class="form-control" id="trainname" placeholder="Enter arrival time">
                </div>
                <div class="form-group">
                    <label for="trainname">Journey Date</label>
                    <input type="date" name="journey_date" class="form-control" id="trainname" placeholder="Enter journey date">
                </div>

                <input type="submit" name="submit" class="btn btn-info" value="ADD TRAIN">
            </form>

        </div>
    </div>

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

    <?php
       include("footer.php");
    ?>

</body>

</html>