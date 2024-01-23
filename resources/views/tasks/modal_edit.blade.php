<form action="{{ route('tasks.update', $task->id) }}" method="POST">
   @method('PUT')
  @csrf()
 <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">{{ $task->task_name }}</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body" id="data_edit">

 <div class="row clearfix">
  <div class="col-md-12 ">
    <label>Task Title</label>
    <div class="form-group {{ $errors->first('task_name', 'has-error')}}">
      <input type="text" class="form-control" name="task_name" placeholder="Team Name" value="{{ $task->task_name }}">
      <span class="help-block">{{ $errors->first('task_name', ':message') }}</span>   
    </div>
  </div>
  <div class="col-md-12 ">
    <label>Description</label>
    <div class="form-group {{ $errors->first('message', 'has-error')}}">                                    

      <textarea class="form-control" name="message" rows="4" placeholder="Message">{{ $task->message }}</textarea>        
      <span class="help-block">{{ $errors->first('message', ':message') }}</span>
    </div>
  </div>
  <div class="col-md-12">
   <label>Project Duration</label>
   <div class="form-group {{ $errors->first('start_date', 'has-error') .' '. $errors->first('due_date', 'has-error')}}">
    <div class="input-daterange input-group" data-provide="datepicker">
      <input type="text" class="input-sm form-control" name="start_date" value="{{date('m/d/Y', strtotime($task->start_date))}}" placeholder="Start Date">
      <span class="input-group-addon range-to">to</span>
      <input type="text" class="input-sm form-control" name="due_date" value="{{date('m/d/Y', strtotime($task->due_date))}}" placeholder="Due Date">
    </div>
    <span class="help-block">{{ $errors->first('start_date', ':message') }}</span>
    <span class="help-block">{{ $errors->first('due_date', ':message') }}</span>
  </div>
</div>

 <div class="col-md-6">
  <label>Target Leads</label>
  <div class="form-group {{ $errors->first('target', 'has-error')}}">
    <input type="text" class="form-control" name="target" placeholder="Targets" value="{{ number_format($task->target) }}">
    <span class="help-block">{{ $errors->first('target', ':message') }}</span>
  </div>
</div>

<div class="col-md-6">
  <label>Reached Leads</label>
  <div class="form-group {{ $errors->first('reached_target', 'has-error')}}">
    <input type="text" class="form-control" name="reached_target" placeholder="Reache Targets" value="{{ number_format($task->reached_target) }}">
    <span class="help-block">{{ $errors->first('reached_target', ':message') }}</span>
  </div>
</div> 

  <div class="col-md-6">
    <label>Peoject</label>
    <div class="form-group {{ $errors->first('project_id', 'has-error')}}">                                    
        {!! Form::select('project_id', $projects, $task->project_id,['id'=>'','class' => 'form-control','placeholder'=>'Select Department'] ) !!}
        <span class="help-block">{{ $errors->first('project_id', ':message') }}</span>
      </div>
  </div>

  <div class="col-md-6">
   <label>Set Priority</label>
   <div class="form-group {{ $errors->first('priority', 'has-error')}}">                                    
     <select name="priority" class="form-control" required="required">
      <option value="">-- Set Priority --</option>
      <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>High</option>
      <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
      <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Low</option>
    </select>
    <span class="help-block">{{ $errors->first('priority', ':message') }}</span>
  </div>
</div>



 <div class="col-md-6">
   <label>Select service</label>
 <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
               <select name="services" class="form-control" required="required">
                <option value="">-- Select services  --</option>

                <option value="Print"  {{ $task->services == 'Print' ? 'selected' : '' }}>Print</option>

               <option value="Banner" {{ $task->services == 'Banner' ? 'selected' : '' }} >Banner</option>
                <option value="Edm" {{ $task->services == 'Edm' ? 'selected' : '' }} >Edm</option>
                <option value="Enewletter banner" {{ $task->services == 'Enewletter banner' ? 'selected' : '' }}>Enewletter banner</option>
                <option value="Article website" {{ $task->services == 'Article website' ? 'selected' : '' }} >Article website</option>
                <option value="Interview website" {{ $task->services == 'Interview website' ? 'selected' : '' }} >Interview website</option>
                <option value="Enewsletter article" {{ $task->services == 'Enewsletter article' ? 'selected' : '' }} >Enewsletter article</option>
                <option value="Enewsletter interview" {{ $task->services == 'Enewsletter interview' ? 'selected' : '' }} >Enewsletter interview</option>
                <option value="ABM" {{ $task->services == 'ABM' ? 'selected' : '' }}>ABM</option>
                <option value="Whitepaper" {{ $task->services == 'Whitepaper' ? 'selected' : '' }} >Whitepaper</option>
                <option value="Webinar" {{ $task->services == 'Webinar' ? 'selected' : '' }} >Webinar</option>
                <option value="Video promotion" {{ $task->services == 'Video promotion' ? 'selected' : '' }}>Video promotion</option>
                <option value="Advertorial AHHM" {{ $task->services == 'Advertorial AHHM' ? 'selected' : '' }} >Advertorial AHHM</option>
                <option value="Advertorial PFA" {{ $task->services == 'Advertorial PFA' ? 'selected' : '' }} >Advertorial PFA</option>
                <option value="Interview AHHM" {{ $task->services == 'Interview AHHM' ? 'selected' : '' }} >Interview AHHM</option>
                <option value="Interveiw PFA" {{ $task->services == 'Interveiw PFA' ? 'selected' : '' }} >Interveiw PFA</option>
        

             
              </select>
              <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
            </div>

</div>

  <div class="col-md-6">
    <label>Status</label>
    <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
     <select name="active_flag" class="form-control" required="required">
      <option value="" disabled selected>-- Select one --</option>
      <option value="1" {{ $task->active_flag == 1 ? 'selected' :'' }}>Active</option>
      <option value="0" {{ $task->active_flag == 0 ? 'selected' :'' }}>InActive</option>
    </select>
    <span class="help-block">{{ $errors->first('active_flag', ':message') }}</span>
  </div>
</div>

</div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</div>

</form>