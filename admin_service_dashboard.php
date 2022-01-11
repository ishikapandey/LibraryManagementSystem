<?php

include("data_class.php");

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
            input[type=text],input[type=number],input[type=password],input[type=email]{
                opacity: 0.7;
            }
            input[type=submit]{
                color: white;
                background: rgb(92,197,224);
                background: linear-gradient(45deg, rgba(92,197,224,1) 0%, rgba(180,160,254,1) 98%, rgba(0,212,255,1) 100%);
                padding: 6px;
                border-radius: 10px;
            }
        </style>
    </head>
    
    <body>

        <video autoplay muted loop id="myVideo">
            <source src="background.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>



        <div class="container">
        <div class="innerdiv" style="margin: 80px;">
            <!-- <div class="row"><img class="imglogo" src="img/logo.png"/></div> -->
            <div class="leftinnerdiv">
                <Button class="greenbtn" style="background: rgba(92,197,224,0.5);
                background: linear-gradient(45deg, rgba(92,197,224,0.5) 0%, rgba(180,160,254,0.5) 98%, rgba(0,212,255,0.5) 100%);
                color: white;"> ADMIN</Button>
                <Button class="greenbtn" onclick="openpart('addbook')" >ADD BOOK</Button>
                <Button class="greenbtn" onclick="openpart('bookreport')" > BOOK RECORD</Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')"> BOOK REQUESTS</Button>
                <Button class="greenbtn" onclick="openpart('addperson')"> ADD MEMBER</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"> MEMBER RECORD</Button>
                <Button class="greenbtn" onclick="openpart('issuebook')"> ISSUE BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')"> ISSUE REPORT</Button>
                <a href="index.php"><Button class="greenbtn" style="background: rgba(92,197,224,0.5);
                background: linear-gradient(45deg, rgba(92,197,224,0.5) 0%, rgba(180,160,254,0.5) 98%, rgba(0,212,255,0.5) 100%);
                color: white;"> LOGOUT</Button></a>
            </div>

            <!-- ADD BOOK -->
            <div class="rightinnerdiv">
                <div id="addbook" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">ADD NEW BOOK</Button>
                    <form action="addbookserver_page.php" method="post" enctype="multipart/form-data"><br>
                        <label>Book Name:          </label><input type="text" name="bookname" />
                        </br>
                        <label>Detail:</label><input type="text" name="bookdetail" /></br>
                        <label>Author:</label><input type="text" name="bookaudor" /></br>
                        <label>Publication:</label><input type="text" name="bookpub" /></br>
                        <div>Branch:                        <input type="radio" name="branch" value="CS" />CS<input type="radio" name="branch" value="IT" />IT<div style="margin-left:80px"><input type="radio"
                                    name="branch" value="ECE" />ECE<input type="radio" name="branch"
                                    value="MAE" />MAE<input type="radio" name="branch" value="other" />Other</div>
                        </div>
                        <label>Price:</label><input type="number" name="bookprice" /></br>
                        <label>Quantity:</label><input type="number" name="bookquantity" /></br>
                        <label>Book Photo:</label><input type="file" name="bookphoto" /></br>
                        </br>

                        <input type="submit" value="SUBMIT" />
                        </br>
                        </br>

                    </form>
                </div>
            </div>

            <!-- ADD MEMBER -->
            <div class="rightinnerdiv">
                <div id="addperson" class="innerright portion" style="display:none">
                    <Button class="greenbtn">ADD MEMBER</Button>
                    <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data"><br>
                        <label>Name:</label><input type="text" name="addname" />
                        </br>
                        <label>Password:</label><input type="password" name="addpass" />
                        </br>
                        <label>Email:</label><input type="email" name="addemail" /></br>
                        <label for="type">Choose type:</label>
                        <select name="type">
                            <option value="student">student</option>
                            <option value="teacher">teacher</option>
                        </select>

                        <input type="submit" value="SUBMIT" /><br>
                    </form>
                </div>
            </div>


            <!-- BOOK REPORT -->
            <div class="rightinnerdiv">   
                <div id="bookreport" class="innerright portion" style="display:none">
                    <Button class="greenbtn" >BOOK RECORD</Button>
                    <?php
                    // echo "hello";
                    $u=new data;
                    $u->setconnection();
                    $u->getbook();
                    $recordset=$u->getbook();

                    $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
                    padding: 6px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th></tr>";
                    
                    foreach($recordset as $row){
                        $table.="<tr>";
                       "<td>$row[0]</td>";
                        $table.="<td>$row[2]</td>";
                        $table.="<td>$row[7]</td>";
                        $table.="<td>$row[8]</td>";
                        $table.="<td>$row[9]</td>";
                        $table.="<td>$row[10]</td>";
                        $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View Book</button></a></td>";
                        // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                        $table.="</tr>";
                        // $table.=$row[0];
                    }

                    $table.="</table>";

                    echo $table;
                    
                    ?>

                </div>
            </div>

            <!-- BOOK DETAIL -->
            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >BOOK DETAIL</Button>

