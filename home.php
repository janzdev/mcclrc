<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="jumbotron h-50">
     <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
               <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
               <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
               <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
               <div class="carousel-item active" data-bs-interval="10000">
                    <img src="assets/img/mcc-front.jpg" class="d-block w-100 h-80" alt="...">
                    <!-- <div class="carousel-caption d-none d-md-block">
                         <h5>First slide label</h5>
                         <p>Some representative placeholder content for the first slide.</p>
                    </div> -->
               </div>
               <!-- <div class="carousel-item" data-bs-interval="2000">
                    <img src="" class="d-block w-100 h-50" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                         <h5>Second slide label</h5>
                         <p>Some representative placeholder content for the second slide.</p>
                    </div>
               </div>
               <div class="carousel-item">
                    <img src="" class="d-block w-100 h-10" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                         <h5>Third slide label</h5>
                         <p>Some representative placeholder content for the third slide.</p>
                    </div>
               </div> -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
               data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
               data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
          </button>
     </div>
</div>
<div class="jumbutron">

     <!-- Footer -->
     <footer class="text-center text-lg-start text-white" style="background-color: #0D4C92">

          <!-- Grid container -->
          <div class="jumbutron p-4 pb-0">
               <section class="">
                    <!--Grid row-->
                    <div class="row">
                         <!-- Grid column -->
                         <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                              <h6 class="text-uppercase text-center mb-4 fw-bold">
                                   VISION
                              </h6>
                              <p class="text-justify">
                                   The Madridejos Community College dream to mold (a) Professionally Competitive, (
                                   b)
                                   Service Oriented (c) Productive, and (d), Value- laden citizens, through quality
                                   education and integral formation, Inspired by its four-fold function of effective (e)
                                   Instruction (f) Personal Enhancement (g) Research and production it shall become a
                                   deeply rooted foundation of the town's socio- economic upliftment and a prime mover
                                   for nation building.
                              </p>
                         </div>



                         <!-- Grid column -->

                         <hr class="w-100 clearfix d-md-none" />

                         <!-- Grid column -->
                         <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                              <div class="d-flex align-items-center justify-content-center">
                                   <img src="assets/img/mcc-logo.png" alt="Mcc logo" width="150px">
                              </div>

                              <h6 class="text-uppercase text-center mt-2 mb-4 fw-semibold">
                                   Madridejos Community College
                              </h6>

                         </div>

                         <!-- Grid column -->
                         <hr class="w-100 clearfix d-md-none" />

                         <!-- Grid column -->
                         <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                              <h6 class="text-uppercase mb-4 fw-bold">Contact</h6>
                              <p><i class="fas fa-home mr-3"></i>Crossing Bunakan, Madridejos, Cebu, Philippines,
                                   6053</p>
                              <p><i class="fas fa-envelope mr-3"></i>madridejoscommunitycollege@gmail.com</p>
                              <p><i class="fas fa-phone mr-3"></i>(032) 516 0802</p>

                         </div>
                         <!-- Grid column -->
                    </div>
                    <!--Grid row-->
               </section>


               <hr class="my-3">


               <section class="p-3 pt-0">
                    <div class="row d-flex align-items-center">
                         <!-- Grid column -->
                         <div class="col-md-7 col-lg-8 text-center text-md-start">
                              <!-- Copyright -->
                              <div class="p-3">
                                   © 2022 Madridejos Community College
                              </div>

                         </div>
                         <!-- Grid column -->

                         <!-- Grid column -->
                         <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                              <!-- Facebook -->
                              <a href="https://www.facebook.com/madridejoscommunitycollege"
                                   class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                        class="bi bi-facebook"></i></a>

                              <!-- Youtube -->
                              <a href="https://www.youtube.com/watch?v=bIzChSbj0OU"
                                   class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                        class="bi bi-youtube"></i></a>

                         </div>
                         <!-- Grid column -->
                    </div>
               </section>
               <!-- Section: Copyright -->
          </div>
          <!-- Grid container -->
     </footer>
     <!-- Footer -->
</div>
<!-- End of .container -->
<!-- <footer id="footer" class="footer mt-5">
     <div class="copyright">

          <strong><span class="text-white">&copy; 2022 Madridejos Community College</span></strong>.

     </div>

</footer> -->
<?php 

include('includes/script.php');
include('message.php'); 
?>