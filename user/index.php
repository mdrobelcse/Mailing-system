<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
<?php include 'inc/sidebar.php'; ?>
<?php
     // if (isset($_GET['deluserid'])) {

     //      $deluserid = $_GET['deluserid'];
     //      $Deleteuserbyid = $al->deleteuserbyid($deluserid);
     // }
?>
    <!--main content-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <!-- <h1 style="text-align: center;">Md:Robel ahammed Wellcome to mail system</h1> -->
          <?php         
             // if (isset($Deleteuserbyid)) {
             //     echo $Deleteuserbyid;
             // }

             // echo "<span class='alert alert-success'>".Session::get('msg')."</span>";
              echo "<span style='color:green;font-size:16px;font-weight:bold;'>".Session::get('msg')."</span>";
              Session::set('msg',NULL);
          ?>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              
            </div>
          </div>
        </div>
      </div> -->

      <h1 style="text-align: center;">Hi <?php echo Session::get('name');?>  Wellcome to mail system</h1>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
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