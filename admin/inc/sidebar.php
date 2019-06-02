    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img  class="app-sidebar__user-avatar  img-responsive" width="100" src="http://quiz-app.riaonlinestore.com/apps/admin/upload/Admin.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"></p>
          <p class="app-sidebar__user-designation">admin</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <!--admin section-->  
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Admin Option</span>
         <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            
            <?php
         
                  if (Session::get("role")==3) 

                    { ?>


            <li><a class="treeview-item" href="adduser.php"><i class="icon fa fa-circle-o"></i>Add New Admin</a></li>
            
             <?php } ?>

            <li><a class="treeview-item" href="userlist.php"><i class="icon fa fa-circle-o"></i>Admins List</a></li>
          </ul>
        </li>

        <!--User info section-->

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">User information</span>
         <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            
            <li><a class="treeview-item" href="allsystemuser.php"><i class="icon fa fa-circle-o"></i>All user</a></li> 
            
          </ul>
        </li>   
     

      </ul>
    </aside>