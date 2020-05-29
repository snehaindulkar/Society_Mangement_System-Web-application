<?php 
include('admin/functions.php');
  include 'constants.php';

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: admin/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Society Management</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
  <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/animations/animate.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/media.css">
</head>

<body>
  <div class="wrapper">
   <header>
    <div class="container">
      <div class="col-lg-2 col-sm-2 col-xs-3 logo text-center logo-txt">

        <a href="index.php" class=""><span style="color: #FF5722;">Society</span>
          <p class="sub-title" style="color: #FF5722;">Management</p></a>
        </div>
 			<!-- <div class="col-lg-2">
 				<img src="img/logo.png" class="img-responsive" width="100px;">
 			</div> -->
 			<div class="col-lg-10">
 				<nav id="nav" class="pull-right navbar navbar-inverse" role="navigation">
           <div class="navbar-header">
             <button type="button" id="nav-toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
           </div>
           <div class="collapse navbar-collapse navStyl" id="main-nav">
             <ul class="nav navbar-nav pull-left" id="mainNav">
            

                <?php  if (isset($_SESSION['user'])) : ?>
          <strong><?php echo $_SESSION['user']['username']; ?></strong>
            <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
           
           <li><a class="loginbtn" href="index.php?logout='1'" style="color: #fff;">logout</a></li>
            
                       <!-- &nbsp; <a href="create_user.php"> + add user</a> -->
        <?php endif ?>
               <!-- <li><button class="loginbtn btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button></li> -->
               <li><button style="padding: 5px 10px;" class="emailbtn btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope" aria-hidden="true"></i></button></li>

             </ul>
           </div>
         </nav>
       </div>
     </div>

   </header>

 <!--   <section id="section-slider">
    fgdgf
  </section> -->

  <section id="memberdiv">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 text-center">
          <div class="viewbox">
            <h3>Total Members</h3>
            <?php

  // include 'constants.php';

$id_property_sql1 = "select count(*) as count from society_membermaster where ROLE='user'";
$id_property_result1=mysqli_query($link,$id_property_sql1) or die(mysqli_error());



while($row_id_property1=mysqli_fetch_array($id_property_result1)){

// $row_id_property1=mysqli_fetch_array($id_property_result1)){
$count=$row_id_property1["count"];

print<<<HERE
            <h2>$count</h2>
              
           
HERE;

}
 ?>    
          </div>
        </div>
        <div class="col-lg-4 text-center">
          <div class="viewbox">
            <h3>Notices</h3>
             <?php

  // include 'constants.php';

$id_property_sql3 = "select count(*) as count from society_noticemaster";
$id_property_result3=mysqli_query($link,$id_property_sql3) or die(mysqli_error());



while($row_id_property3=mysqli_fetch_array($id_property_result3)){

// $row_id_property3=mysqli_fetch_array($id_property_result1)){
$count=$row_id_property3["count"];

print<<<HERE
            <h2>$count</h2>
              
           
HERE;

}
 ?>  
          </div>
        </div>
        <div class="col-lg-4 text-center">
          <div class="viewbox">
            <h3>Events</h3>
            <?php

  // include 'constants.php';

$id_property_sql4 = "select count(*) as count from society_eventmaster";
$id_property_result4=mysqli_query($link,$id_property_sql4) or die(mysqli_error());



while($row_id_property4=mysqli_fetch_array($id_property_result4)){

// $row_id_property4=mysqli_fetch_array($id_property_result1)){
$count=$row_id_property4["count"];

print<<<HERE
            <h2>$count</h2>
              
           
HERE;

}
 ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
            <div class="list-group">
                 <a href="#" class="list-group-item active text-center">
              Members
            </a>
             
              <a href="#" class="list-group-item text-center">
                Notice Board
              </a>
              <a href="#" class="list-group-item text-center">
               Events
             </a>
             <a href="#" class="list-group-item text-center">
              Photo Gallery
            </a>
            <a href="#" class="list-group-item text-center">
              Maintenance Management
            </a>
            <a href="#" class="list-group-item text-center">
                Member Documents
            </a>

          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
          <!-- flight section -->

            <div class="bhoechie-tab-content active">

        <h3 class="text-center" style="margin-top: 0;color:#55518a">Member List</h3>
