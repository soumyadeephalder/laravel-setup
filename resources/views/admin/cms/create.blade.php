@extends('admin.app')

@section('page_title','Add New Page') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Page</a></li>
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
              <h3 class="box-title">Add New Page</h3>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(array('route' => 'cms.store', 'class' => 'form' ,'id' =>'createroomsform','files' => true)) !!}
        
        <div class="form-group">
            {!! Form::label('Title') !!}
            {!! Form::text('title', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Title')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Slug') !!}
            {!! Form::text('slug', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Slug')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Description1') !!}
            {!! Form::textarea('description1', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'Description1','class' => 'ckeditor')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Description2') !!}
            {!! Form::textarea('description2', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'Description2','class' => 'ckeditor')) !!}
        </div>  
        <div class="form-group">
           {{Form::label('image1', 'Image1', ['class' => 'control-label'])}}
            {{Form::file('image1', ['accept'=>"image/*"])}}
        </div>  
         <div class="form-group">
           {{Form::label('image2', 'Image2', ['class' => 'control-label'])}}
            {{Form::file('image2', ['accept'=>"image/*"])}}
        </div>   
        <div class="form-group">
            {!! Form::label('Meta Title') !!}
            {!! Form::text('meta_title', null, 
                array(
                      'class'=>'form-control', 
                      'placeholder'=>'Meta Title')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Meta Tags') !!}
            {!! Form::text('meta_tags', null, 
                array( 'class'=>'form-control', 
                      'placeholder'=>'Meta Tags')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Meta Details') !!}
            {!! Form::textarea('meta_details', null, 
                array('class'=>'form-control', 
                'placeholder'=>'Meta Details','class' => 'ckeditor')) !!}
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