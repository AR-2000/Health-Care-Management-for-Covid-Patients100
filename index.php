<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link href="css/menu.css" rel="stylesheet" type="text/css" />
    <link href="css/stylelog.css" type="text/css" rel="stylesheet" />
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="js/rightde.js"></script>
    <script type="text/javascript" src="js/rightde.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Health Care : Covid -19</title>
    <link rel="icon" href="images/favicon.png" type="image/favicon.png">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center ">Health Care : Covid -19<br />
                    <h3 style="font-size:20px">Health Care Management for Covid Patients</h3>
                </h1>
            </div>
        </div>
    </div>
    <br>

    <?php
    include 'connect.php';
    session_start();
    if (isset($_POST['sadmun'])) {

        $typeb = "Basic Administartion";
        $typea = "Super Administartion";

        $username = stripslashes($_REQUEST['sadmun']);

        // removes backslashes
        $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
        $password = stripslashes($_REQUEST['sadmpw']);
        $password = mysqli_real_escape_string($con, $password);

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `lvl2_admin` WHERE `lvtwusern` = '$username'and `lvtwpass` = '" . md5($password) . "'";
        $querysa = "SELECT * FROM `sup_admin` WHERE `sadiun` = '$username'and `sadipw` = '" . md5($password) . "'";

        $result = mysqli_query($con, $query) or die(mysqli_error());
        $resultsa = mysqli_query($con, $querysa) or die(mysqli_error());

        $rows = mysqli_num_rows($result);
        $rowss = mysqli_num_rows($resultsa);

        if ($rows == 1) {
            $_SESSION['sadmun'] = $username;
            $_SESSION['admty']  = $typeb;
            header("Location: menu.php"); // Redirect user to index.php
        } else if ($rowss == 1) {
            $_SESSION['sadmun'] = $username;
            $_SESSION['admty']  = $typea;
            header("Location: menu.php"); // Redirect user to index.php
        } else {
            $fail = '<br/ ><div style="font-size:12px" align="center" class="alert alert-danger">Invalid Username or Password</div>';
        }
    }
    ?>

    <br>

    <div class="container login-dark">
        <div class="row">
            <div class="col-md-4 col-md-push-2  col-xs-12 ">
                <form action="" method="post">
                    <center>
                        <img id="mimg" src="images/log/mimg.png" class="img-responsive" />
                        <br>
                        <div class="input-group input-group-lg input-group-addon"><span><img style="width:60px" src="images/log/user.png" /></span>
                            <input name="sadmun" required="required" style=" height:50px; font-size:20px" id="field" type="text" class="form-control " placeholder="Username">
                        </div>
                        <br /><span>
                            <div class="input-group input-g>roup-lg input-group-addon"> <img style="width:60px" src="images/log/lock.png" />
                        </span>
                        <input name="sadmpw" required="required" style=" font-size:20px; height:50px;" type="password" class="form-control " placeholder="Password">
            </div>
            <br />
            <div align="center" style="padding-left: 15px;padding-too: 20px;">
                <button name="login" onclick="chcke();" type="submit" value="SUBMIT" class="btn btn-danger">SUBMIT</button>
                <br>
                <center>
                    <script type="text/javascript">
                        document.write('<?php echo $fail; ?>');
                    </script>
                </center>
                <!-- <div align="left" style="padding-left: 15px;">
                    <br>
                    <p>Not registered yet? <a target="_blank" style="font-colour=" Blue"" href='superadmin.php'>Register Here</a></p>
                </div> -->
            </div>
            </form>



        </div>
        <div style="font-size :18px; border-style: none  none none dotted; border-width: 4px; border-color: rgba(0, 0, 0, 0.2); height: 650px;text-align: justify;" class="col-md-4 col-md-push-2  col-xs-12 "><br>This the main system login form for to access the system. you can enter both Super and Basic admin login details. if you are not a memeber of systme create your login access with using <a target="_blank" style="font-colour=" Blue"" href='superadmin.php'>Register Here</a>
            <br>
            <br>Enter Login details that provided by Hospital Administartion.
        </div>
    </div>





    <!-- <h2 class="sr-only">Login Form</h2>
                        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>

                        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a>
                    </form>
                </div> -->











    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>


<!-- <footer class="foot2">
    <div class="container-fluid">
        <div class="row">

            <div style="padding: 10px;" class="col-md-10 col-md-push-2">
                Copyright © 2016 Jayendra Matarage. All rights reserved.
            </div>
        </div>
    </div>
</footer> -->

</html>