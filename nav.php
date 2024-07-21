<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Cinzel+Decorative&family=Cinzel:wght@400;500&family=Orbitron:wght@500&family=Playfair:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
</head>

<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "HotelBook");

$sql = "SELECT * FROM admin";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $email3 = $row["Email"];
    $pass1 = $row["Password"];
}
?>

<?php if (!isset($_SESSION["Admin"]) || $_SESSION["Admin"] != true): ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="aboutUs.php">About Us</a></li>
      <li><a href="gallary.html">Gallery</a></li>
      <li><a href="member.php">Membership</a></li>
      <li><a href="roomDetails.php">Room &amp; Facilities</a></li>
      <li><a href="avail.php">Online Reservation</a></li>
      <li><a href="review.php">Review</a></li>
      <li><a href="contactUs.php">Contact Us</a></li>
      <li><a href="login.php">Login (Admin)</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="http://www.facebook.com"><img src="images/facebook.png"></a></li>
      <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>
    </ul>
  </div>
</nav>
<?php endif; ?>

<?php if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true): ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="admin/rooms.php">Add Rooms</a></li>
      <li><a href="admin/roomsbooked.php">Booked Rooms</a></li>
      <li><a href="admin/RoomDetails.php">Room &amp; Facilities</a></li>
      <li><a href="admin/adminreset.php">Admin Credentials</a></li>
      <li><a href="admin/staffRecord.php">Staff Register</a></li>
      <li><a href="admin/staffDisplay.php">Staff Data</a></li>
      <li><a href="admin/register.php">Register</a></li>
      <li><a href="logout.php">LogOut</a></li>
    </ul>
  </div>
</nav>
<?php endif; ?>
