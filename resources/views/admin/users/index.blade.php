@extends('admin.app')

@section('page_title','All Students') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Student list</a></li>
      <li class="active">all</li>
</ol>
@endsection

@section('main-content')
  <div class="row">
    <div class="col-xs-12">
          <div class="box">
                <!-- /.box-header -->
                 @php $i=1; @endphp
                @if(isset($users))
                <div class="box-body table-responsive no-padding">
                   <table class="table table-hover">
                                  <tbody>
                                        <tr>
                                            <th>Id</th>
                                              <th>Name</th>
                                              <th>Email</th>
                                        </tr>
                                          @foreach($users as $value)
                                   <tr>
                                        <td style="">{{ $i++ }}</td>
                                      
                                        
                                        <td style="">
                                            {{ $value->name }}
                                        </td>  
                                        <td style="">
                                            {{ $value->email }}
                                        </td>    
                                       
                                       
                                       
                                  </tr>
                                  @endforeach
                            </tbody>
                      </table>
                </div>
                @endif
                @if(isset($message))
                <p style="font-size: 22px;text-align: -webkit-center;color: red;">{{ $message }}</p>
                @endif
                <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
  </div>
@endsection