<table class="table table-striped">
    <thead>
      <tr>
        
        <th>Flat No</th>
        <th>Member Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Address</th>
        <th>Email</th>
        <th>Parking No</th>
        <th>Edit</th>
       </tr>
    </thead>
    <tbody>
        <?php

  // include 'constants.php';

$id_property_sql = "SELECT * FROM society_membermaster where ROLE='user'";
$id_property_result=mysqli_query($link,$id_property_sql) or die(mysqli_error());




while($row_id_property=mysqli_fetch_array($id_property_result)){
$member_id=$row_id_property["MEMBER_ID"];
$member_flatno=$row_id_property["MEMBER_FLAT_NO"];
$member_username=$row_id_property["USERNAME"];
$member_password=$row_id_property["PASSWORD"];
$member_name=$row_id_property["MEMBER_NAME"];
$member_address=$row_id_property["MEMBER_ADDRESS"];
$member_gender=$row_id_property["MEMBER_GENDER"];
$member_email=$row_id_property["EMAIL_ID"];
$member_parking=$row_id_property["PARKING_NO"];


print<<<HERE
    
      <tr id="$member_id" class="memberDetail">
       
        <td>$member_flatno</td>
        <td>$member_name</td>
        <td>$member_username</td>
        <td>$member_password</td>
        <td>$member_address</td>
        <td>$member_email</td>
        <td>$member_parking</td>
        <td><a href="javascript: void(0)" onclick="getdetails($member_id);"><img src="img/edit.png" class="img-responsive"/></a></td>


      </tr>
      
           
HERE;

}
 ?> 
</tbody>
      </table>
      </div>
          
        <!-- train section -->
        <div class="bhoechie-tab-content">

          <h3 class="text-center" style="margin-top: 0;color:#55518a">Notices</h3>

          <form action="" method="post">
            <div class="form-group col-lg-6">
              <label class="text-left" for="text">Notice Name:</label>
              <input type="text" class="form-control" id="noticename" placeholder="Enter text" name="noticename">
            </div>

            <div>
              <div class="form-group col-lg-6">
                <label class="text-left" for="text">Notice Date:</label>
                <input class="form-control" type="date" name="noticedate">
               
              </div>
            </div>

            <div class="form-group col-lg-6">
              <label class="text-left" for="text">Notice Description:</label>
              <textarea class="form-control" id="noticedesc" name="noticedesc" rows="2"></textarea>

            </div> 

            <div class="form-group col-lg-6">
              <label class="text-left" for="text">Upload Notice :</label>

              <!-- <input type="file" name="files[]" id="js-upload-files" multiple> -->
                <input type="file" name="myimage1" class="txtField">

            </div>

            <div class="col-lg-12 createbtn">
              <button type="submit" name="noticesubmit" class="btn btn-default">Create</button>
            </div>
            
             <!--  <div class="col-lg-12 createbtn">
              <button type="submit" class="btn btn-default">Create</button>
            </div> -->
          </form>

          <?php
  // include 'constants.php';
// require_once("constants.php");
if(isset($_POST['noticesubmit'])){

  $noticename = $_POST['noticename'];
  $noticedate = $_POST['noticedate']; 
  $noticedescription = $_POST['noticedesc']; 

$target1 = "notice/".basename($_FILES['myimage1']['name']);
  $noticeimage = $_FILES['myimage1']['name'];

  $sql = "INSERT INTO society_noticemaster (NOTICE_DATE, NOTICE_DESC, NOTICE_FILE_NAME, NOTICE_FILE_URL) VALUES ('$noticedate','$noticedescription','$noticename','$noticeimage')";
  mysqli_query($link,$sql);

  //now move uploaded image to folder
  if(move_uploaded_file($_FILES['myimage1']['tmp_name'], $target1)){
    $message = "Data uploaded Successfully";
  }else{
    $message = "Something problem occured!";
  }

}

