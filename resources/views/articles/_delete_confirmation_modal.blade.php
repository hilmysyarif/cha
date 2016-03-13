<div class="modal fade" id="delete-confirmation">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <form method="POST">

            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            
            <button type="submit" class="btn btn-danger">
                Yes</span>
            </button>
        </form>
      </div>
    </div>
  </div>
</div>
