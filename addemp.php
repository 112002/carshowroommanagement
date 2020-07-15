<?php
session_start();
if(!isset($_SESSION['uname'])) {
    header('location:adminlogin.php');
}
?>


<!DOCTYPE html>
<head>
<title>
   Add Employees</title>
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
       
   <ul>
   <li><a href="adminhome.php">HOME</a></li>
   <li><a href="admindashboard.php">DASHBOARD</a></li>
   <li><a href="adminlogout.php"> LOGOUT </a></li>
   </ul>
   <p><p><h1 align='center' class="heading"><font color='white'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADD EMPLOYEES</font></h1>
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="panel panel-default">
                    <div class ="panel-body">
                        <form role="form" method='post' class="form-container">
                        <div class="form-group">
                        <?php
                        if(!isset($_POST['submit'])){
                            echo "<h4 align='center'>Add Employee Details:</h4>";
                        }
                        if(isset($_POST['submit'])){

                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con,'dbms');

                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $email = $_POST['email'];
                            $empid = $_POST['empid'];
                            $pass = $_POST['password'];
                            $city = $_POST['city'];
                            $state = $_POST['state'];
                            $country = $_POST['country'];
                            $street = $_POST['street'];
                            $phoneno = $_POST['phoneno'];

                            $s = "SELECT * FROM employee WHERE email = '$email'";

                            $result = mysqli_query($con, $s);

                            $num = mysqli_num_rows($result);

                            if($num==1) {
                              echo "<h4 align='center'><font color='red'>Already exists!</font></h4>";
                          }else {
                                $reg = "INSERT INTO employee(fname,lname,email,empid,password,street,city,state,country,phoneno) VALUES ('$fname','$lname','$email','$empid','$pass','$street','$city','$state','$country','$phoneno')";
                                mysqli_query($con,$reg);
                                echo "<h4 align='center'><font color='green'>Successfully added!</font></h4>";
                            }
                        }
                            ?>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fname" id="fname" class="form-control input-sm" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lname" id="lname" class="form-control input-sm" placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="text" name="empid" id="empid" class="form-control input-sm" placeholder="Employee ID">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="street" id="street" class="form-control input-sm" placeholder="Street">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" class="form-control input-sm" placeholder="City">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="state" id="state" class="form-control input-sm" placeholder="State">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="country" id="country" class="form-control input-sm" placeholder="Country">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                        <input type="text" name="phoneno" id="phoneno" class="form-control input-sm" placeholder="Phone Number">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                                
                                <!-- <br><div class="form-group">
                                Already have an account? <a href='login.php'>Click here</a>
                                </div> -->
                        </form>
                    </div>
            </div>
        </div>
    </div>  


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
