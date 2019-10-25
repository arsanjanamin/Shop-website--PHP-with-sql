<?php include './includes/headers1.php';  ?>
<!-- end of header -->

<!-- start content asli -->
<div class="templatemo_content">
        <div class="templatemo_content-left"   >
                    <div class="cleaner_with_height">&nbsp;     </div>
        <?PHP
        
            
        if (isset($_GET['customer_ip']))
        {
            
            $connection= mysqli_connect("localhost", "root", "", "ecommerce");
       
            if (mysqli_connect_errno())
            {   echo "<script>alert('مشکل در برقراری ارتباط دیتابیس')</script>";  }
            
            $ip=$_GET["customer_ip"];
            $code=$_GET["code"];
            
            $cust_sql="SELECT * FROM customers WHERE customer_ip LIKE '%{$ip}%' ";
            $result1= mysqli_query($connection, $cust_sql);
             while($rows= mysqli_fetch_assoc($result1) )
            {
                $confirm_code=$rows['confirm_code'];
                $c_name=$rows['customer_name'];
                $c_lastname=$rows['customer_lastname'];
                $c_email=$rows['customer_email'];
            }
            if ($confirm_code==$code)
            {
                mysqli_query($connection,"UPDATE customers set confirm_code ='0' ");
                mysqli_query($connection,"update  customers set confirmed='1' ");
                
                echo "<script>alert('فعالسازی شما تکمیل شد .')</script>";
             
                $select_incart="select * from cart where ip_add = '$ip' " ;
                $run_select= mysqli_query($connection, $select_incart);
                $check_select= mysqli_num_rows($run_select);
            
                if ($check_select == 0)      
                {
                   $_SESSION['customer_name'] = $c_name;
                   $_SESSION['customer_lastname'] = $c_lastname;
                    $_SESSION['customer_email'] = $c_email;
                    echo "<script>window.open('customer/my_account.php','_self')</script>";

                    }else{

                    $_SESSION['customer_name'] = $c_name;
                    $_SESSION['customer_lastname'] = $c_lastname;
                    $_SESSION['customer_email'] = $c_email;
                    echo "<script>window.open('checkout.php','_self')</script>";
            }
             
            } else  { 
     echo "<script>alert('ایمیل با کد تایید مطابقت ندارد.$confirm_code') </script>";
     echo "<script>window.open('customer_register.php','_self')</script>";
       }
     
        } else {
echo "<p style='background: red; padding: 27px;"
            . "	font-size: 20px; border-radius: 15px;border: "
        . "5px dashed white;'>  باید به ایمیلتان مراجعه کرده و لینک فرستاده شده را تایید نمایید!!!</p>";
 }
        ?>
  
        <div class="cleaner_with_height">&nbsp;</div>
	</div>
	<!-- end of left content  -->
	
	
	<div class="cleaner">&nbsp;</div>
</div>
<!-- end of content -->

<!-- start of footer -->
<?php include('includes/Footer.php');	?>
			<!-- end of footer -->
        
        
 