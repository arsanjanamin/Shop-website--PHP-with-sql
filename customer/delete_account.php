<form action="my_account.php?delete_account" method="post" class="">
      <center>
                 <h1 style="
                 text-align: center;font-size:20px;color: #fff ;background-color:#5a2d83;
border-radius: 8px 8px; margin-bottom: 34px;
 box-shadow: 2px 2px #2f437e;
    width: 230px;height: 36px;background-color:#440522 ;color: #fff;" class="h1 text-center ">حذف حساب کاربری</h1>
      </center>

        <div class="alert alert-warning alert-dismissible" style="margin-top: 22px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p style="font-size: 17px;line-height: 1cm" class=" text-center "><strong>اخطار:</strong>
            در صورت حذف اکانت امکان برگرداندن دوباره آن اصلا وجود ندارد .
        پس در صورت اطمینان از حذف حساب کاربری بر روی دکمه حذف کلیک کنید.</p>
        </div>
        <div class="control-group">
        <input  type="submit" name="btn_send" value="حذف حساب کاربری" class="btn btn-warning btn-large" style="margin: 30px 30px;font-family: B Yekan ;font-size: 19px">
        <input type="button" name="btn_cancel" class="btn btn-primary btn-large" value="لغو عملیات حذف" style="font-family: B Yekan;font-size: 19px">
    </div>

</form>



<?php

if (isset($_POST['btn_send']))
{
    $user=$_SESSION['customer_email'];
    $sql_delete="delete from customers where customer_email='$user'";
    $run_del=mysqli_query($connection,$sql_delete);

    if (mysqli_affected_rows($connection)>0)
    {
        echo "<script>alert('حساب کاربری شما با موفقیت حذف شد')</script>";
        echo "<script>window.open('../logout.php','_self')</script>";
    }else
    {
        echo "<script>alert('خطایی رخ داده است لطفا دوباره تلاش کنید')</script>";
    }

    if (isset($_POST['btn_cancel']))
    {
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}

    ?>