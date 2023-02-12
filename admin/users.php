<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main" data-aos="fade-down">
     <div class="pagetitle">
          <h1>Manage Users</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Users</li>
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
                              <div class="row">

                                   <div class="col-12 col-md-6 mt-3">
                                        <a href="user_student.php">
                                             <div
                                                  class="card bg-primary text-white p-5 d-flex flex-row justify-content-between">
                                                  <h2 class="">Students</h2>
                                                  <i class="bi bi-people-fill fs-1"></i>
                                             </div>
                                        </a>
                                   </div>

                                   <div class="col-12 col-md-6 mt-3">
                                        <a href="user_faculty.php">
                                             <div
                                                  class="card bg-primary text-white p-5 d-flex flex-row justify-content-between">
                                                  <h2>Faculty Staff</h2>
                                                  <i class="bi bi-people fs-1"></i>
                                             </div>
                                        </a>
                                   </div>

                                   <!-- Student Dashboard -->
                                   <div class="col-12 col-md-6 mt-2">

                                        <div class="row row-cols-1 row-cols-md-3 g-4">
                                             <div class="col">
                                                  <div class="card h-100  border-top border-4 border-primary">

                                                       <div class="card-body pb-0">
                                                            <h5 class="card-title  my-0 pb-0">BSIT</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM user WHERE course='BSIT'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_bsit = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_bsit.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Students</small></p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title my-0 pb-0">BSBA</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM user WHERE course='BSBA'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_bsba = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_bsba.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Students</small></p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title my-0 pb-0">BSHM</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM user WHERE course='BSHM'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_bshm = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_bshm.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Students</small></p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-md-6">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title my-0 pb-0">BSED</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM user WHERE course='BSED'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_bsed = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_bsed.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Students</small></p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-md-6">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title my-0 pb-0">BEED</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM user WHERE course='BEED'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_beed = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_beed.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Students</small></p>
                                                       </div>
                                                  </div>
                                             </div>

                                        </div>

                                   </div>
                                   <!-- Faculty Staff Dashboard -->
                                   <div class="col-12 col-md-6 mt-2">

                                        <div class="row row-cols-1 row-cols-md-3 g-4">
                                             <div class="col">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title my-0 pb-0">BSIT</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM faculty WHERE department='BSIT'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_bsit = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_bsit.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Faculty Staff</small></p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title  my-0 pb-0">BSBA</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM faculty WHERE department='BSBA'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_bsba = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_bsba.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Faculty Staff</small></p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title  my-0 pb-0">BSHM</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM faculty WHERE department='BSHM'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_bshm = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_bshm.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Faculty Staff</small></p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-md-6">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title  my-0 pb-0">BSED</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM faculty WHERE department='BSED'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_bsed = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_bsed.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Faculty Staff</small></p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-md-6">
                                                  <div class="card h-100 border-top border-4 border-primary">

                                                       <div class="card-body">
                                                            <h5 class="card-title  my-0 pb-0">BEED</h5>
                                                            <?php
                                                                 $query = "SELECT * FROM faculty WHERE department='BEED'";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_beed = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">'.$total_beed.'</p>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<p class="h4 card-text text-primary text-center pt-2">0</p>';
                                                                 }
                                                            ?>
                                                            <p class="card-text text-center"><small>Total
                                                                      Faculty Staff</small></p>
                                                       </div>
                                                  </div>
                                             </div>

                                        </div>

                                   </div>


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