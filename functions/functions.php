<?php
session_start();

$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="ecommerce";
global $connection ;

$connection=mysqli_connect($db_host,$db_username,$db_password,$db_name) or die("خطا در برقراری ارتباط با پایگاه داده");
$run_pro=@mysqli_query($connection,"SET NAMES utf8");
$run_pro=@mysqli_query($connection,"SET CHARACTER SET utf8");
if (!mysqli_connect_errno()==0)
{    echo"خطا در برقراری ارتباط با پایگاه داده".mysqli_connect_errno();   }

function getCat()
{    global $connection;
    $get_cat="select * from categories";
    $run_cat=@mysqli_query($connection,$get_cat);
    while($row_cat = mysqli_fetch_assoc($run_cat))
    {
        $cat_id=$row_cat['cat_id'];
        $cat_title=$row_cat['cat_title'];
        echo "<li><a href='index.php?cat_id=$cat_id'>$cat_title</a></li>";
    }
}

function getBrands()
{
    global $connection;
    $get_brand="select * from brands";
    $run_brand=@mysqli_query($connection,"SET NAMES utf8" );
    $run_brand=@mysqli_query($connection,"set character set utf8");
    $run_brand=@mysqli_query($connection,$get_brand);
    while($row_brand = mysqli_fetch_assoc($run_brand))
    {
        $brand_id=$row_brand['brand_id'];
        $brand_title=$row_brand['brand_title'];
        echo "<li><a href='index.php?brand_id=$brand_id'>$brand_title</a></li>";
    }
}

function getPro()
{
    global $connection;
    if (!isset($_GET['cat_id']) && !isset($_GET['brand_id']))
    {
        $product_sql = "select * from products order by RAND() limit 0,9";
        $product_query=mysqli_query($connection,$product_sql);

        echo "<h2 style='text-align:right '>:جدید ترین محصولات</h2>";
        while($row_prod=mysqli_fetch_array($product_query))
        {
            $pro_id=$row_prod['product_id'];
            $pro_cat=$row_prod['product_cat'];
            $pro_brand=$row_prod['product_brand'];
            $pro_title=$row_prod['product_title'];
            $pro_price=$row_prod['product_price'];
            $pro_desc=$row_prod['product_desc'];
            $pro_image=$row_prod['product_image'];
            $pro_keywords=$row_prod['product_keywords'];

            echo "
                <div class='product_box'>
                <h3 style='text-align: right '>$pro_title</h3>
                <img width='140' height='140' class='img-polaroid' src='admin_area/$pro_image' alt='image'>
                <div class='price' style='text-align: center '>قیمت:<span>$pro_price تومان</span></div> 
                <div class='buynow'><a href='index.php?add_cart=$pro_id'>هم اکنون بخرید</a></div>
                <a href='details.php?product_id=$pro_id'>جزئیات</a>
                </div>
                   ";
       }
    }
}

//display products when set cat_id in hamun getCatPro hasttttttttt
function get_Category_Productions()
{
    global $connection;
    if(isset($_GET['cat_id'])){

        $pro_cat_id=$_GET['cat_id'];
        //query getting products of cat
        $get_pro="select * from products where 	product_cat='$pro_cat_id' ";

        //query getting name of category
        $get_cat_name="select cat_title from categories where cat_id='$pro_cat_id' ";

        $run_pro=@mysqli_query($connection,"SET NAMES utf8");
        $run_pro=@mysqli_query($connection,"SET CHARACTER SET utf8");
        $run_pro=mysqli_query($connection,$get_pro);
        $run_cat_name=mysqli_query($connection,$get_cat_name);

        //display name of category
        while($row_cat_name = mysqli_fetch_array($run_cat_name))
        {
            $pro_cat_name=$row_cat_name['cat_title'];
            echo"<h2 style='text-align: right'>$pro_cat_name</h2>";
        }

        //display message when empty of category
        $cunt_pro_cat=mysqli_num_rows($run_pro);
        if($cunt_pro_cat==0)
        {
            echo"<br/><br/><b><h3>متاسفانه محصول خاصی در این دسته وجود ندارد</h3></b>";
        }

        //display products of category
        while($row_pro=mysqli_fetch_array($run_pro))
        {

            $pro_id=$row_pro['product_id'];
            $pro_cat=$row_pro['product_cat'];
            $pro_brand=$row_pro['product_brand'];
            $pro_title=$row_pro['product_title'];
            $pro_price=$row_pro['product_price'];
            $pro_desc=$row_pro['product_desc'];
            $pro_image=$row_pro['product_image'];

            echo"
				<div class='product_box'>
					<h3>$pro_title</h3>
					<img width='150' height='150' src='Admin_area/$pro_image' alt='image' />
					<div class='price'>قیمت:<span>$pro_price تومان</span></div>                           
					<div class='buynow'><a href='index.php?add_cart=$pro_id'>هم اکنون می خرید</a></div>
					<a href='details.php?product_id=$pro_id'>جزئیات</a>
				</div>";
        }
    }
}



