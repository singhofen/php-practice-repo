<!-- /*
//To start and run a php program go to =>  http://localhost/phpSandbox/variables.php

local host / file path on local server http://localhost/theNameOfFolder/fileName.php
1. start XAAMP LOCAL SERVER
2. navigate to OS. > XAAMP > htdocs then make any kind of php folder/file you wish
3. right click and open up VS Code and start to program

local host / file path on local server http://localhost/phpSandbox/contactForm.php

*/ -->

<?php
//message vars
$msg = "";
$msgClass = "";

   //check for submit
   if(filter_has_var(INPUT_POST, 'submit')){
      //get form data
      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['email']);
      $message = htmlspecialchars($_POST['message']);

      //check required fields
      if(!empty($email) && !empty($name) && !empty($message)){
         //passed
            //check email
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
               //failed
               $msg = 'Please use a valid email';
               $msgClass = 'alert-danger';
            } else {
               //passed
               //recipient email
               $toEmail = 'support@chasesinghofen.com';
               $subject = 'Contact Request from ' .$name;
               $body = '<h2>Contact request</h2>
                        <h4>Name</h4><p>'.$name.'</p>
                        <h4>Name</h4><p>'.$email.'</p>
                        <h4>Name</h4><p>'.$message.'</p>';

                        //email headers
                        $headers = "MIME-Version: 1.0" . "\r\n";   
                        $headers .="Contect-Type:text/html;charset=UTF-8" . "\r\n";
                        
                        //additional headers
                        $headers .= "From: " .$name. "<".$email.">". "r\n\"";

                        if(mail($toEmail, $subject, $body, $headers)){
                           //email sent
                           $msg = 'your email has been sent';
                           $msgClass = 'alert-success';

                        } else {
                           //failed
                           $msg = 'your email was not sent';
                           $msgClass = 'alert-danger';

                        }
                     }
      } else {
         //failed
         $msg = 'Please fill all fields';
         $msgClass = 'alert-danger';
      }

   }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">    
          <a class="navbar-brand" href="contactForm.php">My Website</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <?php if($msg !=''): ?>
         <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>

      <?php endif; ?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
   <div class="form-group">
      <label for="">Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
   </div>

   <div class="form-group">
   <label for="">Email</label>
   <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
   </div>
   <div class="form-group">
      <label for="">Message</label>
      <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
   </div>

   <br>

   <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>