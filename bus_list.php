<?php 
include("header.php");
if(!isset($_SESSION['DATE']) && $_SESSION['FROM'] && $_SESSION['TO'] && $_SESSION['SEAT']){
    redirect("index.php");
}
// prx($_SESSION);
?>

<section class="blog-area padding-top-120px">
        <div class="container">
            
            <!--======================================
                START CTA AREA
        ======================================-->
        <section class="cta-area padding-top-115px padding-bottom-90px text-center">
                <div class="container">
                    <div class="row">
               <div class="row">
                  <div class="col-3 col-md-6 col-lg-6 col-xl-3">
                     <i class="fas fa-map-marker-alt text-white-50">&nbsp; From</i> 
                     <h2 class="Roboto">DHAKA</h2>
                  </div>
                  <div class="col-3 col-md-6 col-lg-6 col-xl-3">
                     <i class="fas fa-map-marker-alt text-white-50">&nbsp; To</i> 
                     <h2 class="Roboto">ABDULPUR</h2>
                  </div>
                  <div class="col-2 col-md-6 col-lg-6 col-xl-2">
                     <i class="fas fa-calendar-alt text-white-50">&nbsp; Date</i> 
                     <h2 class="Roboto">12/05/2021</h2>
                  </div>
                  <div class="col-2 col-md-6 col-lg-6 col-xl-2">
                     <i class="fas fa-subway text-white-50">&nbsp; Class</i> 
                     <h2 class="Roboto">S_CHAIR</h2>
                  </div>
                  <div class="col-1 col-md-6 col-lg-6 col-xl-1">
                     <h6 class="text-white-50">Adults</h6>
                     <h2 class="Roboto">2</h2>
                  </div>
                  <div class="col-1 col-md-6 col-lg-6 col-xl-1">
                     <h6 class="text-white-50">Child</h6>
                     <h2 class="Roboto">0</h2>
                  </div>
               </div>
                        <div class="col-lg-12 column-td-half">
                            <div class="post-card row">
                                <div class="col-lg-4 border">
                                    <div class="col-lg-12 row">
                                        <div class="input-box">
                                            <label class="label-text">Bus Name  </label>
                                            <label class="label-text"> Hino </label>
                                        </div>
                                    </div>
                                    <!-- end col-lg-6 -->	
                                    <div class="col-lg-12 row">
                                        <div class="input-box">
                                            <label class="label-text">From : </label>
                                            <label class="label-text"> <?php echo $_SESSION['FROM']?> </label>
                                        </div>
                                    </div>
                                    <!-- end col-lg-6 -->		
                                    <div class="col-lg-12 row">
                                        <div class="input-box">
                                            <label class="label-text">To : </label>
                                            <label class="label-text"> <?php echo $_SESSION['TO']?> </label>
                                        </div>
                                    </div>
                                    <!-- end col-lg-6 -->			
                                    <div class="col-lg-12 row">
                                        <div class="input-box">
                                            <label class="label-text">Date  :</label>
                                            <label class="label-text"> <?php echo date("d-m-20y",$_SESSION['DATE'])?> </label>
                                        </div>
                                    </div>
                                    <!-- end col-lg-6 -->	
                                </div>
                                <div class="col-lg-8 border">
                                    <div class="col-lg-12 row">
                                        <a href="final-submit.php?bus_id=<?php 
                                            $from=$_SESSION['FROM'];
                                            $to=$_SESSION['TO'];
                                            //echo "select `bus_id` from route where `from`=$from and `to`=$to";
                                            $f=mysqli_fetch_assoc(mysqli_query($con,"select `bus_id` from route where `from`=$from and `to`=$to"));
                                            echo $f['bus_id'];
                                        ?>" class="theme-btn">Select bus</a>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- ================================
            END CTA AREA
        ================================= -->

        </div>
    </section>
<?php include("footer.php")?>