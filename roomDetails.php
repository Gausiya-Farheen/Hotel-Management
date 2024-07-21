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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Cinzel+Decorative&family=Cinzel:wght@400;500&family=Orbitron:wght@500&family=Playfair:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    
    
    
    
    
</head>

<body>
    <div class="container">
      
      
    <h1 class="well">La Sereno</h1>     
    <ul>
                    <li><?php include "nav.php"?></li>
                </ul>
               
            </div>
       
        
        
        <?php
       
        $conn=mysqli_connect("localhost","root","","HotelBook");
        $sql="SELECT * FROM rooms order by Id asc";
        $result = mysqli_query($conn, $sql);
        if($result)
        {   
            if(mysqli_num_rows($result) > 0)
//               ********************************************** Show Room Category***********************
                {
                    while($row = mysqli_fetch_array($result))
                
                    
                  { echo "
                            <div class='row'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 well ff'>
                                <h4>".$row['RoomName']."</h4><hr>
                                <h6>Features: ".$row['Features']."</h6>
                                <h6>Size: ".$row['Size']."</h6>
                                <h6>Price: ".$row['Price']."/night.</h6>
                                
                                
                            </div>
                            <div class='col-md-3'>
                                <a href='avail.php?roomname=".$row['RoomName']."'><button class='btn btn-primary button'>Book Now</button> </a>
                            </div>   
                            </div>
                            
                            
                        
                    
                         ";
                    
                    
                }
            }
            else
            {
                echo "NO Data Exist";
            }
        }
        else
        {
            echo "Cannot connect to server";
        }
        
        ?>


    </div>
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
          
.well {
            background: rgba(0, 0, 0, 0.5);
            border: none;
           
        }
        
        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
          
        }
        
        h4 {
            color: #ffbb2b;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
            font-size: 20px;
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
 
</style>
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>