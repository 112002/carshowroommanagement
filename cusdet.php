<?php
session_start();
if(!isset($_SESSION['empid'])) {
    header('location:emplogin.php');
}
?>

<!DOCTYPE html>
<head>
<title>
   Employee Dash Board</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global1.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
table {
    margin-left: 25%;
    border-collapse: collapse;
    width: 50%;
  }
  
  td {
    text-align: center;
    padding: 8px;
    font-weight: bold;
    color: white;
  }
  
 
  th {
    background-color:rgb(192,192,192,0.6);  
    text-align: center;
    padding: 8px;
    font-weight: bold;
    color: white;
    } 
    td a {
      color: white;
      text-decoration: none;
  }
  tr:hover {
      background-color: #979696;
    }

   </style>
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
   <h1 align='center' class="heading"><font color='white'>DASH BOARD</font></h1><br>
    <br>
    <div style="overflow-x:auto;">
<h5>
   <table>
        <tr>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone No.</th>
        </tr>
        <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbms";

        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM usertable";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['fname']!='admin') {
       echo "
        <tr>
            <td>".$row['fname']." ".$row['lname']."</td>
            <td>".$row['email']."</td>
            <td>".$row['street'].", ".$row['city']."<br>
                ".$row['state'].", ".$row['country']."</td>
            <td>".$row['phoneno']."</td>
        </tr>";
                }
            }
        }
        ?>
        
    </table>
</h5>
</div>

   </body>
   </html>