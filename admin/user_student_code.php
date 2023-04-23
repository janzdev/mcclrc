<?php 
include('authentication.php');




// Student Deny
if(isset($_POST['deny']))
{
     $student_id = $_POST['user_id'];

     $query= "DELETE FROM user WHERE user_id = '$student_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          
          $_SESSION['message_success'] = 'Student Denied ';
          header("Location: user_student_approval.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Student not Denied';
          header("Location: user_student_approval.php");
          exit(0);
     }
}


// Student Approval
if(isset($_POST['approved']))
{
     $student_id = $_POST['user_id'];

     $query= "UPDATE user SET status = 'approved' WHERE user_id = '$student_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          
          $_SESSION['message_success'] = 'Student approved successfully';
          header("Location: user_student_approval.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Student not approved';
          header("Location: user_student_approval.php");
          exit(0);
     }
}



// Delete Action
if(isset($_POST['delete_student']))
{
     $user_id = mysqli_real_escape_string($con, $_POST['delete_student']);

     $check_img_query = "SELECT * FROM user WHERE user_id ='$user_id'";
     $img_result = mysqli_query($con, $check_img_query);
     $result_data = mysqli_fetch_array($img_result);

     $student_filename = $result_data['student_id_img'];

     $query = "DELETE FROM user WHERE user_id ='$user_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {

          if(file_exists('../uploads/student_id/'.$student_filename))
          {
               unlink("../uploads/student_id/".$student_filename);
          }

          $_SESSION['message_success'] = 'Student deleted successfully';
          header("Location: user_student.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Student not deleted';
          header("Location: user_student.php");
          exit(0);
     }
}

// Update Action
if(isset($_POST['update_student']))
{
    
     $user_id =mysqli_real_escape_string($con, $_POST['user_id']);

     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
     $gender = mysqli_real_escape_string($con, $_POST['gender']);
     $course = mysqli_real_escape_string($con, $_POST['course']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $cellphone_number = mysqli_real_escape_string($con, $_POST['cellphone_number']);
     $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $year_level = mysqli_real_escape_string($con, $_POST['year_level']);
     $student_id_no = mysqli_real_escape_string($con, $_POST['student_id_no']);
     $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
     $contact_person_no = mysqli_real_escape_string($con, $_POST['contact_person_number']);
     $username = mysqli_real_escape_string($con, $_POST['username']);

     $old_student_id_filename = $_POST['old_student_id_img'];

     $student_id_img = $_FILES['student_id_img']['name'];

     $update_student_id_filename = "";

     if($student_id_img != NULL)
     {
           // Rename the Image
           $student_id_extension = pathinfo($student_id_img, PATHINFO_EXTENSION);
           $student_id_filename = time().'.'.$student_id_extension;

           $update_student_id_filename =  $student_id_filename;
     }
     else
     {
          $update_student_id_filename = $old_student_id_filename;
     }
     

     $query = "UPDATE user SET lastname='$lastname', firstname='$firstname', middlename='$middlename', nickname='$nickname', gender='$gender', course='$course', address='$address', cell_no='$cellphone_number', birthdate='$birthdate', email='$email', year_level='$year_level', student_id_no='$student_id_no', student_id_img='$update_student_id_filename', contact_person='$contact_person', contact_person_no='$contact_person_no', username='$username' WHERE user_id = '$user_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {

          if($student_id_img != NULL)
          {
               if(file_exists('../uploads/student_id/'.$old_student_id_filename))
               {
                    unlink("../uploads/student_id/".$old_student_id_filename);
               }
          }
          move_uploaded_file($_FILES['student_id_img']['tmp_name'], '../uploads/student_id/'.$student_id_filename);

          $_SESSION['message_success'] = 'Student Updated successfully';
          header("Location: user_student.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Student not Updated';
          header("Location: user_student.php");
          exit(0);
     }
    
} 

// Add Student Action
if(isset($_POST['add_student']))
{
    
     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
     $gender = mysqli_real_escape_string($con, $_POST['gender']);
     $course = mysqli_real_escape_string($con, $_POST['course']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $cellphone_number = mysqli_real_escape_string($con, $_POST['cellphone_number']);
     $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $year_level = mysqli_real_escape_string($con, $_POST['year_level']);
     $student_id_no = mysqli_real_escape_string($con, $_POST['student_id_no']);
     $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
     $contact_person_no = mysqli_real_escape_string($con, $_POST['contact_person_number']);
     $username = mysqli_real_escape_string($con, $_POST['username']);

     $query = "INSERT INTO user (lastname, firstname, middlename, nickname, gender, course, address, cell_no, birthdate, email, year_level, student_id_no, contact_person, contact_person_no, username, user_added) VALUES ('$lastname', '$firstname', '$middlename', '$nickname', '$gender', '$course', '$address', '$cellphone_number', '$birthdate', '$email', '$year_level', '$student_id_no', '$contact_person', '$contact_person_no', '$username', NOW())";
     $query_run = mysqli_query($con, $query);

     // $phc = '/^[0-9]{10, 10}$/';
     // if(preg_match($phc, $cellphone_number))
     // {
     //      echo "Hello";
     // }
     // else
     // {
     //      echo "Good bye";
     // }

     if($query_run)
     {
          $_SESSION['message_success'] = 'Student Added successfully';
          header("Location: user_student.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Student not Added';
          header("Location: user_student.php");
          exit(0);
     }
    
}     
?>