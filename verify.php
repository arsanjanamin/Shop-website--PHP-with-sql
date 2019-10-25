<!-- start of Header -->
<?php	include('includes/headers1.php');
include("includes/db.php");
?>
<!-- end of Header -->
<!-- start of content -->
<div id="templatemo_content">
    <?php
    // We connect to the database
    $order_id=	$_GET['order_id_for_verify'];
    if ($_GET['Status'] == 'OK') {
        $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
        $Amount = $_GET['Amount']; //Amount will be based on Toman
        $Authority = $_GET['Authority'];

        $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentVerification(
            [
                'MerchantID' => $MerchantID,
                'Authority' => $Authority,
                'Amount' => $Amount,
            ]
        );

        if ($result->Status == 100) {
           echo "<p style='background:green; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'>از خرید شما متشکریم کد RefID برای پیگیری های بعدی شما :".$result->RefID."می باشد.</p>";
            $RefID=$result->RefID;
            mysqli_query($connection,"UPDATE `order` SET `order_is_verified`='true', `refid`=$RefID WHERE `order_id`=$order_id ");

            /*peida kardane ip taraf*/
            if(isset($_COOKIE['userEcommerceIp']))
            {
                $ip=$_COOKIE['userEcommerceIp'];
            }
            else
            {
                $ip=getIp();
                setcookie("userEcommerceIp",$ip,time()+2000000);
            }


            //Copy kardane data az table cart  to  pay _cart
            mysqli_query($connection,"insert into pay_cart (p_id, ip_add, qty) SELECT p_id, ip_add, qty FROM cart WHERE ip_add='$ip' ");


            $run_pays_cart=mysqli_query($connection,"select * from pay_cart where ip_add='$ip' order by id_cart desc limit 1 ");
            while ($run_time = mysqli_fetch_array($run_pays_cart))
            {
                $time=$run_time["order_time"];
            }
            mysqli_query($connection,"UPDATE `pay_cart` SET `order_id`=$order_id WHERE `order_time`='$time'");

            //destroying the session
            unset($_SESSION["order_total_price"]);
            unset($_SESSION["order_id"]);


                //destroying sessions that hold the qty.
                $str_ip= str_replace(".", "", "$ip");
                $query_delete_session="SELECT * FROM `pay_cart` WHERE `order_id`=$order_id";
                $run_delete_session=mysqli_query($connection,$query_delete_session);
                while ($row = mysqli_fetch_array($run_delete_session))
                {
                    $product_id=$row["p_id"];
                    unset($_SESSION["$str_ip"]["$product_id"]);
                }
                 //Delete customer data from the cart data table
                mysqli_query($connection,"DELETE FROM cart WHERE ip_add='$ip'");

            

        }
        else
        {
            echo "<p style='background:red; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'> تراکنش انجام نشد : 
		  :".$result->Status."</p>";
        }
    } else {
        echo "<p style='background:red; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'> تراکنش توسط کاربر انجام نشد </p>";
    }
    ?>
</div>
<!-- end of content -->

<!-- start of footer -->
<?php include('includes/Footer.php');	?>
<!-- end of footer -->