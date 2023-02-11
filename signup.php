<?php 
session_start();

if(isset($_SESSION['auth']))
{
  $_SESSION['message_error'] = "You are already logged in";
  header("Location: index.php");
  exit(0);
}

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

<!-- Custom CSS links -->
<link rel="stylesheet" href="assets/css/signup.css">


<body>

     <div class="container">
          <header>
               <h5>SIGN<span>UP</span></h5>
          </header>
          <!-- Multi Step Form start -->
          <div class="progress-bar">
               <div class="step">
                    <p>Personal</p>
                    <div class="bullet">
                         <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
               </div>
               <div class="step hide">
                    <p>Birth</p>
                    <div class="bullet">
                         <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
               </div>
               <div class="step">
                    <p>Contact</p>
                    <div class="bullet">
                         <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
               </div>
               <div class="step hide">
                    <p>Contact</p>
                    <div class="bullet">
                         <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
               </div>
               <div class="step">
                    <p>Accounts</p>
                    <div class="bullet">
                         <span>5</span>
                    </div>
                    <div class="check fas fa-check"></div>
               </div>
          </div>


          <!-- Multi Step Form end -->
          <div class="form-outer">
               <form action="./signupcode.php" method="POST">
                    <!-- First Slide Page start-->
                    <div class="page slide-page">
                         <div class="title">Personal Details:</div>

                         <div class="field">
                              <div class="label">Lastname</div>
                              <input type="text" name="lastname" />
                         </div>

                         <div class="field">
                              <div class="label">Firstname</div>
                              <input type="text" name="firstname" />
                         </div>

                         <div class="field">
                              <div class="label">Middlename</div>
                              <input type="text" name="middlename" />
                         </div>

                         <div class="field option">
                              <button class="firstNext next">Next</button>
                              <p>Already have an account? <a href="login.php">Login</a></p>
                         </div>
                    </div>
                    <!-- First Slide Page end-->

                    <!-- Second Slide Page start-->
                    <div class="page">
                         <div class="field">
                              <div class="label">Nickname</div>
                              <input type="text" name="nickname" />
                         </div>

                         <div class="field">
                              <div class="label" for="gender">Gender</div>
                              <select name="gender" id="gender">
                                   <option value="">--Select Gender--</option>
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                              </select>
                         </div>

                         <div class="field">
                              <div class="label">Birthdate</div>
                              <input type="date" name="birthdate" />
                         </div>

                         <div class="field">
                              <div class="label">Address</div>
                              <input type="text" name="address" />
                         </div>

                         <div class="field btns">
                              <button class="prev-1 prev">Previous</button>
                              <button class="next-1 next">Next</button>
                         </div>
                    </div>
                    <!-- Second Slide Page end-->

                    <!-- Third Slide Page start-->
                    <div class="page">

                         <div class="field">
                              <div class="label" for="course">Year Level</div>
                              <select name="year_level" id="year_level">
                                   <option value="">--Select Year Level--</option>
                                   <option value="4th year">4th year</option>
                                   <option value="3rd year">3rd year</option>
                                   <option value="2nd year">2nd year</option>
                                   <option value="1st year">1st year</option>
                              </select>
                         </div>

                         <div class="field">
                              <div class="label" for="course">Course</div>
                              <select name="course" id="course">
                                   <option value="">--Select Course--</option>
                                   <option value="BSIT">BSIT</option>
                                   <option value="BSED">BSED</option>
                                   <option value="BEED">BEED</option>
                                   <option value="BSBA">BSBA</option>
                                   <option value="BSHM">BSHM</option>
                              </select>
                         </div>

                         <div class="title">Contact Info:</div>

                         <div class="field">
                              <div class="label">Email</div>
                              <input type="email" placeholder="example@gmail.com" name="email" />
                         </div>

                         <div class="field btns">
                              <button class="prev-2 prev">Previous</button>
                              <button class="next-2 next">Next</button>
                         </div>
                    </div>
                    <!-- Third Slide Page end-->

                    <!-- Fourth Slide Page start-->
                    <div class="page">
                         <div class="title hides">Contact Info</div>


                         <div class="field">
                              <div class="label">Cellphone No.</div>
                              <input onkeydown="phoneFormatNumber()" name="cell_no" class="format_number"
                                   placeholder="639xxxxxxxxx" />
                         </div>

                         <div class="field">
                              <div class="label">Contact Person</div>
                              <input type="text" name="contact_person" />
                         </div>

                         <div class="field">
                              <div class="label">Contact Person No.</div>
                              <input onkeydown="phoneFormatNumbers()" name="contact_person_no" class="format_numbers"
                                   placeholder="639xxxxxxxxx" />
                         </div>

                         <div class="field btns">
                              <button class="prev-3 prev">Previous</button>
                              <button class="next-3 next">Next</button>
                         </div>
                    </div>
                    <!-- Fourth Slide Page end-->

                    <!-- Fifth Slide Page start-->
                    <div class="page">
                         <div class="title">Login Details:</div>



                         <div class="field">
                              <div class="label">Student ID No.</div>
                              <input type="text" name="student_id_no" />
                         </div>

                         <div class="field">
                              <div class="label">Password</div>
                              <input type="password" name="password" />
                         </div>

                         <div class="field">
                              <div class="label">Confirm Password</div>
                              <input type="password" name="cpassword" />
                         </div>

                         <div class="field btns">
                              <button class="prev-4 prev">Previous</button>
                              <button type="submit" class="submit" name="register_btn">Submit</button>
                         </div>
                    </div>
                    <!-- Fifth Slide Page end-->
               </form>
          </div>
     </div>

     <!-- Format Number  -->
     <script src="assets/js/format_number.js"></script>

     <!-- Font Awesome Link -->
     <script src="assets/js/kit.fontawesome.js"></script>

     <!-- Alertify JS link -->
     <script src="assets/js/alertify.min.js"></script>

     <!-- Custom JS link -->
     <script src="assets/js/script.js"></script>


     <?php include('message.php'); ?>
</body>

</html>