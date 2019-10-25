<?php include "include/db.php"; ?>
    <form method="post" action="" >
        <table width="650px" align="center">
            <caption>افزودن برندی جدید</caption>

            <tr>
                <td>نام برند مورد نظر را وارد کنید</td>
                <td><input type="text" name="txt_brand" class="" placeholder="نام برند"></td>
                <td><input type="submit" name="btn_send" class="btn btn-primary btn-large" value="ارسال"></td>
            </tr>
        </table>
    </form>

<?PHP

if (isset($_POST['btn_send']))
{
    $brands_title=$_POST['txt_brand'];
    $sql=mysqli_query($connection,"insert into brands (brand_title)values ('$brands_title') ");

    if ($sql)
    {
        echo "<script>alert('با موفیقت اضافه شد')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }


}


?><?php
