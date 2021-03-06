<?php 
 include ("init.php");
 include ("login.header.php");

 if (isset($_GET["class_id"])) {
     $id = $_GET["class_id"];
     $_SESSION["class_id"] = $_GET["class_id"];

     $travel = new TravelClass();

     $info = $travel->specific_class("travel_class",$id);

     foreach ($info as $key => $value) {
         $_SESSION["class_name"] = $value["class_name"];
         $_SESSION["fare"] = $value["fare"];
         $_SESSION["number_of_seats"] = $value["number_of_seats"];
         $_SESSION["train_no"] = $value["train_no"];
         $_SESSION["train_name"] = $value["train_name"];
     }
 }
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

    <h4 class="text-center">Update Travel Class</h4>

    <div class="row justify-content-center">
        <div class="col-sm-2 col-lg-2 my-5">
            <?php include("admin.sidebar.php") ?>
        </div>

        <div class="col-lg-9 col-sm-9">

            <?php
            if (isset($_POST["submit"])) {

                $class_name = $_POST["class_name"];
                $fare = $_POST["fare"];
                $number_of_seats = $_POST["number_of_seats"];

                $data = array(
                    "class_name"=>$class_name,
                    "fare"=>$fare,
                    "number_of_seats"=>$number_of_seats,
                    "train_no"=>$_SESSION["train_no"],
                    "train_name"=>$_SESSION["train_name"]
                );

                $travel = new TravelClass();

                if (($travel->update_class("travel_class",$data,$_SESSION["class_id"]))==true) {
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
            
             <form action="update.travel.class.php" method="POST">
                <div class="form-group">
                    <label for="class_name">Travel Class Name</label>
                    <input type="text" name="class_name" value = "<?php if(isset($_SESSION['class_name'])) echo $_SESSION['class_name']; ?>" class="form-control" id="" placeholder="Enter travel class name">
                </div>
                <div class="form-group">
                    <label for="fare">Fare/KM</label>
                    <input type="text" name="fare" value = "<?php if(isset($_SESSION['fare'])) echo $_SESSION['fare']; ?>" class="form-control" id="" placeholder="Enter fare">
                </div>
                <div class="form-group">
                    <label for="seat">Seat Quantity</label>
                    <input type="text" name="number_of_seats" value = "<?php if(isset($_SESSION['number_of_seats'])) echo $_SESSION['number_of_seats']; ?>" class="form-control" id="" placeholder="Enter Destination">
                </div>

                <input type="submit" name="submit" class="btn btn-info" value="UPDATE TRAVEL CLASS">
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