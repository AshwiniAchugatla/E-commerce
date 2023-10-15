<?php
include("../../../config.php");
if(isset($_POST['btn']))
{
    $cid=$_POST['cid'];
    $cname=$_POST['cname'];
    $name=$_POST['name'];

    $filename=$_FILES['image']['name'];
    $filesize=$_FILES['image']['size'];
    $filetmpname=$_FILES['image']['tmp_name'];
    $filetype=$_FILES['image']['type'];
    $filestore="pics/".$filename;

    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $mrp=$_POST['mrp'];
    $discount=$_POST['discount'];


if(move_uploaded_file($filetmpname,$filestore))
{
    $tb1="insert into product(cid,cname,name,image,description,quantity,mrp,discount)values($cid,'$cname','$name','$filename','$description',$quantity,$mrp,$discount)";
    if(mysqli_query($con,$tb1))
    {
        echo "Data Inserted";
    }
    else
    {
        echo "error".mysqli_error($con);
    }
}
else
{
  echo "Image not found";
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

    <!-- Summernote CSS - CDN Link -->
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

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
                    <h4 class="card-title">Product Form</h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputcid1">Category ID</label>
                        <select class="form-control" id="exampleInputcid1" name="cid">
                          <option>Select Category Id</option>
                        <?php
                          $sql="select * from category";
                          $rs=mysqli_query($con,$sql);
                          while($rw=mysqli_fetch_row($rs))
                          {
                        ?>
                          <option name="cname" value="<?php echo $rw[0];?>"><?php echo $rw[0];?></option>
                        <?php
                          }
                        ?>
                        </select>                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputcname1">Category Name</label>
                        <select class="form-control" id="exampleInputcname1" name="cname">
                          <option>Select Category Name</option>
                        <?php
                          $sql="select * from category";
                          $rs=mysqli_query($con,$sql);
                          while($rw=mysqli_fetch_row($rs))
                          {
                        ?>
                          <option name="cname" value="<?php echo $rw[1];?>"><?php echo $rw[1];?></option>
                        <?php
                          }
                        ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Product Name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputimage1">Image</label>
                        <input type="file" class="form-control" id="exampleInputimage1" name="image">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputdescription1">Description</label>
                        <textarea class="form-control" id="your_summernote"  placeholder="Description of product details" name="description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputquantity1">Quantity</label>
                        <input type="number" class="form-control" id="exampleInputquantity1"  placeholder="1, 2, ..." name="quantity">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputmrp1">MRP</label>
                        <input type="number" class="form-control" id="exampleInputmrp1"  placeholder="Price" name="mrp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputdiscount1">Discount</label>
                        <input type="number" class="form-control" id="exampleInputdiscount1"  placeholder="10%" name="discount">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2" name="btn">Submit</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote(
                {
                    height:500
                }
            );
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->

  </body>
</html>