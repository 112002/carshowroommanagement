<?php
session_start();
if(!isset($_SESSION['uname'])) {
    header('location:adminlogin.php');
}
?>

<!DOCTYPE html>
<head>
<title>
   Add Product</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global3.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
    .form-container {
    position: absolute;
    top: 5vh;
    left: 20vh;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #000;
}
   </style>
</head>
<body class="bg">
       <br>
       <p>
   <ul>
   <li><a href="adminhome.php">HOME</a></li>
   <li><a href="admindashboard.php">DASHBOARD</a></li>
   <li><a href="adminlogout.php"> LOGOUT </a></li>
   </ul>
   <p><h1 align='center' class="heading"><font color='white'>ADD VEHICLE</font></h1>
    <br>
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="panel panel-default">
                    <div class ="panel-body">
                        <form role="form" method='post' class="form-container">
                        <div class="form-group">
                        <?php
                        if(!isset($_POST['submit'])){
                            echo "<h4 align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Vehicle:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>";
                        }
                        if(isset($_POST['submit'])){
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con,'dbms');
                            $vehicle_id = $_POST['vehicle_id'];
                            $vehicle_name = $_POST['vehicle_name'];
                            $cost = $_POST['cost'];
                            $model_name = $_POST['model_name'];
                            $owner_id = $_SESSION['uname'];
                            $company = $_POST['company'];
                            $s = "SELECT * FROM vehicle WHERE vehicle_id = '$vehicle_id'";
                            $result = mysqli_query($con, $s);

                            $num = mysqli_num_rows($result);
                        

                            if($num==1) {
                                echo "<h4 align='center'><font color='red'>Already exists!</font></h4>";
                            }else {
                                $reg = "INSERT INTO vehicle(vehicle_id,vehicle_name,model_name,cost,company) VALUES ('$vehicle_id','$vehicle_name','$model_name','$cost','$company')";
                                mysqli_query($con,$reg);
                                echo "<h4 align='center'><font color='green'>Successfully Added!</font></h4>";
                            }
                        }
                        ?>
                        </div>
                        <hr>
                        <div class="form-group">
                                <input type="text" name="vehicle_id" id="vehicle_id" class="form-control input-sm" placeholder="Vehicle ID" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="vehicle_name" id="vehicle_name" class="form-control input-sm" placeholder="Vehicle Name" required>
                        </div>
                        <div class="form-group">
                            <select type="dropdown" name='model_name' class="dropdown-block">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "dbms";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT model_name FROM model";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='". $row["model_name"]. "'>" . $row["model_name"]. "</option><br>";
                            }
                        } else {
                            echo "No results";
                        }
                        $conn->close();
                        ?> 
                        </select>
                    </div>
            
                    <div class="form-group">
                            <input type="text" name="company" id="company" class="form-control input-sm" placeholder="Company" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cost" id="cost" class="form-control input-sm" placeholder="Cost" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>  

</p>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>