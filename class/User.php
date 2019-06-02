<?php 
  
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../libs/Database.php'); 
   include_once ($filepath.'/../helpars/Format.php');
   include_once ($filepath.'/../libs/Session.php');
   
 ?>

<?php
    
/*
*User class
*/
  class User{

     

     private $db;
     private $fm;
     public function __construct(){

          $this->db = new Database();
          $this->fm = new Format();

   } 



//user register method gettotinbox

   public function userregister($name,$email,$password) {

          $name      = $this->fm->validation($name);
          $email     = $this->fm->validation($email);
          $password  = $this->fm->validation($password);

          $name      = mysqli_real_escape_string($this->db->link,$name);
          $email     = mysqli_real_escape_string($this->db->link,$email);
          $password  = mysqli_real_escape_string($this->db->link,md5($password));
          $passlength = var_dump($password);
          //$passlength = 6;


         if(empty($name) || empty($email) || empty($password)){

                  $registernmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Field must not be empty ! </div>";
                  return $registernmsg;

         }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $registernmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                <strong>Error!</strong> Invalid email ! </div>";
                return $registernmsg;
         }
         // elseif($password > $passlength){

         //          //3 > 6
         //          //7 > 6

         //        $registernmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
         //        <strong>Error!</strong>password should be more then 6 char </div>";
         //        return $registernmsg;

         // }
         else{


                  $query="SELECT * FROM tbl_user WHERE email='$email'";
                  $check_email=$this->db->select($query);
                  if ($check_email) {
                        $registernmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                        <strong>Error!</strong> E-mail already exist ! </div>";
                        return $registernmsg;

                  }else{


                       $query = "INSERT INTO tbl_user(name,email,password) VALUES('$name','$email','$password')";
                      $inserted_row = $this->db->insert($query);

                       // $query = "INSERT INTO tbl_user(name,email,password) VALUES('$name','$email,'$password')";
                       // $inserted_row =$this->db->insert($query);
                       if($inserted_row) {


                            
                              $query="SELECT * FROM tbl_user WHERE email='$email'";
                              $result=$this->db->select($query);
                              if($result!=false){

                                   $value =$result->fetch_assoc();
                                   Session::set("login",true);
                                   Session::set("userid",$value['userid']);
                                   Session::set("email",$value['email']);
                                   Session::set("name",$value['name']);
                                   Session::set("msg",'You have been successfully register');
                                  
                                   header("Location:index.php");
                       
                                  //  }

                                 //  else{

                                       //   $registernmsg= "<div style='font-weight:bold'; class='alert alert-success'>
                                       // <strong>Success !</strong> You have been register !</div>";
                                       //  return $registernmsg;
                                  //}

                                }

                             }

                             // else{

                             //         $registernmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                             //          <strong>Error!</strong> Something is missing</div>";
                             //          return $registernmsg;
                                  

                             // }

                  }

         }//end else

     }//end method





     //user login methos



      public function userlogin($email,$password) {

         
          $email     = $this->fm->validation($email);
          $password  = $this->fm->validation($password);

         
          $email     = mysqli_real_escape_string($this->db->link,$email);
          $password  = mysqli_real_escape_string($this->db->link,md5($password));


         if(empty($email) || empty($password)){

                  $loginnmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> Field must not be empty ! </div>";
                  return $loginnmsg;

         }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $loginnmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                <strong>Error!</strong> Invalid email ! </div>";
                return $loginnmsg;
         }else{


                  $query="SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
                  $check_emailpass=$this->db->select($query);
                  if($check_emailpass!=false){

                                   $value =$check_emailpass->fetch_assoc();
                                   Session::set("login",true);
                                   Session::set("userid",$value['userid']);
                                   Session::set("email",$value['email']);
                                   Session::set("name",$value['name']);
                                   Session::set("msg",'You are loged in');
                                  
                                   header("Location:index.php");
                        

                        }else{

                              $loginnmsg= "<div style='font-weight:bold'; class='alert alert-danger'>
                              <strong>Error!</strong> E-mail and password Not match! </div>";
                              return $loginnmsg;

                        }

                            
                  }//end else
 

     }//end method



  //send new mail


     public function sendnewmail($tomail,$fromemail,$sub,$msg, $userid){

        
           $tomail     = mysqli_real_escape_string($this->db->link,$tomail);
           $fromemail  = mysqli_real_escape_string($this->db->link,$fromemail);
           $sub        = mysqli_real_escape_string($this->db->link,$sub);
           $msg        = mysqli_real_escape_string($this->db->link,$msg);
           $userid     = mysqli_real_escape_string($this->db->link,$userid);

           if (empty($tomail) || empty($sub) || empty($msg)) {
                
                $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                <strong>Error!</strong> field must nor be empty! </div>";
                return $msg;
           }else{

                 $query = "SELECT * FROM tbl_user WHERE email='$tomail' AND email!='$fromemail'";
                 $selected_rwo = $this->db->select($query);
                 if ($selected_rwo){
                      
                           $query = "INSERT INTO tbl_message(sub,msg,tomail,fromemail) VALUES('$sub','$msg','$tomail','$fromemail')";
                            $inserted_row = $this->db->insert($query); 

                            if ($inserted_row) {
                                   $msg= "<div style='font-weight:bold'; class='alert alert-success'>
                                   <strong>Success!</strong> message sent successfully </div>";
                                   return $msg;
                            }else{


                                       $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                                       <strong>Error!</strong> message not sent! </div>";
                                       return $msg;
                  
                            }


                  }else{

                          $query = "INSERT INTO tbl_draft(userid,sub,msg) VALUES('$userid','$sub','$msg')";
                             $inserted_row = $this->db->insert($query); 
                             if ($inserted_row) {

                                 $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                                 <strong>Error!</strong> message sending fail! </div>";
                                 return $msg;
                           }

                  }

           }//end else

     }//end method


     //get all  inbox message

     public function getallinboxmsg($email){

             $query = "SELECT * FROM tbl_message WHERE tomail='$email'";
             $result = $this->db->select($query);
             return $result;
     }


     //get all draft message

     public function getalldraftmessage($userid){


             $query = "SELECT * FROM tbl_draft WHERE userid='$userid'";
             $result = $this->db->select($query);
             return $result;

     }


 //get all sent message from me

     public function getallsentmsgfromme($fromemail){


             $query = "SELECT * FROM tbl_message WHERE fromemail='$fromemail'";
             $result = $this->db->select($query);
             return $result;

     }


 // get all row for inbox

    public function gettotinbox($email){

          $query = "SELECT * FROM tbl_message WHERE tomail='$email'";
          $result = $this->db->select($query);
          //$toal = $result->num_rows;
          return $result;
    }



