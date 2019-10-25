<?PHP include 'includes/db.php';  ?>


<div class="well" style="text-align: right;align-items: center ;width: 359px; position: center;">
    <h5>بازیابی رمز عبور</h5><br>
    <p class="text-center">  لطفا ایمیل خود را وارد کنید.ایمیلی حاوی لینک راهنما برای شما ارسال خواهد شد. </p> <br><br>
    <form action="#" method="post">
        <div class="control-group">
            <label class="control-label" for="inputEmail0">ایمیل شما</label>
            <div class="controls">
                <input class="span4" type="text" name="inputEmail1" placeholder="Email">
            </div>
        </div>
        <div class="controls">
            <input type="submit" name="btn_submit" class="btn block" value="بازیابی رمز عبور">

        </div>
    </form>
</div>

<?PHP

if (isset($_POST['btn_submit']))
{
    $email_input=trim($_POST['inputEmail1']);
    if (empty($email_input))
    {
        echo "<script> alert('کادر ایمیل را حتما باید پر کنید') </script>";
    }
    else
    {
        if (filter_var($email_input,FILTER_VALIDATE_EMAIL)===false)
        {
            echo "<script> alert('ایمیل شما معتبر نیست .لطفا ایمیل معتبر وارد کنید') </script>";
        }
        else
        {
            $select_email="select customer_email from customers where customer_email = '$email_input' ";
            $run_selec_1=mysqli_query($connection,$select_email);
            $number_email=mysqli_num_rows($run_selec_1);

            if ($number_email == 1 )
         {
           $code=md5(uniqid(true));
           $update_customer="UPDATE customers SET lost='$code' WHERE customer_email='$email_input'";
           $run_update=mysqli_query($connection,$update_customer);
           $header_mail="بازگردانی رمز عبور شما در فروشگاه امین شاپ";
                $body = "با سلام به شما ، در این ایمیل لینک بازیابی رمز عبور برای شما ارسال شده است.
				کافی است برای تغییر رمز عبور خودتان بر روی لینک زیر فشار داده و مراحل را به صورت کامل انجام دهید با تشکر از شما. 
				http://2f6cba04.ngrok.io/sampleforshopkhodam2/flower_shop_577/updatepassword.php?email=$email_input&code=$code";

           $email_send=mail($email_input,$header_mail,$body);

           if ($run_update)
           {
               echo "<script>alert('ایمیل خود را چک کنید . ما برای شما لینکی برای تغییر پسورد ارسال کرده ایم!')</script>";

           }else {

               echo "<script> alert('متاسفانه فرایند بازگردانی و ارسال به ایمیل شما کامل نشد. لطفا دوباره تلاش کنید.')</script>";

           }

         }
            else
            {
                echo "<script>alert('متاسفم، با ایمیل $email_input هیچ اکانتی ثبت نشده است، شما می توانید در صفحه بعدی ثبت نام کنید!!!')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";            }
        }
    }
}


?>

