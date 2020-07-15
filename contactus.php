<?php
session_start();
if(!isset($_SESSION['email'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<head>
<title>
   Contact Us</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/global3.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
    .form-container {
    position: absolute;
    top: 2vh;
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
   <li><a href="home.php">HOME</a></li>
   <li><a href="dashboard.php">DASHBOARD</a></li>
   <li><a href="contactus.php">CONTACT US</a></li>
   <li><a href="cart.php">CART</a></li>
   <li> <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></li>
   <li><a href="logout.php"> LOGOUT </a></li>
   </ul>
   <p>
       <h1 align='center' class="heading"><font color='white'>CONTACT US</font></h1><br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="panel panel-default">
                    <div class ="panel-body">
                        <form role="form" method='post' class="form-container">
                        <div class = "form-group">
                        <h3><center>
                        <?php
                            if(!isset($_POST['submit'])){
                               echo "Feedback:";
                        }
                        else{
                            echo "<font color='green'>Your response has been recorded!</font>";
                        }
                        ?>
                        </center></h3>
                        </div>
                        <hr>
                 
                        <textarea rows="10" cols="50" placeholder="Your feedback here..." style="resize: none;" required></textarea>
                        <br><br>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                        <center>This project is done by: <br>Mayukh Ghosh (18BCE0417)<br> Spandan Dasgupta (18BCE0396)</center>
                        </form>
                    </div>
            </div>
        </div>
    </div>  
<hr>


   </body>
   <html>