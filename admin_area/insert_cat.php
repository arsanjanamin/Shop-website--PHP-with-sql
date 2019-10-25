<?php

include "include/db.php";
?>
<form method="post" action="" >
    <table width="670px" align="center">
        <caption>افزودن دسته ی جدید</caption>

        <tr>
            <td>نام دسته مورد نظر را وارد کنید</td>
            <td><input type="text" name="txt_category" class="" placeholder="نام دسته"></td>
            <td><input type="submit" name="btn_send" class="btn btn-primary btn-large" value="ارسال"></td>
        </tr>

    </table>

</form>

<?PHP

if (isset($_POST['btn_send']))
{
    $categories_title=$_POST['txt_category'];
    $sql=mysqli_query($connection,"insert into categories (cat_title)values ('$categories_title') ");

    if ($sql)
    {
        echo "<script>alert('با موفیقت اضافه شد')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }


}


?>