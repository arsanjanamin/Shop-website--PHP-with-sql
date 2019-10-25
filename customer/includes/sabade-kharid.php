<!---- insert buy in cart table---->
<link rel="stylesheet" href="style/sidebar.css">
<div class="sidebar" >
    <h4 >سبد خرید شما</h4>
    <?php
    if (isset($_SESSION['customer_email']))
    {
        $customer_firstname=$_SESSION['customer_name'];
        $customer_lastname=$_SESSION['customer_lastname'];
        echo " <span class='sabad'> سلام $customer_firstname $customer_lastname ، خوش آمدید.</span><br/> ";
    }
    else
    {
        echo "    <span class='sabad'> سلام کاربر گرامی ، خوش آمدید.</span><br/>";
    }
    ?>
    <span class="sabad"> اجناس خریداری شده شما:    <?php total_items(); ?></span><br/>
    <div class="row-fluid">
    <span class="sabad">قیمت کل اجناس  :
        <?php
        total_prices();
        ?> </span>
</div>

    <div class="col-lg-12">
    <div class="control-group"><center>

            <?PHP
            if (!isset($_SESSION['customer_email']))
            {
               echo "<input type='button' class='btn btn-success' value='ورود به اکانت ' onclick=\"window.open('checkout.php','_self')\" >";

            }else
            {
                echo "<input type='button' class='btn btn-danger' value='خروج از اکانت ' onclick=\"window.open('logout.php','_self')\" >";
            }
            ?>



            <input type="button" class ="btn btn-success "  value="تایید خرید" onclick="window.open('cart.php','_self'); " "/>
        </center></div></div>
</div>
