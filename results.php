
<!-- start of Header -->
<?php	include('includes/headers1.php');	?>
<!-- end of Header -->
<?php     include 'includes/sabade-kharid.php';    ?>
<div id="templatemo_content">
        <?PHP
        global $connection;
        //display products when not set cat_id and brand_id
        if(isset($_GET['search']))
        {
            $search_query=$_GET['user_query'];
            $get_pro="select * from products where product_keywords like N'%$search_query%' ";
            $run_pro=mysqli_query($connection,$get_pro);
            echo"<h2 style='text-align:right ; width: 300px'> جستجوی کلمه "."  '".$search_query."  '"."در فروشگاه   </h2>";
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
					<h3 style='text-align: right ;width: 200px'>$pro_title</h3>
					<img width='200' height='2000' src='Admin_area/$pro_image' alt='image' />
					<div class='price'>قیمت:<span>$pro_price تومان</span></div>    
					<div class='buynow'><a href='#'>هم اکنون می خرید</a></div>
					<a href='details.php?product_id=$pro_id'>جزئیات</a>
				</div>";
            }
        }
        ?>

        <div class="cleaner_with_height">&nbsp;</div>

    </div> <!-- end of ocntent left -->
<?php     include 'includes/Right_Sidebar.php';    ?>

    <div class="cleaner">&nbsp;</div>
</div>
<?php     include 'includes/footer.php';    ?>
