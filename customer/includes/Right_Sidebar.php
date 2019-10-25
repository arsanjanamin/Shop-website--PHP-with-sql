<div id="templatemo_content_right">

    <div class="templatemo_right_section">
        <h4>اکانت من</h4>
        <div class="templatemo_right_section_content">
<?PHP
            $user_mail=$_SESSION['customer_email'];
            $sql_img="select * from customers where customer_email='$user_mail'";
            $run_img=mysqli_query($connection,$sql_img);
            $result_img=mysqli_fetch_assoc($run_img);
                $img_src=$result_img['customer_image'];
                echo "<img src='../$img_src' width='100' height='100' style='margin:8px;padding: 2px;border: 2px solid white; box-shadow: 2px 2px 2px #fff1f1;float: right;'>";
        ?>
                <ul style="list-style: none;">
                    <li style="list-style: none;"><a href="./my_account.php?my_order">سفارشی سازی</a> </li>
                    <li><a href="./my_account.php?edit_account">ویرایش اطلاعات</a> </li>
                    <li><a href="./my_account.php?change_pass">تغییر رمز عبور</a> </li>
                    <li><a href="./my_account.php?delete_account">حذف اکانت من </a> </li>
                    <li><a href="../logout">خروج از حساب </a> </li>
                </ul>
        </div>
    </div>

    <div class="templatemo_right_section">
            <h4>جستجو</h4>
            <div class="templatemo_right_section_content">
                <form method="get" action="result.php" enctype="multipart/form-data" >
                    <div class="control-group">
                        <div class="controls">
                        <input name="search" type="text" id="keyword" placeholder="کلمه مورد نظر" class="form-control " style="width:174px" />
                        </div>
                        <input type="submit" name="submit" class="btn_search btn btn-success" value="جستجو" />

                    </div>
                       </form>

        </div>
    </div>


    </div>
</div> <!-- end of content right-->
