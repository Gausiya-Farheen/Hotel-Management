<?php
session_start();

if (isset($_GET['roomname']) && isset($_GET['checkin']) && isset($_GET['checkout'])) {
    // Retrieve the values of the parameters from the URL
    $roomname = $_GET['roomname'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $_SESSION["Book"]=true;
}

if (isset($_POST["submit"])) {
    $conn = mysqli_connect("localhost", "root", "", "HotelBook");

    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $FName = $_POST["FName"];
    $MName = $_POST["MName"];
    $LName = $_POST["LName"];
    $email = $_POST["email"];
    $phno = $_POST["phno"];
    $rooms = $_POST["rooms"];

    // Fetch available rooms
    $sql = "SELECT * FROM room_book WHERE RoomName='$roomname' AND (room_id NOT IN (SELECT DISTINCT room_id FROM room_book WHERE arrival <= '$checkin' AND departure >= '$checkout'))";
    $check = mysqli_query($conn, $sql) or die(mysqli_connect_errno() . "Data here cannot be inserted");

    if (mysqli_num_rows($check) > 0) {
        $room_id = array();
        for ($i = 1; $i <= $rooms; $i++) {
            $row = mysqli_fetch_array($check);
            $id = $row['room_id'];
            $room_id[] = $row['room_id'];

            $sql2 = "UPDATE room_book SET arrival='$checkin', departure='$checkout', name='$FName $MName $LName', email='$email', phno=$phno, booked='true' WHERE room_id=$id";
            $send = mysqli_query($conn, $sql2);
        }

        if ($send) {
            echo "<script>alert('Your Room has been booked!!')</script>";
            $book_id = abs(crc32(uniqid("BID")));
            $room_ids = implode(',', $room_id);
            $datetime1 = new DateTime($checkin);
            $datetime2 = new DateTime($checkout);
            $interval = $datetime1->diff($datetime2);
            $duration = $interval->days;

            $sql3 = "INSERT INTO reservations(book_id, Name, Email, Arrival, Departure, Duration, room_id, RoomName, Paid, Phno) VALUES ('$book_id', '$FName $MName $LName', '$email', '$checkin', '$checkout', $duration, '$room_ids', '$roomname', 'false', $phno)";
            $v = mysqli_query($conn, $sql3);
        } else {
            echo "<script>alert('Sorry Internal Problem.')</script>";
        }
    } else {
        echo "<script>alert('Sorry, no rooms are available.')</script>";
    }

    $sql4 = "SELECT * FROM register WHERE Email='$email'";
    $r = mysqli_query($conn, $sql4);
    if (mysqli_num_rows($r) > 0) {
        $row1 = mysqli_fetch_array($r);
    }
    if (empty($row1['Email'])) {
        $sql5 = "INSERT INTO register SET FName='$FName', MName='$MName', LName='$LName', Email='$email', Phno='$phno'";
        $res = mysqli_query($conn, $sql5);
    }

    $sql6 = "SELECT COUNT(booked) as total FROM room_book WHERE booked='true' AND RoomName='$roomname' AND (arrival ='$checkin' AND departure = '$checkout')";
    $re = mysqli_query($conn, $sql6);
    $data = mysqli_fetch_assoc($re);
    $s = $data['total'];

    $sql7 = "SELECT * FROM rooms WHERE RoomName='$roomname'";
    $result = mysqli_query($conn, $sql7);
    $row3 = mysqli_fetch_array($result);
    $price = $row3['Price'];
    $payment = $s * $price * $duration;

    $sql9 = "SELECT * FROM members WHERE Email='$email'";
    $resu = mysqli_query($conn, $sql9);
    $row5 = mysqli_fetch_array($resu);

    if ($row5 > 0) {
        $email2 = $row5['Email'];
        if ($email == $email2) {
            $dpayment = $payment - ((20 / 100) * $payment);
            $sql10 = "UPDATE reservations SET Price=$price, payment=$payment, member='true', Dpayment=$dpayment WHERE Email='$email'";
            $ar = mysqli_query($conn, $sql10);
        }
    } else {
        $sql10 = "UPDATE reservations SET Price=$price, payment=$payment, member='false', Dpayment=$payment WHERE Email='$email'";
        $ar = mysqli_query($conn, $sql10);
    }

    $sql11 = "SELECT * FROM reservations WHERE book_id='$book_id'";
    $results = mysqli_query($conn, $sql11);
    $row6 = mysqli_fetch_array($results);

    if (!empty($_POST["email"] && $_POST["FName"] && $_POST["rooms"] && $_POST["checkin"] && $_POST["checkout"])) {
        // Generate a new button for payment
        echo "<div class='row'>
                <div class='col-md-3 weell'>
                    <a href='bill.php?book_id=" . $row6['book_id'] . "'><button class='btn btn-lg btn-primary button'>Pay</button></a>
                </div>   
              </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
    <scrip src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Cinzel+Decorative&family=Cinzel:wght@400;500&family=Orbitron:wght@500&family=Playfair:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <style>
        html {
            box-sizing: border-box;
            height: fit-content;
            width: 100%;
            overflow-x: hidden;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        h1 {
            font-family: 'Cinzel Decorative', cursive;
            font-size: 140px;
            text-align: center;
            text-shadow: 1px 1px 10px rgba(250, 82, 4, 0.671);
            width: 100%;
            height: 180px;
            color: #f49393;
        }

        .well {
            background: rgba(0, 0, 0, 0.5);
            border: none;
        }

        body {
            background-image: url('images/home_gallary/10.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            margin: 0;
        }

        label {
            color: hsla(12, 94%, 50%, 0.877);
        }

        h2 {
            font-size: 60px;
            font-weight: 500;
            color: firebrick;
        }

        .weell {
            position: relative;
            top: 947px;
            left: 1285px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="well">La Sereno</h1>
        <div class="well">
            <h2>Book Now: <?php if (isset($_GET['roomname']) && isset($_GET['checkin']) && isset($_GET['checkout'])) {
                $roomname = $_GET['roomname'];
                echo $roomname;
            } else {
                echo "Select a room";
            } ?></h2>
            <hr>
            <form action="" method="post" name="room_category">
                <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" name="checkin" readonly placeholder="<?php if (isset($_GET['checkin'])) {
                        echo $_GET['checkin'];
                    } ?>" value="<?php if (isset($_GET['checkin'])) {
                        echo $_GET['checkin'];
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="text" name="checkout" readonly placeholder="<?php if (isset($_GET['checkout'])) {
                        echo $_GET['checkout'];
                    } ?>" value="<?php if (isset($_GET['checkout'])) {
                        echo $_GET['checkout'];
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="name">First Name:</label>
                    <input type="text" class="form-control" name="FName" required>
                </div>
                <div class="form-group">
                    <label for="name">Middle Name:</label>
                    <input type="text" class="form-control" name="MName">
                </div>
                <div class="form-group">
                    <label for="name">Last Name:</label>
                    <input type="text" class="form-control" name="LName">
                </div>
                <div class="form-group">
                    <label for="email"> Email :</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" class="form-control" name="phno" required>
                </div>
                <div class="form-group">
                    <label for="rooms">Rooms Required</label>
                    <input type="number" class="form-control" name="rooms" required>
                </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit" onclick="ch()">Book Now</button>
                <br>
                <div id="click_here">
                    <a href="index.php" style="margin-left:500px;">Back to Home</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
