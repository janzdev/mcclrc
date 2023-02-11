<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php');
?>



<main id="main" class="main">
     <div class="pagetitle d-flex justify-content-between">
          <div>
               <h1>Manage Users</h1>
               <nav>
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                         <li class="breadcrumb-item active">Students</li>
                    </ol>
               </nav>
          </div>

     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-between align-items-center">
                              <h5 class="m-0 text-dark fw-semibold">Students</h5>

                              <form action="" method="POST"></form>

                              <a href="user_student_add.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                                   Add
                                   Student</a>
                         </div>
                         <div class="card-body">
                              <div class="table-responsive mt-3">
                                   <table id="myDataTable" class="table table-bordered table-striped table-sm">
                                        <thead>
                                             <tr>
                                                  <th>Student ID</th>
                                                  <th>Full Name</th>
                                                  <th>Gender</th>
                                                  <th>Course</th>
                                                  <th>Year Level</th>
                                                  <!-- <th>Address</th>
                                                  <th>Contact No.</th>
                                                  <th>Email Adress</th> -->
                                                  <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $query = "SELECT * FROM user";
                                             $query_run = mysqli_query($con, $query);
                                             
                                             if(mysqli_num_rows($query_run))
                                             {
                                                  foreach($query_run as $user)
                                                  {
                                                       ?>
                                             <tr>
                                                  <td><?=$user['student_id_no'];?></td>
                                                  <td>
                                                       <?=$user['firstname'].' '.$user['middlename'].' '.$user['lastname']?>
                                                  </td>
                                                  <td><?=$user['gender'];?></td>
                                                  <td><?=$user['course'];?></td>
                                                  <td><?=$user['year_level'];?></td>
                                                  <!-- <td><?=$user['address'];?></td>
                                                  <td><?=$user['cell_no'];?></td>
                                                  <td><?=$user['email'];?></td> -->

                                                  <td class=" justify-content-center">
                                                       <div class="btn-group" style="background: #DFF6FF;  ">
                                                            <!-- View Student Action-->
                                                            <a href="user_student_view.php?id=<?=$user['user_id']; ?>"
                                                                 name=""
                                                                 class="viewBookBtn btn btn-sm  border text-primary"
                                                                 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                 title="View Student">
                                                                 <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <!-- Edit Student Action-->
                                                            <a href="user_student_edit.php?id=<?= $user['user_id']; ?>"
                                                                 name="update_student"
                                                                 class="btn btn-sm  border text-success"
                                                                 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                 title="Edit Student">
                                                                 <i class="bi bi-pencil-fill"></i>
                                                            </a>
                                                            <!-- Delete Student Action-->
                                                            <form action="user_student_code.php" method="POST">
                                                                 <button type="submit" name="delete_student"
                                                                      value="<?=$user['user_id'];?>"
                                                                      class="btn btn-sm  border text-danger"
                                                                      data-bs-toggle="tooltip"
                                                                      data-bs-placement="bottom" title="Delete Student">
                                                                      <i class="bi bi-trash-fill"></i>
                                                                 </button>
                                                            </form>
                                                       </div>
                                                  </td>
                                             </tr>

                                             <?php
                                                  }
                                             }
                                             else
                                             {
                                                  echo "No records found";
                                             }                                           
                                             ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="card-footer"></div>
                    </div>
               </div>
          </div>
     </section>
</main>
<?php 
include('./includes/footer.php');
include('./includes/script.php');
include('../message.php');   
?>