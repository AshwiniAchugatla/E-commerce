<?php
include("config.php");
session_start();

if(isset($_POST['id']) && $_POST['id']!="")
{
    $id=$_POST['id'];
    $result=mysqli_query($con,"select * from product where id=$id");
    $row=mysqli_fetch_assoc($result);

    $id=$row['id'];
    $name=$row['name'];
    $image=$row['image'];
    $mrp=$row['mrp'];

    $cartarray = array($id => array('id'=>$id, 'name'=>$name, 'image'=>$image, 'mrp'=>$mrp, 'quantity'=>1));

    if(!isset($_SESSION['email']))
    {
        echo "<script>
        alert('Please Login')
        </script>";
    }
    else
    {
        if(empty($_SESSION["shopping_cart"]))
        {
            $_SESSION["shopping_cart"] = $cartarray;
            echo "<script>
            alert('product added to your cart')
            </script>";
        }
        else
        {
            $arraykey = array_keys($_SESSION["shopping_cart"]);
            if(in_array($id,$arraykey))
            {
                echo "<script>
                alert('product already added to your cart')
                </script>";
            }
            else
            {
                $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],
                                                            $cartarray);
                echo "<script>
                alert('product added to your cart')
                </script>";
            }
        }
    }
}
if(!empty($_SESSION["shopping_cart"]))
    {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
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
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                    </div>
                    <?php
                        $id=$_GET['sid'];
                        $sql = "select * from product where cid='$id' ";
                        $a = mysqli_query($con,$sql);
                        while($rw=mysqli_fetch_assoc($a))
                            {
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $rw['id'];?>">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="admin/pages/forms/pics/<?php echo $rw['image'];?>" alt="" style="height:300px;">
                                <div class="product-action">
                                   <!-- <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>-->
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="detail.php?did=<?php echo $rw['id'];?>"><?php echo $rw['name'];?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>₹<?php echo $rw['mrp'];?>/-</h5><h6 class="text-muted ml-2"><del></del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                <button class="btn btn-outline-dark btn-square" name="addcart"><i class="fa fa-shopping-cart"></i></button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


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