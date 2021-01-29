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

        @media only screen and (max-width: 600px) {
            #login-form{
                width: 100%;
            }
        }
    </style>
</head>

<body>
    
<?php include("header.php"); ?>
    
    <div class="row justify-content-center my-5">
        <div class="col-sm-4 col-lg-4">
            <div class="container" id="login-form">
                <h1 class="text-primary text-center pt-3 pb-2">ADMIN SIGNIN</h1>

                 <?php
                 include ("init.php");
                 if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])) {
                     $admin = new Administration();
                     $status = $admin->login("admin",$_POST);
                     if ($status=="success") {

                         $_SESSION['email']= $_POST["email"];

                         header("Refresh:0; url = admin.dashboard.php");

                         echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>"
                             ."<strong>Login success!</strong>"
                             ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                             ."<span aria-hidden='true'>&times;</span>"
                             ."</button>"
                             ."</div>";
                     }else{
                        if (isset($status)) {
                           echo $status;
                        }
                     }
                 }
                ?>


                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
                            required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"
                            required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" required> I agree with all conditions.
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                        </label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>
    <div class="pt-5">
        <?php
            include("footer.php");
        ?>
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

</body>

</html>