<?php
session_start();
if(!isset($_SESSION['uname'])) {
    header('location:adminlogin.php');
}
?>


<!DOCTYPE html>
<head>
<title>
   Add Model</title>
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
   <p>
       <h1 align='center' class="heading"><font color='white'>ADD MODEL</font></h1>
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
                            echo "<h4 align='center'>Add Model:</h4>";
                        }
                        if(isset($_POST['submit'])){

                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con,'dbms');
                            $model_id = $_POST['model_id'];
                            $model_name = $_POST['model_name'];
                            $seat_capacity = $_POST['seat_capacity'];
                            $image = $_POST['file'];
                        
                            $s = "SELECT * FROM model WHERE model_id = '$model_id'";
                            $result = mysqli_query($con, $s);

                            $num = mysqli_num_rows($result);

                            if($num==1) {
                                echo "<h4 align='center'><font color='red'>Already exists!</font></h4>";
                            }else {
                                $reg = "INSERT INTO model(model_id,model_name,seat_capacity,image) VALUES ('$model_id','$model_name','$seat_capacity','$image')";
                                mysqli_query($con,$reg);
                                echo "<h4 align='center'><font color='green'>Successfully Added!</font></h4>";
                            }
                        }
                        ?>
                        </div>
                        <hr>
                        <div class="form-group">
                                <input type="text" name="model_id" id="model_id" class="form-control input-sm" placeholder="Model ID" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="model_name" id="model_name" class="form-control input-sm" placeholder="Model Name" required>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" id="profile-img" name="file" required="" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="seat_capacity" id="seat_capacity" class="form-control input-sm" placeholder="Seat Capacity" required>
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