/* tabeye get brans az product*/
//display products when set brand_id in hamun getBrandPro hasttttttttt

function get_Brands_Productions()
{
    global $connection;
    if (isset($_GET['brand_id']))
    {

        $brands_id=$_GET['brand_id'];
        //query getting products of brand
        $get_pro="select * from products where product_brand = $brands_id ";
        //query getting name of brand
        $get_brand_name="select brand_title from brands where brand_id = $brands_id";

        $run_pro=mysqli_query($connection,"SET NAMES utf8");
        $run_pro=mysqli_query($connection,"SET CHARACTER SET utf8");
        $run_pro =mysqli_query($connection,$get_pro);
        $run_brand_name = mysqli_query($connection,$get_brand_name);

        //display name of brand
        while($row_brands=mysqli_fetch_array($run_brand_name))
        {
            $row_brand_title = $row_brands['brand_title'];
            echo "<br><br><h2 style='text-align: right' >$row_brand_title</h2>";
        }


            if (mysqli_num_rows($run_pro)==0)
            {
                echo"<br/><br/><b><h3>متاسفانه محصول خاصی در این دسته وجود ندارد</h3></b>";
            }

        while ($row_brand_pro = mysqli_fetch_array($run_pro))
        {
            $product_id=$row_brand_pro['product_id'];
            $product_title=$row_brand_pro['product_title'];
            $product_cat=$row_brand_pro['product_cat'];
            $product_brand=$row_brand_pro['product_brand'];
            $product_price=$row_brand_pro['product_price'];
            $product_desc=$row_brand_pro['product_desc'];
            $product_image=$row_brand_pro['product_image'];

            echo "
            <div class='product_box'>
            <h2 style='text-align: right'>$product_title</h2>
            <img src='admin_area/$product_image' height='140' width='140' alt='image'>
            <div class='price'>قیمت: <span>$product_price تومان</span></div>
            <div class='buynow'><a href='index.php?add_cart=$product_id'>هم اکنون بخرید</a> </div>
            <a href='details.php?product_id=$product_id'>توضیحات</a>
            </div>
           
            ";
        }

    }
}

function getIp()
{
    $ip=$_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;

}


function cart()
{
    global $connection ;
    if (isset($_GET['add_cart']))
    {
        $pro_id=$_GET['add_cart'];
        if (isset($_COOKIE['userEcommerceIp']))
        {
           $ip=$_COOKIE['userEcommerceIp'];
        }else
        {
            $ip=getIp();
            setcookie('userEcommerceIp',$ip,time()+1200000);
        }

        $check_pro="select * from cart where p_id='$pro_id' AND ip_add = '$ip' ";
        $run_pro=@mysqli_query($connection,$check_pro);
        if (@mysqli_num_rows($run_pro)>0)
        {
            echo "";
        }
        else
        {
          $insert_pro="insert into cart (p_id,ip_add,qty) values('$pro_id','$ip',1)";
          $run_insert_pro=@mysqli_query($connection,$insert_pro);
        }
    }
}
//getting the total added items
function total_items()
{
    if(isset($_GET['add_cart']))
    {
        global $connection;
			//creating or using cookie
			if(isset($_COOKIE["userEcommerceIp"]))
            {
                $ip	= $_COOKIE["userEcommerceIp"];
            }else{
                $ip=getIp();
                setcookie('userEcommerceIp',$ip,time()+1206900);
            }
    $get_items = "select * from cart where ip_add='$ip'";

			$run_items=@mysqli_query($connection,$get_items);

			$count_items=@mysqli_num_rows($run_items);
	}
    else
    {
        global $connection;
			//creating or using cookie
			if(isset($_COOKIE["userEcommerceIp"]))
            {
                $ip	= $_COOKIE["userEcommerceIp"];
            }else
            {
                $ip=getIp();
                setcookie('userEcommerceIp',$ip,time()+1206900);
            }
    $get_items = "select * from cart where ip_add='$ip'";

			$run_items =@mysqli_query($connection,$get_items);

			$count_items =@mysqli_num_rows($run_items);
		}

    echo $count_items;

}

function total_prices()
{
    global $connection;
    $total= 0 ;

    if (isset($_COOKIE['userEcommerceIp']))
    {
        $ip=$_COOKIE['userEcommerceIp'];
    }  else  {
        $ip=getIp();
        setcookie('userEcommerceIp',$ip,time()+12000000);
    }
    $sql_cart="select * from cart where ip_add='$ip'";
    $query_cart=mysqli_query($connection,$sql_cart);

    while ($cart_pro = mysqli_fetch_array($query_cart))
    {
        $pro_id=$cart_pro['p_id'];
        $pro_qty=$cart_pro['qty'];

     $sql_products="select * from products where product_id ='$pro_id'";
     $query_products = mysqli_query($connection,$sql_products);
        while ($products_all = mysqli_fetch_array($query_products))
        {
            $product_price=array($products_all['product_price'] * $pro_qty);
            $value1=array_sum($product_price);
            $total+=$value1;
        }
    }
    echo $total."  تومان ";

}