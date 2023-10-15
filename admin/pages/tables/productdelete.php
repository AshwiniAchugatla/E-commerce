<?php
    include("../../../config.php");
    $x=$_GET['z'];
    $sql="delete from product where id=$x";
    if(mysqli_query($con,$sql))
    {
        echo '<script>alert("Record Deleted")
        window.location.href="producttable.php"
        </script>';
    }
    else
    {
        echo "error".mysqli_error($con);
    }
?>