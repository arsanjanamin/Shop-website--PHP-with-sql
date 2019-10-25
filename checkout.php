
<!-- start of Header -->
<?php include('includes/headers1.php');?>
<!-- end of Header -->

<!-- start of content -->
<div id="templatemo_content">

        <div id="templatemo_content_left">

            
             <div  class="cleaner_with_height">&nbsp;</div>
            <?PHP

            if (isset($_GET['forgot_pass']) )
            {
                include "forgot_Password.php";

            }
            else
            {


                if (isset($_SESSION['customer_email'])) {
                    include './peyment.php';

                } else {

                    include './customer_login.php';
                }

            }
            ?>
             
             <div class="cleaner_with_height">&nbsp;
             </div>
        </div> <!-- end of ocntent left -->
        
        
        
        <?php     include 'includes/Right_Sidebar.php';    ?>

       
        
        
    </div>

<!-- end of content -->

<!-- start of footer -->
<?php include('includes/Footer.php');	?>
<!-- end of footer -->
