
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></scrip>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Cinzel+Decorative&family=Cinzel:wght@400;500&family=Orbitron:wght@500&family=Playfair:ital,wght@0,400;1,500&display=swap" rel="stylesheet">

  </head>
  <body>
    <div class="container fix">
      
      
     <h1 class="well">La Sereno</h1>
        
                <ul >
                    <li><?php include "nav.php"?></li>
                
                 
                </ul>
            
       
    
        
       <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-5 well'>
        <form action="" method="post" enctype="multipart/form-data">
    Email:<br>
    <input type="email" name="email">
    <br><br>
    Review:<br>
    <input type="text" name="review">
    <br><br>
    <label for="upload">Upload Image:</label>&nbsp;&nbsp;
    <input type="file" name="img[]" multiple>
    <br>
    <button type="submit" class="btn btn-primary button" name="submit">Submit</button>
</form>

    </div>
    </div>
    </div>
  </body>
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
h1{
 
 font-family: 'Bruno Ace SC', cursive;
  
 font-size: 140px;
 font-weight:500;
 -webkit-text-fill-color: transparent;
 -webkit-text-stroke-width: 2px;
 -webkit-text-stroke-color:hsla(12, 94%, 50%, 0.877);
 text-align:center;
 text-shadow: 1px 1px 10px rgba(250, 82, 4, 0.671);
 width:100%;
  height:180px;
  
 }
 .well 
 {
  background: rgba(0, 0, 0, 0.5);
border: none;
           
        }
        
        body {
            background-image: url('images/home_gallary/2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            margin: 0px;
        }
        label
             {
                 color:#ffbb2b;
                 font-size:13px;
                 font-weight: 100;
             }
        .img
        {
          height: 200px;
          width: 200px;
          margin-left: 20px;
          margin-bottom: 20px;
          // float:left;
        }
        .weell{
            position: relative;
            top:600px;
        } 
        .fix{
            position:absolute;
            top:-0px;
            left:200px;
            
        }
        h1{
      
      font-family: 'Cinzel Decorative', cursive;
       font-size: 140px;  
       text-align:center;
       -webkit-text-fill-color: #f49393;
     -webkit-text-stroke-width: 1px;
     -webkit-text-stroke-color:hsla(10, 50%, 50%, 0.77);
       text-shadow: 1px 1px 10px rgba(250, 82, 4, 0.671);
       width:100%;
        height:180px;
        color: #f49393;
       }
       .text{
        color:white;
       }
        </style>
    
        <?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "HotelBook");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST["submit"])) {
    // Check if email field exists in POST request
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = $_POST["email"];
    }else{
      $email = "Anonymous";
      $name = "Anonymous";
    }
        // Fetch reservation data based on the provided email
        $sql3 = "SELECT * FROM reservations WHERE Email = '$email'";
        $res3 = mysqli_query($conn, $sql3);
        if($res3)
        {

        if ( mysqli_num_rows($res3) > 0) {
            $row1 = mysqli_fetch_array($res3);
            $email =$row1['Email'];
            $name = $row1['Name'];
        }
        else{
          $email = "Anonymous";
          $name = "Anonymous";
        }
       } 

        $review = $_POST["review"];

        // Check if any files were uploaded
        if (isset($_FILES["img"])) {
            $fileCount = count($_FILES["img"]["name"]);
            $imagePath = "";

            // Loop through each uploaded file
            for ($i = 0; $i < $fileCount; $i++) {
                $imag = $_FILES["img"]["name"][$i];
                $tmpFilePath = $_FILES["img"]["tmp_name"][$i];
                $path = "images/reviews/" . $imag;

                // Move the uploaded file to the desired location
                if (move_uploaded_file($tmpFilePath, $path)) {
                    $imagePath .= $path . ";";
                } 
                
            }

            // Remove the trailing delimiter from the concatenated image paths
            $imagePath = rtrim($imagePath, ";");

            // Insert the review into the database
            $sql = "INSERT INTO review (Email, Name, review, image) VALUES ('$email', '$name', '$review', '$imagePath')";
            $res = mysqli_query($conn, $sql);

            if (!$res) {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "No files uploaded.";
        }
    } 


// Display reviews
$sql2 = "SELECT * FROM review";
$res = mysqli_query($conn, $sql2);

if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $imagePath = $row['image'];
        echo "<div class='row'>
                <div class='col-md-3'></div>
                <div class='col-md-6 well weell'>
                    <p class='text'>" . $row['Name'] . "</p>
                    <p class='text'>" . $row['review'] . "</p>";
        
        $pathArray = explode(";", $imagePath);
        foreach ($pathArray as $path) {
            if (!empty($path)) {
                echo "<img src='" . $path . "' class='img'>";
            }
        }

        echo "</div>
            </div>";
    }
}
?>



