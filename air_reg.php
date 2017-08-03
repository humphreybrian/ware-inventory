<?php
  $page_title = 'All air_reg';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  
  $all_air_reg = find_all('air_reg')
?>
<?php
 if(isset($_POST['add_cat'])){
   $req_field = array('air_reg');
   validate_fields($req_field);
   $air_reg = remove_junk($db->escape($_POST['air_reg']));
   if(empty($errors)){
      $sql  = "INSERT INTO air_reg (name)";
      $sql .= " VALUES ('{$air_reg}')";
      if($db->query($sql)){
        $session->msg("s", "Successfully Added aircraft registration number");
        redirect('air_reg.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
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
  </div>
   <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Aircraft reg number</span>
         </strong>
        </div>

        <div class="panel-body">
          <form method="post" action="air_reg.php">
            <div class="form-group">
                <input type="text" class="form-control" name="air_reg" placeholder="aircraft reg number">
            </div>
            <button type="submit" name="add_cat" class="btn btn-danger">aircraft reg number</button>
        </form>
        </div>

      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>All air_reg</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>air_reg</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_air_reg as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <!-- <a href="edit_air_reg.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a> -->
                        <a href="del_air_reg.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                      </div>
                    </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
       </div>
    </div>
    </div>
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
