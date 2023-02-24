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



<div class="container ">
     <div class="row ">
          <div class="col-12 ">
               <div class="card  mt-4 " data-aos="fade-up" style="height: 70vh">
                    <div class="card-header">

                    </div>
                    <p class="mx-2">No Notification</p>
                    <?php
$stop_date = '2009-09-30 20:24:00';
echo 'date before day adding: ' . $stop_date; 
$stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' -1 day'));
echo 'date after adding 1 day: ' . $stop_date;
?>
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
<script>
$(document).ready(function() {
     $("#live_search").keyup(function() {
          var input = $(this).val();
          // alert(input);
          if (input != "") {
               $.ajax({
                    url: "home_code.php",
                    method: "POST",
                    data: {
                         input: input
                    },

                    success: function(data) {
                         $("#searchresult").html(data);
                    }
               });
          } else {
               $("#searchresult").css("display", "none");
          }
     });
});
</script>