<?php
include 'includes/db.php';
$c_name='';

$c_lastname='';
$c_address='';
$c_phone='';
$c_email1='';
$c_password='';
$confirm1='';
$errors=array();

if (isset($_POST['register']))
{
     $c_name= mysqli_real_escape_string($connection,$_POST['c_name']);
      if (empty($c_name)) {  array_push($errors,"نام حتما باید وارد شود");   }
 
    $c_lastname= mysqli_real_escape_string($connection,$_POST['c_lastname']);
      if (empty($c_lastname)) {  array_push($errors,"نام خانوادگی حتما باید وارد شود");  }
      
    $c_gender= $_POST['c_gender'];
      if (empty($c_gender))  {  array_push($errors,"جنسیت حتما باید تعیین شود"); }
      
   
//      آپلود تصویر
    if (empty($_FILES['c_image']['name']))
    { array_push($errors, ' تصویر را انتخاب کنید');  }
 else{  
    $valid_img=array("jpg","jpeg","gif","png") ;
    $exploded_img= explode(".",$_FILES['c_image']['name']);
    $exploded_img2= end($exploded_img);
    if (in_array($exploded_img2, $valid_img) && ($_FILES['c_image']['size'] <= 290000000))
    {
    if ($_FILES['c_image']['error']==0)
    {
        $img_name=$_FILES['c_image']['name'];
        $img_temp=$_FILES['c_image']['tmp_name'];
        $img_new_address="customer/customers_images/".$img_name ;
        move_uploaded_file($img_temp, $img_new_address);
         
    }else { array_push($errors, "لطفا خطاهای تصویرتان را رفع کنید");     }

    } else {array_push($errors, "تصویر مناسب را انتخاب کنید! پسوند مجاز برای تصویر شامل jpeg و jpg و png می باشد و حجم آن نباید بیشتر از 2 مگابایت باشد!!!"); }
    }//end else inke khali nabashe akse

    $c_email_no_empty =$_POST['c_email'];
        
    if (empty($c_email_no_empty))
    {        array_push($errors, 'کادر ایمیل خالی است'); }
    else {
        $c_email_validate=$c_email_no_empty;
        if (filter_var($c_email_validate,FILTER_VALIDATE_EMAIL)==TRUE)
        {
            $c_exist_email=$c_email_validate;
            $query_email="select  * from customers where customer_email ='$c_exist_email'";
            $run_mail_query= mysqli_query($connection,$query_email);
            $check_mail=mysqli_num_rows($run_mail_query);

            if ($check_mail ==0)
            {
                $c_email=$c_exist_email;
            } else 
            {
             array_push($errors,"با این ایمیل قبلا ثبت نام شده لطفا ایمیل خود را وارد کنید");
            }
          
        }
        else {    array_push($errors, 'ایمی ساختارش خرابه');  }
   }
    
   $states=$_POST['state'] ;
    if(empty($states)){     array_push($errors, 'کادر استان خالی است'); };
   
   $c_city=$_POST['city'] ;
    if(empty($c_city)){  array_push($errors, 'کادر شهرستان خالی است'); };
   
   
    $c_address= mysqli_real_escape_string($connection,$_POST['c_address']);
    
if (empty($c_address))    {    array_push($errors, 'لطفا ادرستان رابنویسید');}

    
$c_phone= mysqli_real_escape_string($connection,$_POST['c_phone']);

if (empty($c_phone))
{
    array_push($errors, 'لطفا تلفن را وارد کنید')    ;
    
} else {
    
    $c_phone= mysqli_real_escape_string($connection,$_POST['c_phone']);

    if(preg_match("/^[0]{1}[9]{1}\d{9}$/", $c_phone))
    {
        $validated_phone=$c_phone;
    }
 else {    array_push($errors, "تلفنی که وارد کردید صحیح نمی باشد!!!");    }
 } 
//empty telephone endddddddddddddd
 
 
 $c_password= mysqli_real_escape_string($connection,$_POST['c_password']);
 
 if (empty($c_password))
 {     array_push($errors, 'کادر رمز عبور خالی است'); }
 else 
     {
       if(preg_match("/^(?=.*[A-z])(?=.*[0-9])(?=.*[$@])\S{6,12}$/", $c_password))
     {
     $c_password_1 = $c_password;

     } else {    array_push($errors, "رمز شما ایمن نیست از حداقل حرف بزرگ و عدد استفاده کنید")    ;     }
    
     
     }  
// end elsee khali budane pass1

     $confirm_pass= mysqli_real_escape_string($connection,$_POST['c_password_confirm']);
    if (empty($_POST['c_password_confirm']))        {           array_push($errors, 'تکرار رمز خالی است');    } 
    if (!empty($confirm_pass)&&!empty($c_password) )
    {
     if ($confirm_pass != $c_password )
     {    array_push($errors, "رمز با تکرارش برابر نیست")  ;    } 
    } 

    
if (isset($_COOKIE['userEcommerceIp']))
{
    $ip=$_COOKIE['userEcommerceIp'];
} else 
    {
    $ip=getIp();
    setcookie('userEcommerceIp',$ip, time()+1200000000);
}

if(count($errors)==0)
{
    $confirmation_code= rand();
    $sql_insert="INSERT INTO customers "
            . " (customer_ip, customer_name,customer_lastname, customer_gender,"
            . " customer_image, customer_email, customer_province, customer_city, "
            . " customer_address, customer_phone, customer_pass, confirmed, confirm_code) "
            . " values('$ip', N'$c_name', N'$c_lastname', N'$c_gender',N'$img_new_address',"
            . " N'$c_email', N'$states', N'$c_city',N'$c_address', N'$c_phone',N'$c_password', '0','$confirmation_code' ) ";
    
    $query_inserted= mysqli_query($connection, $sql_insert);
    if ($query_inserted)
    {
        $message_2="برای تکمیل فرایند ثبت نام لطفا روی لینک زیر کلیک کنید  "
                . "https://e15b6a5c.ngrok.io/sampleforshopkhodam2/flower_shop_577/emailconfirm.php?customer_name=$c_name&customer_ip=$ip&code=$confirmation_code" ;
        
        $send_mail= mail($c_email,"لینک فعالسازی" , $message_2);
        
		echo "<script>alert('با تشکر از ثبت نام شما. برای تکمیل فرآیند ثبت نام لطفا بر روی لینک فعال سازی که از طریق ایمیل برای شما ارسال شده است، کلیک کنید. ')</script>";
		echo "<script>window.open('emailconfirm.php','_self')</script>";
				
             if ($send_mail)
             {           
                 echo "<b style='text-align:center;background:#f1f1f1;"."لینک فعال سازی برای ایمیل شما ارسال شد"
                 . " . لطفا به ایمیلتان بروید و فعال کنید ."."</b>";
             } else { echo "ایمیل ارسال نمیشه"  ;    }
             
    }else {  echo "کوئری مشکل داره"    ;  }

    
}//errorhat bish az o hast
 else
{    echo 'ارور داریاااا';    }
     
    
     
}// end if register click  
    
  



