<?php
  
  $conn=mysqli_connect("localhost","root","","HotelBook");
  
  if(isset($_POST["get"]))
{
  $email=$_POST["email"];
  $pass=$_POST["pass"];
 
  $sql="update admin set Password='$pass' where Email='$email'";
  
  if(mysqli_query($conn,$sql))
    {
    echo "<script>alert('password changed')</script>";
  }
  else{
    echo "<script>alert('password changed')</script>";
  }
 header('location:login.php');

}


?>

<html>
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
  <style>
     html {
  box-sizing: border-box;
  height:fit-content;
  width:100%;
  overflow-x: hidden;
  display:flex;
  flex-wrap: wrap;
  flex-direction: column;
}
body::-webkit-scrollbar{
  display: none;
}
*, *:before, *:after {
  box-sizing:inherit;
}
body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        form {
    width: 530px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    position: absolute;
    top:280px;
    left: 530px;
    
  }
  table {
    width: 100%;
  }
  
  table td {
    padding: 10px;
  }
 #button {
    width: 100%;
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
  }
  h2{
font-family: 'Cinzel', serif;
font-family: 'Cinzel Decorative', cursive;
font-size: 50px;
font-weight:500;
text-align: center;
        }
        .home {
    color: #897df2;
    margin-left: 190px;
  }
  
</style>
 </head>
</html>
<form action="#" method="POST">
  <h2>Reset Password</h2>
<table border=0>
  <tr>
       <td><label for="email">EMAIL:</label></td>
       <td><input type="email" id="email" name="email" size=20 required></td>
     </tr>
     <tr>
        <td><label for="psswrd">CHANGE PASSWORD:</label></td>
        <td><input type="password" id="psswrd" name="pass" size="20" required></td></tr>
        <tr>
       <td>  <input type="submit" name="get" value="enter" id="button"></td>

</form>
