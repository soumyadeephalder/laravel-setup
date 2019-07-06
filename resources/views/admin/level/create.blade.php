@extends('admin.app')

@section('page_title','Add New Level') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Level</a></li>
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
                              <h3 class="box-title">Add New Level</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- /.box-header -->
                        <div class="box-body">
                        {!! Form::open(array('route' => 'level.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}

                        <div class="form-group">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Name')) !!}
                        </div>   
                         <div class="form-group">
                          <label>Degree
                              <select name="degree" id="degree" class="form-control" required>
                                  <option value="">Select Degree</option>
                                  @foreach($degrees as $degree)
                                     <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                                  @endforeach
                                 </select>
                          </label>
                        </div> 
                         <div class="form-group">
                            {!! Form::label('Slug') !!}
                            {!! Form::text('slug', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Slug')) !!}
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