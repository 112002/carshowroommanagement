<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<head>
<title>
   Cart</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global3.css">
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
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></li>
   <li><a href="logout.php"> LOGOUT </a></li>
   </ul>
   <?php
   if(isset($_POST['submit'])) {
   
    $con = mysqli_connect('localhost','root','');
   mysqli_select_db($con,'dbms');
   $vehicle_id = $_POST['submit'];
   $s = "SELECT * FROM cart WHERE vehicle_id = '$vehicle_id' AND status=1";
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
       $reg1 = "DELETE FROM cart WHERE vehicle_id='$vehicle_id' AND status=1";
       mysqli_query($con,$reg1);
       header('location:cart.php');
        }else {
            echo "Vehicle Not Added";
        }
    }
    if(isset($_POST['confirm'])) {
        $_SESSION['confirmation']=1;
        $con = mysqli_connect('localhost','root','');
        mysqli_select_db($con,'dbms'); 
        $own = $_SESSION['email'];
        $s1 = "UPDATE cart SET status=2 WHERE status=1 AND owner_id='$own'";
        mysqli_query($con,$s1);

    }
   ?>
   <p>
       <h1 align='center' class="heading"><font color='white'>CART</font></h1><br>
    <br>
    <div class="gallery">
   <?php
    $flag1=0;
    $flag2=0;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbms";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_POST['confirm']) && $_SESSION['confirmation']==1) {
            $_SESSION['confirmation']=0;

            echo "<h2 align='center'><font color='white'>Your booking is confirmed!</font></h2>";
            
    } else if($_SESSION['confirmation']==0 && !isset($_POST['confirm'])){
        $sql = "SELECT * FROM cart";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['owner_id']==$_SESSION['email'] && $row['status']<2) {
                $flag1=1;
                $flag2+=1;
                $mod = $row['model_name'];
                $sql1="SELECT * FROM model WHERE model_name = '$mod'";
                $result1=$conn->query($sql1);
                $row1=$result1->fetch_assoc();
                echo "<figure><img src='images/".$row1['image']."'><figcaption><b>Vehicle Name:</b> ". $row["vehicle_name"]. "<br><b>Model Name:</b> ".$row['model_name']."<br><b>Company:</b> ".$row['company']."<br>
                <b>Cost:</b> Rs. ". $row["cost"]."<br><br>
                <form method='post' name='delete'><button type='submit' name='submit' class='btn btn-primary btn-block' value='".$row['vehicle_id']."'>Remove</button></form></figcaption></figure> ";
                }
            }
        } else {
            $flag2+=1;
            echo "<h2 align='center'><font color='white'>No Vehicles inserted</font></h2>";
        }
        if($flag2==0)
        {
            
            echo "<h2 align='center'><font color='white'>No Vehicles inserted</font></h2>";
        }
        if($result->num_rows>0 && $flag1==1) {
        echo "</div><form method='post' name='book'>
        <p align='center'>
            <button type='submit' name='confirm' class='btn btn-primary' value='confirm'>&nbsp;&nbsp;&nbsp;Confirm&nbsp;&nbsp;&nbsp;</button>
        </p>
    </form>";
        }
        
    $conn->close();

    }
        ?>
    
</p>
</body>
</html>

