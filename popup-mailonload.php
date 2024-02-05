<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "akvtechnologies@gmail.com";
    $email_subject = "Enquiry";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phno']) ||
        !isset($_POST['services'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $phno = $_POST['phno']; // required
    $services = $_POST['services']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  $string_exp = "/^[0-9]+$/";
  if(!preg_match($string_exp,$phno)) {
    $error_message .= 'Enter The Valid Contact Number.<br />';
  }


  if(strlen($services) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "email: ".clean_string($email)."\n";
    $email_message .= "phno: ".clean_string($phno)."\n";
    $email_message .= "message: ".clean_string($services)."\n";
     
     
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
 
echo '<script type="text/javascript">alert("Thank you for contacting us.\nWe will be in touch with you very soon."); </script>';
echo '<script> window.location="https://www.akvtechnologies.com"; </script>';
?>
 
<!-- include your own success html here -->
 

 
<?php
}
?>