<?php include('header.php');
$msg="";
if(isset($_POST['submit'])){  
	$name=get_safe_value($_POST['name']);
	$mobile=get_safe_value($_POST['mobile']);
	$email=get_safe_value($_POST['email']);
   	$password=get_safe_value($_POST['password']);
   	$gender=get_safe_value($_POST['gender']);
   	$sql="select * from users where email='$email'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		$msg="<h1 class='section__title'>You are aleady registered. Please login </h1><br><span class='section-divider'></span>";
	}else{
		$_SESSION['EMAIL']=$email;
		$otp=$_SESSION['OTP']=rand(111111,999999);
		$html="Your OTP is $otp";
		//send_email($email,$html,'Your OTP');
		$sql="INSERT INTO `users` (`name`, `email`, `password`,`mobile`,`gender`, `otp`,`status`) VALUES ( '$name', '$email', '$password', '$mobile','$gender','$otp', 0)";
		mysqli_query($con,$sql);
		redirect('submit-otp.php'); 
	}
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
                    <h2 class="section__title">Fill Up this Form to Join with Us</h2>
                    <span class="section-divider"></span>
					<p><?php echo $msg?></p>                    
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
                                            <label class="label-text">Full Name<span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="name" placeholder="Full name">
                                                <span class="la la-user input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email Address<span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Email address">
                                                <span class="la la-envelope input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Password  <span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password" placeholder="Password">
                                                <span class="la la-envelope input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Phone Number<span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="tel" name="mobile" placeholder="Phone number">
                                                <span class="la la-phone input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->                                    
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Gender<span class="text-danger ml-1">*</span></label>
                                            <div class="form-group">
                                                <div class="sort-ordering user-form-short">
                                                    <select class="sort-ordering-select" name="gender">
                                                        <option value="select-a-category" selected="">Select a Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div><!-- end sort-ordering -->
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <button class="theme-btn" type="submit" name="submit">register account</button>
                                        </div>
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

<?php include('footer.php')?>
