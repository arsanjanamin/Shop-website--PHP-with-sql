<?php
include "include/db.php";
if (isset($_GET['delete_id']))
{
    $brand_id=$_GET['delete_id'];
    $sql=mysqli_query($connection,"delete from brands where brand_id='$brand_id' ");

    if ($sql)
    {
        echo "<script>alert('دسته با موفقیت حذف شد')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
    else
    {
        echo"<script>window.open('index.php?view_brands','_self')</script>";

    }

}

else
{
    echo"<script>window.open('index.php?view_brands','_self')</script>";

}
