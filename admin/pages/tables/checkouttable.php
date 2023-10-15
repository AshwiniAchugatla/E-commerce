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
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer Shipping Details</h4>
                    <p class="card-description"> </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Order Id </th>
                          <th> Customer Name </th>
                          <th> Mobile Number </th>
                          <th> Address </th>
                          <th> Country </th>
                          <th> City </th>
                          <th> State </th>
                          <th> Pin Code </th>
                          <th> Payment </th>
                          <th> Orders </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $query="select * from userdata";
                            $user_result=mysqli_query($con,$query);
                            while($rw=mysqli_fetch_assoc($user_result))
                            {
                                echo "
                                <tr>
                                    <td>  $rw[order_id] </td>
                                    <td>  $rw[name] </td>
                                    <td>  $rw[mobileno] </td>
                                    <td>  $rw[address] </td>
                                    <td>  $rw[country] </td>
                                    <td>  $rw[city] </td>
                                    <td>  $rw[state] </td>
                                    <td>  $rw[pin] </td>
                                    <td>  $rw[payment] </td>
                                        <table class='table table-striped'>
                                                <thead>
                                                    <tr>
                                                        <th> Product Name </th>
                                                        <th> Price </th>
                                                        <th> Quantity </th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                            ";
                                    $order_query="select * from userorders where order_id='$rw[order_id]'";
                                    $order_result=mysqli_query($con,$order_query);
                                    while($order_fetch=mysqli_fetch_assoc($order_result))
                                    {
                                        echo"
                                        <tr>
                                            <td>  $order_fetch[name] </td>
                                            <td>  $order_fetch[mrp] </td>
                                            <td>  $order_fetch[quantity] </td>
                                        </tr> 
                                        ";
                                    } 
                                echo"   
                                            </tbody>
                                        </table> 
                                    </td>
                                </tr>
                                ";
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