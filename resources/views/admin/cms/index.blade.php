<?php echo "string"; die;?>


@extends('admin.app')

@section('page_title','All Categories') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">All Categories </a></li>
      <li class="active">all</li>
</ol>
@endsection

@section('main-content')
<div class="row">
<div class="col-xs-12">
<div class="box">
  <div class="box-header">
    {{-- <h3 class="box-title" style="float: left;">View All Category Type</h3> --}}
    {{-- {{ route('user.index') }} --}}
    <!-- /.box-header -->
    @php $i=1; @endphp
    @if(isset($category))
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
            @foreach($cms as $value)
    
          <td style="">{{ $i++ }}</td>
        
          <td style="">
              {{ $value->name }}
          </td>     
    
          <td>
                @if ($value->status== 1)
                <span class="label label-success">Active</span>
                @elseif($value->status== 0)
                <span class="label label-danger">Inactive</span>
                @endif
          </td>
          <td>                                                    
            <a href="" title="Edit" style="color: black;">
            <span class="pull-right-container">
              <i class="fa fa-edit"></i>
            </span>
            </a>
          <form action=" method="POST">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
              <button><i class="fa fa-trash"></i> </button>
          </form>                                          
               
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
<!-- /.box -->
</div>
</div>
@endsection