<?php 
session_start();

// if(isset($_SESSION['auth']))
// {
//   if(!isset($_SESSION['message']))
//   {
//     $_SESSION['message_error'] = "You are already logged in";
//   }
    
//     header("Location: index.php");
//     exit(0);
  
 
// }

include('./admin/config/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="./assets/img/mcc-logo.png">
     <title>MCC Learning Resource Center</title>
</head>


<!-- Alertify JS link -->
<link rel="stylesheet" href="assets/css/alertify.min.css" />
<link rel="stylesheet" href="assets/css/alertify.bootstraptheme.min.css" />

<!-- Iconscout cdn link -->
<link rel="stylesheet" href="assets/css/line.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap5.min.css" />

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="assets/font/bootstrap-icons.css">



<!-- Custom CSS Styling -->
<link rel="stylesheet" href="assets/css/login.css">




<body>
     <section class="d-flex mt-5 flex-column  justify-content-center align-items-center">
          <div class="container-xl">
               <div class="col mx-auto rounded shadow bg-white">
                    <div class="row">
                         <div class="col-md-6 ">
                              <div class="">
                                   <img src="assets/img/mcc-logo.png" alt="logo"
                                        class="img-fluid d-none d-md-block  p-5" />
                              </div>
                         </div>
                         <div class="col-sm-12 col-md-6 px-5 ">
                              <div class="mt-5 mb-4">
                                   <h4 class="m-0">
                                        Welcome to

                                   </h4>
                                   <h1 class="m-0"><strong>MCC</strong></h1>
                                   <p class="fs-4 fw-semibold text-info">Learning Resource Center</p>

                              </div>
                              <p class="m-0">Student Login</p>
                              <form action="logincode.php" method="POST" class="needs-validation" novalidate>
                                   <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                             <input type="text" id="student_id" class="form-control" name="student_id"
                                                  placeholder="Student ID No" autocomplete="off" required>
                                             <label for="student_id">Student ID No.</label>
                                             <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                  Please enter your Student ID No.
                                             </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                             <span class="password-show-toggle js-password-show-toggle"><span
                                                       class="uil"></span></span>
                                             <input type="password" id="password" class="form-control" name="password"
                                                  placeholder="Password" required>
                                             <label for="password">Password</label>
                                             <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                  Please enter your password.
                                             </div>
                                        </div>
                                   </div>
                                   <div class="d-grid gap-2 md-3">
                                        <button type="submit" name="login_btn"
                                             class="btn btn-info text-light font-weight-bolder btn-lg">Login</button>
                                        <div class="text-center mb-3">
                                             <p>
                                                  Don't have an account?
                                                  <a href="./signup.php" class="text-info">Signup</a>
                                             </p>





                                        </div>
                                   </div>
                                   <a href="admin_login.php" class="btn btn-primary mb-3 float-end"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Login as Admin">
                                        <i class="bi bi-person-lines-fill"></i>
                                   </a>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          </div>

     </section>

     <!-- Alertify JS link -->
     <script src="assets/js/alertify.min.js"></script>

     <!-- Custom JS link -->
     <script src="assets/js/script.js"></script>


     <?php
 include('includes/script.php');
 include('message.php'); 
 ?>