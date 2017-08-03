<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $air_type = find_by_id('air_type',(int)$_GET['id']);
  if(!$air_type){
    $session->msg("d","Missing Aircraft registration id.");
    redirect('air_type.php');
  }
?>
<?php
  $delete_id = delete_by_id('air_type',(int)$air_type['id']);
  if($delete_id){
      $session->msg("s","Aircaft registration number deleted.");
      redirect('air_type.php');
  } else {
      $session->msg("d","Aicraft registration number deletion failed.");
      redirect('air_type.php');
  }
?>
