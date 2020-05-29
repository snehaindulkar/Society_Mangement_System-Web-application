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
               <li><a data-toggle="collapse" data-target=".navbar-collapse" href="index.php">Home</a></li>
               <li class="active"><a data-toggle="collapse" data-target=".navbar-collapse" href="features.php">Features</a></li>
               <li><a data-toggle="collapse" data-target=".navbar-collapse" href="about-us.php">About Us</a></li>
               <li ><a data-toggle="collapse" data-target=".navbar-collapse" href="contact-us.php">Contact Us</a></li>
               <li><a data-toggle="collapse" data-target=".navbar-collapse" href="#contact">Help</a></li>
               <li><button class="loginbtn btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button></li>
               <li><button style="padding: 5px 10px;" class="emailbtn btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope" aria-hidden="true"></i></button></li>

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
               Event Management
             </a>
             <a href="#" class="list-group-item text-center">
              Photo Gallery
            </a>
            <a href="#" class="list-group-item text-center">
              Maintenance Management
            </a>
            <a href="#" class="list-group-item text-center">
              Helpline
            </a>
            <a href="#" class="list-group-item text-center">
              Document Manager
            </a>
            <a href="#" class="list-group-item text-center">
              Event
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
                  <div class="col-lg-8"><input type="text" name="name" placeholder="Your Name" required> <label class="error1" id="name_error" name="nError"></label></div>
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
                <button type="submit" value="submit" name="submit" class="btn complaint-btn" onclick ="sendForm(this.form);">Submit</button>
              </form>
            </div>
          </div>
          <!-- train section -->
          <div class="bhoechie-tab-content">
            <div>

              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
              <h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>
            </div>
          </div>

          <!-- hotel search -->
          <div class="bhoechie-tab-content">
            <div>
              <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
              <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
            </div>
          </div>
          <div class="bhoechie-tab-content">
            <div>
              <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
              <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
            </div>
          </div>
          <div class="bhoechie-tab-content">
            <div>
              <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
              <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
              <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
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

<script src="js/main.js"></script>


</script>
<script type="text/javascript">

  new WOW().init();

</script>


<script type="text/javascript">


  function sendForm(form)
  {

   var name = $(form).find('input[name=name]').val(),
   flat = $(form).find('input[name=flat]').val(),
   complaint = $(form).find('textarea[name=comment]').val();


   if (name == null || name == "") {
//    nameError = "Please enter your name";
//    document.getElementById("name_error").innerHTML = nameError; 
$(form).find('label[name=nError]').html('Please enter your name');
return false;
} 

else if (!/^[a-zA-Z]*$/g.test(name)) {
  $(form).find('label[name=nError]').html('Please enter alphabates only');
}

else if (flat == null || flat == "") {
//    nameError = "Please enter your name";
//    document.getElementById("name_error").innerHTML = nameError; 
$(form).find('label[name=fError]').html('Please enter your flat number');
return false;
} 

else if (complaint == null || complaint == "") {
//    nameError = "Please enter your name";
//    document.getElementById("name_error").innerHTML = nameError; 
$(form).find('label[name=cError]').html('Please enter your complaint');
return false;
} 
else{


$.ajax({

  type: "POST",
  url: "class/emailClass.php",
  data: {
   name: name,
   flat: flat,
   complaint: complaint
 },
 success: function() {
  $('#complaintForm').html("<div id='message'></div>");
  $('#message').html("<h2>Complaint Form Submitted!</h2>")
  .append("<p>We will be in touch soon.</p>")
  .hide()
  .fadeIn(1500, function() {
    $('#message').append("<img id='checkmark' src='images/check.png' />");
  });

}
});
}
return false;

}
</script>



</body>
</html>