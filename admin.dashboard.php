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

	<h4 class="text-center">View Parchases</h4>

	<div class="row justify-content-center">
		<div class="col-sm-2 col-lg-2 my-5">
			<?php include("admin.sidebar.php") ?>
		</div>

		<div class="col-lg-9 col-sm-9">

			 <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ticket Number</th>
                                    <th>Departure</th>
                                    <th>Destination</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <?php
                        $admin = new Administration();
                        $data = $admin->view_sell("ticket");
                        if (!empty($data)) {
                        foreach ($data as $key => $value) {
                        ?>
                            <tbody id="myTable">
                                <tr>
                                    <td><?php echo $value["ticket_number"];?></td>
                                    <td><?php echo $value["depart"];?></td>
                                    <td><?php echo $value["dest"];?></td>
                                    <td><?php echo $value["time"];?></td>
                                    <td><?php echo $value["date"];?></td>
                                    <td><?php echo $value["amount"];?></td>
                                </tr>
                            </tbody>


                            <?php
                        }

                     }else{
                        echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                             "<strong>No user!</strong>.".
                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                             "<span aria-hidden='true'>&times;</span>".
                             "</button>".
                             "</div>";
                       } 
                   ?>
                        </table>
			
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