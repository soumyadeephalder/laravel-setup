@extends('admin.app')

@section('page_title','Add New Course') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Course</a></li>
      <li class="active">create</li>
</ol>
@endsection
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
@section('main-content')
<!-- Main content -->
  <div class="row">
  <!-- right column -->
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
              <h3 class="box-title">Add New Course</h3>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(array('route' => 'course.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}
        <div class="form-group">
            {!! Form::label('Course Code ') !!}
            {!! Form::text('course_code', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Course Code ')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Course Name ') !!}
            {!! Form::text('course_name', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Course Name ')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Course image ') !!}
            {{Form::file('course_photo', array('required', 
                      'class'=>'form-control')) }}

        </div> 
         
        <div class="form-group">
            {!! Form::submit('Add New !!', 
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