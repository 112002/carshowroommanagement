<!DOCTYPE html>
<head>
    <title>
        Register
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/global.css" type="text/css">
  
</head>
<body class="bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="panel panel-default">
                    <div class ="panel-body">
                        <form role="form" method='post' class="form-container">
                        <div class="form-group">
                        <?php
                        //error_reporting(E_ERROR | E_PARSE);
                        if(!isset($_POST['submit'])){
                            echo "<h4 align='center'>Register:</h4>";
                        }
                        if(isset($_POST['submit'])){

                            session_start();
                            $con = mysqli_connect('localhost','root','');
                            mysqli_select_db($con,'dbms');

                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $email = $_POST['email'];
                            $pass = $_POST['password'];
                            $city = $_POST['city'];
                            $state = $_POST['state'];
                            $country = $_POST['country'];
                            $street = $_POST['street'];
                            $phoneno = $_POST['phoneno'];

                            $s = "SELECT * FROM usertable WHERE email = '$email'";

                            $result = mysqli_query($con, $s);

                            $num = mysqli_num_rows($result);

                            if($num==1) {
                              echo "<h4 align='center'><font color='red'>Already exists!</font></h4>";
                          }else {
                                $reg = "INSERT INTO usertable (fname,lname,email,password,street,city,state,country,phoneno) VALUES ('$fname','$lname','$email','$pass','$street','$city','$state','$country','$phoneno');";
                                mysqli_query($con,$reg);
                                echo "<h4 align='center'><font color='green'>Successfully registered!</font></h4>";
                                
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
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
                                <br>
                                <div class="form-group">
                                Already have an account? <a href='login.php'>Click here</a>
                                </div>
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


