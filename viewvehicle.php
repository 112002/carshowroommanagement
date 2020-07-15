<?php
session_start();
if(!isset($_SESSION['uname'])) {
    header('location:adminlogin.php');
}
?>

<!DOCTYPE html>
<head>
<title>
   View Vehicle</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global3.css">
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
       <h1 align='center' class="heading"><font color='white'>VIEW VEHICLES</font></h1><br>
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
        $sql = "SELECT * FROM vehicle";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $mod = $row['model_name'];
                $sql1="SELECT * FROM model WHERE model_name = '$mod'";
                $result1=$conn->query($sql1);
                $row1=$result1->fetch_assoc();
                echo "<figure><img src='images/".$row1['image']."'><figcaption><b>Vehicle ID:</b> " . $row["vehicle_id"]. "<br><b>Vehicle Name:</b> ". $row["vehicle_name"]. "<br><b>Model Name:</b> ".$row['model_name']."<br><b>Company:</b>".$row['company']."<br><b>Cost:</b> Rs. ". $row["cost"]."</figcaption></figure> ";
            }
        } else {
            echo "<h2 align='center'><font color='white'>No Vehicles inserted</font></h2>";
        }
        $conn->close();
        ?>
    </div>
</p>
</body>
</html>