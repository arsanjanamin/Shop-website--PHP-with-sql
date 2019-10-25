<?PHP

if (isset($_POST['update']))
{

    $c_name=mysqli_real_escape_string($connection,$_POST['c_name']);
    if (empty($name)){
        array_push($errors,"کادر نام را حتما باید پرکنید");

    }
    $c_lastname=mysqli_real_escape_string($connection,$_POST['c_lastname']);
    if (empty($c_lastname)){
        array_push($errors,"کادر نامخانوادگی را حتما باید پرکنید");
    }

    $c_gender=$_POST['c_gender'];

    if (empty($_FILES['c_image']['name']))
    {        $new_address_image=$image;    }
    else
    {
        $img_size=$_FILES['c_image']['size'];
        $valid_extend=array("JPG","png",'gif','bmp',"jpg");
        $exploadtion=explode(".",$_FILES['c_image']['name']);
        $exception=end($exploadtion);
        if (in_array($exception,$valid_extend) && $img_size<=20000000)
        {
            if ($_FILES['c_image']['error']==0)
            {
                $c_image=$_FILES['c_image']['name'];
                $img_tmp=$_FILES['c_image']['tmp_name'];
                $new_address_image="customer/customers_images/".$c_image ;
                move_uploaded_file($img_tmp,"customers_images/".$c_image);
            }
            else
            {
                array_push($errors,"فایل به درستی اجرا نشد");
            }

        }else
        {
            array_push($errors, "تصویر مناسب را انتخاب کنید! پسوند مجاز برای تصویر شامل jpeg و jpg و png می باشد و حجم آن نباید بیشتر از 2 مگابایت باشد!!!");

        }

    }
    $c_province = $_POST['state'];

    // receive city value from the form
    $c_city = $_POST['city'];

    // receive address value from the form
    $c_address = mysqli_real_escape_string($connection ,$_POST['c_address']);
    if (empty($c_address)) { array_push($errors, "آدرس خود را وارد نکردید!"); }

    $c_phone_validate=mysqli_real_escape_string($connection ,$_POST['c_phone']);
    if (empty($c_phone_validate))
    {
        array_push($errors, "تلفن خود را وارد نکردید!");
    }else{
        if(preg_match("/^[0]{1}[9]{1}\d{9}$/", $c_phone_validate))
        {
            // phone is valid
            $c_phone=$c_phone_validate;
        }else{
            array_push($errors, "تلفنی که وارد کردید صحیح نمی باشد!!!");
        }
    }

    // Finally, update user account if there are no errors in the form
    if (count($errors) == 0) {
        $upload_c = "UPDATE `customers` SET `customer_name`=N'$c_name',`customer_lastname`=N'$c_lastname',`customer_phone`=N'$c_phone',`customer_gender`=N'$c_gender',`customer_image`='$new_address_image',`customer_province`=N'$c_province',`customer_city`=N'$c_city',`customer_address`=N'$c_address' WHERE `customer_id`=$id ";
        $run_uplod = mysqli_query($connection,$upload_c);

        if($run_uplod)
        {
            echo "<script>alert('$c_name عزیز ، اطلاعات شما به درستی به روز رسانی شد !')</script>";
            echo "<script>window.open('my_account.php?edit_account','_self')</script>";
        }
    }else{
        include('includes/errors.php');
    }

}