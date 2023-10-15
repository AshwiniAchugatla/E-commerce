<?php
session_start();
include("config.php");

if(isset($_POST['btn']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobileno=$_POST['mobileno'];
    $address=$_POST['address'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pin=$_POST['pin'];

    $to=$_POST['email'];
	$subject="Registration successfully Done";
	$from="Ashwini Achugatla";
    $body=$name;
	$msg="Hi $name,


    Thank you for Registration!
    Please Do LogIn...
    
    
Regards,

veer.smandi.in";

	$header="From:$from";

    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $sql="select * from registration where email='$email'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num>=1)
        {
            echo '<script>alert("You Have Already Registered")</script>';
        }
        else
        {
            $tb="insert into registration(name,email,mobileno,address,country,city,state,pin)values('$name','$email',$mobileno,'$address','$country','$city','$state',$pin)";
            $add=mysqli_query($con,$tb);
            if($con)
            {
                echo "Data Inserted";
            }
            else
            {
                echo "Data not Inserted";
            }
                if($add)
                {
                    mail($to,$subject,$msg,$header);
                    echo "<script>
                    alert('Your Registration has been done Succesfully!');
                    window.location.href='login.php';
                    </script>";
                }
                else
                {
                    echo "fail try again";
                }
        }
    }  
    else
    {
        echo "Invalid email";
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
                    <span class="breadcrumb-item active">Registration</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Registration</span></h5>
                <div class="bg-light p-30 mb-5">
                <form method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="Full Name" name="name" pattern="[a-z A-Z]+">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" placeholder="example@email.com" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="number" placeholder="Only 10 digits" name="mobileno" pattern="[0-9]+">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" placeholder="123 Street" name="address" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <input class="form-control" type="text" placeholder="India" name="country" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="Pune" name="city" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="Maharashtra" name="state" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Pin Code</label>
                            <input class="form-control" type="number" placeholder="413005" name="pin" required>
                        </div>
                     <a href="login.php"><button class="btn btn-outline-warning font-weight-bold py-2 " name="btn" style="margin-left:610px; width:150px;">Register</button></a>
                    </div>
                    </form>
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