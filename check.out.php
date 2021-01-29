<?php 
include ("init.php");
if (isset($_GET["id"])) {
    $_SESSION["tarin_no"] = $_GET["id"];
}

if (isset($_GET["class_name"])) {
    $_SESSION["class_name"] = $_GET["class_name"];
}

if (isset($_GET["fare"])) {
    $_SESSION["fare"] = $_GET["fare"];
}

if (isset($_GET["departure"])) {
    $_SESSION["departure"] = $_GET["departure"];
}

if (isset($_GET["destination"])) {
    $_SESSION["destination"] = $_GET["destination"];
 }

if (isset($_GET["val"])) {
    $_SESSION["val"] = $_GET["val"];
 }

?>

<?php
$_SESSION["quantity"] = 1;
$_SESSION["total"] = $_SESSION["fare"]; 
if (isset($_POST["submit"])) {
    $_SESSION["quantity"] = $_POST["quantity"];
    $_SESSION["total"] = $_SESSION["quantity"]*$_SESSION["fare"];
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
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            overflow-x: hidden;
        }

        * {
            box-sizing: border-box;
        }

        .row1 {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container1 {
            padding: 5px 20px 15px 20px;
            /*border: 1px solid lightgrey;*/
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row1 {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <?php include("login.header.php"); ?>

    <div class="row mx-1 my-1">

        <div class="col-sm-2 col-lg-2">
            <?php include("user.sidebar.php") ?>
        </div>

        <div class="col-sm-9 col-lg-9 text-secondary my-3">

            <?php

            if (isset($_POST["pay"])) {
                $_SESSION["card_number"] = $_POST["cardnumber"];
                $_SESSION["card_type"] = $_POST["cardtype"];
                $_SESSION["full_name"] = $_POST["fname"];
                $_SESSION["address"] = $_POST["address"];

                 date_default_timezone_set("Asia/Kuching");
                 $date = date("Y-m-d");
                 $ticket_number = uniqid();

                 $_SESSION["ticket_number"] = $ticket_number;

                 $data = array(
                      'card_number'=>$_SESSION["card_number"],
                      'card_type'=>$_SESSION["card_type"],
                      'date'=>$date,
                      'amount'=>$_SESSION["total"],
                      'ticket_number'=>$ticket_number
                    );

                $payment = new Payment();
                $pay = $payment->user_pay("payment",$data);

                $ticket_data = array(
                    "ticket_number"=>$ticket_number,
                    "quantity"=>$_SESSION["quantity"],
                    "depart"=>$_SESSION["departure"],
                    "dest"=>$_SESSION["destination"],
                    "time"=>$_SESSION["val"],
                    "date"=>$date,
                    "amount"=>$_SESSION["total"],
                    "booked_by"=>$_SESSION["email"]
                );
                

                $ticket = new Ticket();
                $buy = $ticket->ticket_print("ticket",$ticket_data);


                $passenger_data = array(
                    "name"=>$_POST["fname"],
                    "email"=>$_SESSION["email"],
                    "address"=>$_POST["address"],
                    "ticket_number"=>$ticket_number
                );

                $passenger = new Passenger();

                $book = $passenger->booking("booking",$passenger_data);


                $to = $_SESSION["email"];
                $subject = "KALIA Express ticket booking";
                $message = "Dear User,
                Your ticket number: ".$ticket_number;
                $headers = "From: mohammadimran007799@gmail.com";

                if ($pay==true && $buy==true && $book==true && mail($to, $subject, $message, $headers)) {
                    echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>"
                    ."<strong>Payment Success!</strong> Ticket number is: ".$ticket_number." check your email"." click for <a href='print.php' class='alert-link'>print</a>"
                    ."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                    ."<span aria-hidden='true'>&times;</span>"
                    ."</button>"
                    ."</div>";
                }

                
            }

            ?>

            <div class="row1">
                <div class="col-75">
                    <div class="container1">
                        <form action="check.out.php" method="POST">

                            <div class="row1">
                                <div class="col-50">
                                    <h3>Booking Details</h3>
                                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                    <input type="text" id="fname" name="fname" placeholder="John M. Doe">
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                    <input type="text" id="email" name="email" placeholder="john@example.com">
                                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                    <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                                    <label for="city"><i class="fa fa-institution"></i> City</label>
                                    <input type="text" id="city" name="city" placeholder="New York">

                                    <div class="row1">
                                        <div class="col-50">
                                            <label for="state">State</label>
                                            <input type="text" id="state" name="state" placeholder="SM">
                                        </div>
                                        <div class="col-50">
                                            <label for="zip">Zip</label>
                                            <input type="text" id="zip" name="zip" placeholder="94300">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-50">
                                    <h3>Payment</h3>
                                    <label for="fname">Accepted Cards</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>
                                    <label for="cname">Name on Card</label>
                                    <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                    <label for="ccnum">Credit card number</label>
                                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                    <label for="cardtype">Card Type</label>
                                    <input type="text" id="cardtype" name="cardtype" placeholder="visa">
                                    <div class="row1">
                                        <div class="col-50">
                                            <label for="expyear">Exp Year</label>
                                            <input type="text" id="expyear" name="expyear" placeholder="2018">
                                        </div>
                                        <div class="col-50">
                                            <label for="cvv">CVV</label>
                                            <input type="text" id="cvv" name="cvv" placeholder="352">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <input type="submit" name="pay" class="btn btn-info" value="Continue">

                        </form>
                    </div>
                </div>
                <div class="col-25">
                    <div class="container">
                        <p><a href="#">From : </a> <span class="price"> <?php echo $_SESSION["departure"];?></span></p>
                        <p><a href="#">To : </a> <span class="price"><?php echo $_SESSION["destination"];?></span></p>
                        <p><a href="#">Quantity : </a> <span class="price"><?php echo $_SESSION["quantity"];?></span>
                        </p>
                        <p>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="5" step="1"
                                value="<?php if(isset($_SESSION['quantity'])) echo $_SESSION['quantity']; ?>">
                            <input type="submit" name="submit" class="btn btn-primary" value="UPDATE">
                        </form>
                        </p>
                        <hr>
                        <p>Total <span class="price"
                                style="color:black"><b><?php echo $_SESSION["total"]." RM";?></b></span></p>
                    </div>
                </div>
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