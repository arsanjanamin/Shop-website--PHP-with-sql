


<?php  if (count($errors)>0): ?>
   <div class="error">
<?PHP   foreach ($errors as $error): ?>
   <p style="text-align: right;color:#FFF;
                 line-height: 1.4;
                 padding-bottom: 1px;
                 "><?PHP echo $error ; ?></p>
   <br>
  <?PHP endforeach; ?>      
  </div>
<?PHP endif ?>