<?php 
  
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../libs/Database.php'); 
   include_once ($filepath.'/../helpars/Format.php');
   include_once ($filepath.'/../libs/Session.php');
   
 ?>

<?php
    
/*
*Adminlogin class
*/
  class Adminlogin{

     

     private $db;
     private $fm;
     public function __construct(){

          $this->db = new Database();
          $this->fm = new Format();

   } 


   //addd question 


   public function add_new_question($question){

        $question=mysqli_real_escape_string($this->db->link,$question);


        if(empty($question)){

                  $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Field must not be empty ! </div>";
                  return $msg;

         }
   }

     public function adminLogin($adminemail,$adminpass)
     {

          $adminemail = $this->fm->validation($adminemail);
          $adminpass  = $this->fm->validation($adminpass);

          $adminemail=mysqli_real_escape_string($this->db->link,$adminemail);
	        $adminpass =mysqli_real_escape_string($this->db->link,$adminpass);


	       if(empty($adminemail) || empty($adminpass)){

                  $loginmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> E-mail or password must not be empty ! </div>";
                  return $loginmsg;

	       }else if(!filter_var($adminemail, FILTER_VALIDATE_EMAIL)) {
              $loginmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                <strong>Error!</strong> Invalid email address ! </div>";
                return $loginmsg;
         }else{


                  $query="SELECT * FROM tbl_admin WHERE adminemail='$adminemail' AND adminpass='$adminpass'";
                  $result=$this->db->select($query);
                  if($result!=false){

                       $value =$result->fetch_assoc();
                       Session::set("login",true);
                       Session::set("adminid",$value['adminid']);
                       Session::set("role",$value['role']);
                       Session::set("adminuser",$value['adminuser']);
                      
                       header("Location:index.php");
                       
                  }else{

                        $loginmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> E-mail or password Not match !</div>";
                       return $loginmsg;
                  }


	       }

     }

// select all user from database
  public function getuserlist(){

      $query = "SELECT * FROM tbl_admin ORDER BY adminid";
      $selected_rwo = $this->db->select($query);
      return $selected_rwo;
  }
  // select all u from database
  public function getulist()
  {

      $query = "SELECT * FROM customer ";
      $selected_rwo = $this->db->select($query);
      return $selected_rwo;
  }


    //edit user

  public function edituser($usereditid){

      $query = "SELECT * FROM tbl_admin WHERE adminid='$usereditid'";
       $selected_rwo = $this->db->select($query);
       return $selected_rwo;

  }
  
  

    //update user data


  public function updateuser($adminuser, $adminemail, $role, $usereditid)
  
  {


         $adminuser  =$this->fm->validation($adminuser);
         $adminemail =$this->fm->validation($adminemail);
         $role      =$this->fm->validation($role);
        
       $adminuser =mysqli_real_escape_string($this->db->link,$adminuser);
       $adminemail=mysqli_real_escape_string($this->db->link,$adminemail);
       $role     =mysqli_real_escape_string($this->db->link,$role);

         if(empty($adminuser) || empty($adminemail) || empty($role)){

               $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                  <strong>Error!</strong> Field must not be empty. !</div>";
                return $msg;
           }else{

              $query = "UPDATE tbl_admin
                                  
                       SET 
                       adminuser='$adminuser',
                       adminemail='$adminemail',
                       role='$role'
                       WHERE adminid='$usereditid'";
                       $updated_rows = $this->db->update($query);
                                  if ($updated_rows) {
                                   $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-success'>
                                   <strong>success!</strong>User updated successfully.</div>";
                                   return $msg;
                            
                            }else {
                               $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                              <strong>Error!</strong> User not updated. !</div>";
                               return $msg;

                         }         

                 }
  

           }
               //update user data


  public function updateu($useremail,$userFname,$userLname,$userpass,$userCpass,$userDesignation,$userCat,$userID)
  {


        
           if ( empty($useremail) || empty($userFname) || empty($userLname) || empty($userpass) || empty($userCpass) || empty($userDesignation) || empty($userCat) ){ 

               $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                  <strong>Error!</strong> Field must not be empty. !</div>";
                return $msg;
           }
           else
           {

              $query = "UPDATE customer SET 
                       firstname='$userFname',
                       secondname='$userLname',
                       email='$useremail',
                       password='$userPass',
                       designation='$userDesignation',
                       category='$userCat'
                                              WHERE p_id='$userID'";
                       $updated_rows = $this->db->update($query);
                                  if ($updated_rows) 
                                  {
                                   $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-success'>
                                   <strong>success!</strong>User updated successfully.</div>";
                                   return $msg;
                            
                            }else 
                            {
                               $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                              <strong>Error!</strong> User not updated. !</div>";
                               return $msg;

                         }         

                 }
  

           }

//view user details
  public function getuserdetailsbyid($viewid)
  {

       $query = "SELECT * FROM tbl_admin WHERE adminid='$viewid'";
       $selected_rwo = $this->db->select($query);
       return $selected_rwo;

  }       
  
  //view u details
  public function getudetailsbyid($viewid)
  {

       $query = "SELECT * FROM customer WHERE p_id='$viewid'";
       $selected_rwo = $this->db->select($query);
       return $selected_rwo;

  }       


//add new users

  public function addnewuser($adminemail, $adminpass, $role){


       $query = "SELECT * FROM tbl_admin WHERE adminemail='$adminemail'";
       $selected_rwo = $this->db->select($query);
       if ($selected_rwo) {

           $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> E-mail already exists</div>";
           return $msg;
           
       }else{

              
          if (empty($adminemail) || empty($adminpass) || empty($role)) {

             $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Field must not be empty ! </div>";
             return $msg;

          }else if(!filter_var($adminemail, FILTER_VALIDATE_EMAIL)) {
              $loginmsg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                <strong>Error!</strong> Invalid email address ! </div>";
                return $loginmsg;
          }else{

                $query = "INSERT INTO tbl_admin(adminemail,adminpass,role) VALUES('$adminemail','$adminpass','$role')";
                $inserted_row = $this->db->insert($query);
                if ($inserted_row) {
                $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-success'>
                      <strong>Success  ! </strong> User added successfully. </div>";
                return $msg;

              }else{
                
                 $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                <strong>Error!</strong> User not added. ! </div>";
                return $msg;

              }

           }

       }   

  }
  //add addnewu

  public function addnewu($userEmail,$userFname,$userLname,$userpass,$userCpass,$userDesignation,$userCat)
  {
      if( $userpass != $userCpass)
      {
          $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
           <strong>Error!</strong> Password Doesn't Match </div>";
           return $msg;
          
      }
      
      
       $query = "SELECT * FROM customer WHERE email='$useremail'";
       $selected_rwo = $this->db->select($query);
       if ($selected_rwo) 
       {

           $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
           <strong>Error!</strong> E-mail already exists</div>";
           return $msg;
       }
       else
       {

              
          if ( empty($userEmail) || empty($userFname) || empty($userLname) || empty($userpass) || empty($userCpass) || empty($userDesignation) || empty($userCat) ) 
          
          {

             $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
             <strong>Error!</strong> Field must not be empty ! </div>";
             return $msg;

          }
          else if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
              $loginmsg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                <strong>Error!</strong> Invalid email address ! </div>";
                return $loginmsg;
          }
          else
          {
$query = "INSERT INTO customer(firstname,secondname,email,password,category,designation) VALUES('$userFname','$userLname','$userEmail','$userpass','$userCat','$userDesignation')";
                $inserted_row = $this->db->insert($query);
                if ($inserted_row) 
                {
                $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-success'>
                      <strong>Success  ! </strong> User added successfully. </div>";
                return $msg;

              }
              else{
                
                 $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                <strong>Error!</strong> User not added. ! </div>";
                return $msg;

              }

           }

       }   

  }


