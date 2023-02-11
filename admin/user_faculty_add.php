<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php'); 
?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>Add Faculty and Staff</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                    <li class="breadcrumb-item active">Add Faculty & Staff</li>
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

                              <form action="user_faculty_code.php" method="POST">

                                   <div class="row d-flex justify-content-center mt-2">

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <label for="">Lastname</label>
                                                  <input type="text" id="" name="lastname" class="form-control "
                                                       required autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <label for="">Firstname</label>
                                                  <input type="text" name="firstname" class="form-control"
                                                       autocomplete="off" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <div class="d-flex justify-content-between">
                                                       <label for="">Middlename</label>
                                                       <span class=" text-muted"><small>(Optional)</small></span>
                                                  </div>
                                                  <input type="text" name="middlename" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <div class="d-flex justify-content-between">
                                                       <label for="">Nickname</label>
                                                       <span class=" text-muted"><small>(Optional)</small></span>
                                                  </div>
                                                  <input type="text" name="nickname" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Gender</label>
                                                  <select name="gender" id="" class="form-control" autocomplete="off"
                                                       required>
                                                       <option value="">--Select Gender--</option>
                                                       <option value="Female">Female</option>
                                                       <option value="Male">Male</option>
                                                  </select>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Birthdate</label>
                                                  <input type="date" name="birthdate" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-6">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Address</label>
                                                  <input type="text" name="address" autocomplete="off"
                                                       class="form-control" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Cell No.</label>
                                                  <input onkeydown="phoneFormatNumber()" name="cellphone_number"
                                                       placeholder="639xxxxxxxxx" autocomplete="off"
                                                       class="form-control format_number" required>
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Employee ID</label>
                                                  <input type="text" name="employee_id_no" class="form-control" required
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Employment Status</label>
                                                  <input type="text" name="employment_status" class="form-control"
                                                       required autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Department</label>
                                                  <select name="dapartment" id="" class="form-control" required>
                                                       <option value="">--Select Department--</option>
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
                                                  <input type="text" name="contact_person" class="form-control" required
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Cell No.</label>
                                                  <input onkeydown="phoneFormatNumbers()" name="contact_person_number"
                                                       placeholder="639xxxxxxxxx" class="form-control format_numbers"
                                                       autocomplete="off" required>
                                             </div>
                                        </div>

                                   </div>
                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-6">
                                             <div class=" input-group-sm">
                                                  <label for="">Email Address</label>
                                                  <input type="email" name="email" class="form-control"
                                                       autocomplete="off" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class=" input-group-sm">
                                                  <label for="">Username</label>
                                                  <input type="text" name="username" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                   </div>




                         </div>
                         <div class="card-footer d-flex justify-content-end">
                              <div>
                                   <a href="user_faculty.php" class="btn btn-secondary">Cancel</a>
                                   <button type="submit" name="add_faculty" class="btn btn-primary">Add Faculty Staff</button>
                              </div>
                         </div>
                         </form>
                         <div class="card-footer"></div>

                    </div>
               </div>
          </div>
     </section>
</main>
<?php 
include('./includes/footer.php');
include('./includes/script.php');
include('message.php');
?>