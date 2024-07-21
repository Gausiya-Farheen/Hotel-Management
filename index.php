<!DOCTYPE html>
<html lang="en">
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
<body onload="changeImage()">
<div class="container">
<h1 class="well">La Sereno</h1>
  <!----------------------------------------------------- Navigation-------------------------------------------------->


<ul>
                    <li><?php include "nav.php"?></li>
                </ul>
           
<div class="jumbotron">
  <img  id="img" style="width:100%; height:450px;">
</div>
<!----------------------------------------------- about us---------------------------------------------------------------->
<div class="row" style="color: #ed9e21">
  <div class="col-md-12 well" >
    <h4><strong style="color: #ffbb2b">About</strong></h4><br>
    <pre class="para">
    Since 1990, our establishment, founded by Joshua Roudroguez, has been a beacon of hospitality 
    and luxury in the heart of India. With a rich history and a commitment to excellence,
    we have consistently provided unforgettable experiences to our valued guests.
    Our rooms and suites are designed with your utmost comfort in mind.
    Whether you are here for business or leisure, you will find a space that caters to your every need.
    Every detail, from the plush bedding to the carefully selected furnishings, has been thoughtfully 
    curated to ensure a restful and indulgent experience.</pre>
    <a href="aboutUs.php">Know More<img src="image/arrow-right-circle-fill.svg" class="arrow"></a></p>
  </div>
</div>
        
<!--------------------------------------------------------- services------------------------------------------------------->
<section id="services">
  <h2 class="gal1">SERVICES</h2>
  <div class="card" style="width:190px; height: 200px;float: left;margin-left: -90px;top:120px;background-color:orangered;">
    <img src="image/tour1.avif" class="card-img-top" alt="Tour & Excursions" style="height: 150px;width:190px;">
      <div class="card-body">
        <p class="card-text"style="color:firebrick;" > Tour & Excursions</a></p>
      </div>
  </div>
  <div class="card" style="width: 190px; float: left;height: 200px; margin-left: 60px;top:120px;background-color:orangered;">
    <img src="image/wireless.jfif" class="card-img-top" alt="Wireless Internet" style="height: 150px;width:190px;">
    <div class="card-body">
      <p class="card-text" style="color:firebrick;">Wireless Internet</p>
    </div>
  </div>
  <div class="card" style="width: 190px; float: left;height: 200px;margin-left: 60px;top:120px;background-color:orangered;">
    <img src="image/laundary.png" class="card-img-top" alt="Laundary Services"style="height: 143px;width:190px;">
    <div class="card-body">
      <p class="card-text" style="color:firebrick;">Laundary Services</p>
    </div>
  </div>
  <div class="card" style="width: 190px; float: left;height: 200px;margin-left: 60px;top:120px;background-color:orangered;">
    <img src="image/spa.jfif" class="card-img-top" alt="Spa" style="height: 140px;width:190px;" >
    <div class="card-body">
      <p class="card-text" style="color:firebrick;">Spa</p>
    </div>
  </div>
  <div class="card" style="width: 190px; float: left;height: 200px;margin-left: 60px;top:120px;background-color:orangered;">
    <img src="image/resturant.jfif" class="card-img-top" alt="Resturant" style="height: 150px;width:190px;">
    <div class="card-body">
      <p class="card-text" style="color:firebrick;">Resturant</p>
     </div>
  </div>
</section>
<!------------------------------------------------------------Gallary-------------------------------------------------------->
<section class="gallary">
  <h2 class="gal">GALLARY</h2>
  <img src="images/home_gallary/1.jpg" id="im" onmouseover="ch1(this)"onmouseout="ch2(this)">
  <img src="images/home_gallary/2.jpg"id="im" onmouseover="ch1(this)"onmouseout="ch2(this)">
  <img src="images/home_gallary/3.jpg" id="im" onmouseover="ch1(this)"onmouseout="ch2(this)">
  <img src="images/home_gallary/4.jpg" id="im"onmouseover="ch1(this)"onmouseout="ch2(this)">
  <img src="images/home_gallary/5.jpg" id="im"onmouseover="ch1(this)"onmouseout="ch2(this)">
  <p style="margin-left:1490px;margin-top:50px;"> <a href="gallary.html" style="text-decoration:overline underline;color:firebrick;">See More</a></p>
