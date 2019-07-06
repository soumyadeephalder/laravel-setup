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
                        {!! Form::open(array('route' => 'chapter.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}
                        
                        <div class="form-group">
                        {!! Form::label('Chapter Code') !!}
                        {!! Form::text('chapter_code', null, 
                              array('required', 
                                    'class'=>'form-control', 
                                    'placeholder'=>'chapter Code')) !!}
                        </div> 

                        <div class="form-group">
                            {!! Form::label('Name') !!}
                            {!! Form::text('chapter_name', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Name')) !!}
                        </div> 
                        <div class="form-group">
                            {!! Form::label('Chapter Details') !!}
                            {!! Form::textarea('chapter_details', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Chapter Details')) !!}
                        </div>
                         <div class="form-group">
                          <label>Course </label>
                        <select name="subject_id" id="subject" class="form-control" required>
                              <option value="">Select Subject</option>
                              @foreach($subjects as $subject_value)
                                    <option value="{{ $subject_value->id }}">{{ $subject_value->subject_name }}</option>
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