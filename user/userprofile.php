<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
<?php include 'inc/sidebar.php'; ?>
<?php

  $adminid = Session::get("adminid");

  if($_SERVER['REQUEST_METHOD']=='POST'){

       $adminuser    = $_POST['adminuser'];
       $adminemail   = $_POST['adminemail'];
       $adminpass    = $_POST['adminpass'];
    
      
       $Updateprofile  = $al->updateprofile($adminuser, $adminemail, $adminpass, $adminid);
    
  }
?>
    <!--main content-->
    <main class="app-content">
      <div class="app-title">
         <div>
          <h1>Update Your profile</h1>
          <?php
          
              if (isset($Updateprofile)) {
                 
                 echo $Updateprofile;
              }

          ?>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form action="" method="post">
 <?php

   $Getuserdetailsbysessionid = $al->getuserdetailsbysessionid($adminid);
   if($Getuserdetailsbysessionid) {
   while ($result = $Getuserdetailsbysessionid->fetch_assoc()){
                         
 ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">User name</label>
                    <input type="text" class="form-control" name="adminuser" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['adminuser']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" class="form-control" name="adminemail" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['adminemail']; ?>">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                    <input type="Password" class="form-control" name="adminpass" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['adminpass']; ?>">
                  </div>
                    <div class="tile-footer">
                     <input class="btn btn-primary" type="submit" name="update" value="update">
                    </div>

<?php } } ?>
                </form>
              </div>
            </div>
            <!-- <div class="tile-footer">
              <button class="btn btn-primary"  type="submit">Submit</button>
             <input class="btn btn-primary" type="submit" name="submit" value="submit">
            </div> -->
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
  </body>
</html>