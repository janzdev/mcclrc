<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 
?>

<style>
.data_table {
     background: #fff;
     padding: 15px;
     /* box-shadow: 1px 3px 5px #aaa; */
     border-radius: 5px;
}

.data_table .btn {
     padding: 5px 10px;
     margin: 10px 3px 10px 0;
}
</style>
<main id="main" class="main">
     <div class="pagetitle">

          <h1>Statistic</h1>

          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Statistic</li>
               </ol>
          </nav>
     </div>

     <section class="section dashboard">
          <div class="row">
               <div class="col-lg-12">
                    <div class="row">
                         <div class="col-xxl-4 col-md-4">
                              <div class="card info-card books-card border-3 border-top border-warning">

                                   <div class="card-body">
                                        <h5 class="card-title">Books</h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-book"></i>
                                             </div>
                                             <div class="ps-3">
                                                  <?php
                                             $query = "SELECT * FROM book";
                                             $query_run = mysqli_query($con, $query); 
                                             
                                             if($total_books = mysqli_num_rows($query_run))
                                             {
                                                  
                                                  echo '<h6>'.$total_books.'</h6>';
                                             }
                                             else
                                             {
                                                  echo '<h6>0</h6>';
                                             }
                                             ?>
                                                  <span class="text-danger small pt-2 fw-bold">Total books
                                                       available</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-xxl-4 col-md-4">
                              <div class="card info-card students-card border-3 border-top border-primary">

                                   <div class="card-body">
                                        <h5 class="card-title">
                                             Students
                                        </h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-people"></i>
                                             </div>

                                             <div class="ps-3">
                                                  <?php
                                             $query = "SELECT * FROM user";
                                             $query_run = mysqli_query($con, $query); 

                                             if($total_borrowers = mysqli_num_rows($query_run))
                                             { 
                                                  echo '<h6>'.$total_borrowers.'</h6>';
                                             }
                                             else
                                             {
                                                  echo '<h6>0</h6>';
                                             }
                                                  ?>
                                                  <span class="text-primary small pt-2 fw-bold">Total borrowers</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-xxl-4 col-md-4">
                              <div class="card info-card borrowed-card  border-3 border-top border-success">

                                   <div class="card-body">
                                        <h5 class="card-title ">
                                             Book Borrowed
                                        </h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-box-arrow-up-right"></i>
                                             </div>

                                             <div class="ps-3">
                                                  <?php
                                             $query = "SELECT * FROM borrow_book WHERE borrowed_status = 'borrowed' ";
                                             $query_run = mysqli_query($con, $query); 

                                             if($total_borrowed = mysqli_num_rows($query_run))
                                             {
                                                  echo '<h6>'.$total_borrowed.'</h6>';

                                             }
                                             else
                                             {
                                                  echo '<h6>0</h6>';
                                             }
                                                  ?>
                                                  <span class="text-success small pt-2 fw-bold">Total borrowed
                                                       books</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="row">

                              <div class="col-lg-6">
                                   <div class="card">
                                        <div class="card-body">
                                             <?php
                                             $query = "SELECT course, COUNT(course) FROM  `user` GROUP BY course";
                                             $query_run = mysqli_query($con, $query); 

                                            foreach($query_run as $course)
                                            {
                                                $courses[] = $course['course'];
                                                $total_student_course[] = $course['COUNT(course)'];
                                            }
                                                  ?>
                                             <h5 class="card-title">MOST VISITED COURSE</h5>
                                             <canvas id="barChart" style="max-height: 400px;"></canvas>
                                             <script>
                                             document.addEventListener("DOMContentLoaded", () => {
                                                  new Chart(document.querySelector('#barChart'), {
                                                       type: 'bar',
                                                       data: {
                                                            labels: <?php echo json_encode($courses)?>,
                                                            datasets: [{
                                                                 label: 'Bar Chart',
                                                                 data: <?php echo json_encode($total_student_course)?>,
                                                                 backgroundColor: [
                                                                      'rgba(255, 99, 132, 0.2)',
                                                                      'rgba(255, 159, 64, 0.2)',
                                                                      'rgba(255, 205, 86, 0.2)',
                                                                      'rgba(75, 192, 192, 0.2)',
                                                                      'rgba(54, 162, 235, 0.2)',
                                                                      'rgba(153, 102, 255, 0.2)',
                                                                      'rgba(201, 203, 207, 0.2)'
                                                                 ],
                                                                 borderColor: [
                                                                      'rgb(255, 99, 132)',
                                                                      'rgb(255, 159, 64)',
                                                                      'rgb(255, 205, 86)',
                                                                      'rgb(75, 192, 192)',
                                                                      'rgb(54, 162, 235)',
                                                                      'rgb(153, 102, 255)',
                                                                      'rgb(201, 203, 207)'
                                                                 ],
                                                                 borderWidth: 1
                                                            }]
                                                       },
                                                       options: {
                                                            scales: {
                                                                 y: {
                                                                      beginAtZero: true
                                                                 }
                                                            }
                                                       }
                                                  });
                                             });
                                             </script>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="card">
                                        <div class="card-body">
                                             <?php
                                             $query = "SELECT *, COUNT(firstname) as total FROM `user_log` GROUP BY firstname ORDER BY COUNT(firstname) DESC LIMIT 5";
                                             $query_run = mysqli_query($con, $query); 

                                            foreach($query_run as $student)
                                            {
                                                $students[] = $student['firstname'].' '.$student['lastname'];
                                                $total_student_attendance[] = $student['total'];
                                            }
                                                  ?>
                                             <h5 class="card-title">MOST ATTENDANCE STUDENT</h5>
                                             <canvas id="pieChart" style="max-height: 220px;"></canvas>
                                             <script>
                                             document.addEventListener("DOMContentLoaded", () => {
                                                  new Chart(document.querySelector('#pieChart'), {
                                                       type: 'pie',
                                                       data: {
                                                            labels: <?php echo json_encode($students)?>,
                                                            datasets: [{
                                                                 label: 'My First Dataset',
                                                                 data: <?php echo json_encode($total_student_attendance)?>,
                                                                 backgroundColor: [
                                                                      'rgb(255, 99, 132)',
                                                                      'rgb(242, 146, 29)',
                                                                      'rgb(255, 205, 86)',
                                                                      'rgb(134, 200, 188)',
                                                                      'rgb(0, 129, 201)',


                                                                 ],
                                                                 hoverOffset: 4
                                                            }]
                                                       }
                                                  });
                                             });
                                             </script>
                                        </div>
                                   </div>
                              </div>

                         </div>

                         <div class="col-12">
                              <div class="card recent-sales overflow-auto  border-3 border-top border-info">

                                   <div class="card-body">
                                        <div class="row d-flex justify-content-around align-items-center mt-2">
                                             <h5 class="card-title col-12 col-md-3 px-3 text-center">
                                                  Students Attendance
                                             </h5>
                                             <form action="" method="POST" class="col-12 col-md-6 d-flex ">

                                                  <?php date_default_timezone_set('Asia/Manila'); ?>
                                                  <div class="form-group form-group-sm">
                                                       <label for=""> <small>From Date</small></label>
                                                       <input type="date" name="from_date" id="disable_date"
                                                            class="form-control form-control-sm"></input>
                                                  </div>

                                                  <div class="form-group form-group-sm mx-2">
                                                       <label for=""> <small>To Date</small></label>
                                                       <input type="date" name="to_date" id="disable_date2"
                                                            class="form-control form-control-sm"></input>
                                                  </div>
                                                  <div class="form-group form-group-sm">
                                                       <label for=""> <small>Click to Filter</small></label>
                                                       <button type="submit" name="filter_attendance"
                                                            class="btn text-white fw-semibold btn-info btn-sm d-block">Filter</button>
                                                  </div>

                                             </form>

                                        </div>

                                        <div class="container">
                                             <div class="row">
                                                  <div class="col-12">

                                                       <div class="data_table">
                                                            <table id="example"
                                                                 class="table table-striped table-bordered">
                                                                 <thead>
                                                                      <tr>
                                                                           <th>Student ID</th>
                                                                           <th>Student Name</th>
                                                                           <th>Time In</th>
                                                                           <th>Date</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>
                                                                      <?php
                                 
                                                       
                                                       if(isset($_POST['from_date']) && isset($_POST['to_date']))
                                                       {
                                                            $from_date = $_POST['from_date'];
                                                            $to_date = $_POST['to_date'];
          
                                                            $query = "SELECT * FROM user_log WHERE date_log BETWEEN '$from_date' AND '$to_date'";
                                                            $query_run = mysqli_query($con, $query);
          
                                                            if(mysqli_num_rows($query_run) > 0 )
                                                            {
                                                                 foreach($query_run as $row)
                                                                 {
                                                       ?>
                                                                      <tr>
                                                                           <?php date_default_timezone_set('Asia/Manila'); ?>
                                                                           <td><?= $row['student_id']; ?></td>
                                                                           <td><?= $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?>
                                                                           </td>
                                                                           <td><?= date("h:i:s a", strtotime($row['time_log'])); ?>
                                                                           </td>
                                                                           <td><?= date("M d, Y", strtotime($row['date_log'])); ?>
                                                                           </td>
                                                                      </tr>
                                                                      <?php      }
                                                  }
                                                  
                                             }
                                             else
                                             {
                                             
                                                  $result= mysqli_query($con,"SELECT * from user_log ORDER BY user_log_id DESC 
                                             ");
                                                  while ($row= mysqli_fetch_array ($result) ){
                                                 
                                                  ?>
                                                                      <tr>
                                                                           <?php date_default_timezone_set('Asia/Manila'); ?>
                                                                           <td><?= $row['student_id']; ?></td>
                                                                           <td><?= $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?>
                                                                           </td>
                                                                           <td><?= date("h:i:s a", strtotime($row['time_log'])); ?>
                                                                           </td>
                                                                           <td><?= date("M d, Y", strtotime($row['date_log'])); ?>
                                                                           </td>
                                                                      </tr>
                                                                      <?php } 
                                                       }
                                                 
                                                       ?>

                                                                 </tbody>
                                                            </table>
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
     </section>
</main>
<script>

</script>


<?php 
include('./includes/footer.php');
include('./includes/script.php');
include('../message.php');

    
?>