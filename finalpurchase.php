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
   $s = "SELECT * FROM cart WHERE vehicle_id = '$vehicle_id'";
   $result = mysqli_query($con, $s);
   $num = mysqli_num_rows($result);
   if($num>0) {
       mysqli_query($con,$reg);
       $row1=$result->fetch_assoc();
       $t1=$row1['vehicle_id'];
       $t2=$row1['vehicle_name'];
       $t3=$row1['model_name'];
       $t4=$row1['cost'];
       $t6=$row1['company'];
       $reg = "INSERT INTO vehicle VALUES('$t1','$t2','$t3','$t4','admin','$t6','0')";
       mysqli_query($con,$reg);
       $reg1 = "DELETE FROM cart WHERE vehicle_id='$vehicle_id'";
       mysqli_query($con,$reg1);
       header('location:finalpurchase.php');
        }else {
            echo "Vehicle Not Added";
        }
    }

    ?>
    <script>
    function OpenInNewTab(url) {

var win = window.open('generatebill.php', '_blank');
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
        $conn->close();
        ?> </font></big></h1>
<br>
<p>
<div class="gallery">
<?php
    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbms";
        $flag=0;
        $con = new mysqli($servername, $username, $password, $dbname);
        
        $count=0;
        $sum=0;
        $sql = "SELECT * FROM cart WHERE owner_id='$email' AND status=2 ORDER BY owner_id";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()) {
                $flag=1;
                $mod = $row['model_name'];
                $sql1="SELECT * FROM model WHERE model_name = '$mod'";
                $result1=$con->query($sql1);
                $row1=$result1->fetch_assoc();
                $sum+=$row["cost"];
                $count+=1;
                echo "<figure><img src='images/".$row1['image']."'><figcaption><b>Vehicle Name:</b> ". $row["vehicle_name"]. "<br><b>Model Name:</b> ".$row['model_name']."<br><b>Company:</b> ".$row['company']."<br>
                <b>Cost:</b> Rs. ". $row["cost"]."<br><br>
                <form method='post' name='delete'><button type='submit' name='submit' class='btn btn-primary btn-block' value='".$row['vehicle_id']."'>Remove</button></form></figcaption></figure> ";
            }
        if($flag==1) {
        echo "</div><br><br>
        
        <form method='post' name='book'>
                <p align='center'>
                    <button type='submit' name='generate' class='btn btn-primary' value='confirm'><div onclick='OpenInNewTab();'>&nbsp;&nbsp;&nbsp;Confirm & Generate Bill&nbsp;&nbsp;&nbsp;</div></button>
                </p>
        </form>
        ";
        }
        else{
            echo "<h4 align='center'><font color='white'>No items remaining!</h4></font>";
        }
?>

<?php
 if(isset($_POST['generate'])) {

    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,'dbms');
    

    $sqq = "UPDATE cart SET status=3 WHERE owner_id='$email' AND status=2";
    mysqli_query($con,$sqq);

    $s1 = "SELECT * FROM admin";
    $res1 = mysqli_query($con,$s1);

    $row1 = $res1->fetch_assoc();

    $val = $row1['deflt'];
    $val+=1;
    $sum=$sum*1.18;
    $s2 = "UPDATE cart SET bill_id='$val' WHERE status=3 AND owner_id='$email' AND bill_id=0";
    $s3 = "UPDATE admin SET deflt='$val'";
    mysqli_query($con,$s3);
    mysqli_query($con,$s2);

    $date=date('y-m-d');
    $emp=$_SESSION['empid'];
    $sql4 = "INSERT INTO bill VALUES('$val','$count','$emp','$email','$sum','B','$date')";
    //B is customer is buying
    //S is customer is selling
    $result4 = mysqli_query($con,$sql4);

    $sql3 = "UPDATE cart SET status=4 WHERE status=3 AND owner_id='$email' AND bill_id='$val'";
    $result3=mysqli_query($con,$sql3);
    $_SESSION['billid']=$val;
    header('location:empdashboard.php');

    $con->close();
}
?>
</body>
</html>