<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="klia express ticket booking system">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Ajax">
    <meta name="author" content="Mohammad Imrah Hasan Tuhin, Asraful Islam, Minhazul Arefin">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
   font-family: 'Times New Roman', Times, serif;
   overflow-x: hidden; margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>
  <?php
  include("header.php");
  ?>

<div class="about-section">
  <h1>KLIA EXPRESS TICKET BOOKING SYSTEM</h1>
  <p>KLIA Express Ticket Booking System which provides
the tickets validity, discount info, purchase limits, and other booking activities like-
</p>
  <p>Confirm ticket booking
     Cancel booking
     Check ticket availability
  </p>
</div>

  <div class="container-fluid">
 

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="images/cat.jpg" alt="Imran" style="width:100%" height="300">
      <div class="container">
        <h2>Md Imran Hasan Tuhin</h2>
        <p class="title">System Developer</p>
        <p>Some text that describes imran.</p>
        <p>mdimran@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/asruf.jpg" alt="Mike" style="width:100%" height="300">
      <div class="container">
        <h2>Md Asraful Islam</h2>
        <p class="title">IT Specialist</p>
        <p>Some text that describes asraful.</p>
        <p>asraful.liana@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="images/sofe.jpg" alt="John" style="width:100%" height="300">
      <div class="container">
        <h2>Arifin Rafe</h2>
        <p class="title">System Administrator</p>
        <p>Some text that describes rafe.</p>
        <p>rafe.buddy@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>
  </div>

<?php
    include("footer.php");
?>

</body>
</html>
