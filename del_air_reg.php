<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $air_reg = find_by_id('air_reg',(int)$_GET['id']);
  if(!$air_reg){
    $session->msg("d","Missing Aircraft registration id.");
    redirect('air_reg.php');
  }
?>
<?php
  $delete_id = delete_by_id('air_reg',(int)$air_reg['id']);
  if($delete_id){
      $session->msg("s","Aircaft registration number deleted.");
      redirect('air_reg.php');
  } else {
      $session->msg("d","Aicraft registration number deletion failed.");
      redirect('air_reg.php');
  }
?>
