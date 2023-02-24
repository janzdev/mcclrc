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
          <div class=" col-xl-12">
               <div class="card mt-2" data-aos="fade-up">
                    <div class="card-body pt-3">

                         <div class="tab-content pt-2">
                              <div class="tab-pane fade show active profile-overview" id="profile-overview">
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

                                   <div class="row mt-3">
                                        <div class="col-lg-3 col-md-3 label text-center">
                                             <?php if($hold['book_image'] != ""): ?>
                                             <img src="uploads/books_img/<?php echo $hold['book_image']?>" width="100px"
                                                  alt="">
                                             <?php else: ?>
                                             <img src="uploads/books_img/book_image.jpg" alt="">
                                             <?php endif; ?>
                                        </div>
                                        <div class="col-lg-6 col-md-6 ">
                                             <div class="">
                                                  <?=$hold['title'].' '.$hold['copyright_date'].' by '.$hold['author'];?>
                                             </div>

                                             <div class="text-muted ">
                                                  <?=date("M d, Y",strtotime($hold['hold_date']));?>
                                             </div>

                                        </div>
                                        <div class="col-lg-3 col-md-3 text-center">
                                             <form action="" method="post">
                                                  <button class="btn btn-danger my-2">
                                                       Cancel
                                                  </button>
                                             </form>

                                        </div>





                                        <?php
                              }
                    }
                    else
                    {
                         echo '<div class="col-lg-6 col-md-6">
                         <div>No Hold Books</div>
                    </div>';
                    }
                    ?>





                                   </div>


                              </div>



                         </div>


                    </div>
               </div>
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