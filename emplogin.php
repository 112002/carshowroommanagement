<!DOCTYPE html>
<head>
    <title>
        Employee Login
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <style>
.form-container {
    position: absolute;
    top: 25vh;
    left: 20vh;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #000;
}
    </style>
</head>
<body>
    <div class="container-fluid bg">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-4 col-md-4">
            <form enctype="multipart/form-data" method="post" class="form-container">
            <div class="form-group">
            <?php
            if(!isset($_POST['submit'])){
                echo "<h4 align='center'>Employee Login:</h4>";
            }
			if(isset($_POST['submit'])) {
                session_start();
                $con = mysqli_connect('localhost','root','');
                mysqli_select_db($con,'dbms');
                $empid = $_POST['empid'];
                $pass = $_POST['password'];
                $s = "SELECT * FROM employee WHERE empid= '$empid' and password='$pass'";
                $result = mysqli_query($con, $s);
                $num = mysqli_num_rows($result);
                if($num==1) {
                    $_SESSION['confirmation1']=0;
                    $_SESSION['empid'] = $empid;
                    header('location:emphome.php');
                }
                else
                {
                    echo "<h4 align='center'><font color='red'>Invalid entry!</font></h4>";
                }
            }
            ?>
            </div>
            <hr>
            <div class="form-group">
                <input type="text" name="empid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Employee ID" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
            <br>
            <div class="form-group">
            Want to login as a user? <a href='login.php'>Click here</a>
            </div>
            </form>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>