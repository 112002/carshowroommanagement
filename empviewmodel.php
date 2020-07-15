<?php
session_start();
if(!isset($_SESSION['empid'])) {
    header('location:emplogin.php');
}
?>

<!DOCTYPE html>
<head>
<title>
   View Models</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global3.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body class="bg">
       <br>
       <p>
       <ul>
   <li><a href="emphome.php">HOME</a></li>
   <li><a href="empdashboard.php">DASHBOARD</a></li>
   <li><a href="sales.php">SALES</a></li>
   <li><a href="pur.php">PURCHASES</a></li>
   <li> <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></li>
   <li><a href="emplogout.php"> LOGOUT </a></li>
   </ul>
   </p>
   <p>
   <h1 align='center' class="heading"><font color='white'>VIEW MODELS</font></h1><br>
   <br>
    <div class="gallery">
   <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbms";

        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM model";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<figure><img src='images/".$row['image']."'><figcaption><b>Model ID:</b> " . $row["model_id"]. "<br><b>Model Name:</b> ". $row["model_name"]. "<br><b>Seat Capacity:</b> ". $row["seat_capacity"]."</figcaption></figure> ";
            }
        } else {
            echo "<h2 align='center'><font color='white'>No models inserted</font></h2>";
        }
        $conn->close();
        ?>
    </div>
</p>

    </body>
    </html>