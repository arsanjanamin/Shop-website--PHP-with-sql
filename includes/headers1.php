<!--start header file-->
<?PHP
require 'functions/functions.php';    ?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
     content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>امین شاپ</title>

    <!--bara city haye form-->
    <script src="js/city.js" type="text/javascript"></script>
    <!--End of city for form-->

  <!--ina bara slidereeee-->
    <script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>
    <!--ina bara slideeee-->

<!-- bootstrapeeee-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
<!-- in bara fonteee-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- in bara fonteee-->

<!--style haye khodame-->
    <link rel="stylesheet" type="text/css"  href="style/style.css">
    <link rel="stylesheet" type="text/css"  href="style/sidebar.css">
<!-- css haye khodm-->
</head>

<body>
<div id="templatemo_container">
    <div id="templatemo_top_panel">
        <div id="templatemo_language_section">
            <a href="" class="twitter-icon"><i class=" fa fa-twitter-square" ></i></a>&nbsp;
            <a href=""><i class="fa fa-telegram" ></i></a>
            <a href=""><i class="fa fa-instagram" ></i></a>
            <a href=""><i class="fa fa-google-plus" ></i></a>
            <a href=""><i class="fa fa-facebook-square" ></i></a>
        </div>

        <div id="templatemo_shopping_cart">
            <?PHP  if (isset($_GET['add_cart']))
            {
                cart();
                echo "<i class='text-warning'><b style='padding: 7px 7px'> محصول افزوده شد</i><br></b>";
            }
           echo "<span style='margin-bottom:10px'>تعداد محصولات شما در سبد :</span> ".total_items();

            ?>
        </div>
    </div>

    <div id="templatemo_header">

        <div class="row">
       <h1 style=" font-size: 33px;font-weight: 700 ;text-align: center ;color: #4C4C4C">Welcome To Our<a href="index.php" >
                   <img class="pageBanner " src="images/1-512.png" height="41px" width="80px"  />
               </a> </h1>
        </div>

   </div><!-- end Of templatemo_header-->

    <div id="templatemo_banner" style=";">

        <!-- Insert to your webpage where you want to display the slider -->
        <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:900px;margin:0px auto 33px;max-height: 300px">
            <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                <ul class="amazingslider-slides" style="display:none;">
                    <li><img src="images/sliders/5002_780x354_hp_electronbaner1111111ic-acc_v3.jpg" alt="خوش آمدید"  title="خوش آمدید" data-texteffect="Light box" />
                    </li>
                    <li><img src="images/sliders/13d9a268-2ba6-43ed-9065-93f489ffffc2.jpg" />
                    </li>
                    <li><img src="images/sliders/37d869b4-083e-4b5a-aea2-9e46f3d5ffc5.jpg" alt="تمام اجناس زیر قیمت بازار"  title="تمام اجناس زیر قیمت بازار" />
                    </li>
                    <li><img src="images/sliders/39e5b5.jpg" />
                    </li>
                    <li><img src="images/sliders/46ce3279-523e-4454-ad96-948cfa7d504b%20%281%29.jpg" />
                    </li>
                    <li><img src="images/sliders/060e9174-ead1-4ce6-9ba0-545ee1f6e93e.jpg" />
                    </li>
                    <li><img src="images/sliders/61dfcec0-38b5-4953-a52e-dd6d97fe248c.jpg" />
                    </li>
                    <li><img src="images/sliders/5034_780x354_hp_fashion-400k_v2.jpg" />
                    </li>
                    <li><img src="images/sliders/5038_780x354_hp_sysmoney_v1.jpg" />
                    </li>
                    <li><img src="images/sliders/5039_780x354_hp_fan_v1.jpg" />
                    </li>
                    <li><img src="images/sliders/5040_780x354_hp_hnb_v1.jpg" />
                    </li>
                    <li><img src="images/sliders/5041_780x354_hp_cookware-psd_v1.jpg" />
                    </li>
                    <li><img src="images/sliders/92552c1f-5a60-4905-ae39-38771ef806c2.jpg" />
                    </li>
                </ul>
                <ul class="amazingslider-thumbnails" style="display:none;">
                    <li><img src="images/sliders/thumbs/5002_780x354_hp_electronbaner1111111ic-acc_v3-tn.jpg" alt="خوش آمدید" title="خوش آمدید" /></li>
                    <li><img src="images/sliders/thumbs/13d9a268-2ba6-43ed-9065-93f489ffffc2-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/37d869b4-083e-4b5a-aea2-9e46f3d5ffc5-tn.jpg" alt="تمام اجناس زیر قیمت بازار" title="تمام اجناس زیر قیمت بازار" /></li>
                    <li><img src="images/sliders/thumbs/39e5b5-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/46ce3279-523e-4454-ad96-948cfa7d504b%20%281%29-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/060e9174-ead1-4ce6-9ba0-545ee1f6e93e-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/61dfcec0-38b5-4953-a52e-dd6d97fe248c-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/5034_780x354_hp_fashion-400k_v2-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/5038_780x354_hp_sysmoney_v1-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/5039_780x354_hp_fan_v1-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/5040_780x354_hp_hnb_v1-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/5041_780x354_hp_cookware-psd_v1-tn.jpg" /></li>
                    <li><img src="images/sliders/thumbs/92552c1f-5a60-4905-ae39-38771ef806c2-tn.jpg" /></li>
                </ul>
            </div>
        </div>
        <!-- End of body section HTML codes -->



    </div>

    <div id="templatemo_menu_panel">
        <ul>
            <li><a href="index.php" class="current">خانه</a></li>
            <li><a href="cart.php" target="_parent">سبدخرید</a></li>
            <li><a href="all_products.php" target="_parent">همه محصولات</a></li>

            <li>
                <?PHP
                if (!isset($_SESSION['customer_email']))
                {
                    echo "<a href='./checkout.php'> حساب کاربری </a>";
                }else
                {
                    echo "<a href='./customer/my_account.php'> حساب کاربری </a>";
                }
                ?>
            </li>
            <li>
                <?PHP
                if (isset($_SESSION['customer_email']))
                {
                    echo "<a href='./logout.php'>خروج از اکانت </a>";
                }else
                {

                }

                ?>


            </li>

            <li><a href="#"> درباره ی ما </a></li>
            <li><a href="#"> تماس با ما</a></li>
        </ul>
    </div>
    <!-- end of menu -->