?>



        </div>

        <!-- hotel search -->
        <div class="bhoechie-tab-content">
          <h3 class="text-center" style="margin-top: 0;color:#55518a">Events</h3>

          <form action="" method="post">
            <div class="form-group col-lg-6">
              <label class="text-left" for="text">Event Name:</label>
              <input type="text" class="form-control" id="eventname" placeholder="Enter text" name="eventname">
            </div>

            <div>
              <div class="form-group col-lg-6">
                <label class="text-left" for="text">Event Date:</label>
                <input class="form-control" type="date" name="eventdate">
                <!-- <div class="input-group datepicker" data-provide="datepicker">
                  <input type="text" class="form-control">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div> -->
              </div>
            </div>

            <div class="form-group col-lg-6">
              <label class="text-left" for="text">Event Description:</label>
              <textarea class="form-control" id="eventedesc" name="eventedesc" rows="2"></textarea>

            </div> 

            
            <div class="col-lg-12 createbtn">
              <button type="submit" name="eventsubmit" class="btn btn-default">Create</button>
            </div>
            
             <!--  <div class="col-lg-12 createbtn">
              <button type="submit" class="btn btn-default">Create</button>
            </div> -->
          </form>

          <?php
  // include 'constants.php';
// require_once("constants.php");
if(isset($_POST['eventsubmit'])){

  $eventname = $_POST['eventname'];
  $eventedate = $_POST['eventdate']; 
  $eventdescription = $_POST['eventedesc']; 



  $sql = "INSERT INTO society_eventmaster (EVENT_DATE, EVENT_DESC, EVENT_NAME) VALUES ('$eventedate','$eventdescription','$eventname')";
  mysqli_query($link,$sql);

 

}

?>
        </div>
        <div class="bhoechie-tab-content">
         <h3 class="text-center" style="margin-top: 0;color:#55518a">Photo Gallery</h3>

         <div class="form-container">
 
    <?php
        if(isset($successMsg) && !empty($successMsg))
        {
            echo "<div class='success-msg'>";
            foreach($successMsg as $sMsg)
            {
                echo $sMsg."<br>";
            }
            echo "</div>";
        }
    ?>
 
 
    <?php
        if(isset($errorMsg) && !empty($errorMsg))
        {
            echo "<div class='error-msg'>";
            foreach($errorMsg as $eMsg)
            {
                echo $eMsg."<br>";
            }
 
            echo "</div>";
        }
    ?>
 
    <!-- <div class="add-more-cont"><a id="moreImg"><img src="img/add_icon.jpg">Add Image</a></div>
    <form name="uploadFile" action="" method="post" enctype="multipart/form-data" id="upload-form">
        <div class="input-files">
        <input id='upload' name="upload[]" type="file" multiple="multiple" />
        </div>
        <input type="submit" name="galsubmit" value="submit">
    </form> -->
    
    </div>

         <form method="post" enctype="multipart/form-data" id="upload-form">
         
            <div class="form-group col-lg-12">
              <label class="text-left" for="text">Upload Gallery Images :</label>

              <input id='upload' name="upload[]" type="file" multiple="multiple" />
            </div>

            
            <div class="col-lg-12 createbtn">
              <button type="submit" name="galsubmit" class="btn btn-default">Create</button>
            </div>
            
           
          </form>


          <?php

          if(isset($_POST['galsubmit'])){
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "uploads/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;
                    //insert into db 
                    $qry ="INSERT into society_eventgallery (EVENT_FILE_URL,EVENT_FILE_NAME) values ('".$filePath."','".$shortname."')";
 
                   $rs  = mysqli_query($link, $qry);

                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

                }
              }
        }
    }
}

    //show success message
    // echo "<h1>Uploaded:</h1>";    
    // if(is_array($files)){
    //     echo "<ul>";
    //     foreach($files as $file){
    //         echo "<li>$file</li>";
    //     }
    //     echo "</ul>";
    // }

    

  



          ?>
<div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">

          <?php

$id_gal_sql1 = "select * from society_eventgallery";
$id_gal_result=mysqli_query($link,$id_gal_sql1) or die(mysqli_error());



while($row_id_gal=mysqli_fetch_array($id_gal_result)){

$galimg=$row_id_gal["EVENT_FILE_URL"];

print<<<HERE
          

            <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="$galimg" data-src="$galimg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                    <a href="">
                        <img class="img-responsive" src="$galimg">
                    </a>
             </li>
              
           
HERE;

}
          ?>
        </ul>
      </div>
        </div>
        <div class="bhoechie-tab-content">

        <h3 class="text-center" style="margin-top: 0;color:#55518a">Maintenance Management</h3>

        <div class="text-center pull-right">
          <a class="btn loginbtn" href="billgenerate.php">Generate Bill</a>
        </div>

          <table class="table table-striped billtable">
    <thead>
      <tr>
        
        <th>Member Bill ID</th>
        <th>Member Flat No</th>
        <th>Bill DATE</th>
        <th>Bill From Date</th>
        <th>Bill To Date</th>
        <th>Bill Due Date</th>
        <th>Bill Due Amount</th>
        <th>Bill Status</th>
        <th>Action</th>

       </tr>
    </thead>
    <tbody>
        <?php
