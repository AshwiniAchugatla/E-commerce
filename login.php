<?php
include("config.php");

if(isset($_POST['btn']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];

	$to=$_POST['email'];
	$subject="Login successfully";
	$from="Ashwini Achugatla";
  $body=$name;
	$msg="Hi $name,


    Your login has been done.
    Welcome to veer online shopping!!!
    
    
Regards,

veer.smandi.in";

	$header="From:$from";

$sql="select count(id) from registration where name='$name' and email='$email'";
$res=mysqli_query($con,$sql);
$count=mysqli_fetch_row($res);
//$name=$user[1];
//if($email=$count[3] && $password=$count[5])

if($count[0]=='1')
{
   mail($to,$subject,$msg,$header);
    echo"welcome to user";

	session_start();
	$_SESSION['email']=$email;
   header('location:index.php');
}
else
{
    echo "<script>
    alert('User not registred');
    window.location.href='registration.php';
    </script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
      <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
        height: 109.1vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>
   

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white rounded shadow-5-strong p-5" method="post">
                <!-- Email input -->

                <label class="form-label" style="font-size:20px; color:black;">Log In</label>

                <div class="form-outline mb-4">
                  <input type="text" id="form1Example2" class="form-control" name="name" pattern="[a-z A-Z]+"/>
                  <label class="form-label" for="form1Example2">Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form1Example1" class="form-control" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"/>
                  <label class="form-label" for="form1Example1">Email address</label>
                </div>                

                <button class="btn btn-outline-warning btn-block" name="btn">Log In</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>