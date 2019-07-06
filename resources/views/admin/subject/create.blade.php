@extends('admin.app')

@section('page_title','Add New Subject') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Subject</a></li>
      <li class="active">create</li>
</ol>
@endsection

@section('main-content')

<!-- Main content -->
      <div class="row">
      <!-- right column -->
            <div class="col-md-12">
                  <div class="box box-warning">
                        <div class="box-header with-border">
                              <h3 class="box-title">Add New Subject</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- /.box-header -->
                        <div class="box-body">
                        {!! Form::open(array('route' => 'subject.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}
                        
                        <div class="form-group">
                        {!! Form::label('Subject Code') !!}
                        {!! Form::text('subject_code', null, 
                              array('required', 
                                    'class'=>'form-control', 
                                    'placeholder'=>'Subject Code')) !!}
                        </div> 

                        <div class="form-group">
                            {!! Form::label('Name') !!}
                            {!! Form::text('subject_name', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Name')) !!}
                        </div> 
                         <div class="form-group">
                          <label>Course </label>
                        <select name="course_id" id="degree" class="form-control" required>
                              <option value="">Select Course</option>
                              @foreach($courses as $course_value)
                                    <option value="{{ $course_value->id }}">{{ $course_value->course_name }}</option>
                              @endforeach
                        </select>
                        </div> 
                        <div class="form-group">

                        <label>Status </label>
                        <select name="status" class="form-control" required>
                              <option value="">Select Status</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                        </select>
                        </div>  
                                                                    
                        <div class="form-group">
                            {!! Form::submit('Add New!!', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                        {!! Form::close() !!}
                        </div>
                  </div>
                  <!-- /.box -->
            </div>
      <!--/.col (right) -->
      </div>
<!-- /.row -->

<!-- /.content -->
@endsection