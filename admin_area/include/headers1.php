<!--start header file-->
<?PHP
include "db.php";
session_start();

if(!isset($_SESSION[ 'admin_email']))
{
    echo "<script>window.open('login.php','_sel')</script>";
}

?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="خرید و فروش انواع وسایل" />
    <meta name="description" content="بهترین سایت طراحی شده تا اکنون" />
    <meta charset="UTF-8">
    <meta name="viewport"
     content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>امین شاپ</title>


<!-- bootstrapeeee-->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.min.js"></script>

<!--style khodame-->
    <link rel="stylesheet" type="text/css"  href="style/style.css">
<!-- css  khodm-->


    <script src="tinymce-editor/jquery.tinymce.min.js"></script>
    <script src="tinymce-editor/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
 </head>

<body>
<div id="templatemo_container">
    <div id="templatemo_header">
        <img src="images/user.png"  height="120" style="width: 100px" alt="Flower Shop" />
    </div>
