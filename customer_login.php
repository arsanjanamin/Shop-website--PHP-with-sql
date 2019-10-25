<?PHP
include './includes/db.php';


if (isset($_POST['send_u_p']))
{
 $c_email_no_empty1 = mysqli_real_escape_string($connection,$_POST['email'])   ;
 $c_pass_validate1 = mysqli_real_escape_string($connection,$_POST['pass'])   ;

if (empty($c_email_no_empty1))
{
if (empty($c_pass_validate1))
{
    echo "<script>alert('لطفا هر دو کادر ایمیل و رمزعبور را پرکنید')</script>";
}else
{
    echo "<script>alert('کادر ایمیل الزامی است')</script>";
}
}
else
{
    if (empty($c_pass_validate1))
    {
        echo "<script>alert('کادر رمزعبور الزامی است')</script>";
    }
    else
    {
        if (filter_var($c_email_no_empty1,FILTER_VALIDATE_EMAIL) == true)
        {
            if (preg_match("/^(?=.*[A-z])(?=.*[0-9])(?=.*[$@])\S{6,12}$/",$c_pass_validate1))
            {
                $c_email=$c_email_no_empty1;
                $c_password=$c_pass_validate1;

            }else
            {
                echo "<script>alert('پسورد شما طبق الگو نمی باشد!!! پسورد صحیحی وارد نمایید.')</script>";
            }
            }
        else
        {
            echo "<script>alert('ایمیل شما طبق الگو نمی باشد!!! ایمیل را به صورت صحیح وارد نمایید.')</script>";
        }


        }
    }

if ( (isset($c_password)) && (isset($c_email)) )
{
$sel_c="select * from customers where customer_email='$c_email' AND customer_pass ='$c_password'";

$run_sel_c=mysqli_query($connection,$sel_c);

$check_user_c=mysqli_num_rows($run_sel_c);

if ($check_user_c==0)
{
    echo "<script>alert('نام کاربری و یا رمز عبور خود را اشتباه وارد کرده اید ، لطفا دوباره امتحان کنید!')</script>";
}else {
    $select_cust_2 = "select * from customers where customer_email='$c_email'";
    $run_select2 = mysqli_query($connection, $select_cust_2);

    while ($rows1 = mysqli_fetch_assoc($run_select2)) {
        $customer_login_name = $rows1['customer_name'];
        $customer_login_lastname = $rows1['customer_lastname'];
        $customer_confirm = $rows1['confirmed'];
    }
    if ($customer_confirm == 1) {
        if (isset($_COOKIE['userEcommerceIp'])) {
            $ip = $_COOKIE['userEcommerceIp'];
        } else {
            $ip = getIp();
            setcookie('userEcommerceIp', $ip, time() + 1200000);
        }
        $sel_cart1 = "select * from cart where ip_add ='$ip'";

        $run_cart = mysqli_query($connection, $sel_cart1);
        $check_cart = mysqli_num_rows($run_cart);
        if ($check_cart == 0) {
            $_SESSION['customer_email'] = $c_email;
            $_SESSION['customer_name'] = $customer_login_name;
            $_SESSION['customer_lastname'] = $customer_login_lastname;
            echo "<script>alert('$customer_login_name  $customer_login_lastname خوش آمدید، لاگین شما با موفقیت انجام شد. اکنون به صفحه پروفایل خود خواهید رفت!!!')</script>";
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        } else {
            $_SESSION['customer_name'] = $customer_login_name;
            $_SESSION['customer_lastname'] = $customer_login_lastname;
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('$customer_login_name  $customer_login_lastname خوش آمدید، لاگین شما با موفقیت انجام شد. اکنون برای پرداخت صورت حساب خود به درگاه زرین پال متصل خواهید شد!!!')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
    } else {
        echo "<script>alert('$customer_login_name  $customer_login_lastname  چرا ایمیل خودت را تایید نکرده ایی؟ به ایمیل خودت مراجعه کن و لینک ثبت نام را تایید کن!!!')</script>";
    }
}

    }


}



?>
<form action="" method="post">
    <table class="tbl_customer_login">
        <tr >
            <th colspan="3" style="padding: 15px 4px;border-radius: 6px 6px;background-color: ">
              <b style="font-size: 20px;color: #ffffff;"> لطفا وارد شوید </b>
            </th>
        </tr>

        <tr>
            <td colspan="2">
                <b style="font-size:18px;color:#FFFFFF ;margin: 5px 10px;"> ایمیل خود را وارد کنید : </b>
            </td>
            <td style="padding: 0px 0%">
                <input type="text" style="height:40px;width: 300px;font-size:25px;color:#000000 ;opacity: 0.6;  " name="email" size="120" required >
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b style="padding-right: 5px;font-size:18px;color:rgb(255,255,255) ;">   پسورد خود را وارد کنید :</b>
            </td>
            <td>
                <input type="password" style="height:40px;width: 300px;font-size:25px;color:#000000 ;opacity: 0.6;" name="pass" size="120" required >
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <b style="padding-right: -30px;">   &nbsp;</b>
            </td>
            <td>

                    <input type="submit"  name="send_u_p" class="send_login_customer btn btn-primary " value=" وارد می شوم " style="border-radius: 4% 4% 4% 4%;
        color: #ffff;
        height: 55px;
        width: 308px;
        font-size: 25px;"  >

            </td>
        </tr>

        <tr>
            <td colspan="2" >
                    <span class="forget-pass-span">
                        <a href="checkout.php?forgot_pass" >رمز خود رافراموش کرده اید ؟</a></span>
            </td>

            <td style="padding: 20px 10px;">
                  <span class="new-member-span" >
                     <a href="customer_register.php" style="color: #FFFFFF; "> اگر جدیدی از اینجا ثبت نام کن</a>                      </span>
            </td>
    </table>
</form>

<style>


    .tbl_customer_login
    {
        border: 1px solid #EBBCE5;
        width: 100%;
        margin: 10px 20px;
        padding: 5px;
        background: linear-gradient(#521e55, #3a4a7e);
        direction: rtl;
        border-radius:5px 6px;
    }
    .new-member-span
    {
       background-color: #6AD3A2;
        padding: 10px 20px;
        border-radius:5px 5px;
        margin-right: 100px;
        float: left;

    }

    .new-member-span:hover
    {
        background-color: #EEBD32;
     }

    .forget-pass-span
    {
    background-color: #6AD3A2;
    padding: 10px 6px;
    border-radius:5px 5px;
    margin-right: 15px;
}
    .forget-pass-span:hover
    {
        background-color: #ee421f;

    }

    .send_login_customer
    {


    }


</style>
