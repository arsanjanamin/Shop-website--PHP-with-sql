<!-- start of Header -->
<?php	include('include/headers1.php');	?>
<!-- end of Header -->

<div id="templatemo_content">

    <!-- start of ocntent left -->
    <div id="templatemo_content_left">


        <div class="cleaner_with_height">&nbsp;</div>

        <?PHP
        if(isset($_GET['MessageToAdmin']))
        {
            $message=$_GET['MessageToAdmin'];
            echo"<h1 style='width:650px;margin:60px 80px 50px 33px;'>$message</h1>";
        }
        if (isset($_GET['insert_pro']))
        {
            include 'insert_product.php';
        }

        if(isset($_GET['view_pro']))
        {
            include 'view_product.php';
        }
        if (isset($_GET['edit_pro']))
        {
            include 'edit_product.php';
        }
        if(isset($_GET['insert_cat']))
        {
            include 'insert_cat.php';
        }
        if(isset($_GET['view_cats']))
        {
            include 'view_cats.php';
        }

        if (isset($_GET['edit_cats']))
        {
            include 'edit_cats.php';
        }
        if (isset($_GET['insert_brand']))
        {
            include 'insert_brand.php';
        }
        if (isset($_GET['view_brands']))
        {
            include 'view_brands.php';
        }
         if (isset($_GET['edit_brands']))
                {
                    include 'edit_brands.php';
                }
          if (isset($_GET['view_customers']))
                {
                    include 'view_customers.php';
                }

          if (isset($_GET['view_orders']))
          {
              include "view_orders.php";
          }
            if(isset($_GET['order_customer']))
            {
                include "order_customer.php";

            }

            if(isset($_GET['view_payments']))
            {
                include 'view_payments.php';
            }

            if (isset($_GET['logout_admin']))
            {
                include "logout_admin.php";
            }

        ?>




        <div class="cleaner_with_height">&nbsp;</div>



    </div>
    <!-- end of ocntent left -->

    <!-- start of right content -->
    <?php	include('include/Right_Sidebar.php');	?>
    <!-- end of right content -->

    <div class="cleaner">&nbsp;</div>
</div>

<!-- start of footer -->
<?php include('include/Footer.php');	?>
<!-- end of footer -->