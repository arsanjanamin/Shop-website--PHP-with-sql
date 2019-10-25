<?php
include 'includes/db.php';

$errors=array();
$user_mail=$_SESSION['customer_email'];
$sql_sel="select * from customers where customer_email='$user_mail'";
$run_sel=mysqli_query($connection,$sql_sel);
$row_select=mysqli_fetch_assoc($run_sel);

$name=$row_select['customer_name'];
$id=$row_select['customer_id'];
$lastname=$row_select['customer_lastname'];
$gender=$row_select['customer_gender'];
$email=$row_select['customer_email'];
$image=$row_select['customer_image'];
$province=$row_select['customer_province'];
$address=$row_select['customer_address'];
$city=$row_select['customer_city'];
$phone=$row_select['customer_phone'];

?>

<!-- start of content -->
            <form action="my_account.php?edit_account" method="post" enctype="multipart/form-data">

                <table style="width: 100%;direction: rtl;background: #e6a18b;border:0.6px solid #57745d; ">

                    <tr >
                        <th colspan="6">
                            <br>
                            <b style="margin-bottom: 40px;margin-top: 10px;font-size:25px;">ویرایش اطلاعات شخصی</b>
                            <br>
                        </th>
                    </tr>

                    <tr >
                        <td colspan="3"><b style="font-size:18px;"> نام:   </b>  </td>
                        <td colspan="3">
                            <input type="text" name="c_name" size="39" value="<?php echo $name ?>" style="" placeholder="نام خود را وارد کنید">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"><b style="font-size:18px;"> نام خانوادگی:     </b></td>
                        <td colspan="3">
                            <input type="text" name="c_lastname" value="<?PHP echo $lastname ;?>" size="39" style="" placeholder="فامیل خود را وارد کنید">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"><b style="font-size:18px;"> جنسیت :     </b></td>
                        <td colspan="3">
                            <select name="c_gender">

                               <option value='<?php echo $gender ;   ?>'><?php echo $gender ?></option>
                               <option value="مرد" >مرد</option>
                               <option value="زن" >زن</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"><b style="font-size:18px;">  تصویرتان:     </b></td>
                        <td colspan="3">
                            <img src="../<?PHp  echo $image;   ?>" width="50" height="040"><br>

                            <div class="box">
                                <input type="file" name="c_image" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} فایل انتخاب شد." multiple />
                                <label for="file-7"><span></span> <strong>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                        </svg> انتخاب فایل</strong></label>
                            </div>
                            <br><br>
                            <b style="font-family:b nazanin;font-size:14px;">فایلی را انتخاب کنید که: .
                                <br>
                                پسوند آن حتما شامل jpeg و jpg و png  باشد
                                <br> و حجم آن نباید بیشتر از 2 مگابایت باشد.</b>
                            <br><br>

                        </td>
                    </tr>


                    <tr>
                        <td colspan="3"><b style="font-size:18px;"> نام استان :     </b>
                        </td>

                        <td colspan="3">
                            <select name="state" onchange="iranwebsv(this.value)">
                               <option ><?PHP  echo $province  ?></option>";
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
                              <option><?php $city  ?></option>
                               <option value="0"> اول  استان را انتخاب نمایید </option>
                            </select>
                        </td>
                    </tr>


                    <tr >
                        <td colspan="3"><b style="font-size:18px;"> آدرس:   </b>  </td>
                        <td colspan="3">
                            <input type="text" name="c_address" value="<?PHP echo $address ;?>" size="39" style="" placeholder="آدرس خود را وارد کنید">
                        </td>
                    </tr>

                    <tr >
                        <td colspan="3" >
                            <b style="font-family:b nazanin;font-size:18px;">تلفن همراه  :  </b>
                        </td>
                        <td colspan="3" >
                            <input type="text" value="<?PHP echo $phone;?>"   size="35" name="c_phone" placeholder="تلفن خود را وارد نمایید ." />
                        </td>
                    </tr>

                    <tr align="center">
                        <td colspan="6" height="55">
                            <input type="submit" class="btn btn-success " name="update" value="ویرایش اطلاعات">
                        </td>
                    </tr>

                    <!--payane badaneye table-->
                </table>       <!--end of table-->
            </form>                <!--end of form-->



<?php include'server.php';	?>


