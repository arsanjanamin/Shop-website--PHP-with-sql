<?php




$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="ecommerce";
global $connection ;

$connection=mysqli_connect($db_host,$db_username,$db_password,$db_name) or die("خطا در برقراری ارتباط با پایگاه داده");
$run_pro=@mysqli_query($connection,"SET NAMES utf8");
$run_pro=@mysqli_query($connection,"SET CHARACTER SET utf8");
if (!mysqli_connect_errno()==0)
{
    echo"خطا در برقراری ارتباط با پایگاه داده".mysqli_connect_errno();

}