<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploads/<?php echo $bookimg?> "/>
            </br>
            <p style="color:white"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
            <p style="color:white"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
            <p style="color:white"><u>Book Authour:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
            <p style="color:white"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
            <p style="color:white"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
            <p style="color:white"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="color:white"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
            <p style="color:white"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>
<br>

            </div>
            </div>

           

            <!-- STUDENT REPORT -->
            <div class="rightinnerdiv">   
                <div id="studentrecord" class="innerright portion" style="display:none">
                    <Button class="greenbtn" >MEMBER RECORD</Button>
                    
                    <?php
                    $u=new data;
                    $u->setconnection();
                    $u->userdata();
                    $recordset=$u->userdata();

                    $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
                    padding: 6px;'>Name</th><th>Email</th><th>Type</th></tr>";

                    foreach($recordset as $row){
                        $table.="<tr>";
                       "<td>$row[0]</td>";
                        $table.="<td>$row[1]</td>";
                        $table.="<td>$row[2]</td>";
                        $table.="<td>$row[4]</td>";
                        // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                        $table.="</tr>";
                        // $table.=$row[0];
                    }

                    $table.="</table>";

                    echo $table;
                     
                    ?>

                </div>
            </div>

            <!-- BOOK REQUEST APPROVE -->

            <div class="rightinnerdiv">   
                <div id="bookrequestapprove" class="innerright portion" style="display:none">
                    <Button class="greenbtn" >BOOK REQUEST APPROVE</Button>

                    <?php
                    $u=new data;
                    $u->setconnection();
                    $u->requestbookdata();
                    $recordset=$u->requestbookdata();

                    $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
                    padding: 8px;'>Person Name</th><th>Member Type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
                    foreach($recordset as $row){
                        $table.="<tr>";
                    "<td>$row[0]</td>";
                    "<td>$row[1]</td>";
                    "<td>$row[2]</td>";

                        $table.="<td>$row[3]</td>";
                        $table.="<td>$row[4]</td>";
                        $table.="<td>$row[5]</td>";
                        $table.="<td>$row[6]</td>";
                    // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                        $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approve</button></a></td>";
                        // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                        $table.="</tr>";
                        // $table.=$row[0];
                    }
                    $table.="</table>";

                    echo $table;
                    ?>

                </div>
            </div>

            <!-- ISSUE BOOK -->
            <div class="rightinnerdiv">   
                <div id="issuebook" class="innerright portion" style="display:none">
                    <Button class="greenbtn" >ISSUE BOOK</Button><br>
                    <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
                    <br><label for="book">Choose Book:</label>
                    <select name="book" >

                    <?php
                    $u=new data;
                    $u->setconnection();
                    $u->getbookissue();
                    $recordset=$u->getbookissue();
                    foreach($recordset as $row){

                        echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
                
                    }            
                    ?>
                    </select>

                    <label for="Select Student">:</label>
                    <select name="userselect" >
                    <?php
                    $u=new data;
                    $u->setconnection();
                    $u->userdata();
                    $recordset=$u->userdata();
                    foreach($recordset as $row){
                    $id= $row[0];
                        echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
                    }            
                    ?>
                    </select>
                    <br>
                    Days<input type="number" name="days"/>
                    <br><br>
                    <input type="submit" value="SUBMIT"/>
                    </form>
                </div>
            </div>

            <!-- ISSUE BOOK REPORT -->

            <div class="rightinnerdiv">   
                <div id="issuebookreport" class="innerright portion" style="display:none">
                    <Button class="greenbtn" >ISSUE BOOK RECORD</Button>

                    <?php
                    $u=new data;
                    $u->setconnection();
                    $u->issuereport();
                    $recordset=$u->issuereport();

                    $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
                    padding: 9px; font-weight: 4rem;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

                    foreach($recordset as $row){
                        $table.="<tr>";
                    "<td>$row[0]</td>";
                        $table.="<td>$row[2]</td>";
                        $table.="<td>$row[3]</td>";
                        $table.="<td>$row[6]</td>";
                        $table.="<td>$row[7]</td>";
                        $table.="<td>$row[8]</td>";
                        $table.="<td>$row[4]</td>";
                        // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                        $table.="</tr>";
                        // $table.=$row[0];
                    }
                    $table.="</table>";

                    echo $table;
                    ?>

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
</html