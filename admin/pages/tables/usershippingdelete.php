<?php
    include("../../../config.php");
    $x=$_GET['z'];
    $sql="delete from userdata where id=$x";
    if(mysqli_query($con,$sql))
    {
        echo '<script>alert("Record Deleted")
        window.location.href="usershipping.php"
        </script>';
    }
    else
    {
        echo "error".mysqli_error($con);
    }
?>