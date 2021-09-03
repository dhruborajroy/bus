<?php include('header.php');
   $id="";
   $bus_id="";
   $date="";
   $note="";
   if(isset($_GET['id']) && $_GET['id']>0){
   	$id=get_safe_value($_GET['id']);
   	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from bus_availability where id='$id'"));
   	$bus_id=$row['bus_id'];
   	$date=$row['date'];	
   	$note=$row['note'];	
   }
   if(isset($_POST['submit'])){   
   	$bus_id=get_safe_value($_POST['bus_id']);
   	$date=get_safe_value($_POST['date']);
      $date=strtotime($date);
   	$note=get_safe_value($_POST['note']);
      if($id==''){
         $sql="INSERT INTO `bus_availability` ( `bus_id`, `date`, `note`, `status`) VALUES ('$bus_id', '$date', '$note', 1)";
         mysqli_query($con,$sql);   
      }else{
         mysqli_query($con,"update `bus_availability` set bus_id='$bus_id', date='$date', note='$note' where id='$id'");
      }   
      redirect('./bus-schedule.php');
   }
   ?>
<!-- Select 2 CSS -->
<link rel="stylesheet" href="css/select2.min.css">
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
         <form class="new-added-form" method="POST">
            <div class="col-lg-12">
               <div class="justify-content-center form-group">
                  <label class="control-label">Bus </label>
                  <select class="select2" name="bus_id">
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
               <input type="date" min="<?php echo date("20y")?>-<?php echo date("m")?>-<?php echo date("d")?>" max="<?php echo date("20y")?>-<?php echo date("m")?>-<?php echo date("d")+5?>" class="form-control" required="required" name="date" value="<?php echo date("20y-m-d",$date)?>" placeholder="Enter a date">
            </div>
            <div class="form-group">
               <label>note</label>
               <input type="text" class="form-control" required="required" name="note" value="<?php echo $note?>" placeholder="Enter a date">
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