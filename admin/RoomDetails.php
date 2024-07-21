<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['Admin'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: ../login.php");
    exit();
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "HotelBook");
// Handle Delete Action
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM rooms WHERE Id = $id";
    $res_delete = mysqli_query($conn, $sql_delete);
  
}
// Handle Edit Action
if(isset($_POST['edit'])) {
   $id=$_POST['id'];
    $Roomname = $_POST['roomname'];
    $features = $_POST['features'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $roomQuantity = $_POST['roomQuantity'];
    $sql_update = "UPDATE rooms SET RoomName='$Roomname', Features='$features', Size='$size', Price=$price, RoomQuantity='$roomQuantity' WHERE Id=$id";
    $res_update = mysqli_query($conn, $sql_update);
    echo "<script>alert('edited Successfully')</script>";
  
}
$sql_select = "SELECT * FROM rooms order by Id ASC";
$res_select = mysqli_query($conn, $sql_select);
?>

<html>
    <body>
        <h4>ROOM DETAILS</h4>
        <hr>
        <?php
        if(mysqli_num_rows($res_select) > 0) {
            while($row = mysqli_fetch_array($res_select)) {
        ?>
        <div class='div'>
            <div class='well'>
                <form method="post" action="">
    <table>
    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
        <tr>
            <td>ID:</td>
            <td><?php echo $row['Id']; ?></td>
        </tr>
        <tr>
            <td>ROOM NAME:</td>
            <td><input type="text" name="roomname" value="<?php echo $row['RoomName']; ?>"></td>
        </tr>
        <tr>
            <td>FEATURES:</td>
            <td> <textarea  name="features" rows="3"><?php echo $row['Features']; ?></textarea></td>
        </tr>
        <tr>
            <td>SIZE:</td>
            <td><input type="text" name="size" value="<?php echo $row['Size']; ?>"></td>
        </tr>
        <tr>
            <td>PRICE:</td>
            <td><input type="text" name="price" value="<?php echo $row['Price']; ?>"></td>
        </tr>
        <tr>
            <td>ROOM QUANTITY:</td>
            <td><input type="number" name="roomQuantity" value="<?php echo $row['RoomQuantity']; ?>"></td>
        </tr>
        
        <tr>
            <td colspan="2"><button type="submit" name="edit" class='btn btn-lg btn-primary button'>Edit</button></td>
        </tr>
        
    </table>
</form>

                <!-- Delete button with confirmation -->
                <a href='?action=delete&id=<?php echo $row['Id']; ?>' onclick="return confirm('Are you sure you want to delete this item?');">
                    <button class='btn btn-lg btn-primary button'>Delete</button>
                </a>
            </div>
        </div>
        <?php
            }
        }
        ?>
        <a href='../index.php'><button class='btn btn-primary button but'>Back to Home </button> </a>
    </body>
</html>

<html>
    <body>
    

    
<style>
       html {
  box-sizing: border-box;
   overflow-y: scroll;
  height:fit-content;
  width:100%;
  overflow-x: hidden;
  display:flex;
  flex-wrap: wrap;
  flex-direction: column;
}
 
*, *:before, *:after {
  box-sizing:inherit;}
  body::-webkit-scrollbar{
  display: none;
}
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color:lightgoldenrodyellow;
    }


   .div{
    /* width:300px; */
/* background-color: yellow; */
margin-top: 20px; 
display: inline-block;  }

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


    .well {
      
        
        border-radius: 5px;
        padding: 5px;
        margin: 10px;
        width: fit-content;
        background: rgba(0, 0, 0, 0.5);
            border: none;
    }

    .image{
        width: 150px;
        height: 140px;
    }
</style>
