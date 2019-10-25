
<!-- start of Header -->
<?php	include('includes/headers1.php');	?>
<!-- end of Header -->

<!---- Start Online Shopping Cart ---->
<?php     include 'includes/sabade-kharid.php';    ?>
<!---- end Online Shopping Cart ---->

<!-- start of content -->

<div id="templatemo_content">

        <div id="templatemo_content_left">

        	<h1 style="text-align: right">به فروشگاه زنجیره ای مجازی امینا خوش آمدید</h1>
            <p style="text-align: right">امروزه با افزایش روز افزون تولیدکنندگان مطرح داخلی و خارجی
                انواع لوازم، قدرت انتخاب مشتری به شدت بالا رفته است. اما با توجه به اینکه هیچ فروشگاهی به
                طور فیزیکی، گنجایش تمامی این محصولات را نداشته و نیز هیچ فروشنده‌ای اطلاعات کاملی از تمامی
                محصولات موجود در فروشگاه خود ندارد و حتی در صورت داشتن تمامی اطلاعات،
                 کام بر آن شد تا یک مرجع جامع و کامل تخصصی
                ارزیابی، مشاوره و فروش محصولات  تولید داخل و خارج کشور را
                بصورت یک فروشگاه اینترنتی در اختیار عموم مردم ایران قرار دهد</p>
             <div class="cleaner_with_height">&nbsp;</div>
            <?PHP
           getPro();
            get_Category_Productions();
            get_Brands_Productions();
            ?>
             <div class="cleaner_with_height">&nbsp;
             </div>
        </div> <!-- end of ocntent left -->
        <?php     include 'includes/Right_Sidebar.php';    ?>

        <div class="cleaner">
         </div>
    </div>

<!-- end of content -->

<!-- start of footer -->
<?php include('includes/Footer.php');	?>
<!-- end of footer -->
