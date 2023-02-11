<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>

<main id="main" class="main">
     <div class="pagetitle">
          <h1>Edit Book</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="books.php">Book Collection</a></li>
                    <li class="breadcrumb-item active">Edit Book</li>
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
                                   $book_id = mysqli_real_escape_string($con, $_GET['id']);

                                   $query = "SELECT * FROM book LEFT JOIN category ON book.category_id = category.category_id WHERE book_id ='$book_id'"; 
                                   $query_run = mysqli_query($con, $query);

                                   if(mysqli_num_rows($query_run) > 0)
                                   {
                                       $book = mysqli_fetch_array($query_run);

                                       
                                        ?>
                              <form action="books_code.php" method="POST" enctype="multipart/form-data">



                                   <div class="row d-flex justify-content-center mt-2">

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Title</label>
                                                  <input type="text" name="title" value="<?=$book['title'];?>" class="
                                                       form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Author</label>
                                                  <input type="text" name="author" value="<?=$book['author'];?>" class="
                                                       form-control">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Copyright Date</label>
                                                  <input type="text" name="copyright_date"
                                                       value="<?=$book['copyright_date'];?>" class=" form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Publisher</label>
                                                  <input type="text" name="publisher" value="<?=$book['publisher'];?>"
                                                       class=" form-control">
                                             </div>
                                        </div>

                                   </div>
                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">ISBN</label>
                                                  <input type="text" name="isbn" value="<?=$book['isbn'];?>"
                                                       class=" form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Place of Publication</label>
                                                  <input type="text" name="place_publication"
                                                       value="<?=$book['place_publication'];?>" class=" form-control">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center ">
                                        <input type="hidden" name="book_id" value="<?=$book['book_id']?>">
                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Call Number</label>
                                                  <input onkeydown="bookCallNumberEdit()" name="call_number"
                                                       id="book_call_number_edit" value="<?=$book['call_number'];?>"
                                                       class="form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Accession Number</label>
                                                  <input type="text" name="accession_number"
                                                       value="<?=$book['accession_number'];?>" class="form-control">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Copy</label>
                                                  <input type="text" name="copy" value="<?=$book['copy'];?>" class="
                                                       form-control">
                                             </div>
                                        </div>


                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">LRC Location</label>
                                                  <select name="category" id="" class="form-control">
                                                       <option value="<?=$book['category_id']; ?>">
                                                            <?=$book['classname'];?></option>
                                                       <?php
                                       
                                                            $category = "SELECT * FROM category";
                                                            $category_run = mysqli_query($con, $category);

                                                            if(mysqli_num_rows($category_run) > 0)
                                                            {
                                                                      foreach($category_run as $row)
                                                                      {
                                                                           
                                                                           ?>
                                                       <option value="<?= $row['category_id']; ?>">
                                                            <?=$row['classname']; ?></option>
                                                       <?php
                                                                      }
                                                                      ?>

                                                       <?php
                                                            }   
                                                  
                                                  ?>
                                                  </select>
                                             </div>
                                        </div>


                                   </div>
                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Barcode</label>
                                                  <input type="text" value="<?=$book['barcode'];?>" name="barcode"
                                                       class="form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-5">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Image</label>
                                                  <input type="hidden" name="old_book_image"
                                                       value="<?=$book['book_image'];?>">
                                                  <input type="file" name="book_image" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                   </div>
                         </div>


                    </div>




               </div>
               <div class="card-footer d-flex justify-content-end">
                    <div>
                         <a href="books.php" class="btn btn-secondary">Cancel</a>
                         <button type="submit" name="update_book" class="btn btn-primary">Update Book</button>
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
include('./includes/footer.php');
include('./includes/script.php');
include('../message.php');
?>