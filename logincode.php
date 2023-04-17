<?php 
session_start();
include('./admin/config/dbcon.php');

if(isset($_POST['login_btn']))
  {
      $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
      $password = mysqli_real_escape_string($con, $_POST['password']);

      $login_query = "SELECT * FROM user WHERE student_id_no='$student_id' AND password= md5('$password')";
      $login_query_run = mysqli_query($con, $login_query);

          if(mysqli_num_rows($login_query_run) > 0)
          {
            foreach($login_query_run as $data){
              $stud_id = $data['user_id'];  
              $student_name = $data['firstname'].' '.$data['lastname'];  
              $student_email = $data['email'];
              $role_as = $data['role_as'];
              $status = $data['status'];
            } 
            
            $_SESSION['auth'] = true;
            $_SESSION['auth_role'] = "$role_as"; //1= Admin, 0 = User
            $_SESSION['auth_stud'] = [
              'stud_id'=>$stud_id,
              'stud_name'=>$student_name,
              'email'=>$student_email,
            ];
              
            
            if($_SESSION['auth_role'] == 0)  // 1 = Admin
            {

               if($status == 'approved')
              {
                $_SESSION['message_success'] = "Welcome to Web OPAC";
                header("Location:index.php");
                exit(0);
              }
              elseif($status == 'pending')
              {
                $_SESSION['message_success'] = "Your account is still pending for approval! Please wait..";
                header("Location:login.php");
                exit(0);
              }
              else{
                $_SESSION['message_success'] = "Incorrect email or password";
                header("Location:login.php");
                exit(0);
              }
              
            }
           
           
            // if($_SESSION['auth_role'] == 1)  // 1 = Admin
            // {
            //   $_SESSION['message'] = "<small>Welcome to Dashboard Admin!</small>";
            //   header("Location:admin/index.php");
            //   exit(0);
            // }
            // else if($_SESSION['auth_role'] == 0) //0 = User
            // {
            //   $_SESSION['message'] = "Welcome student!";
            //   header("Location:index.php");
            //   exit(0);
            // }
            
          }
          else
          {  
            $_SESSION['message_error'] = "<small>Invalid School ID no.  or Password</small>";
            header("Location:login.php");
            exit(0);
          }
  }
  else
  {
    $_SESSION['message_error'] = "You are not allowed to access this file";
    header("Location:login.php");
    exit(0);
  }
?>