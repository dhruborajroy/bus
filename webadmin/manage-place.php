<?php include('header.php');
   $id="";
   $number="";
   $name="";
   if(isset($_GET['id']) && $_GET['id']>0){
   	$id=get_safe_value($_GET['id']);
   	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from place where id='$id'"));
   	$name=$row['name'];	
   }
   if(isset($_POST['submit'])){   
   	$name=get_safe_value($_POST['name']);
      if($id==''){
         $sql="INSERT INTO `place` ( `name`, `status`) VALUES ( '$name', 1);";
         mysqli_query($con,$sql);   
      }else{
         mysqli_query($con,"update `place` set name='$name' where id='$id'");
      }   
      redirect('./place.php');
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
         </div>
         <form class="custom-validation" method="POST">
            <div class="form-group">
               <label>Station</label>
               <input type="text" class="form-control" required="required" name="name" value="<?php echo $name?>" placeholder="Enter station name">
            </div>
            <div class="form-group mb-0">
               <div>
                  <input type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"> 
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Teacher Table Area End Here -->
<?php include('footer.php');?>