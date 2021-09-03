<?php 
include("header.php");
if(isset($_POST['submit'])){
    $from=get_safe_value($_POST['from']);
    $to=get_safe_value($_POST['to']);
    $date=get_safe_value($_POST['date']);
    $seat=get_safe_value($_POST['seat']);
    $date=strtotime($date);
    $_SESSION['FROM']=$from;
    $_SESSION['TO']=$to;
    $_SESSION['DATE']=$date;
    $_SESSION['SEAT']=$seat;
    if(!isset($_SESSION['USER_ID'])){
        $_SESSION['MSG']="You have to login first to purchase the ticket";
        redirect('login.php');
    }else{
        redirect('checkout.php');
    }
}
?>

<section class="admission-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h5 class="section__meta">Register</h5>
                    <h2 class="section__title">Fill Up this Form to Join with Us</h2>
                    <span class="section-divider"></span>
					<p><?php// echo $msg?></p>                    
                </div>
            </div>
        </div>
        <div class="row margin-top-30px">
            <div class="col-lg-10 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">From<span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <div class="sort-ordering user-form-short">
                                                    <select class="sort-ordering-select" name="from" id="from" onchange="getFrom()" required="required">
														<option value="select-a-category">Select a station</option>
                                                        <?php
                                                            $res=mysqli_query($con,"select * from place where status='1'");
                                                            while($row=mysqli_fetch_assoc($res)){
                                                                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div><!-- end sort-ordering -->
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->                                    
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">To<span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <div class="sort-ordering user-form-short">
                                                    <select class="form-control" name="to" id="to" required="required">
                                                        <option value="select-a-category">Select a station</option>
                                                    </select>
                                                </div><!-- end sort-ordering -->
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->									
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Date<span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" min="<?php echo date("20y")?>-<?php echo date("m")?>-<?php echo date("d")?>" max="<?php echo date("20y")?>-<?php echo date("m")?>-<?php echo date("d")+5?>" type="date" name="date" placeholder="Date" id="date" required="required">
                                                <span class="la la-calendar input-icon" id="date"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->   									                                    
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Passenger(s)<span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <div class="sort-ordering user-form-short">
                                                    <select class="sort-ordering-select" name="seat" required="required">
														<option value="select-a-category">Adult</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div><!-- end sort-ordering -->
												<span>*Maximum 4 seats can be issued.</span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->	                                  
                                    <div class="col-lg-4">
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-4">
                                        <div class="btn-box center">
                                            <button class="theme-btn" type="submit" name="submit">Search Ticket</button>
                                    </div><!-- end col-lg-12 -->                                  
                                    <div class="col-lg-4">
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div><!-- end card-box-shared -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end admission-area -->
<!-- ================================
       END ADMISSION AREA
================================= -->
<script>
    function getFrom(){
				var from=jQuery('#from').val();
				// alert(from);
				jQuery.ajax({
					url:'get_details.php',
					type:'post',
					data:'from='+from,
					success:function(result){
                        jQuery('#to').html(result);
					}
				});
			}
</script>

<?php include("footer.php")?>