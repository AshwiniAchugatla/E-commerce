<?php
include("config.php");
session_start();
$user="";
if(isset($_SESSION['email']))
{
    $user=$_SESSION['email'];

}
// $subtotal = 0;
// $discount = 0;
// $finalvalue = 0;
$ftotal=0;
$total=0;
$dis=0;
// $emailquery = "select id from registration where email='$user'";
// $emailres = mysqli_query($con,$emailquery);
// $emailrw=mysqli_fetch_row($emailres);
// $uid=$emailrw[0];
// $current_date = date("Y-m-d H:i:s");


if(isset($_POST['checkout']))
{
    $name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$ad1=$_POST['ad1'];
	$ad2=$_POST['ad2'];
	$country=$_POST['country'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pin=$_POST['pin'];
    $payment=$_POST['payment'];
    $status=$_POST['status'];
    $current_date = date("Y-m-d H:i:s");

    $emailquery = "select id from registration where email='$user'";
$emailres = mysqli_query($con,$emailquery);
$emailrw=mysqli_fetch_row($emailres);
$uid=$emailrw[0];

$nameArray = array();
$orderquery="select id from bill where uid=$uid";
$orderres = mysqli_query($con,$orderquery);
$emailrw=mysqli_fetch_row($orderres);
$bid=$emailrw[0];

foreach($_SESSION["shopping_cart"] as $key => $product)
{
    $pid=$product['id'];
    $pqty=$product['quantity'];
    $discount = $product['discount'];
    $price = $product['price'];
    $productname = array($product['Name']);
    $mulproduct = implode(',',$productname);
    $productexp = explode(',',$mulproduct);
    $total += $product['price'] * $product['quantity'];
    $dis = ($total/100) * $product['discount'];

    

    $cartinsert = "insert into cart(uid,pid,qty,date)values($uid,$pid,$pqty,'$current_date')";
if(mysqli_query($con,$cartinsert))
{
        $stockquery="select total_stock from product_stock where pid=$pid";
        $stockres=mysqli_query($con,$stockquery);
        $row=mysqli_fetch_row($stockres);
        $stock = $row[0]  - $pqty;

        $orderinsert = "insert into order_table(bid,pid,price,quantity)values($bid,$pid,$price, $pqty)";
        if(mysqli_query($con,$orderinsert))
        {
            $stockupdate = "update product_stock set total_stock=$stock where pid=$pid";
            if(mysqli_query($con,$stockupdate))
            {
                echo "<script> alert('product added to cart')</script>";
            }
            else
            {
                echo "error".$con->error;
            }
        }
        else
        {
            echo "error".$con->error;
        }
}
else
{
    echo "error".$con->error;
}

    array_push($nameArray,$mulproduct);
  
}
$ftotal = $total - $dis;

$namejson=json_encode($nameArray);
$insertquery = "insert into checkout(fullname,email,contact,address1,address2,country,city,state,pincode,product,total_amount,payment_method)values('$name','$email',$contact,'$ad1','$ad2','$country','$city','$state','$pin','$namejson',$ftotal,'$payment')";
if(mysqli_query($con,$insertquery))
{
    $updatequery="update registration set fullname='$name',email='$email',contact=$contact,address1='$ad1',address2='$ad2',country='$country',city='$city',state='$state',pincode=$pin where email='$user'";
    if(mysqli_query($con,$updatequery))
    {
        $billinsert = "insert into bill(uid,total,discount,pay_type,status)values($uid,$ftotal,$discount,'$payment','$status')";
    if(mysqli_query($con,$billinsert))
    {
        echo "<script> alert('checkout confirmed')
        window.location.href='index.php'</script>";
    }
    else
    {
        echo "error".$con->error;
    }
    
}
else
{
    echo "error".$con->error;
}
}
else
{
    echo "error".$con->error;
}
unset($_SESSION["shopping_cart"]);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Sign in</button>
                            <button class="dropdown-item" type="button">Sign up</button>
                        </div>
                    </div>
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
    include("header.php");
    ?>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <?php 
    $fetchquery="select * from registration where email='$user'";
    $fetchres=mysqli_query($con,$fetchquery);
    $row=mysqli_fetch_assoc($fetchres);
    ?>
    <div class="container-fluid">
        <?php
        if(isset($_SESSION["shopping_cart"]))
        {
            ?>
            <form method="post">		
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                               
                        <div class="row">
                            <input type="hidden" name="status" value="Inactive">
                            <div class="col-md-6 form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" name="name" value="<?php echo $row['fullname'];?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="emai" name="email" value="<?php echo $row['email'];?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="number" name="contact" value="<?php echo $row['contact'];?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" name="ad1" value="<?php echo $row['address1'];?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text"  name="ad2" value="<?php echo $row['address2'];?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" name="country" value="<?php echo $row['country'];?>">
                                   
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" name="city" value="<?php echo $row['city'];?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" name="state" value="<?php echo $row['state'];?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>PIN Code</label>
                                <input class="form-control" type="number" name="pin" value="<?php echo $row['pincode'];?>">
                            </div>
                            
                           
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4">
                    
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    
                    <div class="bg-light p-30 mb-5">
                    
                        <div class="border-bottom">
                        
                            <h6 class="mb-3">Products</h6>
                            <?php
                            $total=0;
                            $dis=0;
                           // $ftotal=0;
                            foreach($_SESSION['shopping_cart'] as $key=> $value)
                                {
                            ?>
                            <div class="d-flex justify-content-between">
                            
                                <p><?php echo substr($value['Name'],0,25);?></p>
                                <p>$<?php echo $value['price'];?></p>
                              
                            </div>
                            <?php
                            $total += $value['price'] * $value['quantity'];
                            $dis = ($total/100) * $value['discount'];
                            }
                            $ftotal=$total - $dis;
                            ?>
                            <!-- <div class="d-flex justify-content-between">
                                <p>Product Name 2</p>
                                <p>$150</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Product Name 3</p>
                                <p>$150</p>
                            </div> -->
                           
                        </div>
                       
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>$<?php echo $total;?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">10%</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>$<?php echo $ftotal;?></h5>
                            </div>
                        </div>
                    </div>
                   
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal" value="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold py-3" name="checkout" >Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
        <?php
        }
        else
        {
        ?>
    <form method="post">		
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Your cart is empty</span></h5>
                <div class="bg-light p-30 mb-5">
                   		
                   
                </div>
                
            </div>
            <div class="col-lg-4">
                
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                
                <div class="bg-light p-30 mb-5">
                
                    <div class="border-bottom">
                    
                        <h6 class="mb-3">Products</h6>
                        <?php
                    //     $total=0;
                    //     $dis=0;
                    //    // $ftotal=0;
                    //     foreach($_SESSION['shopping_cart'] as $key=> $value)
                    //         {
                    //     ?>
                        <div class="d-flex justify-content-between">
                        
                            <p>product name</p>
                            <p>$00</p>
                          
                        </div>
                        <?php
                        // $total += $value['price'] * $value['quantity'];
                        // $dis = ($total/100) * $value['discount'];
                        // }
                        // $ftotal=$total - $dis;
                        ?>
                        <!-- <div class="d-flex justify-content-between">
                            <p>Product Name 2</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Product Name 3</p>
                            <p>$150</p>
                        </div> -->
                       
                    </div>
                   
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$<?php //echo $total;?>.00</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">10%</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$<?php //echo $ftotal;?>.00</h5>
                        </div>
                    </div>
                </div>
               
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" name="checkout" >Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
    <?php
        }?>
    </div>
    
    <!-- Checkout End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>