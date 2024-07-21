<<?php
$book_id = $_GET['book_id'];
$conn = mysqli_connect("localhost", "root", "", "HotelBook");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM reservations WHERE book_id = '$book_id'";
$res = mysqli_query($conn, $sql);

if ($res) {
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        echo "
        <div class='row'>
            <div class='col-md-3'></div>
            <div class='col-md-6 well weell'>
                <h4>BILL</h4><hr>
                <h6>Book_id: " . $row['book_id'] . "</h6>
                <h6>Name: " . $row['Name'] . "</h6>
                <h6>Phone Number: " . $row['Phno'] . "</h6>
                <h6>Arrival: " . $row['Arrival'] . "</h6>
                <h6>Departure: " . $row['Departure'] . "</h6>
                <h6>Stay: " . $row['duration'] . "</h6>
                <h6>Room Type: " . $row['RoomName'] . "</h6>
                <h6>Price per night: " . $row['Price'] . "</h6>
                <h6>Amount: " . $row['payment'] . "</h6>
                <h6>Net Amount: " . $row['Dpayment'] . "</h6>
                <h6>Booking Date: " . $row['book_date'] . "</h6>
            </div>
            <div class='col-md-3 weell'>
                <a href='payment.php?book_id=" . $row['book_id'] . "'><button class='btn btn-lg btn-primary button'>Online</button></a>
                <form action='index.php' method='post'>
                    <input type='hidden' name='book_id' value='" . $row['book_id'] . "'>
                    <button type='submit' class='btn btn-primary button but'>Cash</button>
                </form>
            </div>      
        </div>";
    } else {
        echo "No reservation found with book_id: " . $book_id;
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



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
        font-size: 14px;
        text-align: center;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
        margin-left: 600px;
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
        font-size: 14px;
        text-align: center;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
        margin-left: 900px;  
        margin-top: -38px;  

    }
</style>
