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
                    <h4 class="card-title">Product Details</h4>
                    <p class="card-description"> </p>
                    <a href="../../pages/forms/productform.php">
                    <button type="button" class="btn btn-outline-danger btn-fw">Add Products</button>
                  </a>
                    <table class="table table-striped">
                        <?php
                          $limit = 20;
                          if(isset($_GET['page']))
                          {
                              $page=$_GET['page'];
                          }
                          else
                          {
                              $page=1;
                          }
                          $offset=($page - 1) * $limit;

                            $sql="select * from product LIMIT {$offset} , {$limit}";
                            $a=mysqli_query($con,$sql);
                        ?>
                      <thead>
                        <tr>
                          <th> Id </th>
                          <th> Category Name </th>
                          <th> Product Name </th>
                          <th> Image </th>
                          <th> Quantity </th>
                          <th> MRP </th>
                          <th> Discount </th>
                          <th> Show </th>
                          <th> Update </th>
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
                          <td> <?php echo $rw[2];?> </td>
                          <td> <?php echo $rw[3];?> </td>
                          <td class="py-1">
                            <img src="../forms/pics/<?php echo $rw[4];?>" />
                          </td>
                          <td> <?php echo $rw[6];?> </td>
                          <td> <?php echo $rw[7];?> </td>
                          <td> <?php echo $rw[8];?>% </td>
                          <td> <a href='productshow.php?z=<?php echo $rw[0];?>'>View</a> </td>
                          <td> <a href='productupdate.php?z=<?php echo $rw[0];?>'>Update</a> </td>
                          <td> <a href='productdelete.php?z=<?php echo $rw[0];?>'>Delete</a> </td>
                        </tr>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <?php
                      $sql1 = "select * from product";
                      $result1 = mysqli_query($con,$sql1) or die("Query Failed.");
                      
                      if(mysqli_num_rows($result1)>0)
                      {
                          $total_records = mysqli_num_rows($result1);
                          
                          $total_page = ceil($total_records / $limit);

                        echo '<div class="col-12">
                          <nav>
                          <ul class="pagination justify-content-center">';
                          if($page > 1)
                          {
                              echo '<li class="page-item disabled"><a class="page-link" href="producttable.php"?page='.($page - 1).'">Previous</span></a></li>';
                          }
                          for($i = 1; $i <= $total_page; $i++)
                          {
                              if($i == $page)
                              {
                                  $active = "active";
                              }
                              else
                              {
                                  $active = "";
                              }
                              echo '<li class="page-item '.$active.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                          }
                          if($total_page > $page)
                          {
                              echo '<li class="page-item"><a class="page-link" href="producttable.php"?page='.($page + 1).'">Next</a></li>';
                          }
                        echo '</ul>
                          </nav>
                        </div>';
                      }
                    ?>
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