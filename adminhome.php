<?php
session_start();
if(!isset($_SESSION['uname'])) {
    header('location:adminlogin.php');
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
   <li><a href="adminhome.php">HOME</a></li>
   <li><a href="admindashboard.php">DASHBOARD</a></li>
   <li><a href="adminlogout.php"> LOGOUT </a></li>
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
        $empid=$_SESSION['uname'];
        $sql = "SELECT fname,lname FROM employee WHERE empid='$empid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row["fname"]."!";
            }
        } 
        $conn->close();
        ?> </font></big></h1>
</p>


</body>
</html>