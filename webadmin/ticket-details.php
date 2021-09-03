<?php include('header.php');
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select ticket_purchase.*,users.name as username from ticket_purchase, users where users.id=ticket_purchase.user_id and  ticket_purchase.id='$id'"));
}else{
    redirect("index.php");
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
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>About Me</h3>
                    </div>
                </div>
                <div class="single-info-details">
                    <div class="item-img">
                        <img src="img/figure/teacher.jpg" alt="teacher">
                    </div>
                    <div class="item-content">
                        <div class="header-inline item-header">
                            <h3 class="text-dark-medium font-medium"><?php echo $row['username']?></h3>
                            <div class="header-elements">
                                <ul>
                                    <li><a href="#"><i class="far fa-edit"></i></a></li>
                                    <li><a href="#"><i class="fas fa-print"></i></a></li>
                                    <li><a href="#"><i class="fas fa-download"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- <p>Aliquam erat volutpat. Curabiene natis massa sedde lacu stiquen sodale 
                        word moun taiery.Aliquam erat volutpaturabiene natis massa sedde  sodale 
                        word moun taiery.</p> -->
                        <div class="info-table table-responsive">
                            <table class="table text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>Payment Status:</td>
                                        <td class="font-medium text-dark-medium"><?php echo $row['payment_status']?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment id:</td>
                                        <td class="font-medium text-dark-medium"><?php echo strtoupper($row['payment_id'])?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount:</td>
                                        <td class="font-medium text-dark-medium"><?php echo $row['amount']?> ৳</td>
                                    </tr>
                                    <tr>
                                        <td>Seats :</td>
                                        <td class="font-medium text-dark-medium">
                                            <?php
                                                $d="SELECT purchased_seat.seat_id from purchased_seat WHERE purchased_seat.ticket_id=".$row['id']." and purchased_seat.user_id='2' and purchased_seat.date='".$row['added_on']."'";
                                                $resss=mysqli_query($con,$d);
                                                if(mysqli_num_rows($resss)>0){
                                                    while($rowss=mysqli_fetch_assoc($resss)){
                                                       echo  $rowss['seat_id']."<br>";
                                                    }
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>From :</td>
                                        <td class="font-medium text-dark-medium">
                                        <?php 
                                            $fid=$row['from_station']; 
                                            $f=mysqli_fetch_assoc(mysqli_query($con,"select name from place where id=$fid"));
                                            echo $f['name'];
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>To :</td>
                                        <td class="font-medium text-dark-medium">
                                        <?php 
                                            $fid=$row['to_station']; 
                                            $f=mysqli_fetch_assoc(mysqli_query($con,"select name from place where id=$fid"));
                                            echo $f['name'];
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Added on :</td>
                                        <td class="font-medium text-dark-medium"><?php echo date("d-M-Y h:i:s" ,$row['added_on'])?></td>
                                    </tr>
                                    <tr>
                                        <td> Status:</td>
                                        <td class="font-medium text-dark-medium"><?php echo $row['status']?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status:</td>
                                        <td class="font-medium text-dark-medium"><?php echo $row['payment_status']?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Teacher Table Area End Here -->
<?php include('footer.php');?>