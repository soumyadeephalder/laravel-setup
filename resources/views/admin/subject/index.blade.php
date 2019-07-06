@extends('admin.app')

@section('page_title','All Subject') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">All Subject</a></li>
      <li class="active">all</li>
</ol>
@endsection

@section('main-content')
  <div class="row">
            <div class="col-xs-12">
                  <div class="box">
                        <div class="box-header">
                              {{-- <h3 class="box-title" style="float: left;">View All Content Type</h3> --}}
                              {{-- {{ route('user.index') }} --}}
                              <!-- /.box-header -->
                                 @php $i=1; @endphp
                              @if(isset($subjects))
                              <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                          <tbody>
                                                <tr>
                                                      <th>Sl.</th>
                                                      <th>Code</th>
                                                      <th>Name</th>
                                                      <th>Course</th>
                                                      <th>Status</th>
                                                      <th>Action</th>
                                                </tr>
                                                  @foreach($subjects as $value)
                                          
                                                <td style="">{{ $i++ }}</td>
                                              
                                                <td style="">
                                                    {{ $value->subject_code }}
                                                </td>   
                                                <td style="">
                                                      {{ $value->subject_code }}
                                                </td>  
                                                <td style="">
                                                     @foreach($courses as $course) 
                                                      @if( $course->id == $value->course_id)
                                                        {{ $course->course_name }}
                                                      @endif
                                                    @endforeach
                                                </td>                                                   
                                                
                                                <td>
                                                      @if ($value->status== 1)
                                                      <span class="label label-success">Active</span>
                                                      @elseif($value->status== 0)
                                                      <span class="label label-danger">Inactive</span>
                                                      @endif
                                                </td>
                                                <td>                                                    
                                                      <a href="<?php echo url('/admin/subject/'.$value->id.'/edit');?>" title="Edit" style="color: black;">
                                                      <span class="pull-right-container">
                                                        <i class="fa fa-edit"></i>
                                                      </span>
                                                      </a>
                                                      <form action="{{ route('subject.destroy', $value->id ) }}" method="POST">
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