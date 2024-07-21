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
if(isset($_POST["submit"]))
{
  $conn=mysqli_connect("localhost","root","","HotelBook");
  $roomname=$_POST["roomname"];
  $features=$_POST["features"];
  $size=$_POST["size"];
  $price=$_POST["price"];
  $room_qnty=$_POST["room_qnty"];
  
  
  $sql="INSERT INTO rooms SET RoomName='$roomname',Features='$features',Size='$size',Price='$price',RoomQuantity=$room_qnty";
  $result= mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
  if($result)
  {
    echo "<script type='text/javascript'>
    alert('Room Added Succesfully');
</script>";
}
else{
    echo "<script type='text/javascript'>
    alert('Room Not Added');
</script>";
}


  for($i=0;$i<$room_qnty;$i++)
  {
      $sql2="INSERT INTO room_book SET RoomName='$roomname', booked='false'";
       $result= mysqli_query($conn,$sql2) or die(mysqli_connect_errno());
      
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reg.css" type="text/css">
    
</head>

    <body>
    <div class="container">
        <div class="well">
            <h2>Add Room Category</h2>
            <hr>
            <form action="" method="post" name="room_category">
                <div class="form-group">
                    <label for="roomname">Room Type Name:</label>
                    <input type="text" class="form-control" name="roomname" placeholder="super delux" required>
                </div>
                <div class="form-group">
                    <label for="features">Features:</label>
                    <textarea class="form-control" name="features" required></textarea>
                </div>
                <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" class="form-control" name="size" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                 <div class="form-group">
                    <label for="qty">No of Rooms:</label>
                    <input type="text" class="form-control" name="room_qnty"required>
</div>
<button type="submit" class="btn btn-lg btn-primary button" name="submit" value="Add Room">Add</button>
</body>
</html>
