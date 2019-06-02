<?php include 'inc/header.php'; ?>
    <!-- Sidebar menu-->
<?php include 'inc/sidebar.php'; ?>
<?php $fromemail = Session::get("email"); ?>
<?php
     if (isset($_GET['delsentmsg'])) {

          $delsentmsg = $_GET['delsentmsg'];
          $Deletesentmessageid = $user->deletesentmessageid($delsentmsg);
     }
?>
    <!--main content-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>Sent mail</h1>
          <?php         
             if (isset($Deletesentmessageid)) {
                 echo $Deletesentmessageid;
             }
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th width="10%">Sl No</th>
                    <th width="20%">Subject</th>
                    <th width="50%">Message</th>
                    <th width="20%">Action</th>
                    
                  </tr>
                </thead>
                <tbody>

              <?php

                     $Getallsentmsgfromme = $user->getallsentmsgfromme($fromemail);
                     if($Getallsentmsgfromme) {
                     $i=0;
                     while($result = $Getallsentmsgfromme->fetch_assoc()) {
                     $i++; 
                             

               ?>

               
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['sub']; ?></td>
                    <td><?php echo $fm->textShorten($result['msg'],60); ?></td>
                    
                    <td>
                    
                     
                            

                            <a href="viewsentmsg.php?viewsentmsgid=<?php echo $result['msgid']; ?>">view</a> || 
                            <a onclick="return confirm('Are you sure to delete?');" href="?delsentmsg=<?php echo $result['msgid']; ?>">delete</a>

 
                    </td>
                  </tr>


                <?php } } ?>
                  
           

                </tbody>
              </table>
            </div>
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