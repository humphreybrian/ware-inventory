<?php
  $page_title = 'All air_type';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  
  $all_air_type = find_all('air_type')
?>
<?php
 if(isset($_POST['add_craft'])){
   $req_field = array('aircraft_type');
   validate_fields($req_field);
   $air_type = remove_junk($db->escape($_POST['aircraft_type']));
   if(empty($errors)){
      $sql  = "INSERT INTO air_type (name)";
      $sql .= " VALUES ('{$air_type}')";
      if($db->query($sql)){
        $session->msg("s", "Successfully Added Aircraft type");
        redirect('air_type.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('air_type.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('air_type.php',false);
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
            <span>Add New Aircraft Type</span>
         </strong>
        </div>

        <div class="panel-body">
          <form method="post" action="air_type.php">
            <div class="form-group">
                <input type="text" class="form-control" name="aircraft_type" placeholder="Aircraft type">
            </div>
            <button type="submit" name="add_craft" class="btn btn-danger">Add aircraft type</button>
        </form>
        </div>

      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>All Aircraft Types</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Aircraft Types</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_air_type as $craft):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($craft['name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <!-- <a href="edit_air_type.php?id=<?php echo (int)$craft['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a> -->
                        <a href="del_air_type.php?id=<?php echo (int)$craft['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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
