<?php

use Frm\Model\Task;    

?>
<div class="page-header">
    <h1>Edit task #<?php echo $this->task->task_id; ?></h1>
</div>

<form class="form-horizontal" id="addForm" role="form" data-toggle="validator" method="post" action="/admin/save" enctype="multipart/form-data">
    <input type="hidden" name="task_id" value="<?php echo $this->task->task_id; ?>">
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <p class="form-control-static"><?php echo $this->task->email; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label for="inputUsername" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
            <p class="form-control-static"><?php echo $this->task->name; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label for="inputDescription" class="col-sm-2 control-label">Task description</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="description" rows="5" id="inputDescription" required><?php echo $this->task->content; ?></textarea>
        </div>
    </div>    
    <div class="form-group">
        <label for="inputImage" class="col-sm-2 control-label">Image</label>
        <div class="col-sm-10">
            <img src="/public/upload/<?php echo $this->task->image; ?>" border="0" alt="">
        </div>
    </div>   
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label class="control-label">
                    <input type="checkbox" name="status" value="1" <?php if ($this->task->status == Task::STATUS_FINISHED) { echo ' checked="checked"'; } ?>> <strong>Task is finished</strong>
                </label>
            </div>
        </div>
    </div>  
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save task</button>
            <button type="submit" class="btn btn-default"><a href="/admin/"><span class="glyphicon glyphicon-remove"></span> Cancel</a></button>
        </div>
    </div>
</form>