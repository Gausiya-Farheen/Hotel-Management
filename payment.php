<?php
session_start(); // Start the session

// Check if the book_id is passed via GET or POST and store it in the session
if (isset($_GET['book_id'])) {
    $_SESSION['book_id'] = $_GET['book_id'];
} elseif (isset($_POST['book_id'])) {
    $_SESSION['book_id'] = $_POST['book_id'];
}

// Check if the book_id is set in the session
if (!isset($_SESSION['book_id'])) {
    die("No book_id provided.");
}

$book_id = $_SESSION['book_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
  height:300px;
}
.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%;
  flex: 75%;
}
.col-50,
.col-75 {
  padding: 0 16px;
}
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
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
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin-left: 237px;
  border: none;
  width: 100%;
  border-radius: 3px;
  font-size: 17px;
  width: 250px;
}

.btn:hover {
  background-color: #45a049;
}
hr {
  border: 1px solid lightgrey;
}
form{
    height: 200px;
    width: 50%;
    margin-left:420px;
}
.bpos{
  position: absolute;
  top:680px;
  left:473px;
}
.home {
    color: #897df2;
    margin-left: 300px;
  }

</style>
</head>
<body>

<form action="" method="POST">
<div class="row">
  <div class="col-75">
    <div class="container">
    <div class="col-50">
            <h3>Payment</h3>
            <hr>
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
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          <input type="submit" value="Pay" class="btn" name="pay">
<a href="index.php" class="home">Back to Home</a>
          </div>
</form>
          </body>
</html>

<?php
if (isset($_POST['pay'])) {
    $conn = mysqli_connect("localhost", "root", "", "HotelBook");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $book_id = $_SESSION['book_id'];
    $currentDate = date("Y-m-d");
    
    $sql = "UPDATE reservations SET P_date='$currentDate', Paid='true' WHERE book_id='$book_id'";
    
    $res = mysqli_query($conn, $sql);
    
    if ($res) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Payment Successful.')</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('No rows updated. Check if the book_id exists.')</script>";
        }
    } else {
        echo "<script>alert('Error executing query: " . mysqli_error($conn) . "')</script>";
    }
    
    mysqli_close($conn);
}
?>
