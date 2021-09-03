<?php 
include("header.php");
if(!isset($_SESSION['DATE']) && $_SESSION['FROM'] && $_SESSION['TO'] && $_SESSION['SEAT']){
    redirect("index.php");
}
if(isset($_POST['submit'])){
   redirect('./ssl/checkout_hosted.php');
}
?>
<div class="container">
   <div>
      <div class="col-md-12">
         <div>
            <div class="d-none d-md-block d-md-block d-lg-block d-xl-block">
               <div class="row">
                  <div class="col-md-11">
                     <h3 class="font-weight-light">Results</h3>
                  </div>
               </div>
               <!-- <div class="row">
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
            </div> -->
            <div class="row">
            <form method="POST">
               <input type="submit" name="submit" value="submit">
            </form>
               <div class="col-12"><a href="#" class="text-warning font-weight-bold Roboto">Change&nbsp; </a><i class="fas fa-arrow-up fa-xs mt-2"></i></div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include("footer.php")?>