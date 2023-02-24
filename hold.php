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
?>



<div class="container">
     <div class=" row">
          <div class="col-12">
               <div class="card mt-4" data-aos="fade-up">
                    <div class="card-header">
                         Hold Books
                    </div>
                    <div class="card-body">
                         <ul class="list-group list-group-flush">
                              <?php

                    $name_hold = $_SESSION['auth_stud']['stud_id'];
                    $query = "SELECT * FROM hold
                    LEFT JOIN book ON hold.book_id = book.book_id
                   
                    WHERE user_id = '$name_hold' ORDER BY hold_id DESC";
                    
                    $query_run = mysqli_query($con, $query);
                    if(mysqli_num_rows($query_run) > 0 )
                    {
                              foreach($query_run as $hold)
                              {
                     
                                        ?>

                              <li class="list-group-item"> <?php if($hold['book_image'] != ""): ?>
                                   <img src="uploads/books_img/<?php echo $hold['book_image']?>" width="100px" alt="">
                                   <?php else: ?>
                                   <img src="uploads/books_img/book_image.jpg" alt="">
                                   <?php endif; ?>
                                   <?=date("M d, Y",strtotime($hold['hold_date'])).' - '.$hold['title'];;?>
                              </li>




                              <?php
                              }
                    }
                    else
                    {
                         echo '<li class="list-group-item">No Books Hold</li>';
                    }
                    ?>


                         </ul>

                    </div>

               </div>
          </div>
          <div id="searchresult" class="text-center"></div>

     </div>
</div>
</div>
</div>
</div>

</div>



<?php

include('includes/footer.php');
include('includes/script.php');
include('message.php'); 
?>