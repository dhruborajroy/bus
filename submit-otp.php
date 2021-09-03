<?php include('header.php');
$success="";
$error="";
if(!isset($_SESSION["OTP"])){
   redirect("index.php");
}
 if(isset($_POST['submit'])){
    	$otp=get_safe_value($_POST['otp']);
		if ($_SESSION["OTP"] == $otp) {
		$success="<center>You have verified your email  successfully. <br> Please <a href='login.php'> login </a> </br></center>";
		$_SESSION['verified'] = "1";
		$email=$_SESSION['EMAIL'];
		mysqli_query($con,"update users set status=1 where email='$email'");
        unset($_SESSION['OTP']);        
        }else{
            $error="<center class='text-danger'>Please enter valid OTP</center>";
        }
    }
     if(isset($_SESSION['verified'])){
        echo "
        <style> .form_sub{
            display:none;
        }
        </style>
        ";
        unset($_SESSION['verified']);        
     }
	        
	 
?>
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="section__title">Admission</h2>
                    </div>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="index.php">home</a></li>
                        <li class="active__list-item">pages</li>
                        <li>Admission</li>
                    </ul>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START ADMISSION AREA
================================= -->
<section class="admission-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h5 class="section__meta">register</h5>
                    <h2 class="section__title">Submit Your OTP </h2>
                    <span class="section-divider"></span>
                </div>
            </div>
        </div>
        <div class="row margin-top-30px">
            <div class="col-lg-10 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form method="post">
							<center><h3><?php echo $error.$success;?></h3></center>

							<div class="form-group form_sub">
								<div class="col-sm-12">
									<input class="form-control" required name="otp" placeholder="OTP" type="text">
								</div>
							</div>
                            <div class="form-group form_sub">
								<div class="col-sm-4 ">
									<input class="btn btn-success"  name="submit"  type="submit">
								</div>
							</div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div><!-- end card-box-shared -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end admission-area -->
<!-- ================================
       START ADMISSION AREA
================================= -->

<?php include('footer.php');?>