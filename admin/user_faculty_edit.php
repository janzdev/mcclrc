<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>Edit Faculty and Staff</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                    <li class="breadcrumb-item"><a href="user_faculty.php">Faculty</a></li>
                    <li class="breadcrumb-item active">Edit Faculty & Staff</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-end">

                         </div>
                         <div class="card-body">
                              <?php
                              if(isset($_GET['id']))
                              {
                                   $user_id = mysqli_real_escape_string($con, $_GET['id']);

                                   $query = "SELECT * FROM faculty WHERE faculty_id ='$user_id'"; 
                                   $query_run = mysqli_query($con, $query);

                                   if(mysqli_num_rows($query_run) > 0)
                                   {
                                       $user = mysqli_fetch_array($query_run);
                                        ?>
                              <form action="user_faculty_code.php" method="POST">

                                   <div class="row d-flex justify-content-center mt-2">
                                        <input type="hidden" name="faculty_id" value="<?=$user['faculty_id']?>">
                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <label for="">Lastname</label>
                                                  <input type="text" id="" name="lastname"
                                                       value="<?=$user['lastname'];?>" class="form-control " required
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <label for="">Firstname</label>
                                                  <input type="text" name="firstname" value="<?=$user['firstname'];?>"
                                                       class="form-control" autocomplete="off" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <label for="">Middlename</label>
                                                  <input type="text" name="middlename" value="<?=$user['middlename'];?>"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Nickname</label>
                                                  <input type="text" name="nickname" value="<?=$user['nickname'];?>"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Gender</label>
                                                  <select name="gender" id="" value="<?=$user['gender'];?>"
                                                       class="form-control" autocomplete="off" required>
                                                       <option value="<?=$user['gender'];?>">
                                                            <?=$user['gender'];?>
                                                       </option>
                                                       <option value="Female">Female</option>
                                                       <option value="Male">Male</option>
                                                  </select>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Birthdate</label>
                                                  <input type="date" name="birthdate" value="<?=$user['birthdate'];?>"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-6">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Address</label>
                                                  <input type="text" name="address" value="<?=$user['address'];?>"
                                                       autocomplete="off" class="form-control" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Cell No.</label>
                                                  <input onkeydown="phoneFormatNumber()" name="cellphone_number"
                                                       value="<?=$user['cell_no'];?>" autocomplete="off"
                                                       class="form-control format_number" required>
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Employee ID</label>
                                                  <input type="text" name="employee_id_no"
                                                       value="<?=$user['employee_id_no'];?>" class="form-control"
                                                       required autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Employment Status</label>
                                                  <input type="text" name="employment_status"
                                                       value="<?=$user['employment_status'];?>" class="form-control"
                                                       required autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Department</label>
                                                  <select name="dapartment" id="" value="<?=$user['department'];?>"
                                                       class="form-control" required>
                                                       <option value="<?=$user['department'];?>">
                                                            <?=$user['department'];?>
                                                       </option>
                                                       <option value="BSIT">BSIT</option>
                                                       <option value="BSED">BSED</option>
                                                       <option value="BEED">BEED</option>
                                                       <option value="BSBA">BSBA</option>
                                                       <option value="BSHM">BSHM</option>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>


                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-6">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Contact Person</label>
                                                  <input type="text" name="contact_person"
                                                       value="<?=$user['contact_person'];?>" class="form-control"
                                                       required autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Cell No.</label>
                                                  <input onkeydown="phoneFormatNumbers()" name="contact_person_number"
                                                       value="<?=$user['contact_person_no'];?>"
                                                       class="form-control format_numbers" autocomplete="off" required>
                                             </div>
                                        </div>

                                   </div>
                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-6">
                                             <div class=" input-group-sm">
                                                  <label for="">Email Address</label>
                                                  <input type="text" name="email" value="<?=$user['email'];?>"
                                                       class="form-control" autocomplete="off" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class=" input-group-sm">
                                                  <label for="">Username</label>
                                                  <input type="text" name="username" value="<?=$user['username'];?>"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>

                                   </div>
                         </div>
                         <div class="card-footer d-flex justify-content-end">
                              <div>
                                   <a href="user_faculty.php" class="btn btn-secondary">Cancel</a>
                                   <button type="submit" name="update_faculty" class="btn btn-primary">Update
                                   </button>
                              </div>
                         </div>
                         </form>
                         <div class="card-footer"></div>
                         <?php
                              }
                              else
                              {
                                   echo "No such ID found";
                              }

                         }  
                         ?>
                    </div>
               </div>
          </div>
     </section>
</main>

<?php 
include('includes/footer.php');
include('includes/script.php');
include('../message.php');
?>