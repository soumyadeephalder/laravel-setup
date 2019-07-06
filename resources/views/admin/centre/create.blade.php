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
              <h3 class="box-title">Add New Centres</h3>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(array('route' => 'centre.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}
        
        <div class="form-group">
            {!! Form::label('Centres Name ') !!}
            {!! Form::text('centres_name', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Centres Name ')) !!}
        </div>
        {{-- <div class="form-group">
            {!! Form::label('Course Name ') !!}
            {!! Form::text('course_name', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Course Name ')) !!}
        </div> --}}
        <div class="form-group">
            <div style="padding-bottom: 14px;">
              <label for="select2-multiple-input-sm" class="control-label">select Course</label>
              <select id="select2-multiple-input-sm" class="form-control input-sm select2-multiple" multiple name="course_id[]">
                @foreach($courses as $value)
                  <option value="{{ $value->id }}">{{ $value->course_name }}</option>
                @endforeach
              </select>
            </div>
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