<form action="{{ route('task.adduser', $task->id) }}" method="POST">   
  @csrf()
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add Members to # {{ $task->task_name }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body" id="data_edit">

   <div class="row clearfix">
    <div class="col-md-12 ">

      <div class="multiselect_div">
        {{ Form::select('memberlist[]', $members,$task->employees()->pluck('id'), [ 'id'=>'multiselect4-filter','class' => 'multiselect multiselect-custom','multiple'=>'multiple']) }}

      </div>
    </div>
    <div class="col-12 mt-3 text-right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
      <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>



  </div>

</div>

</form>