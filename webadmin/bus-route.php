<?php include('header.php');
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from route where id='$id'"));
	$from=$row['from'];
	$to=$row['to'];
	$price=$row['price'];
}
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from route where id='$id'");
		redirect('route.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update route set status='$status' where id='$id'");
	}

}
$sql="SELECT bus_list.name, route.* from route,bus_list where route.bus_id=bus_list.id";
$res=mysqli_query($con,$sql);
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
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>All Buses Data</h3>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">...</a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i
                                    class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i
                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i
                                    class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </div>
                <form class="mg-b-20">
                    <div class="row gutters-8">
                        <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                            <input type="text" placeholder="Search by ID ..." class="form-control" id="myInput">
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bus Name</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php 
                        if(mysqli_num_rows($res)>0){
                        $i=1;
                        while($row=mysqli_fetch_assoc($res)){
                        ?>
                           <tr role="row" class="odd">
                           <td class="sorting_1 dtr-control">
                                 <?php echo $i?>
                              </td>
                              <td class="sorting_1 dtr-control">
                                 <?php echo $fid=$row['name'];?>
                              </td>
                              <td class="sorting_1 dtr-control">
                                 <?php $fid=$row['from']; 
                                    $f=mysqli_fetch_assoc(mysqli_query($con,"select name from place where id=$fid"));
                                    echo $f['name'];
                                 ?>
                              </td>
                              <td class="sorting_1 dtr-control">
                                 <?php $tid=$row['to']; 
                                    $f=mysqli_fetch_assoc(mysqli_query($con,"select name from place where id=$tid"));
                                    echo $f['name'];
                                 ?>
                              </td>
                              <td class="sorting_1 dtr-control"><?php echo $row['price']?></td>
                              <td>
                                 <a href="manage-route.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
                                 <?php
                                 if($row['status']==1){
                                 ?>
                                 <a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger hand_cursor">Active</label></a>
                                 <?php
                                 }else{
                                 ?>
                                 <a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
                                 <?php
                                 }
                                 
                                 ?>
                                 &nbsp;
                                 <a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
                              </td>
                           </tr>
                           <?php 
                           $i++;
                           } } else { ?>
                           <tr>
                              <td colspan="5">No data found</td>
                           </tr>
                           <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Teacher Table Area End Here -->
<?php include('footer.php');?>