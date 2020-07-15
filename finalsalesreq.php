<?php
session_start();
if(!isset($_SESSION['empid'])) {
    header('location:emplogin.php');
}
?>
<!DOCTYPE html>
<head>
<title>
   Pending Purchase Requests</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global3.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php
   if(isset($_POST['submit'])) {
   
   $con = mysqli_connect('localhost','root','');
   mysqli_select_db($con,'dbms');
   $vehicle_id = $_POST['submit'];
    $reg1 = "DELETE FROM sell WHERE vehicle_id='$vehicle_id'";
    mysqli_query($con,$reg1);
    header('location:finalsalesreq.php');
   }
    ?>
 <script>
    function OpenInNewTab(url) {
var win = window.open('generatesalesbill.php', '_blank');
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
   </p>
   <h1 align='center' class="heading"><font color='white'>Cart of <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbms";
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $email=$_SESSION['purmail'];
        $sql = "SELECT fname,lname FROM usertable WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row["fname"]. " " .$row["lname"];
            }
        } 
        ?> </font></big></h1>
<br>
<div class="gallery">
<?php
    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbms";
        $flag=0;
        $sum=0;
        $con = new mysqli($servername, $username, $password, $dbname);
        $count=0;
        $sql = "SELECT * FROM sell WHERE owner_id='$email' AND status=1 ORDER BY owner_id";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()) {
                $count+=1;
                $flag=1;
                $mod = $row['model_name'];
                $sql1="SELECT * FROM model WHERE model_name = '$mod'";
                $result1=$con->query($sql1);
                $row1=$result1->fetch_assoc();
                $sum+=$row['cost'];
                echo "<figure><img src='images/".$row1['image']."'><figcaption><b>Vehicle Name:</b> ". $row["vehicle_name"]. "<br><b>Model Name:</b> ".$row['model_name']."<br><b>Company:</b> ".$row['company']."<br>
                <b>Cost:</b> Rs. ". $row["cost"]."<br><br>
                <form method='post' name='delete'><button type='submit' name='submit' class='btn btn-primary btn-block' value='".$row['vehicle_id']."'>Remove</button></form></figcaption></figure> ";
            }
        if($flag==1) {
        echo "</div><br><br>
        <form method='post' name='book'><center>
                <p align='center'>
                    <button type='submit' name='generate' class='btn btn-primary' value='confirm'><div onclick='OpenInNewTab();'>&nbsp;&nbsp;&nbsp;Accept&nbsp;&nbsp;&nbsp;</div></button>
                    &nbsp;&nbsp;&nbsp; <button type='submit' name='remove' class='btn btn-primary' value='wipe'>Remove All</button>
                </p></center>
        </form>";
        }
        else{
            echo "<h4 align='center'><font color='white'>No items remaining!</h4></font>";
        }
?>

<?php
  $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,'dbms');
         if(isset($_POST['generate'])) {

                $sqq = "UPDATE sell SET status=2 WHERE owner_id='$email' AND status=1";
                mysqli_query($con,$sqq);

               $ss = "SELECT * FROM sell WHERE owner_id='$email' AND status=2";
                $rr = mysqli_query($con,$ss);
                while($ro = $rr->fetch_assoc()) {
                    $t1=$ro['vehicle_id'];
                    $t2=$ro['vehicle_name'];
                    $t3=$ro['model_name'];
                    $t4=$ro['cost'];
                    $t6=$ro['company'];
                $ssq = "INSERT INTO vehicle VALUES('$t1','$t2','$t3','$t4','admin','$t6','0')";
                mysqli_query($con,$ssq);
                }

                $s1 = "SELECT * FROM admin";
                $res1 = mysqli_query($conn,$s1);

                $row1 = $res1->fetch_assoc();

                $val = $row1['deflt'];
                $val+=1;

                $s2 = "UPDATE sell SET bill_id='$val' WHERE status=2 AND owner_id='$email' AND bill_id='0'";
                $s3 = "UPDATE admin SET deflt='$val'";
                mysqli_query($conn,$s3);
                mysqli_query($conn,$s2);

                $sql3 = "UPDATE sell SET status=3 WHERE status=2 AND owner_id='$email' AND bill_id='$val'";
                $result3=mysqli_query($conn,$sql3);
                $date=date('y-m-d');
                $sum=$sum*1.18;
                $emp = $_SESSION['empid'];
                $sql4 = "INSERT INTO bill VALUES('$val','$count','$emp','$email','$sum','S','$date')";
                //B is customer is buying
                //S is customer is selling
                $result4 = mysqli_query($conn,$sql4);
                $_SESSION['billid']=$val;
                header('location:finalsalesreq.php');
            }
                
            
        if(isset($_POST['remove'])) {
            $reg1 = "DELETE FROM sell WHERE owner_id='$email' AND status<2";
            mysqli_query($con,$reg1);
            header('location:finalsalesreq.php');
        }

$con->close();
?>
</body>
</html>