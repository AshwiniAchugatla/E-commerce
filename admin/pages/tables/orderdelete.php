<?php
    include("../../../config.php");
    $x=$_GET['z'];
    $sql="delete from userorders where id=$x";
    if(mysqli_query($con,$sql))
    {
        echo '<script>alert("Record Deleted")
        window.location.href="ordertable.php"
        </script>';
    }
    else
    {
        echo "error".mysqli_error($con);
    }
?>