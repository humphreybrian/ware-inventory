<?php
  $page_title = 'Add Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_airplanes  = find_all('air_type');
  $all_registration = find_all('air_reg');

?>
<!-- start of logic code-->
<!-- <?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
     
     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .=" name,quantity,buy_price,sale_price,categorie_id,date";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Product added ");
       redirect('add_product.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }

 }

?> -->

<!-- end of logic code-->

<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>

  <div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Item</span>
         </strong>
        </div>

        <div class="panel-body">
        <div class="col-md-12">
         <form method="post" action="add_item.php" class="clearfix">              
                 
                  <!-- <div class="col-md-3">
                    <select class="form-control" name="product-categorie">
                      <option value="">Select Product Category</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div> -->
                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-list"></i>
                      </span>
                      <select class="form-control" name="category">
                      <option value="">Select Product Category</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                   </div>
                  </div>
                  

                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="" class="form-control" name="repair-ord-num" placeholder="Repair Order Number">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="text" class="form-control" name="unit" placeholder="Unit">
                     <!--  <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="text" class="form-control" name="parts-num" placeholder="Parts Number">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                  </form>
              </div>
            </div>


             <div class="panel-body">
        <div class="col-md-12">
         <form method="post" action="add_item.php" class="clearfix">              
                 
                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="text" class="form-control" name="serial-num" placeholder="Serial Number">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>
                  

                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                      </span>
                      <input type="" class="form-control" name="date-rv" placeholder="Date Recieved">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                      </span>
                      <input type="text" class="form-control" name="date-rm" placeholder="Date Removed">
                     <!--  <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-plane"></i>
                      </span>
                      <select class="form-control" name="air_type">
                      <option value="">Select Airplane Type</option>
                    <?php  foreach ($all_airplanes as $air_type): ?>
                      <option value="<?php echo (int)$air_type['id'] ?>">
                        <?php echo $air_type['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                   </div>
                  </div>

                  </form>
              </div>
            </div>



             <div class="panel-body">
        <div class="col-md-12">
         <form method="post" action="add_item.php" class="clearfix">              
                 
                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-plane"></i>
                      </span>
                      <select class="form-control" name="air_reg">
                      <option value="">Select Airplane Reg Number</option>
                    <?php  foreach ($all_registration as $air_reg): ?>
                      <option value="<?php echo (int)$air_reg['id'] ?>">
                        <?php echo $air_reg['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                   </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="" class="form-control" name="position" placeholder="Position">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="number" class="form-control" name="hours-run" placeholder="HoursRun">
                     <!--  <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="number" class="form-control" name="quantity" placeholder="Quantity">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                  </form>
              </div>
            </div>



             <div class="panel-body">
        <div class="col-md-12">
         <form method="post" action="add_item.php" class="clearfix">              
                 
                <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-plane"></i>
                      </span>
                      <input type="text" class="form-control" name="defect" placeholder="Defect">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>
                  

                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="text" class="form-control" name="mod-status" placeholder="Modification Status">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="text" class="form-control" name="parts-awaited" placeholder="Parts Awaited">
                     <!--  <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                   <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="text" class="form-control" name="quant-pos" placeholder="Quarantine Position">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>

                  <!-- this is the staus either repairable or not-->

                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="text" class="form-control" name="quant-pos" placeholder="Quarantine Position">
                      <!-- <span class="input-group-addon">.00</span> -->
                   </div>
                  </div>
                  <!-- end of repairable -->

                  </form>
              </div>
            </div>



         </div>
        </div>
      </div>
    </div>

<?php include_once('layouts/footer.php'); ?>
