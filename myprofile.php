<?php 
include('includes/header.php');
include('includes/navbar.php');
include('admin/config/dbcon.php');

if(empty($_SESSION['auth'])){
//   $_SESSION['message_error'] = "<small>Login your Credentials to Access</small>";
  header('Location: home.php');
  exit(0);
}
if($_SESSION['auth_role'] != "0")
{
  header("Location:index.php");
  exit(0);
}

if (isset($_SESSION['auth_stud']['stud_id']))
{
     $id_session=$_SESSION['auth_stud']['stud_id'];

 }

$name_session = $_SESSION['auth_stud']['stud_name']; 
?>
<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="card mt-4">
                    <div class="card-header">
                         <h4 class="text-muted">My Profile</h4>
                    </div>
                    <div class="card-body">
                         <div class="row">
                              <div class="col-xl-4">
                                   <?php
               $query = "SELECT * FROM user WHERE user_id = '$id_session'";
               $query_run = mysqli_query($con, $query);
               $row = mysqli_fetch_array($query_run);
                
               ?>
                                   <div class="card">
                                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                             <img src="../assets/admin_profile/admin.png" alt="" class="rounded-circle">

                                             <h2><?= $row['username']; ?></h2>
                                             <h3>User</h3>

                                        </div>
                                   </div>
                              </div>
                              <div class="col-xl-8">
                                   <div class="card">
                                        <div class="card-body pt-3">
                                             <ul class="nav nav-tabs nav-tabs-bordered  ">

                                                  <li class="nav-item"> <button class="nav-link active "
                                                            data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                                            Profile</button></li>

                                                  <li class="nav-item"> <button class="nav-link " data-bs-toggle="tab"
                                                            data-bs-target="#profile-change-password">Change
                                                            Password</button></li>
                                             </ul>
                                             <div class="tab-content pt-2">

                                                  <div class="tab-pane fade show active profile-edit pt-3"
                                                       id="profile-edit">
                                                       <?php
                                                      
                                             $query = "SELECT * FROM user WHERE user_id= '$id_session' ";
                                             $query_run = mysqli_query($con, $query);
                                             
                                             if(mysqli_num_rows($query_run))
                                             {
                                                  foreach($query_run as $user)
                                                  {
                                                       ?>
                                                       <form action="allcode.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <!-- <div class="row mb-3">
                                                                 <label for="profileImage"
                                                                      class="col-md-4 col-lg-3 col-form-label">Profile
                                                                      Image</label>
                                                                 <div class="col-md-8 col-lg-9">
                                                                      <img src="assets/img/profile-img.jpg"
                                                                           alt="Profile">

                                                                      <div class="pt-2">
                                                                           <input type="hidden" name="old_admin_image"
                                                                                value="<?=$user['admin_image'];?>">
                                                                           <input type="file" name="admin_image"
                                                                                class="form-control" autocomplete="off">

                                                                      </div>
                                                                 </div>
                                                            </div> -->
                                                            <div class="row mb-3">
                                                                 <label for="firstname"
                                                                      class="col-md-4 col-lg-3 col-form-label">Firtsname</label>
                                                                 <div class="col-md-8 col-lg-9"> <input name="firstname"
                                                                           type="text" class="form-control"
                                                                           id="firstname"
                                                                           value="<?=$user['firstname']?>"></div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                 <label for="middlename"
                                                                      class="col-md-4 col-lg-3 col-form-label">Middlename</label>
                                                                 <div class="col-md-8 col-lg-9"> <input
                                                                           name="middlename" type="text"
                                                                           class="form-control"
                                                                           value="<?=$user['middlename']?>">
                                                                 </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="lastname"
                                                                      class="col-md-4 col-lg-3 col-form-label">Lastname</label>
                                                                 <div class="col-md-8 col-lg-9"> <input name="lastname"
                                                                           type="text" class="form-control"
                                                                           id="lastname" value="<?=$user['lastname']?>">
                                                                 </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                 <label for="Address"
                                                                      class="col-md-4 col-lg-3 col-form-label">Address</label>
                                                                 <div class="col-md-8 col-lg-9"> <input name="address"
                                                                           type="text" class="form-control" id="Address"
                                                                           value="<?=$user['address']?>"></div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="Phone"
                                                                      class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                                 <div class="col-md-8 col-lg-9"> <input
                                                                           onkeydown="phoneFormatNumber()"
                                                                           class="form-control format_number"
                                                                           name="phone" id="Phone"
                                                                           placeholder="639xxxxxxxxx"
                                                                           value="<?=$user['cell_no']?>" required></div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="Email"
                                                                      class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                                 <div class="col-md-8 col-lg-9"> <input name="email"
                                                                           type="email" class="form-control" id="Email"
                                                                           value="<?=$user['email']?>"></div>
                                                            </div>
                                                            <?php
                                                  }
                                             }
                                             else
                                             {
                                                  echo "No records found";
                                             }                                           
                                             ?>

                                                            <div class="text-center"> <button type="submit"
                                                                      name="save_changes" class="btn btn-primary">Save
                                                                      Changes</button></div>
                                                       </form>
                                                  </div>

                                                  <div class="tab-pane fade pt-3" id="profile-change-password">
                                                       <form action="account_settings_code.php" method="POST">
                                                            <div class="row mb-3">
                                                                 <label for="currentPassword"
                                                                      class="col-md-4 col-lg-3 col-form-label">Current
                                                                      Password</label>
                                                                 <div class="col-md-8 col-lg-9"> <input
                                                                           name="current_password" type="password"
                                                                           class="form-control" id="currentPassword">
                                                                 </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="newPassword"
                                                                      class="col-md-4 col-lg-3 col-form-label">New
                                                                      Password</label>
                                                                 <div class="col-md-8 col-lg-9"> <input
                                                                           name="newpassword" type="password"
                                                                           class="form-control" id="newPassword"></div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="renewPassword"
                                                                      class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                                      New
                                                                      Password</label>
                                                                 <div class="col-md-8 col-lg-9"> <input
                                                                           name="renewpassword" type="password"
                                                                           class="form-control" id="renewPassword">
                                                                 </div>
                                                            </div>
                                                            <div class="text-center"> <button type="submit"
                                                                      name="change_password"
                                                                      class="btn btn-primary">Change Password</button>
                                                            </div>
                                                       </form>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>



                    </div>
               </div>
          </div>
     </div>
</div>
<script src="./admin/assets/js/format_number.js"></script>

<?php
include('includes/footer.php');
include('includes/script.php');
include('message.php'); 
?>