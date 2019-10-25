<table  width="700" align="center">
    <caption ><b>فاکتور فروش</b></caption >
    <tr>
        <td align="center"><b>نام محصول خریداری شده</b></td >
        <td align="center"><b>تصویر محصول خریداری شده</b></td >
        <td align="center"><b>تعداد خریداری شده</b></td >
        <td align="center"><b>قیمت ضربدر تعداد </b></td >
    </tr>
    <tr align="center">
        <?php
        //Obtaining a customer's email from the global variable $_GET['order_customer']
        $customer_email=$_GET['order_customer'];

        //Customer search on customer data table based on customer's email
        $select_customer="select * from customers where customer_email='$customer_email'";
        $run_customer=mysqli_query($connection,$select_customer);
        $row_customer=mysqli_fetch_array($run_customer);

        /* Obtaining a user's ip from a customer's data table and using it to
        search the cart data table and pay table _cart */
        $customer_ip=$row_customer['customer_ip'];

        /* Understanding whether a customer
        is paying money using a global variable $_GET['pay'] */
        $pay=$_GET['pay'];
        $id_order_paied=$_GET['id_order'];
        if($pay=='no'){
            $sel_price	=	"select * from cart where ip_add='$customer_ip'";
        }else{
            $sel_price	=	"SELECT * FROM `pay_cart` WHERE  `order_id`='$id_order_paied' ";
        }
        $run_price	=	mysqli_query($connection,$sel_price);
        $total=0;

        /* We extract the number purchased from a product and 
        the product id from the cart or pay_cart table. */
        while($p_price 	=	mysqli_fetch_array($run_price))
        {
        $pro_qty = $p_price['qty'];
        $pro_id	=	$p_price['p_id'];

        /* Now, using the product id, we extract the product 
        information from the products data table */
        $pro_price	=	"select * from products where product_id='$pro_id'";
        $run_pro_price	=	mysqli_query($connection,$pro_price);

        /* Now we put the information in the table rows */
        while($pp_price	=	mysqli_fetch_array($run_pro_price))
        {
        $product_title	=	$pp_price['product_title'];
        $product_image	=	$pp_price['product_image'];
        $single_price	=	$pp_price['product_price'];

        ?>
    <tr>

        <td align="center">
            <?php echo $product_title ?>
        </td>

        <td align="center">
            <img src="<?php echo $product_image ?>" width="60" height="45" >
        </td>

        <td align="center">
            <?php echo $pro_qty; ?>
        </td>

        <td align="center">
            <?php
            $total=($single_price*$pro_qty);
            echo $total;
            ?>
        </td>
        <?php
        }
        ?>
    </tr>
    <?php
    }
    ?>
    <tr>
        <td></td><td></td>
        <td align="center"><b style="font-size:30px;">مبلغ کل</b></td>
        <td align="center"><b><?php echo $_GET['Total_Amount']; ?></b></td >
    </tr>

</table>