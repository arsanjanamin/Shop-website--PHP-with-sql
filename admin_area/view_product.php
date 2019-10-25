<?php include 'include/db.php'  ?>
<table class="tbl_bordered" width="700px" align="center" >

            <caption><b>نمایش اطلاعات همه محصولات</b></caption>
    <tr>
        <td><span ><b>شماره</b></span></td>
        <td><span><b>عنوان محصول</b></span> </td>
        <td><span><b>تصویر محصول </b></span></td>
        <td><span><b>قیمت محصول</b></span></td>
        <td><span><b>ویرایش</b></span></td>
        <td><span><b>حذف</b></span></td>
    </tr>

    <?PHP
    $sql_select="select * from products ";
    $run_select=mysqli_query($connection,$sql_select);

    $i=0;
    while($rows_pro= mysqli_fetch_assoc($run_select))
    {
        $pro_id=$rows_pro['product_id'];
        $pro_title=$rows_pro['product_title'];
        $pro_image=$rows_pro['product_image'];
        $pro_price=$rows_pro['product_price'];
        $i++;

    ?>
    <tr align="center">
        <td align="center"><?PHP echo $i  ?></td>
        <td align="center"><?php echo $pro_title  ?></td>
        <td align="center">
            <img class="img-thumbnail" width="60px" height="60px" src="<?php echo $pro_image  ?>">
        </td>
        <td align="center"><?php echo $pro_price  ?></td>
        <td align="center"><a href="index.php?edit_pro=<?php echo $pro_id  ?>">ویرایش </a> </td>
        <td align="center"><a href="delete_pro.php?delete_pro=<?php echo $pro_id  ?>">حذف </a></td>

    </tr>

    <?PHP
    }
    ?>

</table>