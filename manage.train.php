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
            #login-form{
                width: 100%;
            }
        }
    </style>
</head>

<body>

	<h4 class="text-center">Manage Train</h4>

	<div class="row justify-content-center">
		<div class="col-sm-2 col-lg-2 my-5">
			<?php include("admin.sidebar.php") ?>
		</div>

		<div class="col-lg-9 col-sm-9">

            <div class="row">
               <div class="col text-right">
                   <a href="add.train.php" class="btn btn-info my-2">+ Add Train</a>
               </div> 
            </div>

            <?php

            if (isset($_GET["id"])) {

                $train = new Train();

                if($train->delete_train('train',$_GET["id"])==true) {
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

			 <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Train Name</th>
                                    <th>Departure</th>
                                    <th>Destination</th>
                                    <th>Distance/KM</th>
                                    <th>Depart Time</th>
                                    <th>Arrival Time</th>
                                    <th>Date</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                        $train = new Train();
                        $data = $train->view_train("train");
                        if (!empty($data)) {
                        foreach ($data as $key => $value) {
                        ?>
                            <tbody id="myTable">
                                <tr>
                                    <td><?php echo $value["name"];?></td>
                                    <td><?php echo $value["depart"];?></td>
                                    <td><?php echo $value["dest"];?></td>
                                    <td><?php echo $value["distance"];?></td>
                                    <td><?php echo $value["depart_time"];?></td>
                                    <td><?php echo $value["arr_time"];?></td>
                                    <td><?php echo $value["journey_date"];?></td>

                                    <td>
                                        <a href="update.train.php?id=<?php echo $value['id'];?>" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="manage.train.php?id=<?php echo $value['id'];?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>

                                    <td>
                                        <a href="add.travel.class.php?id=<?php echo $value['id'];?>&&name=<?php echo $value['name'];?>" class="btn btn-outline-danger">Class</a>
                                    </td>

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