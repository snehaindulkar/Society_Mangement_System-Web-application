<?php
session_start();
// include 'constants.php';
require_once 'class/emailClass.php';


$emailClass = new EmailClass();
if (isset($_POST['comment'])) {
    $mailsent = $emailClass->callback();
    
} else {

    $mailsent = false;
}

?>
<html lang="en">
<head>  


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="img/ico/favicon.png">-->
    <title> Society Management</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    
    
   
    <link href="css/all-stylesheet.css" rel="stylesheet">
    <style>
        .ty-div { position: relative; background: white; height: 200px; width: 60%; margin: 5% auto; padding: 20px;}
        .ty-div div { color:#000; width: 50%; transform: translate(-50%, -50%); position: absolute; top: 50%; left: 50%; padding: 20px; text-align:center;}
    </style>
</head>
<body>


    <!-- ========================================================================= -->
    <div class="ty-div">
        <div>

            <?php if ($mailsent !== true) { ?>
            <h2 class="page-title">Oops!<span class="border"></span></h2>
            <h3 class="page-subtitle" style="text-align:center;">
                Sorry your request could not be processed!<br/>
                <a href="index.php">Click here</a> to continue.
            </h3>
            <?php } else { ?>
            <h2 class="page-title">Thank You<span class="border"></span></h2>
            <h3 class="page-subtitle" style="text-align:center;">
                Thank you for expressing interest on our website.<br/>
                Our admin will get in touch with you shortly to resolve your complaint.
                <p style="margin:10px auto;" id="shutter">You will be redirected in <span class="tiMer"></span> seconds</p>
            </h3>
            <?php } ?>
            
        </div>
    </div>
    <!-- ========================================================================= -->
    <!-- Bootstrap -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script language="JavaScript">

        function redirToLocation(){
            var c = 10;
            $('.tiMer').html(c);
            setInterval(function(){
                c--;
                if(c>=0){
                    $('.tiMer').html(c);
                }
                if(c==0){
                    $("#shutter").fadeTo("slow", 0);
                    //window.location = "{{ path('project_listing_render') }}";
                    window.location = "index.php";
                }
            },1000);
        } 
        <?php if ($mailsent !== true) { ?>
           <?php } else { ?>
            $(document).ready(function() {
                redirToLocation();
            }); 
            <?php } ?>
        </script>
    </body>
    </html>
