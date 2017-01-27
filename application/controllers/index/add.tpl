      <div class="page-header">
        <h1>Add new task</h1>
      </div>


<form class="form-horizontal" id="addForm" role="form" data-toggle="validator" method="post" action="/index/save" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Email address is invalid" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" pattern="^[_-A-z0-9 ]{2,}$" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputDescription" class="col-sm-2 control-label">Task description</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="description" rows="5" id="inputDescription" required></textarea>
    </div>
  </div>    
   <div class="form-group">
    <label for="inputImage" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
      <input type="file" name="image" id="inputImage" required>
    </div>
  </div>   
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Add task</button>
      <button type="submit" class="btn btn-default"><a href="/"><span class="glyphicon glyphicon-remove"></span> Cancel</a></button>
    </div>
  </div>
</form>