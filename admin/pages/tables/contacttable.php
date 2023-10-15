<?php
    include("../../../config.php");
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
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Contact Details</h4>
                    <p class="card-description"> </p>
                    <table class="table table-striped">
                        <?php
                            $sql="select * from contact";
                            $a=mysqli_query($con,$sql);
                        ?>
                      <thead>
                        <tr>
                          <th> Id </th>
                          <th> Name </th>
                          <th> Email </th>
                          <th> Subject </th>
                          <th> Message </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            while($rw=mysqli_fetch_row($a))
                            {
                        ?>
                        <tr>
                          <td> <?php echo $rw[0];?> </td>
                          <td> <?php echo $rw[1];?> </td>
                          <td> <?php echo $rw[2];?> </td>
                          <td> <?php echo $rw[3];?> </td>
                          <td> <?php echo $rw[4];?> </td>
                          <td> <a href='contactdelete.php?z=<?php echo $rw[0];?>'>Delete</a> </td>
                        </tr>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
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
    <!-- End custom js for this page -->
  </body>
</html>