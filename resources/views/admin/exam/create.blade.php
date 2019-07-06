@extends('admin.app')

@section('page_title','Add New Subject') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Exam</a></li>
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
                              <h3 class="box-title">Add New Exam</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- /.box-header -->
                        <div class="box-body">
                        {!! Form::open(array('route' => 'exam.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}
                        
                        <div class="form-group">
                        {!! Form::label('Exam Code') !!}
                        {!! Form::text('exam_code', null, 
                              array('required', 
                                    'class'=>'form-control', 
                                    'placeholder'=>'chapter Code')) !!}
                        </div> 

                        <div class="form-group">
                            {!! Form::label('Name') !!}
                            {!! Form::text('exam_name', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Name')) !!}
                        </div> 
                        
                        <div class="form-group">
                              <label>Centre </label>
                              <select name="centre" id="centre" class="form-control" required>
                                    <option value="">Select Centre</option>
                                    @foreach($centres as $centre_value)
                                          <option value="{{ $centre_value->id }}">
                                                {{ $centre_value->centres_name }}
                                          </option>
                                    @endforeach
                              </select>
                        </div> 
                        <div class="form-group">
                              <label>Course </label>
                              <select name="Course" id="Course" class="form-control" required>
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course_value)
                                          <option value="{{ $course_value->id }}">
                                                {{ $course_value->course_name }}
                                          </option>
                                    @endforeach
                              </select>
                        </div> 
                        <div class="form-group">
                              <label>subject </label>
                              <select name="subject" id="subject" class="form-control" required>
                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $subject_value)
                                          <option value="{{ $subject_value->id }}">{{ $subject_value->subject_name }}</option>
                                    @endforeach
                              </select>
                        </div> 
                        <div class="form-group">
                              <label>chapter </label>
                              <select name="chapter" id="chapter" class="form-control" required>
                                    <option value="">Select chapter</option>
                                    @foreach($chapters as $chapter_value)
                                          <option value="{{ $chapter_value->id }}">{{ $chapter_value->chapter_name }}</option>
                                    @endforeach
                              </select>
                        </div> 
                        <div class="form-group">
                              {!! Form::label('Date') !!}
                              {!! Form::date('datet', null, 
                                    array('required', 
                                          'class'=>'form-control', 
                                          'placeholder'=>'Date')) !!}
                        </div> 
                        <div class="form-group">
                              {!! Form::label('Start Time') !!}
                              {!! Form::time('start_time', null, 
                                    array('required', 
                                          'class'=>'form-control', 
                                          'placeholder'=>'Start Timegit')) !!}
                        </div> 
                        <div class="form-group">
                              {!! Form::label('End Time') !!}
                              {!! Form::time('end_time', null, 
                                    array('required', 
                                          'class'=>'form-control', 
                                          'placeholder'=>'End Time')) !!}
                        </div>

                        <div class="form-group">
                              <label>Exam type </label>
                              <select name="type" class="form-control" required>
                                    <option value="">Select Exam type</option>
                                    <option value="easy">easy</option>
                                    <option value="moderate">moderate</option>
                                    <option value="hard">hard</option>
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