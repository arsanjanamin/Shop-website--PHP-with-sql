<?php
require 'functions/functions.php';
/*  inja bara serie avali yani linkhast ke khodam kenare checkboxha gozashtam*/

if (isset($_GET['products_id_d']))
{
    $prod_id=$_GET['products_id_d'];
    if (isset($_COOKIE['userEcommerceIp']))
    {
        $user_ip=$_COOKIE['userEcommerceIp'];
     global $connection;

     $get_cart="delete from cart where p_id =$prod_id AND ip_add='$user_ip'";
        $run_cart_del=mysqli_query($connection,$get_cart);
        if ($run_cart_del)
        {
            echo "<script>   alert('فیلد شما با موفقیت ویرایش و حذف شد.');  </script>";
            header("location:cart.php");
            exit();
        }
    }else
    {
        echo "شما مجاز به حذف نیستید";
    }
}

/* ta inja bara serie avali yani linkhast ke khodam kenare checkboxha gozashtam*/
global $connection;

if(isset($_COOKIE["userEcommerceIp"]))
		{
				$ip	= $_COOKIE["userEcommerceIp"];
		}else{
				$ip=getIp();
				setcookie('userEcommerceIp',$ip,time()+1206900);
		}
if (isset($_POST['update_cart']))
{
    echo "if avali okkkkkk<br>";
    if (isset($_POST['remove']))
    {
        echo "if dvmi okkkkkk<br>";

        foreach ($_POST['remove'] as $remove_id)
        {
            echo "foreach  okkkkkk<br>";

            $get_sql="delete from cart where ip_add='$ip' AND p_id='$remove_id'";

            $run_remove=mysqli_query($connection,$get_sql);
        if($run_remove)
        {
            $_SESSION['message']="سبد خرید شما با وفقیت ویرایش شد";
            echo "<script>window.open('cart.php','_self')</script>";

        }

        }

    }


}

if (isset($_POST['continue']))
{
    echo "<script>window.open('index.php','_self')</script>";
}


if (isset($_POST['update_cart']))

{

    $str_ip=str_replace(".","" ,$ip);

    $update_qty=$_POST["$str_ip$product_id"];

}