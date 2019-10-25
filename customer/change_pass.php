<?php
require 'includes/db.php';

$errors=array();
?>
<center>

<p style="text-align: center;font-size:20px;color: #fff ;background-color:#440522;
border-radius: 8px 8px; padding: 12px 0px;margin-bottom: 34px;
width: 32%; box-shadow: 2px 2px #2f437e;">    تغییر رمز عبور</p>
</center>
<div class="alert alert-warning alert-dismissable fade in" >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<p style="text-align: center ;font-size: 19px ;">    قبل از انتخاب پسورد حتما این قوانین را مطالعه بفرمایید.</p>
<span style="color: #1a1a1a; font-size: 13px ;line-height: 2" >
                •	پسورد شما باید حداقل 6 کاراکتر و حداکثر 12 کاراکتر باشد.<br>
                •	در پسورد خود حتما باید از ارقام 0تا 9 استفاده کنید.<br>
                •	در پسورد خود از حروف بزرگ  یا کوچک انگلیسی استفاده کنید.<br>
                •	در پسورد خود حتما باید از علامت @ یا $ استفاده نمایید.<br>

</span>
</div>

<br>
   <table align="center" style="text-align: right;!important" border="0px solid" class="table-responsive " cellspacing="22" cellpadding="22">
       <form action="my_account.php?change_pass" method="post" enctype="multipart/form-data">

       <tr >
           <td colspan="3"><span class="" style="color:#260306 ;font-size: 17px ;" >رمز عبور قدیمی:</span></td>
           <td  colspan="3">
               <input  type="text" name="old_pass" style=" height:36px" placeholder="رمز عبور فعلی خود را وارد کنید"  class="" >
           </td>
       </tr>



       <tr >
           <div class="form-group">
           <td  colspan="3">
               <span style="color:#260306 ;font-size: 17px ;">رمز عبور جدید:</span></td>
           <td  colspan="3">
               <input type="text" name="new_pass" placeholder="رمز عبور جدید " style=" height:36px"  class="form-control span3 " >
           </div>
           </td>
       </tr>
           <td  colspan="3">
               <span style="color:#260306 ;font-size: 17px ;">تکرار رمز عبور جدید:</span></td>
           <td  colspan="3">
               <input type="text" name="repeat_new_pass" style=" height:36px" placeholder="تکرار رمز عبور جدید:"  class="" >
           </td>
       </td>

           <tr>
               <td colspan="6">
              <center>     <input type="submit" name="btn_update" class="btn btn-primary btn-lg" style=" height: 57px;
    width: 102px;
    font-family: b yekan;
    border-radius: 8px 8px;
    font-size: 16px;

" value="تغییر رمز"></center>
               </td>
           </tr>


       </form>

   </table>



<?php

if (isset($_POST['btn_update']))
{
    if (empty($_POST['old_pass']))
    {        array_push($errors,"لطفا حتما رمزعبور فعلی را وارد نمایید");    }
    else
    {
        $old_password=mysqli_real_escape_string($connection,$_POST['old_pass']);
        if (empty($_POST['new_pass']))
        {
            array_push($errors,"لطفا حتما رمزعبور جدید را وارد نمایید");
        }else {
            $new_password = mysqli_real_escape_string($connection, $_POST['new_pass']);


                if ((!empty($_POST['repeat_new_pass'])) && ($new_password == $_POST['repeat_new_pass']))
                {
                    $user = $_SESSION['customer_email'];
                    $old_sql = "select * from customers where customer_pass='$old_password' AND customer_email='$user'  ";
                    $run_old = mysqli_query($connection, $old_sql);
                    $old_num = mysqli_num_rows($run_old);

                    if (preg_match("/^(?=.*[A-z])(?=.*[0-9])(?=.*[$@])\S{6,12}$/", $new_password))
                    {
                        if ($old_num == 0)
                        {
                            array_push($errors, "رمز قبلی خود را اشتباه وارد کرده اید و در سیستم موجود نیست لطفا بررسی کنید");

                        } else
                        {

                            $new_sql = "update customers set customer_pass='$new_password' where customer_email='$user'  ";
                            $new_run=mysqli_query($connection,$new_sql);
                            if ($new_run)
                            {
                                echo "<script>alert('رمز عبور شما با موفقیت ویرایش شد')</script>";
                                echo "<script>window.open('my_account.php?change_pass','_self')</script>";
                            }
                        }

                    }
                    else
                    {
                        array_push($errors, "رمز جدید امنیتش پایین بوده و با معیارهای امنیتی تطابق ندارد .لطفا راهنمارا بخوانید");
                    }


                }
                else
                {
                    array_push($errors, "رمز جدید با تکرارش برابر نیست");
                }



        }


    }


    if (count($errors!=0))
    {
        include 'includes/errors.php';
    }

}



?>



