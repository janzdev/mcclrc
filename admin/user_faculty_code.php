<?php 
include('authentication.php');




if(isset($_POST['delete_faculty']))
{
     $user_id = mysqli_real_escape_string($con, $_POST['delete_faculty']);

     $query = "DELETE FROM faculty WHERE faculty_id ='$user_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Faculty deleted successfully';
          header("Location: user_faculty.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Faculty not deleted';
          header("Location: user_faculty.php");
          exit(0);
     }
}

if(isset($_POST['update_faculty']))
{
    
     $user_id =mysqli_real_escape_string($con, $_POST['faculty_id']);

     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
     $gender = mysqli_real_escape_string($con, $_POST['gender']);
     $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $cellphone_number = mysqli_real_escape_string($con, $_POST['cellphone_number']);
     $employee_id_no = mysqli_real_escape_string($con, $_POST['employee_id_no']);
     $employment_status = mysqli_real_escape_string($con, $_POST['employment_status']);
     $department = mysqli_real_escape_string($con, $_POST['dapartment']);
     $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
     $contact_person_no = mysqli_real_escape_string($con, $_POST['contact_person_number']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $username = mysqli_real_escape_string($con, $_POST['username']);

     $query = "UPDATE faculty SET lastname='$lastname', firstname='$firstname', middlename='$middlename', nickname='$nickname', gender='$gender',  birthdate='$birthdate', address='$address', cell_no='$cellphone_number', employee_id_no='$employee_id_no', employment_status='$employment_status',department='$department', contact_person='$contact_person', contact_person_no='$contact_person_no',   email='$email', username='$username' WHERE faculty_id = '$user_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Faculty Updated successfully';
          header("Location: user_faculty.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Faculty not Updated';
          header("Location: user_faculty.php");
          exit(0);
     }
    
} 

// Add Faculty
if(isset($_POST['add_faculty']))
{
    
     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
     $gender = mysqli_real_escape_string($con, $_POST['gender']);
     $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $cellphone_number = mysqli_real_escape_string($con, $_POST['cellphone_number']);
     $employee_id_no = mysqli_real_escape_string($con, $_POST['employee_id_no']);
     $employment_status = mysqli_real_escape_string($con, $_POST['employment_status']);
     $department = mysqli_real_escape_string($con, $_POST['dapartment']);
     $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
     $contact_person_no = mysqli_real_escape_string($con, $_POST['contact_person_number']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $username = mysqli_real_escape_string($con, $_POST['username']);
     

     $query = "INSERT INTO faculty (lastname, firstname, middlename, nickname, gender, birthdate, address, cell_no, employee_id_no, employment_status, department, contact_person, contact_person_no, email, username, faculty_added) VALUES ('$lastname', '$firstname', '$middlename', '$nickname', '$gender', '$birthdate', '$address', '$cellphone_number', '$employee_id_no', '$employment_status', '$department', '$contact_person', '$contact_person_no', '$email','$username', NOW())";
     $query_run = mysqli_query($con, $query);

     
     if($query_run)
     {
          $_SESSION['message_success'] = 'Faculty Added successfully';
          header("Location: user_faculty.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Faculty not Added';
          header("Location: user_faculty.php");
          exit(0);
     }
    
}     
?>