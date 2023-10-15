<?php
include("config.php");
session_start();

$user="";
if(isset($_SESSION['email']))
{
    $user=$_SESSION['email'];

}

$ftotal=0;
$total=0;
$discount=0;

if(isset($_POST['checkout']))
{
    $name=$_POST['name'];
	$email=$_POST['email'];
	$mobileno=$_POST['mobileno'];
	$address=$_POST['address'];
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
        $pquantity=$product['quantity'];
        $discount = $product['discount'];
        $mrp = $product['mrp'];
        $productname = array($product['name']);
        $mulproduct = implode(',',$productname);
        $productexp = explode(',',$mulproduct);
        $total += $product['mrp'] * $product['quantity'];
        $discount = ($total*(10/100));

    

        $cartinsert = "insert into cart(uid,pid,quantity,date)values($uid,$pid,$pquantity,'$current_date')";
        if(mysqli_query($con,$cartinsert))
        {
                $stockquery="select total_stock from product_stock where pid=$pid";
                $stockres=mysqli_query($con,$stockquery);
                $row=mysqli_fetch_row($stockres);
                $stock = $row[0]  - $pquantity;

                $orderinsert = "insert into order_table(bid,pid,mrp,quantity)values($bid,$pid,$mrp, $pquantity)";
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
    $ftotal = $total - $discount;

    $namejson=json_encode($nameArray);
    $insertquery = "insert into checkout(name,email,mobileno,address,country,city,state,pin,product,total_amount,payment_method)values('$name','$email',$mobileno,'$address','$country','$city','$state','$pin','$namejson',$ftotal,'$payment')";
    if(mysqli_query($con,$insertquery))
    {
        $updatequery="update registration set name='$name',email='$email',mobileno=$mobileno,address='$address',country='$country',city='$city',state='$state',pin=$pin where email='$user'";
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
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" name="name" pattern="[a-z A-Z]+" value="<?php echo $row['name'];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="number" name="mobileno" pattern="[0-9]+" value="<?php echo $row['mobileno'];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" value="<?php echo $row['address'];?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <input class="form-control" type="text" name="country" value="<?php echo $row['country'];?>" required> 
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city" value="<?php echo $row['city'];?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="state" value="<?php echo $row['state'];?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Pin Code</label>
                            <input class="form-control" type="number" name="pin" value="<?php echo $row['pin'];?>" required>
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
                            $discount=0;
                           // $ftotal=0;
                            foreach($_SESSION['shopping_cart'] as $key=> $value)
                            {
                        ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $value['name'];?></p>
                            <p>₹<?php echo $value['mrp'];?></p>
                        </div>
                        <?php
                            $total += $value['mrp'] * $value['quantity'];
                            $discount = ($total/(10/100));
                            }
                            $ftotal=$total - $discount;
                        ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>₹<?php echo $total;?>/-</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Discount</h6>
                            <h6 class="font-weight-medium">10%</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>₹<?php echo $ftotal;?>/-</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="cash">
                                <label class="custom-control-label" for="paypal">Cash On Delivery</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="check">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button class="btn btn-block  btn-outline-warning font-weight-bold py-3" name="checkout">Place Order</button>
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
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="cash">
                                <label class="custom-control-label" for="paypal">Cash On Delivery</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="check">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button class="btn btn-block  btn-outline-warning font-weight-bold py-3" name="checkout">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
        }
    ?>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <?php
        include("footer.php");
    ?>
    <!-- Footer End -->


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