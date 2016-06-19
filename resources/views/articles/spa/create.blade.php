<div class="modal fade" id="create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4 class="modal-title">Create new article</h4>
      </div>
      <div class="modal-body">
        <div class="form-group" v-bind:class="{ 'has-error': errors.title }">
          <label class="control-label">Title</label>
          <input type="text" class="form-control" name="title" v-model="created.title">

          <span class="help-block" v-show="errors.title">
            <p v-for="error in errors.title">@{{ error }}</p>
          </span>
        </div>

        <div class="form-group" v-bind:class="{ 'has-error': errors.text }">
          <label class="control-label">Text</label>
          <textarea class="form-control" rows="9" name="text" v-model="created.text"></textarea>

          <span class="help-block" v-show="errors.text">
            <p v-for="error in errors.text">@{{ error }}</p>
          </span>
        </div>

        <a class="btn btn-md btn-default" v-on:click="store(created)">
          <span class="glyphicon glyphicon-floppy-disk"></span> Store
        </a>
      </div>
    </div>
  </div>
</div>
