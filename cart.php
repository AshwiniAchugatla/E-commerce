<?php
include("config.php");
session_start();

$status="";
if(isset($_POST['action']) && $_POST['action']=="remove")
{
    if(!empty($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $key => $value)
        {
            if($_POST['id'] == $value['id'])
            {
                unset($_SESSION["shopping_cart"][$key]);
                $_SESSION["shopping_cart"]=array_values($_SESSION["shopping_cart"]);
                echo "<script>
                alert('Product is removed from cart')
                </script>";
            }
            if(empty($_SESSION["shopping_cart"]))
            unset($_SESSION["shopping_cart"]);
        }
    }
}
if(isset($_POST['action']) && $_POST['action'] == "change")
{
    foreach($_SESSION['shopping_cart'] as &$value)
    {
        if($value["id"] === $_POST["id"])
        {
            $value['quantity'] = $_POST["quantity"];
            break;  //stops the loop after we found the product
        }
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
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <?php
                    if(isset($_SESSION["shopping_cart"]))
                    {
                        $total=0;
                        $add=0;
                ?>
                <table class="table table-light table-borderless table-hover mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                <?php
                    foreach($_SESSION["shopping_cart"] as $product)
                    {
                        $add+=$product['quantity'] * $product['mrp'];
                        $t1=$add * (10/100);
                        $final=$add-$t1;
                ?>
                    <tbody >
                        <tr>
                            <td ><img src="admin/pages/forms/pics/<?php echo $product['image'];?>" alt="" style="width: 50px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product['name'];?></td>
                            <td >₹<?php echo $product['mrp'];?></td>
                            <td >
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $product['quantity'];?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td ><?php echo $product['mrp'] * $product['quantity'];?></td>

                            <td >
                                <form method="post" >
                                    <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                                    <input type="hidden" name="action" value="remove">
                                    <!--<input type="submit" name=""  calss="remove" value="Remove" class>-->
                                    <button class="btn btn-danger">X</button>
                                </form>
                            </td>
                <?php
                    }
                ?>
                            </td>
                           <!-- <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>-->
                        </tr>
                    </tbody>
                </table>
                <?php
                    }
                    else
                    {
                        echo "Your cart is empty";
                    }
                ?>
            </div>
            <div class="col-lg-4">
               <!-- <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>-->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <?php
                        if(isset($_SESSION["shopping_cart"]))
                        {
                            $final;
                            $add;
                    ?>
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>SubTotal</h6>
                            <h6><?php echo $add;?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Discount</h6>
                            <h6 class="font-weight-medium">10%</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php echo $final ;?></h5>
                        </div>
                      <a href="checkout.php"><button class="btn btn-block  btn-outline-warning font-weight-bold my-3 py-3">Proceed To Checkout</button></a>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


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