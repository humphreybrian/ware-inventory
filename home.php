<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th width="140dp">Work Order</th>
      <th width="200dp">Unit</th>
      <th width="150dp">Part Number</th>
      <th width="150dp">Serial Number</th>
      <th width="180dp">Aircraft Type</th>
      <th width="180dp">Aircraft reg number</th>
      <th width="180dp">Position</th>
      <th>Defect</th>
      <th width="100dp">Tech</th>
    </tr>
  </thead>
  
</table>


 </div>
</div>
<?php include_once('layouts/footer.php'); ?>


