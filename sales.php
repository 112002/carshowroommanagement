<?php
session_start();
if(!isset($_SESSION['empid'])) {
    header('location:emplogin.php');
}
?>

<!DOCTYPE html>
<head>
<title>
   Sales History</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global1.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
table {
    margin-left: 12.5%;
    border-collapse: collapse;
    width: 75%;
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
       <script>
    function OpenInNewTab(url) {

var win = window.open('finalsales.php', '_blank');
win.focus();
}
setTimeout(OpenInNewTab(url), 2000);
    </script>
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
   <h1 align='center' class="heading"><font color='white'>SALES HISTORY</font></h1><br>
    <br>
    <div style="overflow-x:auto;">
<h5>
   <table>
        <tr>
        <th>Bill Number</th>
        <th>Customer Name</th>
        <th>Amount</th>
        <th>&nbsp;</th>
        </tr>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dbms";
            
            $con = new mysqli($servername, $username, $password, $dbname);
            
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }
            $emp=$_SESSION['empid'];
            $sql = "SELECT * FROM bill WHERE bors='B' AND empid='$emp'";
            $result = mysqli_query($con,$sql);
            while($row=$result->fetch_assoc()) {
                
                $ems=$row['buyer_mail'];
                $sql1 = "SELECT * FROM usertable WHERE email='$ems'";
                $res1 = mysqli_query($con,$sql1);
                $row1=$res1->fetch_assoc();

            echo "<tr>
            <td>".$row['bill_id']."</td>
            <td>".$row1['fname']." ".$row1['lname']."</td>
            <td>Rs. ".$row['total_cost']."/-</td>
            <td>  <div onclick='OpenInNewTab();'><form method='post' name='generate'>
            <button type='submit' name='submit' class='btn btn-primary btn-block' value='".$row['bill_id']."'>See Bill</button>
            </form> </div></td>
            </tr>
            ";
            }
        ?>
    </table>
</h5>
</div>
<?php 
    if(isset($_POST['submit'])) {
        $_SESSION['billid']=$_POST['submit'];
        header('location:sales.php');
    }
?>
</body>
</html>