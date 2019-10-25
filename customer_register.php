<?php include('server.php') ?>
<!-- start of Header -->
<?php	include('includes/headers1.php');	?>
<!-- end of Header -->

<!-- start of content -->
<div id="templatemo_content">

        <div id="templatemo_content_left">
  
             <div class="cleaner_with_height">&nbsp;</div>
             
            <div>
            
                 <form action="customer_register.php" method="post" enctype="multipart/form-data">
                 
                     <?php include 'includes/errors.php';   ?>
                     
                         <table style="width: 100%;direction: rtl;background: #e6a18b;border:0.6px solid #57745d; border-radius: 4px 4px ">
                            
                                 <tr >
                                     <th colspan="6">
                                         <br>
                                         <b style="margin-top: 10px;font-size:25px;"> فرم ثبت نام</b>
                                         <br>
                                     </th>
                                     
                                 </tr>
                           
                              
                                 
                                 <tr >
                                     <td colspan="3"><b style="font-size:18px;"> نام:   </b>  </td>
                                     <td colspan="3">
                                         <input type="text" name="c_name" size="39" value="<?php echo $c_name;?>" style="" placeholder="نام خود را وارد کنید">
                                     </td>
                                </tr>
                                
                                <tr>
                                         <td colspan="3"><b style="font-size:18px;"> نام خانوادگی:     </b></td>
                                     <td colspan="3">
                                      <input type="text" name="c_lastname" value="<?PHP echo $c_lastname ;?>" size="39" style="" placeholder="فامیل خود را وارد کنید">
                                     </td>
                                </tr>
                                
                                <tr>
                                         <td colspan="3"><b style="font-size:18px;"> جنسیت :     </b></td>
                                     <td colspan="3">
                                         <select name="c_gender">
                                             <?PHP
                                             if (isset($c_gender)){
                                                 echo "<option value='$c_gender'>$c_gender</option>";
                                             }
                                             ?>
                                             <option value="0" >جنسیت خود را انتخاب کنید</option>
                                             <option value="مرد" >مرد</option>
                                             <option value="زن" >زن</option>
                                         </select>
                                     </td>
                                </tr>
                                
                                 <tr>
                                         <td colspan="3"><b style="font-size:18px;">  تصویرتان:     </b></td>
                                <td colspan="3">
                                   <?php 
                                       if(!isset($c_image)){
                                               echo('<input type="file" name="c_image"  />
                                               <b style="font-family:b nazanin;font-size:14px;">فایلی را انتخاب کنید . پسوند مجاز برای تصویر شامل jpeg و jpg و png می باشد و حجم آن نباید بیشتر از 2 مگابایت باشد.</b>');
                                               }else{
                                               echo $c_image;
                                       } 
                               ?>
                                     </td>
                                </tr>
                            
                               
                                  <tr>
                                         <td colspan="3"><b style="font-size:18px;"> ایمیل:     </b></td>
                                     <td colspan="3">
                                         <input type="text" value="<?PHP echo $c_email1 ;?>" name="c_email" size="39" style="" placeholder="ایمیل خود را وارد کنید">
                                     </td>
                                </tr>
                                
                                
                                    <tr>
                                         <td colspan="3"><b style="font-size:18px;"> نام استان :     </b></td>
                                         
                                     <td colspan="3">
                                         <select name="state" onchange="iranwebsv(this.value)">
                                             <?php
                                             
                                                if (isset($states))
                                                {
                                                    echo "<option value='$states'>$states</option>";
                                                }
                                             ?>
                                            <option value="0">لطفا استان را انتخاب نمایید</option>
							<option value="تهران">تهران</option>
							<option value="گیلان">گیلان</option>
							<option value="آذربایجان شرقی">آذربایجان شرقی</option>
							<option value="خوزستان">خوزستان</option>
							<option value="فارس">فارس</option>
							<option value="اصفهان">اصفهان</option>
							<option value="خراسان رضوی">خراسان رضوی</option>
							<option value="قزوین">قزوین</option>
							<option value="سمنان">سمنان</option>
							<option value="قم">قم</option>
							<option value="مرکزی">مرکزی</option>
							<option value="زنجان">زنجان</option>
							<option value="مازندران">مازندران</option>
							<option value="گلستان">گلستان</option>
							<option value="اردبیل">اردبیل</option>
							<option value="آذربایجان غربی">آذربایجان غربی</option>
							<option value="همدان">همدان</option>
							<option value="کردستان">کردستان</option>
							<option value="کرمانشاه">کرمانشاه</option>
							<option value="لرستان">لرستان</option>
							<option value="بوشهر">بوشهر</option>
							<option value="کرمان">کرمان</option>
							<option value="هرمزگان">هرمزگان</option>
							<option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
							<option value="یزد">یزد</option>
							<option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
							<option value="ایلام">ایلام</option>
							<option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
							<option value="خراسان شمالی">خراسان شمالی</option>
							<option value="خراسان جنوبی">خراسان جنوبی</option>
							<option value="البرز">البرز</option>
                                         </select>
                                     </td>
                                </tr>
                                 <tr>
                                         <td colspan="3"><b style="font-size:18px;">  نام شهر :     </b></td>
                                     <td colspan="3">
                                         <select name="city" id="city">
                                              <?php  if (isset($c_city))   { echo "<option value='$c_city'>$c_city</option>";  }
                                             ?>
                                             <option value="0"> اول  استان را انتخاب نمایید </option> 
                                         </select>
                                     </td>
                                </tr>
                                
                         
                                     <tr >
                                     <td colspan="3"><b style="font-size:18px;"> آدرس:   </b>  </td>
                                     <td colspan="3">
                                      <input type="text" name="c_address" value="<?PHP echo $c_address ;?>" size="39" style="" placeholder="آدرس خود را وارد کنید">
                                     </td>
                                </tr>
                             										
				<tr >
					<td colspan="3" >
						<b style="font-family:b nazanin;font-size:18px;">تلفن همراه  :  </b>
					</td>
					<td colspan="3" >
						<input type="text" value="<?PHP echo $c_phone;?>"   size="35" name="c_phone" placeholder="تلفن خود را وارد نمایید ." />
					</td>
				</tr>
				
                                <tr>
					<td colspan="6">
						<div class="tooltip1" >قبل از انتخاب پسورد حتما این قوانین را مطالعه بفرمایید.
							<span class="tooltiptext">
                                                            
                                            •	پسورد شما باید حداقل 6 کاراکتر و حداکثر 12 کاراکتر باشد.<br>
                                            •	در پسورد خود حتما باید از ارقام 0تا 9 استفاده کنید.<br><br>
                                            •	در پسورد خود از حروف بزرگ  یا کوچک انگلیسی استفاده کنید.<br>
                                            •	در پسورد خود حتما باید از علامت @ یا $ استفاده نمایید.<br>

							</span>
						</div>
						</td>
				</tr>	
                                
				<tr >
					<td colspan="3" >
						<b style="font-size:18px;">پسورد  :  </b>
					</td>
					<td colspan="3" >
                                            <input type="password" size="35" id="c_pass" name="c_password" value="" placeholder="پسوردتان را وارد نمایید" />
                                            <br>
                                                <input type="checkbox" name="passcheck" onclick="seen_password()">
                                                <b style="font-size:14px;"> نمایش پسورد</b><br>

                                                <script>
                                              function seen_password()
                                                {
                                                  var  x=document.getElementById("c_pass");
                                                  var  y=document.getElementById("c_conf");
                                                    if(x.type=== "password")
                                                    {  x.type="text";   }
                                                    else
                                                    {   x.type="password";  }
                                                    
                                                    if(y.type==="password")
                                                    {
                                                        y.type="text";
                                                    } else
                                                    {  y.type="password";  }
                                                }
                                   </script>
                                       
					</td>
				</tr>	
                                <tr>
                                    <td colspan="3">   
                             <b style="font-size: 19px">پسورد  مجدد </b>
                                    </td> 
                                    
                                    <td colspan="3">
                                        <input type="password" name="c_password_confirm" id="c_conf" value="" placeholder="پسوردتان رامجدد وارد نمایید">
                                        
                                    </td>
                                </tr>
                 									
				<tr align="center">
					<td colspan="6" height="55">
						<input type="submit" name="register" value="ایجاد نام کاربری">
					</td>
				</tr>
                            
                               <!--payane badaneye table-->
                         </table>       <!--end of table-->
                 </form>                <!--end of form-->
                   </div>
              
         
             <div class="cleaner_with_height">&nbsp;
             </div>
        </div> <!-- end of ocntent left -->
        
        <?php     include 'includes/Right_Sidebar.php';    ?>

        <div class="cleaner">
         </div>
    </div>

<!-- end of content -->

<!-- start of footer -->
<?php include('includes/Footer.php');	?>
<!-- end of footer -->

<style>
     
 
</style>