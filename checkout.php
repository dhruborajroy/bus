<?php
    include("header.php");
    if(!isset($_SESSION['FROM'])){
        redirect("index.php");
        die();
    }
    $from=$_SESSION['FROM'];
    $to=$_SESSION['TO'];
    $row=mysqli_fetch_assoc(mysqli_query($con,"select price from route where `from`='$from' and `to`='$to'"));
    $price=$row['price'];
if(isset($_POST['submit'])){
    // prx($_POST);
    if($payment_gateway="sslcommerz"){
        $tran_id="bus_".uniqid();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "store_id=thedh60a231886b190
                                                &store_passwd=thedh60a231886b190@ssl
                                                &total_amount=".urlencode($_POST['final_amount'])."&currency=BDT
                                                &tran_id=".$tran_id."
                                                &success_url=http://localhost/lalc/html/bus/dashboard/success.php
                                                &fail_url=http://localhost/lalc/html/bus/dashboard/fail.php
                                                &cancel_url=http://localhost/lalc/html/bus/dashboard/cancel.php
                                                &cus_name=Customer Name
                                                &cus_email=cust@yahoo.com
                                                &cus_add1=Dhaka
                                                &cus_city=Dhaka
                                                &cus_country=Bangladesh
                                                &ship_country=Bangladesh
                                                &shipping_method=air
                                                &ship_add1=lal
                                                &product_name=dj
                                                &product_category=d
                                                &cus_phone=01711111111
                                                &ship_name=Customer Name
                                                &ship_add1 =Dhaka
                                                &ship_city=Dhaka
                                                &ship_state=Dhaka
                                                &ship_postcode=1000
                                                &product_profile=c"
                                        );
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $result=json_decode($result,TRUE);
        // echo "<pre>";
        // print_r($result);
        $sql="INSERT INTO `ticket_purchase` (`user_id`,`payment_id`,`amount`, `seat_id`, `date`, `from_station`, `to_station`, `status`, `added_on`) VALUES 
                            ('".$_SESSION['USER_ID']."',  '$tran_id', '".$_POST['final_amount']."','1', '".$_SESSION['DATE']."', '$from', '$to', '0','".time()."')";
        mysqli_query($con,$sql);
        $seats=$_POST['seat'];
        $ticket_id=mysqli_insert_id($con);
        foreach($seats as $seat){
            $sql="INSERT INTO `purchased_seat` (`ticket_id`, `seat_id`, `user_id`, `date`) VALUES ('$ticket_id', '$seat', '".$_SESSION['USER_ID']."', '".time()."')";
            mysqli_query($con,$sql);
        }
        redirect($result['GatewayPageURL']);
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
                        <h2 class="section__title">Checkout</h2>
                    </div>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="index-2.html">home</a></li>
                        <li>Checkout</li>
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
    START CHECKOUT AREA
================================= -->
<form method="POST">
<section class="checkout-area padding-top-120px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card-box-shared">
                    <div class="card-box-shared-title">
                        <h3 class="widget-title font-size-18">Billing Details</h3>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="user-form">
                            <div class="contact-form-action">
                                <form method="post">
                                    <div class="row">
                                    <?php  for($i=1;$i<=$_SESSION['SEAT'];$i++){?>
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Select Seat<span class="text-danger ml-1">*</span></label>
                                                <div class="form-group">
                                                    <div class="sort-ordering user-form-short">
                                                        <select class="sort-ordering-select" name="seat[]"  required="required">
                                                            <option value="select-a-category">Select a seat</option>
                                                            <?php
                                                                $res=mysqli_query($con,"select * from seat where status='1'");
                                                                while($row=mysqli_fetch_assoc($res)){
                                                                        echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div><!-- end sort-ordering -->
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    <?php }?>
                                    </div>
                                </form><!-- end row -->
                            </div>
                        </div>
                    </div><!-- end card-box-shared-body -->
                </div><!-- end card-box-shared -->
                <div class="order-details pt-5 pb-5">
                    <!-- <h3 class="widget-title font-size-18">Order Details</h3> -->
                    <!-- <ul class="shopping-list pt-4">
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="shopping-img">
                                <img src="images/small-img.jpg" alt="">
                            </div>
                            <div class="shopping-link">
                                <a href="course-details.html">Ultimate AWS Certified Solutions Architect Associate 2020</a>
                            </div>
                            <div class="shopping-price">
                                <span>$18.99</span>
                                <span class="before-price">$199.99</span>
                            </div>
                        </li>
                    </ul> -->
                </div>
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="card-box-shared">
                    <div class="card-box-shared-title">
                        <h3 class="widget-title font-size-18">Select Payment Method</h3>
                    </div>
                    <div class="card-box-shared-body p-0">
                        <div class="payment-method-wrap">
                            <div class="checkout-item-list">
                                <div class="accordion" id="paymentMethodExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <div class="checkout-item">
                                                <label for="sslcommerz" class="radio-trigger mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <input type="radio" value="sslcommerz" id="sslcommerz" name="payment_gateway" checked >
                                                    <span class="checkmark"></span>
                                                    <span class="widget-title font-size-16">SSlCommerz Payment Gateway</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#paymentMethodExample">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end accordion -->
                            </div>
                        </div><!-- end payment-method-wrap -->
                    </div><!-- end card-box-shared-body -->
                </div><!-- end card-box-shared -->
                <div class="card-box-shared">
                    <div class="card-box-shared-title">
                        <h3 class="widget-title font-size-18">Order Summary</h3>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="shopping-cart-content">
                            <ul class="list-items">
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Ticket price:</span>
                                    <span class="primary-color-3"><?php echo $price?></span>
                                </li>
                                <!-- <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Coupon discounts:</span>
                                    <span class="primary-color-3">-$181.99</span>
                                </li> -->
                                <li class="d-flex align-items-center justify-content-between font-size-18 font-weight-bold">
                                    <span class="primary-color">Total:</span>
                                    <span class="primary-color-3"><?php echo  $final_price=$_SESSION['SEAT']*$price;?></span>
                                    <input type="hidden" value="<?php echo  $final_price=$_SESSION['SEAT']*$price?>" class="primary-color-3" name="final_amount"> 
                                </li>
                            </ul>
                            <div class="btn-box mt-2">
                                <!-- <p class="font-size-14 mb-2 line-height-22">Aduca is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions.</p> -->
                                <p class="font-size-14 line-height-22 mb-2">By completing your purchase you agree to these <a href="#" class="primary-color-2">Terms of Service.</a></p>
                                <input type="submit" name="submit" class="theme-btn d-block text-center">
                            </div>
                        </div>
                    </div><!-- end card-box-shared-body -->
                </div><!-- end card-box-shared -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end checkout-area -->
</form>
<!-- ================================
    END CHECKOUT AREA
-->
<?php include("footer.php")?>