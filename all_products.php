
<!-- start of Header -->
<?php	include('includes/headers1.php');	?>
<!-- end of Header -->

<?php     include 'includes/sabade-kharid.php';    ?>




<div id="templatemo_content">


        <div id="templatemo_content_left">
            <h1 style="text-align: right">به فروشگاه زنجیره ای مجازی امینا خوش آمدید</h1>
            <p style="text-align: right">امروزه با افزایش روز افزون تولیدکنندگان مطرح داخلی و خارجی
                انواع لوازم، قدرت انتخاب مشتری به شدت بالا رفته است. اما با توجه به اینکه هیچ فروشگاهی به

                بصورت یک فروشگاه اینترنتی در اختیار عموم مردم ایران قرار دهد</p>
            <div class="cleaner_with_height">&nbsp;</div>

            <?PHP
            global $connection;

            //display products when not set cat_id and brand_id
            if((!isset($_GET['cat_id']))&&(!isset($_GET['brand_id']))){
                $get_pro="select * from products";
                $run_pro=mysqli_query($connection,$get_pro);
                echo"<h2> تمامی محصولات فروشگاه   </h2>";
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
					<img width='200' height='150' src='Admin_area/$pro_image' alt='image' />
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

    </div>
<?php     include 'includes/footer.php';    ?>
