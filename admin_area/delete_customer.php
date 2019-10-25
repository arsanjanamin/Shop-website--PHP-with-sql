<?php
require 'include/db.php';

if (isset($_GET['customer_id']))
{
    $customers_id=$_GET['customer_id'];
    $query_del=" delete from customers where customer_id='$customers_id'";
    $run_del=mysqli_query($connection,$query_del);

    if (mysqli_affected_rows($connection))
    {
        echo "<script>alert('محصول با موفقیت حذف شد')</script>";
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }

}

else
{
    echo"<script>window.open('index.php','_self')</script>";

}
