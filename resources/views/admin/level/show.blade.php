@extends('admin.app')

@section('page_title','All Hotels') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Levels</a></li>
      <li class="active">{{ $level->name }}</li>
</ol>
@endsection

@section('main-content')
  <div class="row">
            <div class="col-xs-12">
                  <div class="box">
                        <div class="box-header">
                              <h3 class="box-title" style="float: left;">{{ $level->name }}</h3>                            
                        </div>
                        
                         <div class="box-body">


                            {{--   <div class="row">
                                    <div class="col-md-6">
                                          <a href="{{ route('hostel.edit' , $hostel->id ) }}" class="btn btn-lg btn-success">Edit</a>
                                          </div>
                                          <div class="col-md-6">
                                                {!! Form::open(['route' => ['hostels.destroy',$hostel->id],'method'=>'DELETE'] ) !!}
                                                {!! Form::submit('Delete!',array('class' => 'btn btn-lg btn-danger','style'=>'margin-top:20px;')) !!}
                                                {!! Form::close() !!}
                                          </div>
                                    </div>
                              </div> --}}
                              @if(isset($message))
                              <p style="font-size: 22px;text-align: -webkit-center;color: red;">{{ $message }}</p>
                              @endif
                              <!-- /.box-body -->
                         </div>
                  </div>
                  <!-- /.box -->
            </div>
      </div>
@endsection