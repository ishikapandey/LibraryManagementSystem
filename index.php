<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Library Management System</title>
</head>
<body>
    
    <?php
    $emailmsg="";
    $pasdmsg="";
    $msg="";

    $ademailmsg="";
    $adpasdmsg="";


    if(!empty($_REQUEST['ademailmsg'])){
        $ademailmsg=$_REQUEST['ademailmsg'];
    }

    if(!empty($_REQUEST['adpasdmsg'])){
        $adpasdmsg=$_REQUEST['adpasdmsg'];
    }

    if(!empty($_REQUEST['emailmsg'])){
        $emailmsg=$_REQUEST['emailmsg'];
    }

    if(!empty($_REQUEST['pasdmsg'])){
    $pasdmsg=$_REQUEST['pasdmsg'];
    }

    if(!empty($_REQUEST['msg'])){
        $msg=$_REQUEST['msg'];
    }

    ?>
    
    <!-- <div class="heading">Welcome to the Library</div><br> -->

    <video autoplay muted loop id="myVideo">
        <source src="background.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>


    <br><br>
    <div class="container d-flex align-items-center justify-content-center flex-wrap">
        <h4><?php echo $msg?></h4>
        <div class="box">
        <div class="body">
                <div class="imgContainer"> <img src="img/student2.png" alt=""> </div>
                <div class="content d-flex flex-column align-items-center justify-content-center">
                    <div class="login-box">
                        <h2>Login</h2>
                        <form id="form" action="login_student_page.php" method="get">
                            
                            <input type="text" name="login_email" placeholder="Username" required=""><br>
                            <br>
                            <input type="password" name="login_password" placeholder="Password" required="">
                            <input type="submit" class="btnSubmit" value="Login" />     
                            
                            <!-- <a href="#" onclick="myFunction()">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Login
                            </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="body">
                <div class="imgContainer"> <img src="img/admin1.png" alt=""> </div>
                <div class="content d-flex flex-column align-items-center justify-content-center">
                    <div class="login-box">
                        <h2>Login</h2>
                        <form id="form" action="login_admin_page.php" method="get">
                            
                            <input type="text" name="login_email" placeholder="Username" required=""><br>
                            <br>
                            <input type="password" name="login_password" placeholder="Password" required="">
                            <input type="submit" class="btnSubmit" value="Login" />     
                            
                            <!-- <a href="#" onclick="myFunction()">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Login
                            </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>       
<br><br>
<!-- <div class="login-box">
                        <h2>Login</h2>
                        <form id="form2" action="login_admin_page.php" method="get">
                        <input type="text" name="login_email" placeholder="Username" required=""><br>
                        <br>
                        <input type="password" name="login_password" placeholder="Password" required="">
                        <br>
                            <a href="#" onclick="myFunction2()">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Login
                            </a>
                        </form>
                    </div> -->

    <script>
        function myFunction() {
            document.getElementById("form").submit();
        }
        function myFunction1() {
            document.getElementById("form1").submit();
        }
        function myFunction2() {
            document.getElementById("form2").submit();
        }
    </script>
</body>
</html>