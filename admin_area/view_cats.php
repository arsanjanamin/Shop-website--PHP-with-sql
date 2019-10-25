<?php include "include/db.php";   ?>

<form action="" method="post">

    <table width="600px"  align="center" class="tbl_bordered">

        <caption>مشاهده همه ی دسته ها</caption>

        <tr>
            <td colspan="1"><b><span>شماره</span></b></td>
            <td><b><span>نام دسته</span></b></td>
            <td><b><span>حذف</span></b></td>
            <td><b><span>ویرایش</span></b></td>
        </tr>

        <?PHP
        $sql_select=mysqli_query($connection,"select * from categories ");
        $i=0;
        while ($rows=mysqli_fetch_assoc($sql_select))
        {
            $cat_title=$rows['cat_title'];
            $cat_id=$rows['cat_id'];
            $i++;

            echo "
             <tr>
            <td>$i</td>
            <td>$cat_title</td>
            <td><a href='delete_cats.php?cats_id=$cat_id'>  حذف </a> </td>
            <td><a href='index.php?edit_cats=1&cat_id=$cat_id'>  ویرایش </a> </td>
        </tr>
            ";
        }

        ?>

    </table>






</form>
