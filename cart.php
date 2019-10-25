
<!-- start of Header -->
<?php	include('includes/headers1.php');	?>
<!-- end of Header -->
<?Php
$ip_search='';
$total_price="0";
/* check kardane cookie karbar*/
if (isset($_COOKIE["userEcommerceIp"]))
{
    $ip = $_COOKIE["userEcommerceIp"];
} else {
    $ip = getIp();
    setcookie('userEcommerceIp', $ip, time() + 1206900);
}
/* check kardane cookie karbar*/
if (isset($_POST['update_cart']))
{
    if (isset($_POST['remove']))
    {
       foreach ($_POST['remove'] as $remove_id)
        {
            $get_sql = "delete from cart where ip_add='$ip' AND p_id='$remove_id'";
            $run_remove = mysqli_query($connection, $get_sql);
            if ($run_remove)
            {
               $_SESSION['message'] = "سبد خرید شما با وفقیت ویرایش شد";
               echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}

if (isset($_POST['continue']))
{
    echo "<script>window.open('index.php','_self')</script>";
 }

if (isset($_POST['checkout']))    {

    if(isset($_COOKIE['userEcommerceIp']))
    {
        $ip=$_COOKIE['userEcommerceIp'];
    }
    else
    {
        $ip= getIp();
        setcookie('userEcommerceIp',$ip,time()+12000000);
    }
$total_price = $_SESSION['price_total_purchase'];

$query_t="SELECT * FROM total where ip='$ip' " ;
$query_t_run= mysqli_query($connection, $query_t);

while ($row = mysqli_fetch_assoc($query_t_run))
{
    $ip_search = $row['ip'];
}
if($ip == $ip_search)
{
    mysqli_query($connection,"update total set price_total_purchase ='$total_price' ");
}
 else 
{
    mysqli_query($connection, "insert into total (ip, price_total_purchase) values ('$ip', '$total_price')");
 
}
  echo "<script> window.open('checkout.php','_self')</script>";
        
    
}


//
///* in bara linke hazfe hamast*/
//if(isset($_GET['d_all'])){
//    if (isset($_COOKIE['userEcommerceIp']))
//    {
//        $user_ip=$_COOKIE['userEcommerceIp'];
//        global $connection;
//        $get_numbers="select * from cart where ip_add='$user_ip' ";
//        $run_number=mysqli_query($connection,$get_numbers);
//        while($row_cart_user=mysqli_fetch_array($run_number))
//        {
//            $pr_id=$row_cart_user['p_id'];
//            $del_all="delete from cart where p_id =$pr_id";
//            $run_all_del=mysqli_query($connection,$del_all);
//        }
//        if (mysqli_num_rows($run_number)<1)
//        {
//            echo "<script> alert('تمام فیلدهای شما با موفقیت حذف شد.');  </script>";
//            echo"<script>window.open('index.php','_self')</script>";
//        }
//    }else
//    {
//        echo "شما مجاز به حذف نیستید";
//    }
//}
///* end of linke hazfe hameeeeeeeeeeeeeeeeee*/
//
//
?>

<!-- start of content -->

<div id="templatemo_content">

    <div id="templatemo_content_left">

        <h1 style="text-align: center">به فروشگاه زنجیره ای مجازی امین خوش آمدید</h1>
        <div style="cleaner_with_height">&nbsp;</div>
        <?PHP
        if (isset($_SESSION['message']))
        {
          $message= "<center><h1 class='message_session1'>" .$_SESSION['message']."</h1></center>";
         session_destroy();
        } else
            {
                $message ='';
            }
        echo $message;
        ?>
        <form action="cart.php" method="post" enctype="multipart/form-data">

         <table align="center" width='100%' style="background-color:#f7caff;">

             <tr aria-colspan="5" style="width:100%;background-color:#ff99b8; border:1px solid #000;">
                 <td colspan="6" style="text-align:center;">
                     <p style="	padding: 15px 10px;	font-size:20px;	color:#000;	text-align: center;">
                         محصولاتی که تا اکنون شما خریده اید
                     </p>
                 </td>

             </tr>
             <tr  style="border: 1px solid black;" >
                 <th colspan="2" style="border: 1px solid black;padding: 15px;text-align:right;">محصول</th>
                 <th style="border: 1px solid black;padding: 15px;text-align:right;">تصویر</th>
                 <th style="border: 1px solid black;padding: 15px;text-align:right;">قیمت</th>
                 <th style="border: 1px solid black;padding: 15px;text-align:right;">تعداد</th>
                 <th style="border: 1px solid black;padding: 15px;text-align:right;">حذف</th>
             </tr>

<?PHP
             global $connection;
             $product_price_total=0;

             $get_cart="select * from cart where ip_add = '$ip' ";
             $run_cart_ip=mysqli_query($connection,$get_cart);

             while ($rows_cart= mysqli_fetch_array($run_cart_ip))
             {
                 $qty_cart=$rows_cart['qty'];
                 $products_id=$rows_cart['p_id'];

                 $get_products="select * from products where product_id = $products_id";
                 $run_products=@mysqli_query($connection,$get_products);

                 while($prod_row=mysqli_fetch_array($run_products))
                 {
                  $product_price_single=$prod_row['product_price']   ;
                  $product_title=$prod_row['product_title'] ;
                  $product_image=$prod_row['product_image'] ;
               /*    $product_pricess=array($prod_row['product_price'] * $qty_cart) ;
                                    $pricess_temp=array_sum($product_pricess);
                                   $product_price_total +=$pricess_temp;          */
?>

                    <tr align="center" style="border: 1px solid black;">
                        <td colspan="2" style="padding: 15px;text-align:right;">
                            <?PHP echo  $product_title   ?></td>
                        <td style="padding: 15px;">
                            <img class="img-polaroid" src="Admin_area/<?php echo $product_image ?>" width="70" height="70" >
                        </td>

                        <td style="padding: 15px;">
                            <?PHP echo  $product_price_single   ?></td>

                        <td style="padding: 15px;" >


                           <?php
                            if (isset($_POST['update_cart']))
                            {
                            $str_ip = str_replace(".", "", $ip);

                            $qty = $_POST["$str_ip$products_id"];
                            $get_update_qty="update cart set qty='$qty' where p_id='$products_id' ";
                            $run_qty=mysqli_query($connection,$get_update_qty);
                            $_SESSION["$str_ip"]["$products_id"]=$qty;
                            }
                            $str_ip=str_replace(".","",$ip);
                            if (isset($_SESSION["$str_ip"]["$products_id"]))
                            {
                                echo "<input type='text' style=\"width:55px!important;\" name='$str_ip$products_id' value='". $_SESSION["$str_ip"]["$products_id"]."'>";

                                $quantity = $_SESSION["$str_ip"]["$products_id"];

                                $product_price_total +=($product_price_single *$quantity);
                            }else {
                                echo "<input type='text' style=\"width:55px!important;\" name='$str_ip$products_id' value='$qty_cart'>";
                                $product_price_total+=($product_price_single * $qty_cart);
                            }
                           ?>
                        </td>
                        <td style="padding: 15px;text-align:right;">

                            <input type="checkbox" name="remove[]" value="<?PHP echo $products_id    ?>" />
                        </td>
                    </tr>

                     <?PHP
                 }
             }
             ?>

             <tr align="left" style="border: 1px solid black;">
                 <td colspan="2" style="padding: 15px;text-align:right;">قیمت کل :</td>

                 <td colspan="2" style="padding: 15px;text-align:right;"><?PHP
                 
                 echo $product_price_total."تومان"  ;
                 $_SESSION['price_total_purchase']=$product_price_total ;
                 
                 ?></td>

                 <td colspan="2" style="padding: 15px;text-align:right;">
                     <input type="submit" name="update_cart" value="به روز رسانی خرید های شما"/>


             <tr align="center" style="border: 1px solid black;">

                 <td colspan="2" style="padding:15px;">
                     <input type="submit" name="continue" value="ادامه خرید"/>
                 </td>

                 <td></td>

                 <td>
                     <button name="checkout">    تسویه حساب </button>
                 </td>

                 <td></td>

                 <td>

                 </td>

             </tr>

<!-- جمع کل ردیف آخر-->
             <tr align="left" style="border:1px solid black;" >

                 <td colspan="5" style="padding: 15px;">
                     <b>جمع کل:</b>
                 </td>

                 <td style="padding: 15px;">
                     <b><?php echo $product_price_total." تومان "; ?></b>
                 </td>

             </tr>

         </table>

        </form><!--form end-->



        <div class="cleaner_with_height">&nbsp;</div>

    </div> <!-- end of ocntent left -->

    <?php     include 'includes/Right_Sidebar.php';    ?>


    <div class="cleaner">&nbsp;</div>
</div>

<!-- end of content -->


<!-- start of footer -->
<?php include('includes/Footer.php');	?>
<!-- end of footer -->
