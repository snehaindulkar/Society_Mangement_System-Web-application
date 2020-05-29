<?php 
include('admin/functions.php');
  include 'constants.php';

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: admin/login.php");

  $id = $_GET["id"];
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

        <a href="#" class=""><span style="color: #FF5722;">Society</span>
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
                     
           
           <li><a class="loginbtn" href="index.php?logout='1'" style="color: #fff;">logout</a></li>
           <li><button style="padding: 5px 10px;" class="emailbtn btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope" aria-hidden="true"></i></button></li>

             </ul>
           </div>
         </nav>
       </div>
     </div>

   </header>


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
            <h3>Total Members</h3>
            <h2>45</h2>
          </div>
        </div>
        <div class="col-lg-4 text-center">
          <div class="viewbox">
            <h3>Total Members</h3>
            <h2>45</h2>
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
                 My Flat
                </a>
              <a href="#" class="list-group-item text-center">
                Maintenance Details
              </a>
              <a href="#" class="list-group-item text-center">
                My Documnets
              </a>
              <a href="#" class="list-group-item text-center">
               Complaint Box 
              </a>
              
           

          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
          <!-- flight section -->

            <div class="bhoechie-tab-content active">

        <h3 class="text-left" style="margin-top: 0;color:#55518a">My Info</h3>
        <div class="meminfo">

        <?php

  // include 'constants.php';
  $id = $_GET["id"];


$id_property_sql = "SELECT * FROM society_membermaster where ROLE='user' and MEMBER_ID=$id";
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
   
        <p><b>Flat No: </b>  $member_flatno</p>
        <p><b>Name: </b> $member_name</p>
        <p><b>Username: </b> $member_username</p>
        <p><b>Address: </b> $member_address</p>
        <p><b>Email Id: </b> $member_email</p>
    
           
HERE;

}
 ?> 
</div>

      </div>
          <div class="bhoechie-tab-content">

            <h3 class="text-center" style="margin-top: 0;color:#55518a">Maintenance</h3>

            <div class="col-lg-12 invoicediv">
              <div class="col-lg-6">
                <h3>Society Management</h3>
                <p>A101/ Apna society</p>
                <p>Dadar(west)</p>
                <p>400049 - Mumbai</p>


              </div>
              <div class="col-lg-6 text-right">
                <h1 style="color: #FF5722;">INVOICE</h1>
              </div>

              <div class="col-lg-12">
                <table class="table table-bordered">
<thead>
                <tr>
        
        <th>ID</th>
        <th>Description</th>
        <th>Amount</th>
       </tr>
</thead>
          
          

<?php

$id_property_sql2 = "SELECT * FROM society_maintaiancemaster";
$id_property_result2=mysqli_query($link,$id_property_sql2) or die(mysqli_error());




while($row_id_property2=mysqli_fetch_array($id_property_result2)){
$maintanace_id=$row_id_property2["M_ID"];
$maintanace_desc=$row_id_property2["M_DESC"];
$maintanace_amount=$row_id_property2["M_AMOUNT"];

print<<<HERE
     <tr>
       
        <td>$maintanace_id</td>
        <td>$maintanace_desc</td>
        <td>$maintanace_amount</td>
     </tr>
        
HERE;

}
 ?> 
 
  
</table>
         </div>

<div class="billdetails col-lg-12">
           <?php

  // include 'constants.php';

  $id = $_GET["id"];

$id_property_sql1 = "SELECT * FROM society_billdisplay where MEMBER_ID= $id";
$id_property_result1=mysqli_query($link,$id_property_sql1) or die(mysqli_error());




while($row_id_property1=mysqli_fetch_array($id_property_result1)){
$member_id=$row_id_property1["MEMBER_ID"];
$member_billid=$row_id_property1["BILL_ID"];
$member_billdate=$row_id_property1["BILL_DATE"];
$member_billfromdate=$row_id_property1["BILL_FROM_DATE"];
$member_billtodate=$row_id_property1["BILL_TO_DATE"];
$member_billduedate=$row_id_property1["BILL_DUE_DATE"];
$member_billdueamt=$row_id_property1["BILL_DUE_AMT"];
$member_billstatus=$row_id_property1["BILL_STATUS"];

print<<<HERE

<p><b>Member Bill ID: </b>  $member_billid</p>
        <p><b>Member Flat No: </b> $member_flatno</p>
        <p><b>Bill DATE: </b> $member_billdate</p>
        <p><b>Bill From Date: </b> $member_billfromdate</p>
        <p><b>Bill To Date: </b> $member_billtodate</p>
        <p><b>Bill Due Date: </b> $member_billduedate</p>
        <p><b>Bill Due Amount: </b> $member_billdueamt</p>
        <p><b>Bill Status: </b> $member_billstatus</p>
    
   
           
HERE;

}
 ?> 
