
<script src="tinymce-editor/jquery.tinymce.min.js"></script>
<script src="tinymce-editor/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<?php
    include "include/db.php";
    if (isset($_GET['edit_pro']))
    {
        $id=$_GET['edit_pro'];
        $sql="select * from products where product_id=$id";
        $run=mysqli_query($connection,$sql);

        $row_pr=mysqli_fetch_assoc($run);

        $pr_id=$row_pr['product_id'];
        $pr_title=$row_pr['product_title'];
        $pr_image=$row_pr['product_image'];
        $pr_desc=$row_pr['product_desc'];

        $pr_price=$row_pr['product_price'];
        $pr_keyword=$row_pr['product_keywords'];


        //get cat product
        $pr_cat=$row_pr['product_cat'];
        $select_category=mysqli_query($connection,"select * from categories where cat_id=$pr_cat");
        $row_cat=mysqli_fetch_assoc($select_category);
        $cat_title=$row_cat['cat_title'];

        //get brand product

        $pr_brand=$row_pr['product_brand'];
        $select_brands=mysqli_query($connection,"select * from brands where brand_id=$pr_brand");
        $row_brand=mysqli_fetch_assoc($select_brands);
        $brand_title=$row_brand['brand_title'];

    }else
    {
        echo "<script>alert('اشکال در روند ویرایش لطفا دوباره امتحان کنید')</script>";
        echo "<script>window.open('index.php?view_pro','_self')</script>";
    }


    ?>
    <form action="" method="post" enctype="multipart/form-data">
    <table width="670px">
        <caption><b>ویرایش اطلاعات</b></caption>

        <tr>
            <td>ویژگی محصول</td>
            <td>مقدار ورودی </td>
        </tr>
        <tr>
            <td>عنوان محصول</td>
            <td><input  type="text" value="<?php echo $pr_title ?>" name="product_title"> </td>

        </tr>
        <!-- start of  categories edit-->
        <tr>
            <td>دسته بندی محصول</td>
            <td>
                <select name="product_cat" style="width: 200px">
                    <option value="<?php echo $pr_cat ?>"><?php echo $cat_title ?></option>
                    <?php
                    $cat_query=mysqli_query($connection,"select * from categories");
                    while ($row_cat2=mysqli_fetch_assoc($cat_query))
                    {
                        $cat_id=$row_cat2['cat_id'];
                        $cat_title2=$row_cat2['cat_title'];
                        echo "<option value='$cat_id'>$cat_title2</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <!-- end of categories edit-->

        <!-- start of brands edit-->
        <tr>
            <td>برند محصول</td>
            <td>
                <select name="product_brand" class="" style="width:200px" >
                    <option  value="<?php echo $pr_brand ; ?>"><?php echo $brand_title ; ?></option>
                    <?Php
                    $brands_sql=mysqli_query($connection,"select * from brands");
                    while ($row_brand2 = mysqli_fetch_assoc($brands_sql))
                    {
                        $brand_ids=$row_brand2['brand_id'];
                        $brand_titles=$row_brand2['brand_title'];
                        echo "<option value='$brand_ids'>$brand_titles</option> ";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <!-- end of brands edit-->

        <tr>
            <td>قیمت محصول</td>
            <td><input name="product_price" type="text" width="200px" value="<?PHP echo $pr_price  ?>"> </td>
        </tr>

        <tr>
            <td>توضیحات محصول</td>
            <td>
                <textarea name="product_desc" cols="4" rows="3"><?PHP echo $pr_desc  ?></textarea>
            </td>
        </tr>

        <tr>
            <td>عکس محصول</td>
            <td>
                <img class="img-thumbnail" width="44" height="45" src="<?PHP echo $pr_image; ?>">
            <input type="file" name="product_image" >
            </td>
        </tr>

        <tr>
            <td><b>کلمات کلیدی</b> </td>
            <td>
                <input type="text" name="product_keyword" value="<?php echo $pr_keyword   ?>">
            </td>

        </tr>


        <tr>
            <td><input type="submit" name="btn_edit" class="btn btn-primary btn-large" value="ویرایش"></td>
            <td><input type="reset" name="btn_cancel" class="btn btn-warning btn-large" value="لغو"></td>
        </tr>

    </table>


</form>
<?php

if (isset($_POST['btn_edit']))
{
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_brand=$_POST['product_brand'];
    $product_cats=$_POST['product_cat'];
    $product_key=$_POST['product_keyword'];
    $product_price=$_POST['product_price'];

    /* for upload pic*/
    $img_name=$_FILES['product_image']['name'];
    $img_tmp=$_FILES['product_image']['tmp_name'];
    $img_error=$_FILES['product_image']['error'];

    $destination_address='product_images/'.$img_name ;

    move_uploaded_file($img_tmp,$destination_address);
    if (!$img_error==0)
    {
            echo"<script>alert('متاسفانه در ارسال عکس مشکل است.لطفا دوباره امتحان کن.')</script>";
            echo"<script>window.open('index.php?edit_pro=$id','_self')</script>";
    }


    $edit_sql="update products set  
 product_title='$product_title' , 
 product_image='$destination_address', 
 product_cat='$product_cats' , 
  product_brand='$product_brand', 
 product_price='$product_price' , 
  product_desc='$product_desc' , 
   product_keywords='$product_key' where product_id='$id'  ";
    $run_edit=mysqli_query($connection,$edit_sql);
    if (mysqli_affected_rows($connection))
    {
        echo"<script>alert('محصول شما با موفقیت ویرایش شد.')</script>";
        echo"<script>window.open('index.php?view_pro','_self')</script>";

    }else
    {
        echo"<script>alert('noooooooooo.')</script>";

    }

}