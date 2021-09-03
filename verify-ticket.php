<?php include("header.php")?>
<!-- ================================
   START BREADCRUMB AREA
   ================================= -->
<section class="breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="breadcrumb-content">
               <div class="section-heading">
                  <h2 class="section__title">Verify Ticket</h2>
               </div>
            </div>
            <!-- end breadcrumb-content -->
         </div>
         <!-- end col-lg-12 -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end breadcrumb-area -->
<!-- ================================
   END BREADCRUMB AREA
   ================================= -->
<div class="row" style="padding-left: 3%;padding-top: 2%;padding-right: 3%;">
   <div class="col-lg-12">
      <div class="card-box-shared">
         <div class="card-box-shared-title">
            <h3 class="widget-title">My Courses</h3>
         </div>
         <div class="card-box-shared-body">
            <div class="card-item card-list-layout">
               <div class="col-lg-4 border">
                  <div class="col-lg-12">
                     <div class="input-box">
                        <label class="label-text">Gender<span class="text-danger ml-1">*</span></label>
                        <div class="form-group">
                           <div class="sort-ordering user-form-short">
                              <select class="sort-ordering-select" name="gender">
                                 <option value="1">Online Printed</option>
                                 <option value="2">Counter Printed</option>
                              </select>
                           </div>
                           <!-- end sort-ordering -->
                        </div>
                     </div>
                  </div>
                  <!-- end col-lg-6 -->
                  <div class="col-lg-12">
                     <div class="input-box">
                        <label class="label-text">Password  <span class="text-danger ml-1">*</span></label>
                        <div class="form-group">
                           <input class="form-control" type="password" name="password" placeholder="Email address">
                        </div>
                     </div>
                  </div>
                  <!-- end col-lg-6 -->						
                  <div class="col-lg-12">
                     <div class="input-box">
                        <label class="label-text">Password  <span class="text-danger ml-1">*</span></label>
                        <div class="form-group">
                           <div  class="input-group">
                              <div class="input-group-prepend"><span class="input-group-text">+880</span></div>
                              <input name="mobile" type="text"  maxlength="10" placeholder="Mobile" aria-describedby="mobile"  required="required" class="form-control mr-2">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end col-lg-6 -->						
                  <div class="col-lg-12">
                     <div class="btn-box">
                        <button class="theme-btn" type="submit" name="submit">Verify</button>
                     </div>
                  </div>
                  <!-- end col-lg-12 -->
               </div>
               <div class="col-lg-8 border">			   
                  <div class="col-lg-12">
                     <div class="btn-box">
                        <button class="theme-btn" type="submit" name="submit">Verify</button>
                     </div>
                  </div><!-- end col-lg-12 -->				
               </div>
            </div>
            <!-- end card-item -->
         </div>
      </div>
   </div>
   <!-- end col-lg-12 -->
</div>
<!-- end row -->
<?php include("footer.php")?>