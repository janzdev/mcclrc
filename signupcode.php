<?php
session_start();
include('./admin/config/dbcon.php');

if(isset($_POST['register_btn']))
{
            $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
            $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
            $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
            $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
            $gender = mysqli_real_escape_string($con, $_POST['gender']);
            $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
            $address = mysqli_real_escape_string($con, $_POST['address']);
            $cell_no = mysqli_real_escape_string($con, $_POST['cell_no']);
            $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
            $contact_person_no = mysqli_real_escape_string($con, $_POST['contact_person_no']); 
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $year_level = mysqli_real_escape_string($con, $_POST['year_level']);    
            $course = mysqli_real_escape_string($con, $_POST['course']);
            $student_id_no = mysqli_real_escape_string($con, $_POST['student_id_no']);          
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
            
            if(empty($lastname) || empty($firstname) || empty($middlename) || empty($nickname) || empty($gender) || empty( $birthdate) || empty( $address) || empty($cell_no) || empty($contact_person) || empty($contact_person_no) || empty( $email) || empty($year_level) || empty($course) || empty($student_id_no) || empty($password) || empty($cpassword) )
            {
              $_SESSION['message_error'] = "Please fill up all fields";
              header("Location:signup.php");
              exit(0);
              
            }
            else
            {
     

            if($password == $cpassword)
            {
                // Check Student School ID No.
              $checkstudent_id_no ="SELECT student_id_no FROM user WHERE student_id_no ='$student_id_no'";
              $checkstudent_id_no_run = mysqli_query($con, $checkstudent_id_no);

              if(mysqli_num_rows($checkstudent_id_no_run) > 0)
                {
                  $_SESSION['message_error'] = "School ID No. Already Exist";
                  header("Location:signup.php");
                  exit(0);
                }
                else
                {
                    $student_query = "INSERT INTO user(lastname, firstname, middlename, nickname, gender, course, address, cell_no, birthdate, email, year_level, student_id_no, contact_person, contact_person_no, password, cpassword, user_added) VALUES('$lastname', '$firstname', '$middlename', '$nickname', '$gender', '$course', '$address', '$cell_no', '$birthdate', '$email', '$year_level', '$student_id_no', '$contact_person', '$contact_person_no', md5('$password'), md5('$cpassword'), NOW())";
                    $student_query_run = mysqli_query($con, $student_query);
                    
                    if($student_query_run)
                    {
                      $_SESSION['message_success'] = "Register Successfully";
                      header("Location:login.php");
                      exit(0);
                      
                    }
                    else
                    {
                      $_SESSION['message_error'] = "Something Went Wrong";
                      header("Location:signup.php");
                      exit(0);
                    }
                }
            }
            else
            {
              $_SESSION['message_error'] = "Password and Confirm Password does not match";
              header("Location:signup.php");
              exit(0);
            }

          }

        
  
}
else
{
  $_SESSION['message'] = "Please input all the fields";
  header("Location:signup.php");
  exit(0);
}



?>