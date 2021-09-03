<?php include('header.php');
   $id="";
   $bus_id="";
   $name="";
   if(isset($_GET['id']) && $_GET['id']>0){
   	$id=get_safe_value($_GET['id']);
   	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from seat where id='$id'"));
   	$name=$row['name'];	
   	$bus_id=$row['bus_id'];	
   }
   if(isset($_POST['submit'])){   
   	$name=get_safe_value($_POST['name']);
   	$bus_id=get_safe_value($_POST['bus_id']);
      if($id==''){
         $sql="INSERT INTO `seat` ( `name`,`bus_id`, `status`) VALUES ('$name','$bus_id', 1)";
         mysqli_query($con,$sql);   
      }else{
         mysqli_query($con,"update `seat` set name='$name' ,bus_id='$bus_id' where id='$id'");
      }   
      redirect('./seat.php');
   }
   ?>
<!-- Page Area Start Here -->
<div class="dashboard-content-one">
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
   <h3>Parents</h3>
   <ul>
      <li>
         <a href="index.php">Home</a>
      </li>
      <li>Add New Location</li>
   </ul>
</div>
<!-- Breadcubs Area End Here -->
<!-- Teacher Table Area Start Here -->
<div class="col-4-xxxl col-12">
   <div class="card height-auto">
      <div class="card-body">
         <div class="heading-layout1">
            <div class="item-title">
               <h3>Add New Location</h3>
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
            <div class="col-lg-12">
               <div class="form-group justify-content-center">
                  <div class="lebel ">
                     <h3 class="text-success"></h3>
                  </div>
                  <label class="control-label">Bus </label>
                  <select class="form-control select2" name="bus_id">
                     <option>Select Bus</option>
                     <?php
                        $res=mysqli_query($con,"select * from bus_list where status='1'");
                        while($row=mysqli_fetch_assoc($res)){
                           if($row['id']==$bus_id){
                              echo "<option selected='selected' value=".$row['id'].">".$row['name']."</option>";
                           }else{
                              echo "<option value=".$row['id'].">".$row['name']."</option>";
                           }                                                        
                        }
                        ?>       
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label>Date</label>
               <input type="text" class="form-control" required="required" name="name" value="<?php echo $name?>" placeholder="Enter seat name">
            </div>
            <div class="form-group mb-0">
               <div>
                  <input type="submit" name="submit" class="btn btn-primary waves-effect waves-light mr-1"> 
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Teacher Table Area End Here -->
<?php include('footer.php');?>