<?php
date_default_timezone_set('Asia/Kolkata');
require 'PHPMailerAutoload.php';

/**
 * Description of emailClass
 *
 * @author admin
 */

class EmailClass {
    var $fromname = 'Society Management';
    var $fromemail = 'leadsgenerates@gmail.com';
    var $defaultUrl = 'Society Management';

    public function defaultTo() {
   return array('prana.p20@gmail.com');
    }
    public function defaultReplyTo() {
         return array('prana.p20@gmail.com');
    }
    public function sendMail($params) {
        $fromName = $this->fromname;
        $fromEmail = $this->fromemail;

        $toEmail = $this->defaultTo();
        $replyToEmail = $this->defaultReplyTo();

        //Create a new PHPMailer instance
        $mail = new PHPMailer();

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

  //Set the encryption system to use - ssl (deprecated) or tlsleadsgenerates@gmail.com
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "leadsgenerates@gmail.com";

        //Password to use for SMTP authentication
        
        $mail->Password = "leadsgenerates@123";

        //Set who the message is to be sent from
        $mail->setFrom($fromEmail, $fromName);

        //Set an alternative reply-to address
        $mail->addReplyTo($replyToEmail, $fromName);

        //Set who the message is to be sent to
        foreach ($toEmail as $email) {
            $mail->addAddress($email);
        }
        //Set the subject line
        $mail->Subject = $params['subject'];

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        $mail->Body = $params['messageBody'];

        //Set to sent content as HTML
        $mail->IsHTML(true);

        //Replace the plain text body with one created manually
        //$mail->AltBody = $params['messageBody'];
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        //echo "<pre>"; print_r($mail); echo "</pre>";die();
        //send the message, check for errors
        if (!$mail->send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo; echo "<br />";
            return false;
        } else {
            //echo "Message sent!";
            //header("Location: http://" . $this->defaultUrl . "/thank-you.php");
            return true;
        }
    }
    public function callback() {
        $name = $_POST['name'];
        $flat = $_POST['flat'];
        $complaint = $_POST['comment'];
        $email = $_POST['email'];


              
        if ((EmailClass::validationCheckEmail($email) === true)) {
                $body .= '<html>';
                $body .= '<body style="font-size: 11; font-family: Verdana;">';
                $body .= '<p> Thank you for expressing interest on our website. Our expert will get in touch with you shortly. For your reference the information submitted by you on the form is mentioned below </p>';
                $body .= '<br/>';
                $body .= '<table style="font-size: 11; font-family: Verdana;">';
                $body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
                $body .= '<tr><td>Flat No:</td><td>' . $flat . '</td></tr>';
                $body .= '<tr><td>Email:</td><td>' . $email . '</td></tr>';
                $body .= '<tr><td>Complaint :</td><td>' . $complaint . '</td></tr>';
               
                //$body .= $leadDetails;
                $body .= '</table>';
                $body .= '<br></br>';
                $body .= 'Regards';
                $body .= '<br></br>';
                $body .= $this->fromname;
                $body .= '<br></br>';
                $body .= '</body>';
                $body .= '</html>';

                $params['messageBody'] = $body;
                $params['subject'] = 'Complaint details';
                // Send Mail  
                if ($this->sendMail($params)) {
                    return true;
                } else {
                    return false;
                }            

        } else {
            return false;
        }        
    }
    
    public static function validationCheckMobile($mobile) {
        $msg = true;
        if (empty($mobile) || strlen($mobile) >= 18 || strlen($mobile) <= 3 || $mobile === 'Mobile:' || !(EmailClass::is_mobileNumber($mobile))) {
            $msg = 'Enter a valid mobile number';
            return $msg;
        }
        return $msg;
    }
    public static function validationCheckEmail($email) {
        $msg = true;
        if (empty($email) || !(EmailClass::isValidEmail($email)) || $email === 'Email:') {
            $msg = 'Enter a valid email address';
            return $msg;
        }
        return $msg;
    }
    public static function isValidEmail($email) {
        //return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
        return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
    }
    public static function is_mobileNumber($mobile) {
        $regex1 = '123456789';
        $regex2 = '1234567890';
        $regex3 = '0123456789';

        if (preg_match('/^([0-9])\1*$/', $mobile)) {
            return false;
        } elseif ($mobile == $regex1) {
            return false;
        } elseif ($mobile == $regex2) {
            return false;
        } elseif ($mobile == $regex3) {
            return false;
        } elseif (preg_match("/[^0-9]/", $mobile)) {
            return false;
        } else {
            return true;
        }
    }

}

?>
