<?php  
     include_once '../class/User.php'; 
        /*$filepath = realpath(dirname(__FILE__));
         include_once ($filepath.'/../class/Adminlogin.php'); 
        */
     include_once '../libs/Session.php';
     Session::init();
    // Session::checkLogin();
    
     
?>
<?php

   include_once '../config/config.php';

?>
<?php
  
    
   $user = new User();

   if($_SERVER['REQUEST_METHOD']=='POST'){

       $name      = $_POST['name'];
       $email     = $_POST['email'];
       $password  = $_POST['password'];

       $Userregister = $user->userregister($name,$email,$password);


  }
    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register - Mail system</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Mail System</h1>
      </div>
      <div class="login-box">
        <form style="padding: 20px 30px;" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>REGISTER</h3>
          <?php
               if(isset($Userregister)){
                  echo $Userregister;
               }
           ?>
           <div class="form-group">
            <label class="control-label">Name</label>
            <input name="name" class="form-control" type="text" placeholder="Enter name" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">USER-EMAIL</label>
            <input name="email" class="form-control" type="text" placeholder="Enter email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input name="password" class="form-control" type="password" placeholder="Enter password">
          </div>
        
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" style="margin-bottom: 40px;"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
          </div>
          <p class="semibold-text mb-2">Have you already an account ? <a href="login.php">login here</a></p>
        </form>
         
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>