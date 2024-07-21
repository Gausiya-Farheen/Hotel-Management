<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['Admin'])) {
    // If the user is not logged in, redirect to the login page
    header("Location:../login.php");
    exit();
}
?>
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "HotelBook");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_POST["Add"])) {
    $sql = "SELECT * 
            FROM room_book 
            WHERE 
                arrival IS NOT NULL 
                AND arrival != '0000-00-00' 
                AND departure IS NOT NULL 
                AND departure != '0000-00-00'
                AND arrival >= CURDATE()
            ORDER BY arrival ASC";
    
    $res = mysqli_query($conn, $sql);
    
    if ($res && mysqli_num_rows($res) > 0) {
        echo "<h4>Rooms Booked</h4><hr>";
        
        while ($row = mysqli_fetch_array($res)) {
            echo "
            <div class='row'>
                <div class='col-md-3'></div>
                <div class='col-md-6 well weell'>
                    <h6>Room Id: " . $row['room_id'] . "</h6>
                    <h6>Name: " . $row['name'] . "</h6>
                    <h6>Phone Number: " . $row['phno'] . "</h6>
                    <h6>Arrival: " . $row['arrival'] . "</h6>
                    <h6>Departure: " . $row['departure'] . "</h6>
                    <h6>Room Type: " . $row['RoomName'] . "</h6>
                </div>
            </div>";
        }
    }
} else {
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];
    
    if (!empty($departure)) {
        $sql2 = "SELECT * FROM room_book 
                 WHERE 
                     arrival >= '$arrival' 
                     AND arrival != '0000-00-00'
                     AND departure <= '$departure'
                     AND departure != '0000-00-00'
                 ORDER BY arrival ASC";
        $res = mysqli_query($conn, $sql2);
        
        if ($res && mysqli_num_rows($res) > 0) {
            echo "<h4>Rooms Booked</h4><hr>";
            
            while ($row = mysqli_fetch_array($res)) {
                echo "
                <div class='row'>
                    <div class='col-md-3'></div>
                    <div class='col-md-6 well weell'>
                        <h6>Room Id: " . $row['room_id'] . "</h6>
                        <h6>Name: " . $row['name'] . "</h6>
                        <h6>Phone Number: " . $row['phno'] . "</h6>
                        <h6>Arrival: " . $row['arrival'] . "</h6>
                        <h6>Departure: " . $row['departure'] . "</h6>
                        <h6>Room Type: " . $row['RoomName'] . "</h6>
                    </div>
                </div>";
            }
        }
    } else {
        $sql3 = "SELECT * FROM room_book 
                 WHERE 
                     arrival >= '$arrival' 
                     AND arrival != '0000-00-00'
                 ORDER BY arrival ASC";
        $res = mysqli_query($conn, $sql3);
        
        if ($res && mysqli_num_rows($res) > 0) {
            echo "<h4>Rooms Booked</h4><hr>";
            
            while ($row = mysqli_fetch_array($res)) {
                echo "
                <div class='row'>
                    <div class='col-md-3'></div>
                    <div class='col-md-6 well weell'>
                        <h6>Room Id: " . $row['room_id'] . "</h6>
                        <h6>Name: " . $row['name'] . "</h6>
                        <h6>Phone Number: " . $row['phno'] . "</h6>
                        <h6>Arrival: " . $row['arrival'] . "</h6>
                        <h6>Departure: " . $row['departure'] . "</h6>
                        <h6>Room Type: " . $row['RoomName'] . "</h6>
                    </div>
                </div>";
            }
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<html>
    <body>
    <a href='../index.php' class="home">Back to Home</a>
    <form action="#" method="POST">
    
    <h2>Filter</h2>
  <table border=0>
  <tr>
       <td><label for="arrival">Arrival:</label></td>
       <td><input type="date" id="arrival" name="arrival" size=20 required></td>
     </tr>
     <tr>
        <td><label for="departure">Departure:</label></td>
        <td><input type="date" id="departure" name="departure" size="20" ></td></tr>
        <tr>
       <td><input type="submit" value="Add" name="Add" id="button"></td>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }


    h4 {
        margin: 0 0 10px;
        color: #333;
        font-size: 20px;
        font-weight: bold;
    }

    h6 {
        margin: 5px 0;
        color: #555;
        font-size: 16px;
        font-weight: normal;
    }

    hr {
        margin: 10px 0;
        border: none;
        border-top: 1px solid #ccc;
    }

    .weell{
        margin-top: 20px;
        text-align: center;
    }

    .weell a {
        text-decoration: none;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        text-align: center;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
        margin-left: 700px;
    }

    .button:hover {
        background-color: #45a049;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .col-md-3,
    .col-md-6 {
        width: calc(33.33% - 20px);
        padding: 0 10px;
        margin-bottom: 20px;
    }

    .well {
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
    }
    .but{
        display: inline-block;
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        text-align: center;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
        margin-left: 900px;  
        margin-top: -38px;  

    }
    .home{
        display: inline-block;
        position: relative;
        left: 700px;
    }
</style>
