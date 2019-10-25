<?php

include "include/db.php";
if (isset($_GET['brand_id']))
{
    $brand_id=$_GET['brand_id'];
    $sql_sel=mysqli_query($connection,"select * from brands where brand_id='$brand_id'");
    $result_row=mysqli_fetch_assoc($sql_sel);
    $brand_titles=$result_row['brand_title'];
}
?>
    <form method="post" action="" >
        <table width="650px" align="center">
            <caption>ویرایش برند </caption>

            <tr>
                <td> برند مورد نظر   </td>
                <td><input type="text" name="txt_brand" value="<?PHP echo $brand_titles  ?>" class="" placeholder="نام برند"></td>
                <td><input type="submit" name="btn_send" class="btn btn-primary btn-large" value="ویرایش شود"></td>
            </tr>

        </table>

    </form>

<?PHP

if (isset($_POST['btn_send']))
{
    $brand_title=$_POST['txt_brand'];
    $sql=mysqli_query($connection,"update  brands set brand_title='$brand_title' where brand_id='$brand_id'");

    if ($sql)
    {
        echo "<script>alert('با موفیقت ویرایش شد')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }


}


?>