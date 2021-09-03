<?php include("header.php")?>
<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="section__title">Shopping Cart</h2>
                    </div>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="index.php">home</a></li>
                        <li>Shopping cart</li>
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
    START CART AREA
================================= -->
<section class="cart-area padding-top-120px padding-bottom-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping-cart-wrap table-responsive">
                    <table class="table table-bordered ">
                        <thead class="cart-head">
                            <tr>
                                <td class="cart__title">Image</td>
                                <td class="cart__title">Product details</td>
                                <td class="cart__title">Price</td>
                                <td class="cart__title">Quantity</td>
                                <td class="cart__title">remove</td>
                            </tr>
                        </thead>
                        <tbody class="cart-body">
                        <tr>
                            <td><a href="course-details.html" class="d-block"><img src="images/small-img.jpg" alt="product image"></a></td>
                            <td>
                                <div class="cart-product-desc">
                                    <a href="course-details.html" class="widget-title">The Complete Financial Analyst Course 2019</a>
                                    <p>
                                        By <a href="teacher-detail.html">Mark Hardson</a>, Master Digital Marketing: Strategy, Social Media Marketing, SEO, YouTube, Email, Facebook Marketing, Analytics & More!
                                    </p>
                                </div>
                            </td>
                            <td>
                                <span class="item__price">$22.99
                                    <span class="before-price">$55.99</span>
                                </span>
                            </td>
                            <td>
                                <div class="input-number-group">
                                    <div class="input-group-button">
                                        <span class="input-number-decrement">-</span>
                                    </div>
                                    <input class="input-number" type="number" value="1" min="0" max="1000">
                                    <div class="input-group-button">
                                        <span class="input-number-increment">+</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="button-remove"><i class="fa fa-close"></i></button>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot class="cart-foot">
                            <tr>
                                <td colspan="3">
                                    <a href="course-grid.html" class="theme-btn">continue shopping</a>
                                </td>
                                <td colspan="3" class="text-right">
                                    <a href="#" class="theme-btn">update cart</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- end shopping-cart-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="cart-detail-wrap mt-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="shopping-cart-detail-item">
                        <h3 class="widget-title font-size-20">Coupon Code</h3>
                        <div class="shopping-cart-content pt-2">
                            <p class="line-height-26">
                                Etiam lacus lacus, mollis in mattis in,
                                vehicula eu nulla. Nulla nec tellus pellentesque, sollicitudin augue vitae, auctor quam.
                            </p>
                            <div class="contact-form-action pt-3">
                                <form method="post">
                                    <div class="form-group">
                                        <i class="la la-pencil input-icon"></i>
                                        <input class="form-control" type="text" name="text" placeholder="Enter Coupon code">
                                    </div><!-- end form-group -->
                                    <button type="submit" class="theme-btn theme-btn-light">Apply code</button>
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end shopping-cart-content -->
                    </div><!-- end shopping-cart-detail-item -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-4 ml-auto">
                    <div class="shopping-cart-detail-item">
                        <h3 class="widget-title font-size-20">Cart Totals</h3>
                        <div class="shopping-cart-content pt-2">
                            <ul class="list-items">
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Subtotal:</span>
                                    <span class="primary-color-3">$44.99</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Total:</span>
                                    <span class="primary-color-3">$44.99</span>
                                </li>
                            </ul>
                            <div class="btn-box mt-4">
                                <a href="checkout.html" class="theme-btn theme-btn-light">Checkout</a>
                            </div>
                        </div><!-- end shopping-cart-content -->
                    </div><!-- end shopping-cart-detail-item -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div>
    </div><!-- end container -->
</section><!-- end cart-area -->
<!-- ================================
    END CART AREA
================================= -->
<?php include("footer.php")?>