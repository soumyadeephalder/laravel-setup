@extends('admin.app')

@section('page_title','Add New Chapter Details') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Chapter/Details</a></li>
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
                              <h3 class="box-title">Add New Chapter Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- /.box-header -->
                        <div class="box-body">
                        {!! Form::open(array('route' => 'details.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}
                        <div class="form-group">
                              <label>Course </label>
                              <select name="course" id="Course" class="form-control" required>
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
                        {!! Form::label('Details Titel') !!}
                        {!! Form::text('details_titel', null, 
                              array('required', 
                                    'class'=>'form-control', 
                                    'placeholder'=>'Details Titel')) !!}
                        </div> 

                        <div class="form-group">
                            {!! Form::label('Details Text') !!}
                            {!! Form::textarea('details_text', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Details Text')) !!}
                        </div> 

                        <div class="form-group">
                        {!! Form::label('Details Img') !!}
                        {!! Form::file('details_img', 
                              array('required', 
                                    'class'=>'form-control')) !!}
                        </div> 

                        <div class="form-group">
                            {!! Form::label('Details Video') !!}
                            {!! Form::text('details_video', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Details Video')) !!}
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