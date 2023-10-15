<?php
include("config.php");
session_start();

if(isset($_POST['btn']))
{
    $name=$_POST['name'];
    $mobileno=$_POST['mobileno'];
    $address=$_POST['address'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pin=$_POST['pin'];
    $payment=$_POST['payment'];

    $query1="insert into userdata(name,mobileno,address,country,city,state,pin,payment)values('$name',$mobileno,'$address','$country','$city','$state',$pin,'$payment')";
    if(mysqli_query($con,$query1))
    {
        $order_id=mysqli_insert_id($con);
        $query2="insert into userorders(order_id,name,mrp,quantity)values(?,?,?,?)";
        $stmt=mysqli_prepare($con,$query2);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"isii",$order_id,$name,$mrp,$quantity);
            foreach($_SESSION["shopping_cart"]as $key => $values)
            {
                $name=$values['name'];
                $mrp=$values['mrp'];
                $quantity=$values['quantity'];
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION["shopping_cart"]);
            echo "<script>
            alert('Your Order Is Placed...Thank You!!!');
            window.location.href='index.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('SQL Query Prepare Error');
            </script>";
        }
    }
    else
    {
        echo "<script>
        alert('SQL ERROR');
        </script>";
    }
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
    
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <form method="post">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                    <?php 
                        $user=$_SESSION['email'];
                        if(isset($_POST['btn']))
                        {
                            $name=$_POST['name'];
                            $mobileno=$_POST['mobileno'];
                            $address=$_POST['address'];
                            $country=$_POST['country'];
                            $city=$_POST['city'];
                            $state=$_POST['state'];
                            $pin=$_POST['pin'];

                            $sql="update registration set name='$name',mobileno=$mobileno, address='$address', country='$country', city='$city', state='$state', pin=$pin where email='$user'";
                            if(mysqli_query($con,$sql))
                            {
                                echo "Update";
                            }
                            else
                            {
                                echo "error".mysqli_error($con);
                            }
                        }
                    ?>
                    <?php
                        $sql="select * from registration where email='$user'";
                        $res=mysqli_query($con,$sql);
                        $rw=mysqli_fetch_row($res);
                    ?>
                        <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input class="form-control" type="text" name="name" pattern="[a-z A-Z]+" value="<?php echo $rw[1];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="number" name="mobileno" pattern="[0-9]+" value="<?php echo $rw[3];?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" value="<?php echo $rw[4];?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <input class="form-control" type="text" name="country" value="<?php echo $rw[5];?>" required> 
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" name="city" value="<?php echo $rw[6];?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="state" value="<?php echo $rw[7];?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Pin Code</label>
                            <input class="form-control" type="number" name="pin" value="<?php echo $rw[8];?>" required>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <?php
                        if(isset($_SESSION['shopping_cart']))
                        {
                            $total=0;
                            $final=0;
                        ?>
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php
                            foreach($_SESSION['shopping_cart'] as $product)
                            {
                                $total=$total+$product['mrp'];
                                $t1=$total*(10/100);
                                $final=$total-$t1;
                        ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $product['name'];?></p>
                            <p>₹<?php echo $product['mrp'];?></p>
                        </div>
                        <?php
                            }
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
                            <h5>₹<?php echo $final;?>/-</h5>
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
                        <button class="btn btn-block  btn-outline-warning font-weight-bold py-3" name="btn">Place Order</button>
                    </div>
                    </form>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
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