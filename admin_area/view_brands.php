<?php include "include/db.php";   ?>

<form action="" method="post">

    <table width="650px"  align="center" class="table-striped">

        <caption>مشاهده همه ی برند ها</caption>

        <tr>
            <td><b><span>شماره</span></b></td>
            <td><b><span>نام برند</span></b></td>
            <td><b><span>حذف</span></b></td>
            <td><b><span>ویرایش</span></b></td>
        </tr>

        <?PHP
        $sql_select=mysqli_query($connection,"select * from brands ");
        $i=0;
        while ($rows=mysqli_fetch_assoc($sql_select))
        {
            $brand_title=$rows['brand_title'];
            $brand_id=$rows['brand_id'];
            $i++;

            echo "
             <tr>
            <td>$i</td>
            <td>$brand_title</td>
            <td><a href='delete_brands.php?delete_id=$brand_id'>  حذف </a> </td>
            <td><a href='index.php?edit_brands=1&brand_id=$brand_id'>  ویرایش </a> </td>
        </tr>
            ";
        }

        ?>

    </table>



</form>
