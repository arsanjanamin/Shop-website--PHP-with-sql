
<?php

    include "include/db.php";
    ?>

<table class="" width="700px" align="center">

    <caption>مشاهده تمامی خریدها</caption>
    <tr>
        <td>نام و نام خانوادگی خریدار</td>
        <td>راههای ارتباطی</td>
        <td>شماره و تاریخ فاکتور</td>
        <td>قیمت کل فاکتور</td>

    </tr>

    <?php

    $select_orders=mysqli_query($connection,"SELECT * FROM `order` where order_is_verified='true' ");
    while ($rows_oreder=mysqli_fetch_array($select_orders))
    {
        $order_id=$rows_oreder['order_id'];
        $order_email=$rows_oreder['order_email_customer'];
        $order_total_price=$rows_oreder['order_total_price'];

      $select_paycart=mysqli_query($connection,"select * from pay_cart where order_id='$order_id' ");

      while ($row_paycart=mysqli_fetch_array($select_paycart))
      {
          $order_time_pay=$row_paycart['order_time'];
      }
      $select_costumers=mysqli_query($connection,"select * from customers where customer_email = '$order_email'");

      while ($row_custom=mysqli_fetch_assoc($select_costumers))
      {
          $customer_name=$row_custom['customer_name'];
          $customer_lastname=$row_custom['customer_lastname'];
          $customer_city=$row_custom['customer_city'];
          $customer_province=$row_custom['customer_province'];
          $customer_phone=$row_custom['customer_phone'];
          $customer_address=$row_custom['customer_address'];

       ?>
    <td><span><?PHP echo $customer_name ."  ".$customer_lastname    ?></span></td>
    <td><span>آدرس :<?PHP echo $customer_city ." -".$customer_province."-".$customer_address    ?></span><br>
              تلفن:  <?PHP echo $customer_phone   ?>  </td>
    <td><span> شماره فاکتور <?PHP echo $order_id    ?> تاریخ فاکتور <?PHP echo $order_time_pay    ?></span></td>
    <td><span><?PHP echo $order_total_price    ?></span></td>




<?PHP
      }

    }


    ?>


</table>
