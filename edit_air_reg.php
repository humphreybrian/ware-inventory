<?php
  $page_title = 'Edit air_reg';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $air_reg = find_by_id('air_reg',(int)$_GET['id']);
  if(!$air_reg){
    $session->msg("d","Missing air_reg id.");
    redirect('air_reg.php');
  }
?>

<?php
if(isset($_POST['edit_reg'])){   //button id
  $req_field = array('reg-edit');
  validate_fields($req_field);
  $air_reg = remove_junk($db->escape($_POST['reg-edit']));
  if(empty($errors)){
        $sql = "UPDATE air_reg SET name='{$air_reg}'";
       $sql .= " WHERE id='{$air_reg['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated Categorie");
       redirect('air_reg.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('air_reg.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('air_reg.php',false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editing <?php echo remove_junk(ucfirst($air_reg['name']));?></span>
        </strong>
       </div>
       <div class="panel-body">
         <form method="post" action="edit_air_reg.php?id=<?php echo (int)$air_reg['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="reg-edit" value="<?php echo remove_junk(ucfirst($air_reg['name']));?>">
           </div>
           <button type="submit" name="edit_reg" class="btn btn-danger">Update air registration number</button>
       </form>
       </div>
     </div>
   </div>
</div>



<?php include_once('layouts/footer.php'); ?>