$id_property_sql2 = "SELECT a.BILL_ID, b.MEMBER_FLAT_NO, a.BILL_DATE, a.BILL_FROM_DATE, a.BILL_TO_DATE, a.BILL_DUE_DATE, a.BILL_DUE_AMT, a.BILL_STATUS FROM society_billdisplay as a INNER JOIN society_membermaster as b on a.MEMBER_ID= b.MEMBER_ID
WHERE MONTH(BILL_DATE)=MONTH(NOW()) AND YEAR(BILL_DATE)=YEAR(NOW())";
$id_property_result2=mysqli_query($link,$id_property_sql2) or die(mysqli_error());




while($row_id_property2=mysqli_fetch_array($id_property_result2)){
$member_billid=$row_id_property2["BILL_ID"];
$member_flatno=$row_id_property2["MEMBER_FLAT_NO"];
$member_billdate=$row_id_property2["BILL_DATE"];
$member_billfromdate=$row_id_property2["BILL_FROM_DATE"];
$member_billtodate=$row_id_property2["BILL_TO_DATE"];
$member_duedate=$row_id_property2["BILL_DUE_DATE"];
$member_dueamount=$row_id_property2["BILL_DUE_AMT"];
$member_billstatus=($row_id_property2["BILL_STATUS"] == 0) ? 'UnPaid' : 'Paid';



if ($member_billstatus == 'Paid')
{

  $viewdetails = 'view';
}
else
{
  $viewdetails = 'paid';

}


  
    print<<<HERE
      <tr>
       
        <td>$member_billid</td>
        <td>$member_flatno</td>
        <td>$member_billdate</td>
        <td>$member_billfromdate</td>
        <td>$member_billtodate</td>
        <td>$member_duedate</td>
        <td>$member_dueamount</td>
        <td>$member_billstatus</td>
        <td><a>$viewdetails</a></td>
 </tr>
    
           
HERE;

}
 ?> 
   </tbody>
      </table>
      </div>

       <div class="bhoechie-tab-content active">

        <h3 class="text-center" style="margin-top: 0;color:#55518a">Member Documents</h3>
<table class="table table-striped">
    <thead>
      <tr>
        
        <th>Flat No</th>
        <th>Member Document</th>
      
       </tr>
    </thead>
    <tbody>
        <?php

  // include 'constants.php';

$id_doc_sql = "SELECT * FROM society_documentmaster";
$id_doc_result=mysqli_query($link,$id_doc_sql) or die(mysqli_error());




while($row_id_doc=mysqli_fetch_array($id_doc_result)){
$member_file=$row_id_doc["DOCUMENT_FILE_URL"];
$member_flatno=$row_id_doc["MEMBER_FLAT_NO"];



print<<<HERE
    
      <tr id="$member_id" class="memberDetail">
       
        <td><b>$member_flatno</b></td>
        <td><img src="images/$member_file" class="img-responsive" />
        </td>
        


      </tr>
      
           
HERE;

}
 ?> 
</tbody>
      </table>
      </div>

       
      </div>
    </div>
  </div>
</div>
</div>
</section>


    <div id="bill" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header"></div>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="bollmodal modal-body" style="padding: 0;">
                    
                </div>

            </div>

        </div>
    </div>

</div>
</div>

</div>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main.js"></script>


</script>
<script type="text/javascript">

  new WOW().init();

  function getdetails(memid)

  {
    console.log(memid);
    window.location.href = "edit_user.php?id=" + memid; 
  }

</script>

<script type="text/javascript">

  $(document).ready(function()
  {
    $('.box').click(function()
    {
      var set =  $(this).is(':checked') ? false : true;
      $(this).nextAll('div.box-2').find('input').attr('disabled', set)
    });

  });
</script>

<script>
        $(document).ready(function(){
            var id = 1;
            $("#moreImg").click(function(){
                var showId = ++id;
                if(showId <=10)
                {
                    $(".input-files").append('<input type="file" name="image_upload-'+showId+'">');
                }
            });
        });
    </script>

</body>
</html>