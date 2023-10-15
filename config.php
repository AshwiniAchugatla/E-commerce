<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if($con)
{
    echo "Database Connected";
}
else
{
    echo "Database Not Connected";
}
?>