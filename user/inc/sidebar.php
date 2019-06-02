    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <!-- <img  class="app-sidebar__user-avatar  img-responsive" width="100" src="http://quiz-app.riaonlinestore.com/apps/admin/upload/Admin.png" alt="User Image"> -->
        <div>
          <p class="app-sidebar__user-name"></p>
          <p class="app-sidebar__user-designation"> <?php// echo $_SESSION['adminuser']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
        <!--inbox section--> 
        <?php
           
             $email = Session::get("email");
             $numinbox = $user->gettotinbox($email);

        ?>
         <a class="app-menu__item" href="inbox.php"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">inbox<?php 


         if($numinbox){
                 $count = mysqli_num_rows($numinbox);
                 echo "(".$count.")";
               }else{
                  echo "(0)";    
               }


      ?></span>
         <i class="treeview-indicator fa fa-angle-right"></i></a> 

          
       
           
         <!--sent message section-->  
         <?php
           
             $email = Session::get("email");
             $numsentmsg = $user->gettalsentmsg($email);

        ?>
         <a class="app-menu__item" href="sent.php"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">sent<?php 

            if($numsentmsg){

                $count = mysqli_num_rows($numsentmsg);
                echo "(".$count.")";

             }else{

                   echo "(0)";
             }

         ?></span>
         <i class="treeview-indicator fa fa-angle-right"></i></a>

         <!--compose message section-->  
         <a class="app-menu__item" href="compose.php"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">compose</span>
         <i class="treeview-indicator fa fa-angle-right"></i></a>

         <!--draft message section-->  
         <?php
           
             $userid = Session::get("userid");
             $Getalldraft = $user->getalldraft($userid);

        ?>
        <a class="app-menu__item" href="draft.php"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">draft<?php


             if($Getalldraft){

                $count = mysqli_num_rows($Getalldraft);

              echo "(".$count.")"; 

          }else{ 

              echo "(0)";
          }


        ?></span>
         <i class="treeview-indicator fa fa-angle-right"></i></a>

   

            
     

      </ul>
    </aside>