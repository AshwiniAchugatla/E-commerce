<?php
$x=$_GET['z'];
include("../../../config.php");
if(isset($_POST['btn']))
{
    $name=$_POST['name'];
    $filename=$_FILES['image']['name'];
    $filesize=$_FILES['image']['size'];
    $filetmpname=$_FILES['image']['tmp_name'];
    $filetype=$_FILES['image']['type'];
    $filestore="../forms/pics/".$filename;

if(move_uploaded_file($filetmpname,$filestore))
{
    $sql="update category set name='$name', image='$filename' where id=$x";
    if(mysqli_query($con,$sql))
    {
        echo "Data Updated";
    }
    else
    {
        echo "error".mysqli_error($con);
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:../../partials/_navbar.html -->
          <?php
            include("../../header.php");
          ?>
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php
            include("../../nav.php");
          ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form elements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
                    $x=$_GET['z'];
                    $sql1="select * from category where id=$x";
                    $res=mysqli_query($con,$sql1);
                    $rw=mysqli_fetch_row($res);
                  ?>
                    <h4 class="card-title">Update Category Form</h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="name" value="<?php echo $rw[1];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputimage1">Image</label>
                        <input type="file" class="form-control" id="exampleInputimage1" name="image" value="<?php echo $rw[2];?>">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2" name="btn">Update</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->

          <!-- partial:../../partials/_footer.html -->
          <?php
            include("../../footer.php");
          ?>
          <!-- partial -->

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>