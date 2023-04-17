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
                         <li class="breadcrumb-item"><a href="user_student.php">Students</a></li>
                         <li class="breadcrumb-item active">Student Approval</li>
                    </ol>
               </nav>
          </div>

     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-between align-items-center">
                              <h5 class="m-0 text-dark fw-semibold">Students Approval</h5>

                              <a href="user_student.php" class="btn btn-primary">
                                   Back</a>
                         </div>
                         <div class="card-body">
                              <div class="table-responsive mt-3">
                                   <table id="myDataTable" class="table table-bordered table-striped table-sm">
                                        <thead>
                                             <tr>
                                                  <th>Student ID</th>
                                                  <th>Full Name</th>
                                                  <th>Student No</th>
                                                  <th>Course</th>
                                                  <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $query = "SELECT * FROM user WHERE status = 'pending' ORDER BY user_id ASC";
                                             $query_run = mysqli_query($con, $query);
                                             
                                             if(mysqli_num_rows($query_run))
                                             {
                                                  foreach($query_run as $user)
                                                  {
                                                       ?>
                                             <tr>

                                                  <td>
                                                       <center>
                                                            <?php if($user['student_id_img'] != ""): ?>
                                                            <img src="../uploads/student_id/<?php echo $user['student_id_img']; ?>"
                                                                 alt="" width="200px" height="250px">
                                                            <?php else: ?>
                                                            <img src="uploads/books_img/book_image.jpg" alt=""
                                                                 width="200px" height="250px">
                                                            <?php endif; ?>
                                                       </center>
                                                  </td>

                                                  <td>
                                                       <?=$user['firstname'].' '.$user['middlename'].' '.$user['lastname']?>
                                                  </td>
                                                  <td><?=$user['student_id_no'];?></td>
                                                  <td><?=$user['course'];?></td>




                                                  <td class=" justify-content-center">
                                                       <form action="user_student_code.php" method="POST">
                                                            <input type="hidden" name="user_id"
                                                                 value="<?= $user['user_id']; ?>">
                                                            <input type="submit" name="approved" value="Approve"
                                                                 class="btn btn-success">
                                                            <input type="submit" name="deny" value="Deny"
                                                                 class="btn btn-danger">
                                                       </form>
                                                  </td>
                                             </tr>

                                             <?php
                                                  }
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