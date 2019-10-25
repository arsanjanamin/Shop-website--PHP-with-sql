
    <?PHP
    require 'include/db.php';
    ?>


    <script src="tinymce-editor/jquery.tinymce.min.js"></script>
    <script src="tinymce-editor/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>



<?PHP

if (isset($_SESSION['messages1']))
{
    $message1= $_SESSION['messages1'];

    echo "<h1 style='color: #1BB2C9; background-color: red'>$message1</h1>";
    session_unset($message1);
}
?>

        <form action="do-insert.php" method="post" enctype="multipart/form-data">

     <table border="1px" align="center" width="670px" dir="rtl" class="tbl_insert" >
        <caption>        <b>اطلاعات مربوط به محصول</b>        </caption>

         <tr>
             <th><b>ویژگی های محصول</b></th>
             <th><b>مقدار ورودی هر کدام از ویژگی ها</b></th>
         </tr>

         <tr>
             <td>نام محصول</td>
             <td>
                 <input type="text" name="product_title" size="48" >
             </td>
         </tr>

         <tr>
             <td>دسته بندی محصول</td>

             <td>
                 <select name="product_cat" id="" required>
                     <option value="">دسته مورد نظررا انتخاب کنید</option>
                     <?php
                     $get_cat="select * from categories";
                     $cat_run=@mysqli_query($connection,$get_cat);
                     while ($cat_row = mysqli_fetch_assoc($cat_run))
                     {
                         $cat_id=$cat_row['cat_id'];
                         $cat_title =$cat_row['cat_title'];
                         echo "<option value='$cat_id'>$cat_title</option>";
                     }
                     ?>
                 </select>
             </td>
         </tr>

         <tr>
             <td><b>برند محصول</b></td >
             <td>
                 <select name="product_brand" >
                     <option>برند مورد نظر خود را انتخاب کنید</option>
                     <?PHP
                    $get_brand="select * from brands";
                    $brands_query=@mysqli_query($connection,$get_brand);
                    while($brand_rows=mysqli_fetch_assoc($brands_query))
                    {
                        $brands_id=$brand_rows['brand_id'];
                        $brands_title=$brand_rows['brand_title'];
                        echo "<option value='$brands_id'>$brands_title</option>";
                    }

                     ?>

                 </select>

             </td>
         </tr>

         <tr>
             <td><b>قیمت محصول</b></td >
             <td><input type="text" name="product_price" size="42" ></td >
         </tr>


         <tr>
             <td><b>توصیف محصول</b></td >
             <td>
                 <textarea name="product_desc" rows="12" cols="70" ></textarea>
             </td >
         </tr>


         <tr>
             <td><b>عکس محصول</b></td >
             <td><input type="file" name="product_image" ></td >
         </tr>


         <tr>
             <td><b>کلمات کلیدی</b> </td >
             <td><input type="text" name="product_keywords" size="57"  ></td >
         </tr>


         <tr>
             <td align="center"></td >
             <td align="center">
                 <input type="submit" class="btn_submit" name="submit" value="بارگذاری">
                 <input type="reset" class="btn_reset" name="reset" value="ریست کردن"></td >
         </tr>



     </table>
        </form>


