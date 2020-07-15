<?php
session_start();
if(!isset($_SESSION['uname'])) {
    header('location:adminlogin.php');
}
?>


<!DOCTYPE html>
<head>
<title>
   Dash Board</title>
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
   <li><a href="adminhome.php">HOME</a></li>
   <li><a href="admindashboard.php">DASHBOARD</a></li>
   <li><a href="adminlogout.php">LOGOUT</a></li>
   </ul>
   <p>
       <h1 align='center' class="heading"><font color='white'>DASH BOARD</font></h1><br>
    <br>
<div style="overflow-x:auto;">
<h5>
   <table>
    <tr><td><a href="addmodel.php">Add New Model Details</a></td></tr>
    <tr><td><a href="viewmodel.php">View Model Details</a></td></tr>
    <tr><td><a href="deletemodel.php">Delete Model Details</a></td></tr>
    <tr><td><a href="addvehicle.php">Add New Vehicle Details</a></td></tr>
    <tr><td><a href="viewvehicle.php">View Vehicle Details</a></td></tr>
    <tr><td><a href="deletevehicle.php">Delete Vehicle Details</a></td></tr>
    <tr><td><a href="addemp.php">Add Employee Details</a></td></tr>
    <tr><td><a href="viewemp.php">View Employee Details</a></td></tr>
    <tr><td><a href="deleteemp.php">Delete Employee Details</a></td></tr>
    <tr><td><a href="viewcustomer.php">View Customer Details</a></td></tr>
    <tr><td><a href="deletecustomer.php">Delete Customer Details</a></td></tr>
</table>
</h5>
</div>
</body>
</html>