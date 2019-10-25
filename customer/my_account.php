
<!-- start of Header -->
<?php	include('includes/headers1.php');
if (!isset($_SESSION['customer_email']))
{
    echo "<script>window.open('../checkout.php','_self')</script>";
}

?>
<!-- end of Header -->




<!-- start of content -->

<div id="templatemo_content">

    <div id="templatemo_content_left">
        <div class="cleaner_with_height">&nbsp;</div>






        <?php

        if (!isset($_GET['my_order']))
        {
            if (!isset($_GET['edit_account']))
            {
                if (!isset($_GET['change_pass']))
                {

                    if (!isset($_GET['delete_account']))
                    {
                        $name =$_SESSION['customer_name'];
                        $lastname_customer = $_SESSION['customer_lastname'];
                        echo "
                        <div class='alert alert-info alert-dismissible fade in' style='padding: 35px 0cm'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
 <span style='font-family: b nazanin;font-size:22px;'>
 سلام   $name $lastname_customer   خوش آمدی به پروفایلت </span>";
                        echo "
                        <br>
                            <span style='font-size:17px;font-family: b nazanin; margin: 7px 0;line-height: 2'>
                        <strong>اگر شما قصد شخص سازی اطلاعاتتان را دارید کافی است
                            <a href='my_account.php?my_order' style='font-family: b nazanin;font-size:22px;'>
                                اینجا را </a>کلیک کنید</strong></span>
                            </div>";
                   }
                }
            }
        }

        if (isset($_GET['edit_account']))
        {
            include 'edit_account.php';
        }
        if(isset($_GET['change_pass']))
        {
            include 'change_pass.php';
        }
        if(isset($_GET['delete_account']))
        {
            include 'delete_account.php';
        }

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