</section>
<?php include 'contactUs.php'; ?>
<style>
  .well {
    background: rgba(0, 0, 0, 0.5);
    border: none;
  }
  html {
    box-sizing: border-box;
    overflow-y: scroll;
    height: fit-content;
    width: 100%;
    overflow-x: hidden;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
  }
  *,
  *:before,
  *:after {
    box-sizing: inherit;
  }
  body {
    background-image: url("images/home_bg.jpg");
    background-repeat: no-repeat;
    background-size: 100% 104.9%;
    margin: 0;
    height: 100%;
  }
  body::-webkit-scrollbar {
    display: none;
  }
  h1 {
    font-family: 'Cinzel Decorative', cursive;
    font-size: 140px;
    text-align: center;
    -webkit-text-fill-color: #f49393;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: hsla(10, 50%, 50%, 0.77);
    text-shadow: 1px 1px 10px rgba(250, 82, 4, 0.671);
    width: 100%;
    height: 180px;
  }
  .para {
    font-weight: 300;
    font-size: 17px;
    color: rgb(207, 100, 6);
    background-color: rgba(0, 0, 0, 0.7);
  }
  .gal1 {
    font-family: 'Cinzel', serif;
    font-family: 'Cinzel Decorative', cursive;
    font-family: 'Orbitron', sans-serif;
    font-family: 'Playfair', serif;
    font-size: 50px;
    font-weight: 500;
    color: #f49393;
    position: relative;
    left: 420px;
  }
  #services {
    padding: 10px;
    margin-left: 70px;
    width: 200%;
    margin-bottom: 0px;
  }
  #img {
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
  #im {
    height: auto;
    width: 20%;
    border-radius: 4px;
    margin-left: 40px;
  }
  .gal {
    font-family: 'Cinzel', serif;
    font-family: 'Cinzel Decorative', cursive;
    font-family: 'Orbitron', sans-serif;
    font-family: 'Playfair', serif;
    font-size: 50px;
    font-weight: 500;
    position: relative;
    left: 680px;
    color: #f49393;
  }
  .gallary {
    position: absolute;
    top: 1588px;
    left: 0px;
    background-image: url("images/home_gallary/ab3.jpg");
    background-size: 110% 160%;
    background-repeat: no-repeat;
    margin-top: 0px;
    height: 420px;
    width: 100%;
  }
  .contact {
    position: absolute;
    top: 2000px;
    left: 0px;
    background-color: bisque;
    width: 100%;
    height: 400px;
  }

@media screen and (max-width: 999px) {
  .well {
    background: rgba(0, 0, 0, 0.5);
    border: none;
  }
  html {
    box-sizing: border-box;
    overflow-y: scroll;
    height: fit-content;
    width: 100%;
    overflow-x: hidden;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
  }
  *,
  *:before,
  *:after {
    box-sizing: inherit;
  }
  body {
    background-image: url("images/home_bg.jpg");
    background-repeat: no-repeat;
    background-size: 100% 104.9%;
    margin: 0;
    height: 100%;
  }
  body::-webkit-scrollbar {
    display: none;
  }
  h1 {
    font-family: 'Cinzel Decorative', cursive;
    font-size: medium;
    text-align: center;
    -webkit-text-fill-color: #f49393;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: hsla(10, 50%, 50%, 0.77);
    text-shadow: 1px 1px 10px rgba(250, 82, 4, 0.671);
    width: 100%;
    height: auto;
  }
  .para {
    font-weight: 300;
    font-size: auto;
    color: rgb(207, 100, 6);
    background-color: rgba(0, 0, 0, 0.7);
  }
  .gal1 {
    font-family: 'Cinzel', serif;
    font-family: 'Cinzel Decorative', cursive;
    font-family: 'Orbitron', sans-serif;
    font-family: 'Playfair', serif;
    font-size: 40em;
    font-weight: 500;
    color: #f49393;
    position: relative;
    left: 420px;
  }
  #services {
    padding: 10em;
    margin-left: 70em;
    width: 100%;
    margin-bottom: 0px;
  }
  #img {
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
  #im {
    height: auto;
    width: 2em;
    border-radius: 4px;
    margin-left: 40%;
  }
  .gal {
    font-family: 'Cinzel', serif;
    font-family: 'Cinzel Decorative', cursive;
    font-family: 'Orbitron', sans-serif;
    font-family: 'Playfair', serif;
    font-size: 29em;
    font-weight: 500;
    position: relative;
    left: 680em;
    color: #f49393;
  }
  .gallary {
    position: absolute;
    top: 1588px;
    left: 0px;
    background-image: url("images/home_gallary/ab3.jpg");
    background-size: 110% 160%;
    background-repeat: no-repeat;
    margin-top: 0px;
    height: auto;
    width: 100%;
  }
  .contact {
    position: absolute;
    top: 2000px;
    left: 0px;
    background-color: bisque;
    width: 100%;
    height: auto;
  }
}
```

    
</style>
<script>
  //  function to change images
  function changeImage()                
  {
    var bg=["images/home_gallary/1.jpg",
    "images/home_gallary/2.jpg",
    "images/home_gallary/3.jpg",
    "images/home_gallary/4.jpg",
    "images/home_gallary/5.jpg"];
    var i=Math.floor((Math.random()*5));
    document.getElementById("img").style.backgroundImage='url("'+bg[i]+'")';
  }
  setInterval(changeImage,1000);

  // function to zoom images on mouseover 
  function ch1(x){
    x.style.height="210px";
    x.style.width="260px";
  }
  
  // function to revert images to their original size on mouseout
  function ch2(x){
    x.style.height="200px";
    x.style.width="250px";
  }



</script>
</body>
</html>
