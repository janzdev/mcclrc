<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main">
     <div class="pagetitle">
          <h1>Circulation</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="circulation.php">Circulation</a></li>
                    <li class="breadcrumb-item active">Faculty Staff Return Book</li>
               </ol>
          </nav>
     </div>
     <section class="section ">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header text-bg-primary">
                              <i class="bi bi-book"></i> Return Book
                         </div>
                         <div class="card-body">
                              <div class="row d-flex justify-content-center">
                                   <div class="col-12 col-md-4 mt-4">
                                        <form action="" method="GET">
                                             <div class="input-group mb-3 input-group-sm">

                                                  <!-- <span class="input-group-text bg-primary text-white"
                                                  id="basic-addon1">SEARCH ID</span> -->
                                                  <input type="text" name="employee_id_no"
                                                       value="<?php if(isset($_GET['employee_id_no'])){echo $_GET['employee_id_no'];}?>"
                                                       class="form-control" placeholder="Enter Employee ID"
                                                       aria-label="facultyname" aria-describedby="basic-addon1"
                                                       autofocus required>
                                                  <button class="input-group-text bg-primary text-white"
                                                       id="basic-addon1">Search Employee ID</button>
                                             </div>

                                             <!-- <div class="col-md-3 mt-3">
                                             <button type="submit" name="submit_borrower"
                                                  class="btn btn-primary">Submit</button>
                                        </div> -->
                                        </form>
                                   </div>

                                   <?php
                                  if(isset($_GET['employee_id_no']))
                                  {
                                   $employee_id_no = $_GET['employee_id_no'];

                                   $query = "SELECT * FROM faculty WHERE employee_id_no='$employee_id_no'";
                                   $query_run = mysqli_query($con, $query);

                                   if(mysqli_num_rows($query_run) > 0)
                                   {
                                        foreach($query_run as $row)
                                        {
                                             // echo $row['student_id_no'];
                                             $employee_id = $_GET['employee_id_no'];
                                                  echo ('<script> location.href="circulation_faculty_returning.php?employee_id='.$employee_id.'";</script');
                                             
                                        }
                                   }
                                   else
                                   {
                                        $_SESSION['message_error'] = 'No ID Found';
                                        // echo ('<script> location.href="circulation_borrow.php";</script');
                                        
                                        
                                        
                                   }
                                  }



                                       
                                   ?>



                              </div>
                         </div>
                         <div class="card-footer">


                         </div>
                    </div>
                    <div class="card">
                         <div class="card-header d-flex justify-content-between align-item-center">
                              <span class="text-dark fw-semibold">Recent Returned Books</span>

                         </div>
                         <div class="card-body">
                              <div class="table-responsive">
                                   <?php
							$return_query= mysqli_query($con,"SELECT * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN faculty ON return_book.faculty_id = faculty.faculty_id 
							where return_book.return_book_id order by return_book.return_book_id DESC");
								$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ");
							$count_penalty_row = mysqli_fetch_array($count_penalty);
							
							?>
                                   <table id="myDataTable" cellpadding="0" cellspacing="0" border="0"
                                        class="table table-striped table-bordered">


                                        <thead>
                                             <tr>
                                                  <th>Image</th>
                                                  <th>Borrower Name</th>
                                                  <th>Title</th>
                                                  <!---	<th>Author</th>
									<th>ISBN</th>	-->
                                                  <th>Date Borrowed</th>
                                                  <th>Due Date</th>
                                                  <th>Date Returned</th>
                                                  <th>Barcode</th>
                                                  <th>Penalty</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id= $return_row['return_book_id'];
?> <?php if(isset( $return_row['faculty_id'])) : ?>
                                             <tr>

                                                  <td>
                                                       <center>
                                                            <?php if($return_row['book_image'] != ""): ?>
                                                            <img src="../uploads/books_img/<?php echo $return_row['book_image']; ?>"
                                                                 alt="" width="80px" height="80px">
                                                            <?php else: ?>
                                                            <img src="../uploads/books_img/book_image.jpg" alt=""
                                                                 width="80px" height="80px">
                                                            <?php endif; ?>
                                                       </center>
                                                  </td>

                                                  <td style="text-transform: capitalize">
                                                       <?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?>
                                                  </td>

                                                  <td style="text-transform: capitalize">
                                                       <?php echo $return_row['title']; ?></td>
                                                  <!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
                                                  <td><?php echo date("M d, Y h:i:s a",strtotime($return_row['date_borrowed'])); ?>
                                                  </td>
                                                  <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px;'>".date("M d, Y h:i:s a",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:i:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>

                                                  <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px;'>".date("M d, Y h:i:s a",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:i:s a",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
                                                  <td><?php echo $return_row['barcode']; ?></td>
                                                  <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-warning' style='width:100px;'>Php ".$return_row['book_penalty'].".00</td>";
								 }else {
									 echo "<td>".$return_row['book_penalty']."</td>";
								 }
								
								?>

                                             </tr>
                                             <?php endif; ?>
                                             <?php 
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Books returned at this moment</td>
										</tr>
									</table>
								';
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

<script>
var select_box_element = document.querySelector('#select_box');

dselect(select_box_element, {
     search: true
});
</script>