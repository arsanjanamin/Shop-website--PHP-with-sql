<?php include "include/db.php";  ?>

<form method="post" action="">

    <table width="670px" class="tbl_bordered" style="">
        <caption>لیست تمام مشتریان</caption>

        <tr>
            <td><b>نام و نام خانوادگی</b></td>
            <td><b>تصویر مشتری</b></td>
            <td><b>ایمیل</b></td>
            <td><b>شماره تلفن و آدرس </b></td>
            <td><b>حذف </b></td>
        </tr>
        <?PHP
        $sql_sel=mysqli_query($connection,"select * from customers where confirmed=1");
        while($row_customer=mysqli_fetch_assoc($sql_sel)) {
            $customer_id = $row_customer['customer_id'];
            $customer_name = $row_customer['customer_name'];
            $customer_lastname = $row_customer['customer_lastname'];
            $customer_image = $row_customer['customer_image'];
            $customer_email = $row_customer['customer_email'];
            $customer_phone = $row_customer['customer_phone'];
            $customer_address = $row_customer['customer_address'];
            $customer_province=$row_customer['customer_province'];
            $customer_city=$row_customer['customer_city'];

            ?>
            <tr>
                <td><?php echo $customer_name . " " . $customer_lastname ?></td>
                <td><img src="../<?php echo $customer_image ?>" width="50" height="55" class="img-thumbnail"></td>
                <td><?php echo $customer_email ?></td>
                <td><p style="font-size: 12px;"><?php echo $customer_province ."-".$customer_city."-". $customer_address ?></p>
                     (<?php echo $customer_phone ?>)

                </td>
                <td><a href="delete_customer.php?customer_id=<?php echo $customer_id ?>" > حذف</a></td>
            </tr>

            <?PHP
        }
        ?>



    </table>







</form>
