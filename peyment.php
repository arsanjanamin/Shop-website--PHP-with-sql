<?php
include 'includes/db.php';

$order_email='';
$order_total_price='0';
if (isset($_COOKIE['userEcommerceIp']))
{
    $ip=$_COOKIE['userEcommerceIp'];
}
 else 
{     $ip= getIp();
     setcookie('userEcommerceIp',$ip,time()+122200000);
 }

$sqli_payment1="select * from total where ip ='$ip' ";
$query_run1= mysqli_query($connection,$sqli_payment1);

while ($ip_to = mysqli_fetch_assoc($query_run1))
{
    $order_total_price=$ip_to['price_total_purchase'];
}
$order_email = $_SESSION['customer_email'];

$query = "INSERT INTO `order`(`order_total_price`, `order_is_verified`, `order_email_customer`) VALUES ($order_total_price,'false','$order_email')";
$run_order = mysqli_query($connection, $query);

$sql_order_id="SELECT `order_id` FROM `order` WHERE `order_email_customer`='$order_email'";
$run_order_q2= mysqli_query($connection, $sql_order_id);
$array_order_id=array();
while ( $row3= mysqli_fetch_assoc($run_order_q2)  )
{
    array_push($array_order_id, $row3['order_id']);
}

$last_id_based_customer_email= end($array_order_id);

$_SESSION['order_id']=$last_id_based_customer_email;

$_SESSION['order_total_price']=$order_total_price;

if ($run_order)
{
    echo "<script>window.open('request.php','_self')</script>";
}