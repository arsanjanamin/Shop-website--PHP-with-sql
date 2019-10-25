<?php
include "include/db.php";
if (isset($_GET['cats_id']))
{
    $cats_id=$_GET['cats_id'];
    $sql=mysqli_query($connection,"delete from categories where cat_id='$cats_id' ");

    if ($sql)
    {
        echo "<script>alert('دسته با موفقیت حذف شد')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
    else
    {
        echo"<script>window.open('index.php?view_cats','_self')</script>";

    }

}

else
{
    echo"<script>window.open('index.php','_self')</script>";

}
