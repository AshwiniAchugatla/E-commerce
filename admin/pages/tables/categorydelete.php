<?php
    include("../../../config.php");
    $x=$_GET['z'];
    $sql="delete from category where id=$x";
    if(mysqli_query($con,$sql))
    {
        echo '<script>alert("Record Deleted")
        window.location.href="categorytable.php"
        </script>';
    }
    else
    {
        echo "error".mysqli_error($con);
    }
?>