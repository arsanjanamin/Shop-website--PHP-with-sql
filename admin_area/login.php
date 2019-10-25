<?PHP
session_start();
include "include/db.php"; ?>

<!doctype html>
<html lang="fa" dir="rtl">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="خرید و فروش انواع وسایل" />
    <meta name="description" content="بهترین سایت طراحی شده تا اکنون" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>صفحه ورود مدیر</title>


    <!-- bootstrapeeee-->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <link rel="stylesheet" href="style/login.css">


</head>
<body >

<div class="container-fluid" style="margin-top: 100px;" >
    <div class="row">
        <div class="col-lg-4" style="">&nbsp;
        </div>
        <div class="col-lg-4" style="background-color: #521e55">
            <h2 class="text-center">ورود به پنل مدیریت</h2>

            <div class="form-div">

        <form method="post" action="">

          <div class="form-group">
              <label class="lbl_input" for="input_email">نام کاربری:</label>
              <input type="text" name="input_email" id="input_email" class="form-control"  placeholder=" لطفا ایمیل خود را وارد نمایید" required="required">
          </div>
            <div class="form-group">
                <label for="input_pass">رمز عبور :</label>
              <input type="password" name="input_pass" id="input_pass" class="form-control " placeholder="لطفا پسورد خود را وارد نمایید" required="required" >
                <input type="submit" style="margin:15px 0px" name="btn_login" class="btn btn-primary btn-block btn-large" value="ارسال">
          </div>
        </form>
            </div><!--form-div-->
        </div><!--col-lg-2-->
        <div class="col-lg-4" style=" ">  &nbsp;</div>
    </div><!--row end-->

</div><!--container end-->



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>

<?php

if (isset($_POST['btn_login']))
{
    $username=$_POST['input_email'];
    $password=$_POST['input_pass'];

    $sql_login=mysqli_query($connection,"select * from admin where admin_email='$username' AND admin_pass='$password'");
    $number_admin=mysqli_num_rows($sql_login);

    if ($number_admin==0)
    {
        echo "<script>alert('نام کاربری و رمز عبور خود را اشتباه وارد کرده اید ، لطفا دوباره امتحان کنید.')</script>";
    } else
    {
            $_SESSION['admin_email'] = $username;
            echo "<script>window.open('index.php?MessageToAdmin=سلام مدیر محترم ، مقدمتان گلباران. موفق باشید.','_self')</script>";
    }

}

?>
