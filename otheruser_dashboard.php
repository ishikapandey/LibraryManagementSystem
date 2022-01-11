<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="styleAdmin.css">
        <style>
            .greenbtn{
                background: rgb(92,197,224);
                background: linear-gradient(45deg, rgba(92,197,224,1) 0%, rgba(180,160,254,1) 98%, rgba(0,212,255,1) 100%);
                color: white;
            }
            .greenbtn:hover{
                cursor: pointer;
                background: rgb(98,171,246);
                background: linear-gradient(45deg, rgba(98,171,246,1) 0%, rgba(110,77,228,1) 38%, rgba(82,150,226,1) 96%, rgba(86,149,209,1) 100%);
                color: white;
            }
        </style>
    </head>
   
    <body>

    <?php
        include("data_class.php");
    ?>

        <video autoplay muted loop id="myVideo">
            <source src="background.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>

           <div class="container">
            <div class="innerdiv" style="margin: 80px;">
            <div class="row"></div>
            <div class="leftinnerdiv">
                <Button class="greenbtn" style="background: rgba(92,197,224,0.5);
                background: linear-gradient(45deg, rgba(92,197,224,0.5) 0%, rgba(180,160,254,0.5) 98%, rgba(0,212,255,0.5) 100%);
                color: white;">MEMBER</Button>
                <Button class="greenbtn" onclick="openpart('myaccount')"> MY ACCOUNT</Button>
                <Button class="greenbtn" onclick="openpart('requestbook')"> REQUEST BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuereport')"> ISSUE RECORD</Button>
                <a href="index.php"><Button class="greenbtn" style="background: rgba(92,197,224,0.5);
                background: linear-gradient(45deg, rgba(92,197,224,0.5) 0%, rgba(180,160,254,0.5) 98%, rgba(0,212,255,0.5) 100%);
                color: white;"> LOGOUT</Button></a>
            </div>


            <div class="rightinnerdiv">   
            <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >MY ACCOUNT</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->userdetail($userloginid);
            $recordset=$u->userdetail($userloginid);
            foreach($recordset as $row){

            $id= $row[0];
            $name= $row[1];
            $email= $row[2];
            $pass= $row[3];
            $type= $row[4];
            }               
                ?>
            
            <p style="color: white; font-family: 'Roboto Slab', serif; font-size: 1.5rem;"><u>Name</u> : &nbsp&nbsp<?php echo $name ?></p>
            <p style="color: white; font-family: 'Roboto Slab', serif; font-size: 1.5rem;"><u>Email</u> : &nbsp&nbsp<?php echo $email ?></p>
            <p style="color: white; font-family: 'Roboto Slab', serif; font-size: 1.5rem;"><u>Account Type</u> : &nbsp&nbsp<?php echo $type ?></p>
            <br>
            </div>
            </div>


            



            <div class="rightinnerdiv">   
            <div id="issuereport" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >ISSUE RECORD</Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->getissuebook($userloginid);
            $recordset=$u->getissuebook($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="return" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Return Book</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->returnbook($returnid);
            $recordset=$u->returnbook($returnid);
                ?>

            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="requestbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >REQUEST BOOK</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Image</th><th>Book Name</th><th>Book Authour</th><th>Branch</th><th> Price</th></th><th>Request Book</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
               $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary'>Request Book</button></a></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>

            </div>
            </div>

        </div>
        </div>


        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }

   
 
        
        </script>
    </body>
</html>