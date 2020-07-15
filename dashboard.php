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
   <style>
table {
    margin-left: 25%;
    border-collapse: collapse;
    width: 50%;
  }
  
  th, td {
    text-align: center;
    padding: 8px;
    font-weight: bold;
    color: white;
  }
  
 
  tr:nth-child(odd) {
    background-color:rgb(192,192,192,0.6);  
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
       <h1 align='center' class="heading"><font color='white'>DASH BOARD</font></h1><br>
    <br>
<div style="overflow-x:auto;">
<h5>
   <table>
    <tr><td><a href="vehicles.php">Buy Available Vehicles</a></td></tr>
    <tr><td><a href="vehiclesell.php">Sell Vehicles</a></td></tr>
    <tr><td><a href="cart.php">View Cart</a></td></tr>
    <tr><td><a href="purhis.php">Purchase History</a></td></tr>
    <tr><td><a href="salhis.php">Sales History</a></td></tr>
</table>
</h5>
</div>
</body>
</html>