// get all row for sent message from me 


    public function gettalsentmsg($email){

          $query = "SELECT * FROM tbl_message WHERE fromemail='$email'";
          $result = $this->db->select($query);
          // $toal = $result->num_rows;
          return $result;
    }


//get all row for draft message 

    public function getalldraft($userid){

         $query = "SELECT * FROM tbl_draft WHERE userid='$userid'";
          $result = $this->db->select($query);
          // $toal = $result->num_rows;
          return $result;
 
    }


//get inbox message by id for view

    public function getinboxmsgforview($inboxmsgviewid){


          $query = "SELECT * FROM tbl_message WHERE msgid='$inboxmsgviewid'";
          $result = $this->db->select($query);
          return $result;

    }


  //delete inbox message 

    public function delinboxmsgbyid($delinboxmsgid){

          $query = "DELETE FROM tbl_message WHERE msgid='$delinboxmsgid'";
          $deleted_row = $this->db->delete($query);
          if ($deleted_row) {
                $msg= "<div class='alert alert-success'>
                      <strong>Success !</strong> message deleted successfully. </div>";
                return $msg;
          }
          else{

               $msg= "<div class='alert alert-danger'>
                      <strong>Error!</strong> message not deleted. !</div>";
               return $msg;

          }


    }



//get sent message for view


    public function getsentmsgforview($viewsentmsgid){


            $query = "SELECT * FROM tbl_message WHERE msgid='$viewsentmsgid'";
            $result = $this->db->select($query);
           return $result;

    }


  //delet sent message by id
  
  public function deletesentmessageid($delsentmsg){


        $query = "DELETE FROM tbl_message WHERE msgid='$delsentmsg'";
          $deleted_row = $this->db->delete($query);
          if ($deleted_row) {
                $msg= "<div class='alert alert-success'>
                      <strong>Success !</strong> message deleted successfully. </div>";
                return $msg;
          }
          else{

               $msg= "<div class='alert alert-danger'>
                      <strong>Error!</strong> message not deleted. !</div>";
               return $msg;

          }
  }  



  //get draft message for view


  public function getdraftmsgforview($viewdraftmsgid){


           $query = "SELECT * FROM tbl_draft WHERE id='$viewdraftmsgid'";
            $result = $this->db->select($query);
           return $result;

  }


 //delete draft message

  public function deletedraftmsgbyid($deldraftmsgid){


         $query = "DELETE FROM tbl_draft WHERE id='$deldraftmsgid'";
          $deleted_row = $this->db->delete($query);
          if ($deleted_row) {
                $msg= "<div class='alert alert-success'>
                      <strong>Success !</strong> draft message deleted successfully. </div>";
                return $msg;
          }
          else{

               $msg= "<div class='alert alert-danger'>
                      <strong>Error!</strong> message not deleted. !</div>";
               return $msg;

          }

  }



  //get alll system user


  public function getallsystemuser(){

        
            $query = "SELECT * FROM tbl_user  ORDER BY userid DESC";
            $result = $this->db->select($query);
            return $result;

  }


  //get user details by id

  public function getuserdetailsbyid($viewid){

            $query = "SELECT * FROM tbl_user WHERE userid='$viewid'";
            $result = $this->db->select($query);
            return $result;


  }


  //delete user by id

  public function deleteuserbyid($deluserid){


          $query = "DELETE FROM tbl_user WHERE userid='$deluserid'";
          $deleted_row = $this->db->delete($query);
          if ($deleted_row) {
                $msg= "<div class='alert alert-success'>
                      <strong>Success !</strong>  User deleted successfully. </div>";
                return $msg;
          }
          else{

               $msg= "<div class='alert alert-danger'>
                      <strong>Error!</strong> User not deleted. !</div>";
               return $msg;

          }

  }





 


 
 }
?>