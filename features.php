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
  <link href="dist/css/lightgallery.css" rel="stylesheet">
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
               <li><a data-toggle="collapse" data-target=".navbar-collapse" href="index.php">Home</a></li>
               <li class="active"><a data-toggle="collapse" data-target=".navbar-collapse" href="features.php">Features</a></li>
               <!-- <li><a data-toggle="collapse" data-target=".navbar-collapse" href="about-us.php">About Us</a></li> -->
               <li ><a data-toggle="collapse" data-target=".navbar-collapse" href="contact-us.php">Contact Us</a></li>
               <li><a data-toggle="collapse" data-target=".navbar-collapse" href="help.php">Help</a></li>
               <li><a class="loginbtn" href="admin/login.php">Login</a></li>
                 <li><a class="loginbtn" href="userlogin/register.php">Sign in</a></li>
               <!-- 
               <li><button style="padding: 5px 10px;" class="emailbtn btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope" aria-hidden="true"></i></button></li> -->

             </ul>
           </div>
         </nav>
       </div>
     </div>

   </header>

   <section id="section-slider">
    fgdgf
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
            <div class="list-group">
              <a href="#" class="list-group-item active text-center">
                Complaint Box
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
              Maintenance 
            </a>
           
            <a href="#" class="list-group-item text-center">
              Document Manager
            </a>
          
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
          <!-- flight section -->
          <div class="bhoechie-tab-content active">
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
          <!-- train section -->
          <div class="bhoechie-tab-content">
            <div>

              
              <h3 style="margin-top: 0;color:#55518a" class="text-center">Notices</h3>
<?php

  include 'constants.php';

$id_property_sql = "SELECT * FROM society_noticemaster";
$id_property_result=mysqli_query($link,$id_property_sql) or die(mysqli_error());




while($row_id_property=mysqli_fetch_array($id_property_result)){
$notice_name=$row_id_property["NOTICE_FILE_NAME"];
$notice_date=$row_id_property["NOTICE_DATE"];
$notice_desc=$row_id_property["NOTICE_DESC"];

print<<<HERE
               <div class="notice-div">
                 <h4><b>$notice_name</b></h4>
                 <p>$notice_desc</p>
                 </div>
           
HERE;

}
 ?>    
                          
            </div>
          </div>

          <!-- hotel search -->
          <div class="bhoechie-tab-content">
            <div>
              
              <h3 style="margin-top: 0;color:#55518a" class="text-center">Events</h3>
              
<?php

  // include 'constants.php';

$id_property_sql1 = "SELECT * FROM society_eventmaster ORDER BY EVENT_DATE ASC";
$id_property_result1=mysqli_query($link,$id_property_sql1) or die(mysqli_error());




while($row_id_property1=mysqli_fetch_array($id_property_result1)){
$event_name=$row_id_property1["EVENT_NAME"];
$event_date=$row_id_property1["EVENT_DATE"];
$notice_desc=$row_id_property1["EVENT_DESC"];

print<<<HERE
               <div class="event-div">
                 <p style="font-size: 20px;"><b>$event_date</b></p>
                <ul>
                  <li>$event_name</li>
                
                </ul>
              </div>
           
HERE;

}
 ?>

            </div>
          </div>
          <div class="bhoechie-tab-content">
            <div>
            
              <h3 class="text-center" style="margin-top: 0;color:#55518a">Photo Gallery</h3>




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
               <!--  <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/1-375.jpg 375, img/gallery/1-480.jpg 480, img/gallery/1.jpg 800" data-src="img/gallery/1-1600.jpg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-1.jpg">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/2-375.jpg 375, img/gallery/2-480.jpg 480, img/gallery/2.jpg 800" data-src="img/gallery/2-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-2.jpg">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/13-375.jpg 375, img/gallery/13-480.jpg 480, img/gallery/13.jpg 800" data-src="img/gallery/13-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-13.jpg">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li>

                 <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="img/gallery/4-375.jpg 375, img/gallery/4-480.jpg 480, img/gallery/4.jpg 800" data-src="img/gallery/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                    <a href="">
                        <img class="img-responsive" src="img/gallery/thumb-4.jpg">
                    </a>
                </li> -->
            </ul>
        </div>

            </div>
          </div>
          <div class="bhoechie-tab-content">
            <div>
              
              <h3 style="margin-top: 0;color:#55518a">Maintance Details</h3>
<div>

  <table class="table table-bordered">
<thead>
                <tr>
        
        <th>ID</th>
        <th>Description</th>
        <th>Amount</th>
       

       </tr>
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
 </thead>
  
</table>
         </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer>
  <section id="footer">
    <div class="container">
      <div class="row footer-block">
        <div class="col-lg-3 col-sm-3">
         <div class="footer-box">
          <h4>Contact</h4>
          <!-- <p><span>Add:</span>A-23, Mulund Shree Nagraj CHS, Near Holy Angles School, Gavandpada, Mulund, East, Mumbai 400081</p> -->
          <p><span>Phone:</span>    +91 9898989898 | +91 9898989898 </p>
          <p><span>Email:</span>    test@test.com</p>

        </div>
      </div>

      <div class="col-lg-3 col-sm-3">
        <div class="footer-box">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="#" data-toggle="modal" data-target="#cerificate">Privacy Policy</a></li>

          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-sm-3">
        <div class="footer-box">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="#" data-toggle="modal" data-target="#cerificate">Privacy Policy</a></li>

          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-sm-3">
        <div class="footer-box">
          <ul class="social">
           <li><a href="#" title="Facebook" target="_blank"><span class="fa fa-facebook"></span></a></li>
         <li><a href="#" title="youtube" target="_blank"><span class="fa fa-youtube"></span></a></li>
         <li><a href="#" title="Linkedin" target="_blank"><span class="fa fa-linkedin"></span></a></li>
         </ul>
       </div>
     </div>
   </div>
 </div>
</section>
</footer>

</div>
</div>

</div>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="dist/js/lightgallery-all.min.js"></script>
<script src="lib/jquery.mousewheel.min.js"></script>
<script src="js/main.js"></script>


</script>
<script type="text/javascript">

  new WOW().init();

</script>


<script type="text/javascript">

</script>

  <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
        </script>

</body>
</html>