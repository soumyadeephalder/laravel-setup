@extends('admin.app')

@section('page_title','Edit Subject') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Subject</a></li>
      <li class="active">Edit</li>
</ol>
@endsection
<script type="text/javascript">
function getLevel(sel)
{
    var degree = sel.value;
    $.ajax({
           type:'GET',
           url:'https://www.buyonlineclasses.com/admin/getlevelsbydegree/'+degree,
           success:function(data){
              $("#levelwrap").html(data)
           }
        });
}
</script>
@section('main-content')
<!-- Main content -->
      <div class="row">
      <!-- right column -->
            <div class="col-md-12">
                  <div class="box box-warning">
                        <div class="box-header with-border">
                              <h3 class="box-title">Edit Subject</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ Form::model($subject,['route' => ['subject.update' , $subject->id ],'method' => 'PUT'] ) }}
                                <div class="form-group">
                            {!! Form::label('Name') !!}
                            {!! Form::text('name', null, 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Name')) !!}
                        </div> 
                         <div class="form-group">
                          <label>Degree
                              <select name="degree" id="degree" class="form-control" onchange="getLevel(this);">
                                  <option value="">Select Degree</option>
                                  @foreach($degrees as $degree)
                                     <option value="{{ $degree->id }}"  @php if($subject->degree==$degree->id) echo "selected=selected"; @endphp >{{ $degree->name }}</option>
                                  @endforeach
                                 </select>
                          </label>
                        </div>        
                        <div class="form-group" id="levelwrap">
                          <label>Levels
                              <select name="level" id="level" class="form-control">
                                  <option value="">Select Level</option>
                                  @foreach($levels as $level)
                                     <option value="{{ $level->id }}"  @php if($subject->level==$level->id) echo "selected=selected"; @endphp >{{ $level->name }}</option>
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
                         {!!  Html::linkRoute('subject.show','Cancel',array($subject->id),array('class' => 'btn btn-primary' )) !!}
                            {!! Form::submit('Save Changes', 
                              array('class'=>'btn btn-primary')) !!}
                        </div>
                        {!! Form::close() !!}
                         </div>
                        <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
            </div>
      <!--/.col (right) -->
      </div>
<!-- /.row -->

<!-- /.content -->
<!-- /.content -->
@endsection