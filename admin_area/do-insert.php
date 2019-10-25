<?php
require 'include/db.php';
if (isset($_POST['submit']))
{
    $product_title = $_POST['product_title'] ;
    $product_category=$_POST['product_cat'] ;
    $product_brands=$_POST['product_brand'] ;
    $product_prices=$_POST['product_price'] ;
    $product_description=$_POST['product_desc'] ;
    $product_keywords=$_POST['product_keywords'] ;

    /*for image:*/
    $product_image_name=$_FILES['product_image']['name'];
    $product_image_tmp=$_FILES['product_image']['tmp_name'];
    $product_image_address='product_images/'.$product_image_name;

    move_uploaded_file($product_image_tmp,$product_image_address) ;
    if (!$_FILES['product_image']['error']==0)
    {
        echo 'خطا در ارسال تصویر';
    }

    $sql_product_insert ="INSERT INTO products (product_title ,product_cat , product_brand, ";
    $sql_product_insert.= "product_price , product_desc , product_image , product_keywords) ";
    $sql_product_insert.= " VALUES ('$product_title' , $product_category , $product_brands , $product_prices , ";
    $sql_product_insert.= " N'$product_description' , N'$product_image_address' , N'$product_keywords' )" ;

    $insert_pro=mysqli_query($connection,$sql_product_insert);

    if ($insert_pro)
    {
           echo"<script>alert('تبریک...داده های مربوط به محصول شما به درستی وارد شد.')</script>";
           $_SESSION['messages1']="فیلد شما با موفقیت به سرور ذخیره شد";
           echo"<script>window.open('index.php','_self')</script>";

    }
}

