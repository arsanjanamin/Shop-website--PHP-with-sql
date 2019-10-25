<?php
require 'include/db.php';

if (isset($_GET['delete_pro']))
{
    $id_product=$_GET['delete_pro'];
    $query_del=" delete from products where product_id='$id_product'";
    $run_del=mysqli_query($connection,$query_del);

    if ($run_del)
    {
        echo "<script>alert('محصول با موفقیت حذف شد')</script>";
        echo "<script>window.open('index.php?view_pro','_self')</script>";
    }

}

else
{
    echo"<script>window.open('index.php','_self')</script>";

}
