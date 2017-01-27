<?php
    
use Frm\Model\Task;    

?>
<div class="page-header">
            
    <div class="row">
        <div class="col-md-6">            
            
            <h1>Admin zone</h1>
            
        </div>
        <div class="col-md-6">     
  
<form role="form" class="form-inline pull-right" method="get" action="/admin/">
    <div class="form-group">
      <label for="statusSelect">Status</label>
      <select id="statusSelect" name="status" class="form-control">
            <option value="all">All</option>
            <option value="0" <?php if (isset($_GET['status']) && $_GET['status'] == Task::STATUS_NEW && $_GET['status'] != 'all') { echo ' selected="selected"'; } ?>>New</option>
            <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == Task::STATUS_FINISHED) { echo ' selected="selected"'; } ?>>Finished</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-filter"></span> Filter</button>
</form>       

        </div>
    </div>
</div>


<?php if (isset($_REQUEST['edit_status']) && $_REQUEST['edit_status'] == 'success') { ?>
<div class="alert alert-success">
  <strong>Success!</strong> Task saved successfully.
</div>
<?php } elseif (isset($_REQUEST['edit_status']) && $_REQUEST['edit_status'] == 'error') { ?>
<div class="alert alert-warning">
  <strong>Warning!</strong> Error.
</div>
<?php } ?>


<p class="text-right">
    <a href="/index/add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add new task</a>
</p>    

<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Task</th>
          <th class="text-center">Image</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

<?php
if ($this->tasks) {
    foreach ($this->tasks as $row) {
?>
        <tr>
          <td><?php echo $row->task_id?></td>
          <td><?php echo $row->name?></td>
          <td><?php echo $row->email?></td>
          <td><?php echo $row->content?></td>
          <td class="text-center">         
              <span class="glyphicon glyphicon-zoom-in pointer" data-hint="<?php echo $row->image?>"></span>
          </td>
          <td><?php if ($row->status == Task::STATUS_NEW) { ?>
                <span class="label label-default">[New]</span>
              <?php } elseif ($row->status == Task::STATUS_FINISHED) { ?>
                <span class="label alert-success">[Finidhed]</span>
              <?php } ?>
          </td>
          <td><button type="button" class="btn btn-default">
                <a href="/admin/edit/?task_id=<?php echo $row->task_id?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
              </button></td>
        </tr>
<?php
    }
}
?>
      </tbody>
    </table>


<div id="hint"></div>
