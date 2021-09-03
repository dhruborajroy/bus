<?php include('header.php');
$msg="";
if(isset($_POST['submit'])){   
	$name=get_safe_value($_POST['name']);
   $email=get_safe_value($_POST['email']);
   $mobile=get_safe_value($_POST['mobile']);
   $comment=get_safe_value($_POST['comment']);
   //prx($_POST);
   $sql="select * from contact where comment='$comment'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
      $msg="Comment Already Added";
	}else{
        $sql="INSERT INTO `contact`( `name`, `email`, `mobile`, `comment`) VALUES ( '$name', '$email', '$mobile', '$comment')";
		mysqli_query($con,$sql);
		$msg="Thanks For contacting with us";
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
                        <h2 class="section__title">Contact us</h2>
                    </div>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="index-2.html">home</a></li>
                        <li>Contact us</li>
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
       START GOOGLE MAP
================================= -->
<div class="map-container section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d57420.158754620345!2d89.41958512565955!3d25.910261630772933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smap!5e0!3m2!1sbn!2sbd!4v1605586755429!5m2!1sbn!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- ================================
       END GOOGLE MAP
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->
<section class="contact-area padding-bottom-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-1 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="la la-map-marker"></i>
                    </div>
                    <h3 class="info__title">Our Location</h3>
                    <p class="info__text mb-0">660 broklyn street , 88 new york, United states of america</p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-2 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="la la-envelope"></i>
                    </div>
                    <h3 class="info__title">Email us</h3>
                    <p class="info__text mb-0">
                        <span class="d-block">info123@example.com</span>
                        <span class="d-block">info123@example.com</span>
                    </p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
             <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-3 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="la la-phone"></i>
                    </div>
                    <h3 class="info__title">Call us</h3>
                    <p class="info__text mb-0">
                        <span class="d-block">+163 123 7884</span>
                        <span class="d-block">+163 123 7884</span>
                    </p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="contact-form-wrap pt-5">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                        <p class="section__meta">get in touch</p>
                        <h2 class="section__title">Contact with us</h2>
                        <span class="section-divider"></span>
                        <p class="section__desc">
                            Lorem ipsum is simply free text dolor sit amett quie
                            adipiscing elit. When an unknown printer took a galley.
                            quiaies lipsum dolor sit atur adip scing
                        </p>
                        <ul class="social-profile">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-5 -->
                <div class="col-lg-7">
                    <div class="contact-form-action">
                        <form method="POST" name="contactform" >
                            <div class="col-lg-6">
                            <?php if($msg!=''){?>
                            <span class="hover-btn-new log orange"> 
                            <p class="lead text-success">
                            <?php echo $msg?>
                            <?php }?>
                            </p>
                            </div>
                                
                            <div class="row">
                            <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Your Name<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" placeholder="Your name">
                                            <span class="la la-user input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Your Email<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email" placeholder="Your email">
                                            <span class="la la-envelope input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Phone Number<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="tel" name="mobile" placeholder="Phone number">
                                            <span class="la la-phone input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Message<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <textarea class="message-control form-control" name="comment" placeholder="Write message"></textarea>
                                            <span class="la la-pencil input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <button class="theme-btn" name="submit" type="submit">Send Message</button>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form-action -->
                </div><!-- end col-md-7 -->
            </div><!-- end row -->
        </div>
    </div><!-- end container -->
</section><!-- end contact-area -->

<?php include('footer.php')?>
