<?php
include "include/db.php";
?>
<table class="" width="670px" >
    <caption><b>            لیست تمامی سفارشات        </b>    </caption>

    <tr>
       <th colspan="5">
           <b style="background: #e71200;padding: 4px 2px;" >سفارشات ناموفق در پرداخت به رنگ قرمز هستند</b>

           <b style="background: #007e07;padding: 4px 2px;" >سفارشات موفق پرداخت به رنگ سبز هستند</b>
       </th>
    </tr>

    <tr>
        <td><b>ردیف</b></td>
        <td><b>ایمیل مشتری</b></td>
        <td><b>تاریخ فاکتور </b></td>
        <td><b>قیمت کل </b></td>
        <td><b> مشاهده سفارش </b></td>

    </tr>
    <?PHP
        $i=0;
    $sql_s=mysqli_query($connection,"SELECT * FROM `order`");
    while ($row_order = mysqli_fetch_assoc($sql_s))
    {
        $order_id=$row_order['order_id'];
        $order_total_price=$row_order['order_total_price'];
        $order_email_customer=$row_order['order_email_customer'];
        $order_verified=$row_order['order_is_verified'];

        $i++;
        $time_pay_order='';
        if ($order_verified=="true")
        {
            $run_time_pay_order=mysqli_query($connection,"select * from pay_cart where order_id='$order_id'");
            while( $row_paycart = mysqli_fetch_assoc($run_time_pay_order))
            { $time_pay_order= $row_paycart['order_time'];  }
        }else
        {
            $order_time=$row_order['order_time'];
        }
  ?>
<tr>
    <td <?PHP verification($order_verified)    ?> "> <?php echo $i ?> </td>
    <td <?PHP verification($order_verified)    ?> "> <?php echo $order_email_customer ?> </td>
    <td <?PHP verification($order_verified)    ?> "> <?php if ($order_verified=="true"){ echo $time_pay_order ;}else{ echo $order_time ;} ?> </td>
    <td <?PHP verification($order_verified)    ?> "> <?php echo $order_total_price ?> </td>
    <td <?PHP verification($order_verified)    ?> ">
    <a style="color:#fff;" href="index.php?pay=<?php if($order_verified=="true"){echo"yes";}else{echo"no";}?>&order_customer=<?php echo $order_email_customer; ?>&Total_Amount=<?php echo $order_total_price ?>&id_order=<?php echo $order_id; ?>">مشاهده</a>
    </td>



</tr>







<?php
    }
 function verification($verifing)
 {
     if ($verifing=="true")
     {
        echo 'style="background:#007e07';
     }
     elseif ($verifing=="false")
     {

         echo 'style="background:#e71200';

     }

 }



   ?>

</table>