//addu ends here

//delete user by id

  public function deleteuserbyid($deluserid){

      $query = "DELETE FROM tbl_admin WHERE adminid='$deluserid'";
      $deleted_row = $this->db->delete($query);
      if ($deleted_row) {
            $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-success'>
                  <strong>success!</strong> User deleted successfully. </div>";
            return $msg;
      }else{

           $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                  <strong>Error!</strong> User not deleted. !</div>";
           return $msg;

      }

  }
  
  //delete u by id

  public function deleteubyid($deluserid)
  {

      $query = "DELETE FROM customer WHERE p_id='$deluserid'";
      $deleted_row = $this->db->delete($query);
      if ($deleted_row) {
            $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-success'>
                  <strong>Error!</strong> User deleted successfully. </div>";
            return $msg;
      }
      else{

           $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                  <strong>Error!</strong> User not deleted. !</div>";
           return $msg;

      }

  }


//getuser details by adminid
     public function getuserdetailsbysessionid($adminid){

          $query="SELECT * FROM tbl_admin WHERE adminid='$adminid'";

          //$query = "SELECT * FROM tbl_user WHERE userid='$userid'";
          $result = $this->db->select($query);
          return $result;

   }


  //update user profile

   public function updateprofile($adminuser, $adminemail, $adminpass, $adminid){

        if (empty($adminuser) || empty($adminemail) || empty($adminpass)) {

             $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
             <strong>Error!</strong> Field must not be empty ! </div>";
             return $msg;

          }else{

                $query = "UPDATE tbl_admin
                                  
                       SET 
                       adminuser='$adminuser',
                       adminemail='$adminemail',
                       adminpass='$adminpass'
                       
                       WHERE adminid='$adminid'";
                       $updated_rows = $this->db->update($query);
                                  if ($updated_rows) {
                                   $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-success'>
                                   <strong>success!</strong> Profile updated successfully.</div>";
                                   return $msg;
                            
                            }else {
                               $msg= "<div style='font-weight:bold;font-size:18px'; class='alert alert-danger'>
                              <strong>Error!</strong> Profile not updated. !</div>";
                               return $msg;

                         }
 
          }



   }


/**********************************/


public function getTotalUsers(){

          $query="SELECT * FROM tbl_abnamro";
          $result = $this->db->select($query)->fetch_assoc();
          return count($result);

  }
  
public function getTotaluploads(){

          $query="SELECT * FROM tbl_ing";
          $result = $this->db->select($query)->fetch_assoc();
          return count($result);

  }
  





 
}
?>