      <div class="page-header">
        <h1>Tasks</h1>
      </div>

<?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 'success') { ?>
<div class="alert alert-success">
  <strong>Success!</strong> Task added successfully.
</div>
<?php } elseif (isset($_REQUEST['status']) && $_REQUEST['status'] == 'error') { ?>
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
          <td><?php if ($row->status == \Model\Task::STATUS_NEW) { ?>
                <span class="label label-default">[New]</span>
              <?php } elseif ($row->status == \Model\Task::STATUS_FINISHED) { ?>
                <span class="label alert-success">[Finidhed]</span>
              <?php } ?>
          </td>
        </tr>
<?php
    }
}
?>
      </tbody>
    </table>


<div id="hint"></div>

