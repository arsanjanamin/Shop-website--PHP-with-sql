<?php

include "include/db.php";
if (isset($_GET['cat_id']))
{
    $cat_id=$_GET['cat_id'];
    $sql_sel=mysqli_query($connection,"select * from categories where cat_id='$cat_id'");
    $result_row=mysqli_fetch_assoc($sql_sel);
    $cat_titles=$result_row['cat_title'];
}
?>
    <form method="post" action="" >
        <table width="650px" align="center">
            <caption>ویرایش دسته </caption>

            <tr>
                <td> دسته مورد نظر   </td>
                <td><input type="text" name="txt_category" value="<?PHP echo $cat_titles  ?>" class="" placeholder="نام دسته"></td>
                <td><input type="submit" name="btn_send" class="btn btn-primary btn-large" value="ارسال"></td>
            </tr>

        </table>

    </form>

<?PHP

if (isset($_POST['btn_send']))
{
    $categories_title=$_POST['txt_category'];
    $sql=mysqli_query($connection,"update  categories set cat_title='$categories_title' where cat_id='$cat_id'");

    if ($sql)
    {
        echo "<script>alert('با موفیقت ویرایش شد')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }


}


?>