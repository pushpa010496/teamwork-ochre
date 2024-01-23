<form action="{{ route('projects.update', $project->id) }}" method="POST">
 @method('PUT')
 @csrf()
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $project->project_name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="data_edit">
            <div class="row clearfix">
                <div class="col-md-12 ">
                   <label>Project Name</label>
                  <div class="form-group {{ $errors->first('project_name', 'has-error')}}">
                    <input type="text" class="form-control" name="project_name" placeholder="Project Name" value="{{ $project->project_name }}">
                    <span class="help-block">{{ $errors->first('project_name', ':message') }}</span>   
                  </div>
                </div>
                <div class="col-md-12">
                   <label>Client Name</label>
                   <div class="form-group {{ $errors->first('client_id', 'has-error')}}">                                    
                    {!! Form::select('client_id', $clients, $project->client_id,['id'=>'','class' => 'form-control','placeholder'=>'Select Client'] ) !!}
                    <span class="help-block">{{ $errors->first('client_id', ':message') }}</span>
                  </div>
                </div>  

               {{--  <div class="col-md-6">
                  <label>Target Leads</label>
                  <div class="form-group {{ $errors->first('target', 'has-error')}}">
                    <input type="text" class="form-control" name="target" placeholder="Targets" value="{{ number_format($project->target) }}">
                    <span class="help-block">{{ $errors->first('target', ':message') }}</span>
                  </div>
                </div>

                <div class="col-md-6">
                  <label>Reached Leads</label>
                  <div class="form-group {{ $errors->first('reached_target', 'has-error')}}">
                    <input type="text" class="form-control" name="reached_target" placeholder="Reache Targets" value="{{ number_format($project->reached_target) }}">
                    <span class="help-block">{{ $errors->first('reached_target', ':message') }}</span>
                  </div>
                </div> --}}
               
              <div class="col-md-12">
                 <label>Project Duration</label>
                <div class="form-group {{ $errors->first('start_date', 'has-error') .' '. $errors->first('due_date', 'has-error')}}">
                  <div class="input-daterange input-group" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="start_date" value="{{date('m/d/Y', strtotime($project->start_date))}}" placeholder="Start Date">

                    <span class="input-group-addon range-to">to</span>
                    <input type="text" class="input-sm form-control" name="due_date" value="{{date('m/d/Y', strtotime($project->due_date))}}" placeholder="Due Date">
                  </div>
                  <span class="help-block">{{ $errors->first('start_date', ':message') }}</span>
                  <span class="help-block">{{ $errors->first('due_date', ':message') }}</span>
                </div>
            </div>

            <div class="col-md-12">
               <label>Description</label>
              <div class="form-group {{ $errors->first('description', 'has-error')}}">
                <textarea class="form-control" name="description" rows="4" placeholder="Description">{{$project->description}}</textarea>
                <span class="help-block">{{ $errors->first('description', ':message') }}</span>
              </div>

            </div>
             <div class="col-md-6">
               <label>Set Priority</label>
                  <div class="form-group {{ $errors->first('priority', 'has-error')}}">                                    
                   <select name="priority" class="form-control" required="required">
                    <option value="">-- Set Priority --</option>
                    <option value="High" {{ $project->priority == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ $project->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ $project->priority == 'Low' ? 'selected' : '' }}>Low</option>
                  </select>
                  <span class="help-block">{{ $errors->first('priority', ':message') }}</span>
                </div>
              </div>

              <div class="col-md-6">
                 <label>Status</label>
                 <div class="form-group {{ $errors->first('active_flag', 'has-error')}}">                                    
                 <select name="active_flag" class="form-control" required="required">
                  <option value="">-- Select one --</option>
                  <option value="1" {{ $project->active_flag == 1 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ $project->active_flag == 0 ? 'selected' : '' }}>InActive</option>
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