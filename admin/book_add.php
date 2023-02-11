<?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+ 1); ?>
<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

$query = "SELECT * FROM `barcode` ORDER BY mid_barcode DESC";
$query_run = mysqli_query($con, $query);


     $fetch = mysqli_fetch_array($query_run);
     $mid_barcode = $fetch['mid_barcode'];

     $new_barcode = $mid_barcode + 1;
     $pre_barcode = "MCC";
     $suf_barcode = "LRC";
     $generate_barcode = $pre_barcode.$new_barcode.$suf_barcode;


						// $query = mysqli_query($con,"SELECT * FROM `barcode` ORDER BY mid_barcode DESC ") or die (mysqli_error());
						// $fetch = mysqli_fetch_array($query);
						// $mid_barcode = $fetch['mid_barcode'];
						
						// $new_barcode =  $mid_barcode + 1;
						// $pre_barcode = "VNHS";
						// $suf_barcode = "LMS";
						// $generate_barcode = $pre_barcode.$new_barcode.$suf_barcode;

?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>Add Book </h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="books.php">Book Collection</a></li>
                    <li class="breadcrumb-item active">Add Book</li>
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

                              <form action="books_code.php" method="POST" enctype="multipart/form-data">


                                   <div class="row d-flex justify-content-center mt-5">

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Title</label>
                                                  <input type="text" name="title" class="form-control" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Author</label>
                                                  <input type="text" name="author" class="form-control" required>
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Copyright Date</label>
                                                  <input type="text" name="copyright_date" class="form-control"
                                                       required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Publisher</label>
                                                  <input type="text" name="publisher" class="form-control" required>
                                             </div>
                                        </div>

                                   </div>
                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">ISBN</label>
                                                  <input type="text" name="isbn" class="form-control" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Place of Publication</label>
                                                  <input type="text" name="place_publication" class="form-control"
                                                       required>
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">
                                        <input type="hidden" name="new_barcode" value="<?=$new_barcode ?>">
                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Call Number</label>
                                                  <input onkeydown="studentFormatEdit()" name="call_number"
                                                       id="book_call_number" class="form-control student_number"
                                                       placeholder="" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Accession Number</label>
                                                  <input type="text" name="accession_number" class="form-control"
                                                       required>
                                             </div>
                                        </div>

                                   </div>


                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Copy</label>
                                                  <input type="number" name="copy" class="form-control" min="1"
                                                       required>
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">LRC Location</label>
                                                  <?php
                                                  $category = "SELECT * FROM category";
                                                  $category_run = mysqli_query($con, $category);

                                                  if(mysqli_num_rows($category_run) > 0)
                                                  {
                                                       ?>
                                                  <select name="" id="" class="form-control">
                                                       <option value=""></option>
                                                       <?php
                                                            foreach($category_run as $category_item)
                                                            {
                                                                 ?>
                                                       <option value="<?= $category_item['category_id'] ?>">
                                                            <?=$category_item['classname'] ?></option>
                                                       <?php
                                                            }
                                                            ?>
                                                  </select>
                                                  <?php
                                                 
                                                  }
                                                  ?>

                                             </div>
                                        </div>


                                   </div>
                                   <div class="row">
                                        <div class="col-12 col-md-1"></div>
                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <div class="d-flex justify-content-between">
                                                       <label for="">Book Image</label>
                                                       <span class=" text-muted"><small>(Optional)</small></span>
                                                  </div>
                                                  <input type="file" name="book_image" class="form-control">
                                             </div>
                                        </div>

                                   </div>


                         </div>
                         <div class="card-footer d-flex justify-content-end">
                              <div>
                                   <a href="books.php" class="btn btn-secondary">Cancel</a>
                                   <button type="submit" name="add_book" class="btn btn-primary">Add Book</button>
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
include('../message.php');
?>