<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('location:login.php');
}
?>


<!DOCTYPE html>
<head>
<title>
   Home Page</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global1.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
   <body class="bg">
       <br>
       <p>
       <ul>
   <li><a href="home.php">HOME</a></li>
   <li><a href="dashboard.php">DASHBOARD</a></li>
   <li><a href="contactus.php">CONTACT US</a></li>
   <li><a href="cart.php">CART</a></li>
   <li> <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></li>
   <li><a href="logout.php"> LOGOUT </a></li>
   </ul>
   <p>
   <br><br><br><br>  <br><br><br><br>
   <h1 align="center" class="heading"> <big><font color='white'>Welcome <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbms";
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $email=$_SESSION['email'];
        $sql = "SELECT fname,lname FROM usertable WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row["fname"]. " " .$row["lname"]. "!";
            }
        } 
        $conn->close();
        ?> </font></big></h1>
</p>


</body>
</html>