</div>
  </div>
       </div>
             <div class="bhoechie-tab-content">

        <h3 class="text-left" style="margin-top: 0;color:#55518a">My Documents</h3>

        <div class="col-lg-12"> 
         <form action="" id="memberdoc" method="post" enctype="multipart/form-data">
              <div class="form-group col-lg-6">
              <label class="text-left" for="text">Document Required:</label>
              <select class="form-control" id="documents" name="documents">
              <option >Select Document</option>
                <option value="Pan Card">Pan Card</option>
                <option value="Adhar Card">Adhar Card</option>
              </select>
            </div>
            <div class="form-group col-lg-6">
              <label class="text-left" for="text">Upload Document :</label>
                <input type="file" name="myimage" class="txtField">
             </div>
             <div class="col-lg-12 createbtn">
              <button type="submit" name="submitf" class="btn btn-default" >Create</button>
            </div>
      </form>
      </div>
      

      <?php
if(isset($_POST['submitf'])){

$target = "images/".basename($_FILES['myimage']['name']);

 // echo $target;

  //get all data from form
  $image = $_FILES['myimage']['name'];
  $imgdesc = $_POST['documents']; 

  $sql2 = "SELECT b.MEMBER_FLAT_NO FROM society_documentmaster as a inner join society_membermaster as b on a.MEMBER_FLAT_NO = b.MEMBER_FLAT_NO WHERE b.MEMBER_ID= $id";



  $result1=mysqli_query($link,$sql2) or die(mysqli_error());



$row_id=mysqli_fetch_array($result1);
$flat=$row_id["MEMBER_FLAT_NO"];


//echo $result1;
  $sql = "INSERT INTO society_documentmaster (MEMBER_FLAT_NO, DOCUMENT_ID, DOCUMENT_FILE_URL, DOCUMENT_FILE_NAME) VALUES ('$flat',1,'$image','$imgdesc') ON DUPLICATE KEY UPDATE DOCUMENT_FILE_URL='$image'";

  //echo  $sql;
  mysqli_query($link,$sql);

  //now move uploaded image to folder
  if(move_uploaded_file($_FILES['myimage']['tmp_name'], $target)){
    $message = "Data uploaded Successfully";
  }else{
    $message = "Something problem occured!";
  }
}

 $sql2 = "SELECT b.MEMBER_FLAT_NO FROM society_documentmaster as a inner join society_membermaster as b on a.MEMBER_FLAT_NO = b.MEMBER_FLAT_NO WHERE b.MEMBER_ID= $id";



  $result1=mysqli_query($link,$sql2) or die(mysqli_error());



$row_id=mysqli_fetch_array($result1);
$flat=$row_id["MEMBER_FLAT_NO"];

$doc = "select DOCUMENT_FILE_URL from society_documentmaster where MEMBER_FLAT_NO='$flat'";
$doc_result=mysqli_query($link,$doc) or die(mysqli_error());



$doc_display=mysqli_fetch_array($doc_result);


$documnent=$doc_display["DOCUMENT_FILE_URL"];

print<<<HERE
            <div class="text-center">
            <img class="img-responsive" src="images/$documnent" >
            </div>
              
           
HERE;

      ?>
    </div>

        <div class="bhoechie-tab-content">
            <div class="complaint-form">
              <form id="complaintForm" method="post" action="thank-you.php">
                <h4 class="text-center">Complaint Box</h4>
                <div class="form-group col-lg-12">
                  <div class="col-lg-4"><label>Member Name</label></div>
                  <div class="col-lg-8"><input type="text" name="name" placeholder="Your Name" required></div>
                </div>

                <div class="form-group col-lg-12">
                  <div class="col-lg-4"><label>Flat No. </label></div>
                  <div class="col-lg-8">  <input type="text" name="flat" placeholder="Your Name" required><label class="error1" id="name_error" name="fError"></label></div>
                </div>

                <div class="form-group col-lg-12">
                  <div class="col-lg-4"><label>Email </label></div>
                  <div class="col-lg-8">  <input type="text" name="email" placeholder="Your Email" required><label class="error1" id="name_error" name="fError"></label></div>
                </div>

                <div class="form-group col-lg-12">
                  <div class="col-lg-4"><label>Complaint </label></div>

                  <div class="col-lg-8"> <textarea  name="comment" placeholder="Your Complaint"></textarea><label class="error1" id="name_error" name="cError"></label></div>
                </div>
                <button type="submit" value="submit" name="submit" class="btn complaint-btn">Submit</button>
              </form>
            </div>
          </div>


</div>
  </div>
</div>
</div>
</section>


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

</script>



</body>
</html>