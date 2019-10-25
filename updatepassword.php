<?php
include 'includes/db.php';
include  'includes/headers1.php';
?>
<div id="templatemo_content">

    <div id="templatemo_content_left">
        <h1>به سایت جهانگیر پچکم دات کام خوش آمدید </h1>
        <p>امروزه با افزایش روز افزون تولیدکنندگان مطرح داخلی و خارجی
            انواع لوازم، قدرت انتخاب مشتری به شدت بالا رفته است. اما با توجه به
            اینکه هیچ فروشگاهی به طور فیزیکی، گنجایش تمامی این محصولات را نداشته
            و نیز هیچ فروشنده‌ای اطلاعات کاملی از تمامی محصولات موجود در
            فروشگاه خود ندارد و حتی در صورت داشتن تمامی اطلاعات، توضیح تک تک آنها،
            نیازمند صرف انرژی و زمان بسیار زیادی خواهد بود، جهانگیر پچکم دات کام
            بر آن شد تا یک مرجع جامع و کامل تخصصی ارزیابی، مشاوره و فروش محصولات  تولید
            داخل و خارج کشور را بصورت یک فروشگاه اینترنتی در اختیار عموم مردم ایران قرار دهد.</p>
        <div class="cleaner_with_height">&nbsp;</div>


        <?php
        if (isset($_GET['email']) && $_GET['code']!=='')
        {
            $email=$_GET['email'];
            $code=$_GET['code'];

            $sql_checkmail="SELECT customer_email from customers where customer_email='$email' and lost='$code'  AND lost!='' ";
            $run_checkmail=mysqli_query($connection,$sql_checkmail);
            $num_mail=mysqli_num_rows($run_checkmail);

            if ($num_mail>0)
            {

                if (isset($_POST['password']))
                {
                    $c_password_validate=mysqli_real_escape_string($connection ,$_POST['password']);
                    if (empty($c_password_validate))
                    {
                        echo "<script>alert('پسورد خود را وارد نکرده اید!')</script>";

                    }else
                    {
                    if (preg_match("/^(?=.*[A-Z])(?=.*[0-9])(?=.*[@#])\S{6,12}$/", $c_password_validate)) {

                        $password = $c_password_validate;
                        $repassword=$_POST['re_password'];
                       if ($password === $repassword) {


                               $update_pass = "update customers set lost='' , customer_pass='$password' where customer_email='$email'";
                               $run_update = mysqli_query($connection, $update_pass);

                               if ($run_update)
                               {
                                   echo "<script>alert('پسورد شما با موفقیت تغییر کرد! اکنون با این پسورد جدید وارد سایت شوید!!!')</script>";
                                   echo "<script>window.open('checkout.php','_self')</script>";
                               }

                           }
                       else
                       {
                           echo "<script>alert('پسورد با تکرارش یکی نیست!!')</script>";
                       }
                       } else
                        {
                            echo "<script>alert('لطفا پسوردی با الگوی صحیح بنویسید!')</script>";

                        }
                    }
                }

                    echo
                    '
<center>
<div class="well" style="text-align: right;align-items: center ;width: 359px; position: center;">
    <h5>تنظیم مجدد رمز عبور</h5><br>
    <p class="text-center"> لطفا یک رمز جدید تعیین کنید که حتما یک کاراکتر و یک حرف بزرگ و کوچک لاتین داشته و حداقل 8 نویسه باشد. </p> <br><br>
    <form action="#" method="post">
        <div class="control-group">
            <label class="control-label" for="passwordlbl">رمز عبور</label>
            <div class="controls">
                <input class="span4" type="text" name="password" placeholder="password here">
            </div>
              <label class="control-label" for="passwordlbl2">رمز عبور مجدد</label>
            <div class="controls">
                <input class="span4" type="text" name="re_password" placeholder="Re-password">
            </div>
        </div>
        
        <div class="controls">
            <input type="submit" name="submit" class="btn block" value="تنظیم رمز عبور">

        </div>
    </form>
</div>
</center>
                    ';



            }else
            {
                echo "<script>alert('ایمیل شما اشتباه است .لطفا ثبت نام کنید')</script>";
                echo "<script>window.open('peyment.php')</script>";
            }

        }

        ?>


    <div class="cleaner_with_height">&nbsp;</div>
</div>
<!-- end of left content  -->

<!-- start of right content -->
<?php	include('includes/Right_Sidebar.php');	?>
<!-- end of right content -->
<div class="cleaner">&nbsp;</div>
</div>
<!-- end of content -->

<!-- start of footer -->
<?php include('includes/Footer.php');	?>
<!-- end of footer -->