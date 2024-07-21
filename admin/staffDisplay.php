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
$conn = mysqli_connect("localhost", "root", "", "HotelBook");
// Handle Delete Action
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM staff WHERE ID = $id";
    $res_delete = mysqli_query($conn, $sql_delete);
  
}
// Handle Edit Action
if(isset($_POST['edit'])) {
   $id=$_POST['id'];
    $name = $_POST['name'];
    $post = $_POST['post'];
    $DOB = $_POST['DOB'];
    $phno = $_POST['phno'];
    $Gov_id = $_POST['Gov_id'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $Jdate = $_POST['Jdate'];
    $sql_update = "UPDATE staff SET Name='$name', JOB='$post', DOB='$DOB', phoneNo=$phno, GovProof='$Gov_id', Address='$address', Salary=$salary, JoinDate='$Jdate' WHERE ID=$id";
    $res_update = mysqli_query($conn, $sql_update);
    echo "<script>alert('edited Successfully')</script>";
  
}
$sql_select = "SELECT * FROM staff";
$res_select = mysqli_query($conn, $sql_select);
?>

<html>
    <body>
        <h4>STAFF DETAILS</h4>
        <hr>
        <?php
        if(mysqli_num_rows($res_select) > 0) {
            while($row = mysqli_fetch_array($res_select)) {
        ?>
        <div class='div'>
            <div class='well'>
                <form method="post" action="">
    <table>
    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
        <tr>
            <td>ID:</td>
            <td><?php echo $row['ID']; ?></td>
        </tr>
        <tr>
            <td>NAME:</td>
            <td><input type="text" name="name" value="<?php echo $row['Name']; ?>"></td>
        </tr>
        <tr>
            <td>DESIGNATION:</td>
            <td><input type="text" name="post" value="<?php echo $row['JOB']; ?>"></td>
        </tr>
        <tr>
            <td>DOB:</td>
            <td><input type="text" name="DOB" value="<?php echo $row['DOB']; ?>"></td>
        </tr>
        <tr>
            <td>PHONE NUMBER:</td>
            <td><input type="text" name="phno" value="<?php echo $row['phoneNo']; ?>"></td>
        </tr>
        <tr>
            <td>GOVERNMENT ID:</td>
            <td><input type="text" name="Gov_id" value="<?php echo $row['GovProof']; ?>"></td>
        </tr>
        <tr>
            <td>ADDRESS:</td>
            <td><input type="text" name="address" value="<?php echo $row['Address']; ?>"></td>
        </tr>
        <tr>
            <td>SALARY:</td>
            <td><input type="text" name="salary" value="<?php echo $row['Salary']; ?>"></td>
        </tr>
        <tr>
            <td>JOINING DATE:</td>
            <td><input type="text" name="Jdate" value="<?php echo $row['JoinDate']; ?>"></td>
        </tr>
        <tr>
            <td>STAFF IMAGE:</td>
            <td><img src="../images/staff/<?php echo $row['GovProof']; ?>.jpg" alt="Staff Image" class="image"></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="edit" class='btn btn-lg btn-primary button'>Edit</button></td>
        </tr>
        
    </table>
</form>

                <!-- Delete button with confirmation -->
                <a href='?action=delete&id=<?php echo $row['ID']; ?>' onclick="return confirm('Are you sure you want to delete this item?');">
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

    .button:hover {
        background-color: #45a049;
    } 

    .well {
        background-color: peachpuff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        margin: 10px;
        width: fit-content;
    }
   
    .image{
        width: 150px;
        height: 140px;
    }
</style>
