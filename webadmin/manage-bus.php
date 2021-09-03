<?php include('header.php');
   $id="";
   $number="";
   $name="";
   if(isset($_GET['id']) && $_GET['id']>0){
   	$id=get_safe_value($_GET['id']);
   	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from bus_list where id='$id'"));
   	$name=$row['name'];
   	$number=$row['number'];	
   }
   if(isset($_POST['submit'])){   
   	$name=get_safe_value($_POST['name']);
   	$number=get_safe_value($_POST['number']);
      if($id==''){
         $sql="INSERT INTO `bus_list` (`name`, `number`, `status`) VALUES ( '$name', '$number', 1)";
         mysqli_query($con,$sql);   
      }else{
         mysqli_query($con,"update `bus_list` set name='$name', number='$number' where id='$id'");
      }   
      redirect('./bus.php');
   }
   ?>
<!-- Page Area Start Here -->
<div class="dashboard-content-one">
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
   <h3>Parents</h3>
   <ul>
      <li>
         <a href="index-2.html">Home</a>
      </li>
      <li>All Buses</li>
   </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Teacher Table Area Start Here -->
<div class="col-4-xxxl col-12">
   <div class="card height-auto">
      <div class="card-body">
         <div class="heading-layout1">
            <div class="item-title">
               <h3>Add New Transport</h3>
            </div>
            <div class="dropdown">
               <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
               <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
               </div>
            </div>
         </div>
         <form class="custom-validation" method="POST">
            <div class="form-group">
               <label>Bus Name</label>
               <input type="text" class="form-control" required="required" name="name" value="<?php echo $name?>" placeholder="Enter bus name">
            </div>
            <div class="form-group">
               <label>Bus Number</label>
               <input type="text" class="form-control" required="required" name="number" value="<?php echo $number?>" placeholder="Enter Bus Number">
            </div>
            <div class="form-group mb-0">
               <div>
                  <input type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"> 
               </div>
            </div>
         </form>
         <!-- <form class="new-added-form">
            <div class="row">
                <div class="col-12-xxxl col-xl-4 col-sm-6 col-12 form-group">
                    <label>Route Name</label>
                    <input type="text" placeholder="" class="form-control">
                </div>
                <div class="col-12-xxxl col-xl-4 col-sm-6 col-12 form-group">
                    <label>Vehicle Number</label>
                    <input type="text" placeholder="" class="form-control">
                </div>
                <div class="col-12-xxxl col-xl-4 col-sm-6 col-12 form-group">
                    <label>Driver Name</label>
                    <input type="text" placeholder="" class="form-control">
                </div>
                <div class="col-12-xxxl col-xl-4 col-sm-6 col-12 form-group">
                    <label>License Number</label>
                    <input type="text" placeholder="" class="form-control">
                </div>
                <div class="col-12-xxxl col-xl-4 col-sm-6 col-12 form-group">
                    <label>Phone Number</label>
                    <input type="text" placeholder="" class="form-control">
                </div>
                <div class="col-12 form-group mg-t-8">
                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                </div>
            </div>
            </form> -->
      </div>
   </div>
</div>
<!-- Teacher Table Area End Here -->
<?php include('footer.php');?>