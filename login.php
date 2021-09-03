<?php include('header.php');
$msg="";
if(isset($_SESSION['USER_LOGIN'])){
    redirect('dashboard.php');
    die();
}
if(isset($_SESSION['MSG'])){
    $msg=$_SESSION['MSG'];
}
if(isset($_POST['submit'])){   
	$email=get_safe_value($_POST['email']);
   	$password=get_safe_value($_POST['password']);
   	$sql="select * from users where email='$email' and password='$password'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		if($row['status']!=1){
			$msg="You haven't verified your email yet. Please verify the email";
		}else{
			$msg="You are aleady registered. Please login";
			$_SESSION['USER_LOGIN']=true;
			$_SESSION['USER_ID']=$row['id'];
			$_SESSION['USER_NAME']=$row['name'];
            if(isset($_SESSION['MSG'])){
                redirect('./checkout.php');
                die();
            }else{
                redirect('./dashboard.php');
                die();
            }
		}		
	}else{
		$msg="Please Enter correct Login details";
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
                            <h2 class="section__title">Login</h2>
                        </div>
                        <ul class="breadcrumb__list">
                            <li ><a href="index.php">home</a></li>
                            <li class="active__list-item">Login</li>
                        </ul>
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

    <!-- ================================
       START LOGIN AREA
================================= -->
    <section class="login-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card-box-shared">
                        <div class="card-box-shared-title text-center">
                            <h3 class="widget-title font-size-25">Login to Your Account!</h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="contact-form-action">
                                <form method="post">
                                    <div class="row">
                                        <!-- end col-md-12 -->
                                        <div class="col-lg-12">
                                            <span class="text-danger"><?php echo $msg?></span>
                                            <div class="input-box">
                                                <label class="label-text">Email <span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="email" name="email" placeholder="Email " required>
                                                    <span class="la la-envelope input-icon"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-md-12 -->
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Password<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                                    <span class="la la-lock input-icon"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-md-12 -->
                                        <div class="col-lg-12 ">
                                            <div class="btn-box">
                                                <input class="theme-btn" name="submit" type="submit">
                                            </div>
                                        </div>
                                        <!-- end col-md-12 -->
                                        <div class="col-lg-12">
                                            <p class="mt-4">Don't have an account? <a href="admission.php" class="primary-color-2">Register</a></p>
                                        </div>
                                        <!-- end col-md-12 -->
                                    </div>
                                    <!-- end row -->
                                </form>
                            </div>
                            <!-- end contact-form -->
                        </div>
                    </div>
                </div>
                <!-- end col-lg-7 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end login-area -->
    <!-- ================================
       START LOGIN AREA
================================= -->
<?php include('footer.php')?>