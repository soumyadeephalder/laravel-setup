@extends('admin.app')

@section('page_title','Edit Course') 

@section('page_location')
<ol class="breadcrumb">
      <li><a href="javascript:void('0');"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="javascript:void('0');">Course</a></li>
      <li class="active">Edit</li>
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
<script type="text/javascript">
function getLevel(sel)
{
    var degree = sel.value;
    $.ajax({
           type:'GET',
           url:'https://www.buyonlineclasses.com/admin/getlevelsbydegree/'+degree,
           success:function(data){
              $("#levelwrap").html(data)
               $("#subjectwrap").html('')
           }
        });
}
function getSubject(sel)
{
  var subject = sel.value;
  $.ajax({
     type:'GET',
     url:'https://www.buyonlineclasses.com/admin/getsubjectsbyLevel/'+subject,
     success:function(data){
        $("#subjectwrap").html(data)
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
              <h3 class="box-title">Edit Course</h3>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
        <div class="box-body">
            {{ Form::model($course,['route' => ['course.update' , $course->id ],'method' => 'PUT','class' => 'form' ,'id' =>'createroomsform','files' => true] ) }}
       
        
        <div class="form-group">
            {!! Form::label('Package Name (Exam Name and Subject Name)') !!}
            {!! Form::text('package_name', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Package Name (Exam Name and Subject Name)')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Slug') !!}
            {!! Form::text('slug', null, 
                array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Slug')) !!}
        </div> 
       <div class="form-group">
        @php
        if($course->popular =='Yes' )
        {
          @endphp
          {{Form::checkbox('popular', 'Yes', true) }}
            @php
        }else{
           @endphp
           {{ Form::checkbox('popular', 'Yes', false) }}
           @php
        }
        @endphp
       
        <label for="remember_me">Most Popular Course</label>
        </div>  
        <div class="form-group">
          <label>Degree
              <select name="degree" id="degree" class="form-control" onchange="getLevel(this);">
                  <option value="">Select Degree</option>
                  @foreach($degrees as $degree)
                     <option value="{{ $degree->id }}"  @php if($course->degree==$degree->id) echo "selected=selected"; @endphp >{{ $degree->name }}</option>
                  @endforeach
                 </select>
          </label>
        </div>        
        <div class="form-group" id="levelwrap">
          <label>Levels
              <select name="level" id="level" class="form-control"  onchange="getSubject(this);">
                  <option value="">Select Level</option>
                  @foreach($levels as $level)
                     <option value="{{ $level->id }}"  @php if($course->level==$level->id) echo "selected=selected"; @endphp >{{ $level->name }}</option>
                  @endforeach
                 </select>
          </label>
        </div> 
        <div class="form-group" id="subjectwrap">
          <label>Subject
            <select name="subject" id="subject" class="form-control" >
              <option value="">Select Subject</option>'

              @foreach($subjects as $subject)
                <option value="{{ $subject->id }}"  @php if($course->subject==$subject->id) echo "selected=selected"; @endphp >{{ $subject->name }}</option>
              @endforeach
            </select>
        </label>

        </div>           
        <div class="form-group">
          {{--  {{Form::label('product_image', 'Product Image', ['class' => 'control-label'])}}
            {{Form::file('product_image', ['accept'=>"image/*"])}} --}}
             @php 
              $photos =array();
              if( !empty($course->product_image))
              {
                $photos = unserialize( $course->product_image);
                if(count($photos)>0)
                {
                  
                  $img_path=url('/logo/'.$photos['product_image']); 
                  echo '<img src="'.$img_path.'" width="100px">';
                }
                
              }                             
             @endphp
          {{--  {{Form::label('product_image', 'Product Image', ['class' => 'control-label'])}}
            {{Form::file('product_image', ['accept'=>"image/*"])}} --}}
             <input type="file" name="product_image">
        </div>   
         <div class="form-group">
            {!! Form::label('Product USP (Details)') !!}
            {!! Form::textarea('product_details', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'Description','class' => 'ckeditor')) !!}
        </div>  
         <div class="form-group">
            {!! Form::label('Recording (Month - Year)') !!}
            {!! Form::text('recording', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Recording (Month - Year)')) !!}
        </div>  
         <div class="form-group">
          <label>Syllabus
              <select name="syllabus" id="syllabus" class="form-control">
                <option value="">Select</option>
                  <option value="Old"  @php if($course->syllabus=='Old') echo "selected=selected"; @endphp >Old</option>
                <option value="New"  @php if($course->syllabus=='New') echo "selected=selected"; @endphp >New</option>
                  <option value="Old & New"  @php if($course->syllabus=='Old & New') echo "selected=selected"; @endphp >Old & New</option>
              </select>
          </label>
        </div>
         <div class="form-group">
          <label>Format
              <select name="format" id="format" class="form-control">
                <option value="">Select</option>
                <option value="Online"  @php if($course->format=='Online') echo "selected=selected"; @endphp>Online</option>
                <option value="Downloadable"  @php if($course->format=='Downloadable') echo "selected=selected"; @endphp>Downloadable</option>
                <option value="Pendrive/USB"  @php if($course->format=='Pendrive/USB') echo "selected=selected"; @endphp>Pendrive/USB</option>
                <option value="CD/DVD"  @php if($course->format=='CD/DVD') echo "selected=selected"; @endphp >CD/DVD</option>
                <option value="SD Card"  @php if($course->format=='SD Card') echo "selected=selected"; @endphp>SD Card</option>
                <option value="Tablet"  @php if($course->format=='Tablet') echo "selected=selected"; @endphp>Tablet</option>
                <option value="Laptop"  @php if($course->format=='Laptop') echo "selected=selected"; @endphp >Laptop</option>
                <option value="Hard Disk"  @php if($course->format=='Hard Disk') echo "selected=selected"; @endphp>Hard Disk</option>
              </select>
          </label>
        </div>
        <div class="form-group">
            <label>Study Material Provided in
                <select name="material_by" id="material_by" class="form-control" >
                  <option value="">Select</option>
                  <option value="Soft Copy"  @php if($course->material_by=='Soft Copy') echo "selected=selected"; @endphp >Soft Copy</option>
                  <option value="Hard Copy"  @php if($course->material_by=='Hard Copy') echo "selected=selected"; @endphp >Hard Copy</option>
                  <option value="Not Provided"  @php if($course->material_by=='Not Provided') echo "selected=selected"; @endphp >Not Provided</option>
                </select>
            </label>
        </div>
       
         <div class="form-group">
            {!! Form::label('For Hard Copy Study Material, provide details') !!}
            {!! Form::text('hard_copy', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'For Hard Copy Study Material, provide details')) !!}
        </div>   
         <div class="form-group">
            {!! Form::label('Final Selling Price (Inclusive of All Taxes)') !!}
            {!! Form::text('price', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Final Selling Price (Inclusive of All Taxes)')) !!}
        </div> 
         <div class="form-group">
            {!! Form::label('Discounted Price') !!}
            {!! Form::text('discounted_price', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Discounted Price')) !!}
        </div>   
         <div class="form-group">
            {!! Form::label('Applicable for the Attempt (e.g. May 2019, Nov 2019)') !!}
            {!! Form::text('applicable_for_attempt', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'e.g. May 2019, Nov 2019')) !!}
        </div>  
         <div class="form-group">
          <label>Faculty Name
              <select name="faculty_name" id="faculty_name" class="form-control">
                  <option value="">Select</option>

                  @foreach($educators as $educator)
                  <option value="{{ $educator->id }}"  @php if($course->faculty_name==$educator->id) echo "selected=selected"; @endphp >{{ $educator->coaching_classes }}</option>
                   
                  @endforeach
              </select>
          </label>
        </div>   
         <div class="form-group">
            {!! Form::label('Total No. of Lectures') !!}
            {!! Form::text('lectures_no', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Total No. of Lectures')) !!}
        </div>   
              
         <div class="form-group">
            {!! Form::label('Total No. of Hours') !!}
            {!! Form::text('hours_no', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Total No. of Hours')) !!}
        </div>   
        
        <div class="form-group">
            {!! Form::label('Video Language') !!}
            {!! Form::text('video_language', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Video Language')) !!}
        </div>   
         <div class="form-group">
            {!! Form::label('No. of Views Per Lecture') !!}
            {!! Form::text('lectures_view', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'No. of Views Per Lecture')) !!}
        </div> 
         <div class="form-group"> 
         <label>Fast Forward
            <select name="fast_forward" id="fast_forward" class="form-control" >
              <option value="">Select</option>
              <option value="Yes"  @php if($course->fast_forward=='Yes') echo "selected=selected"; @endphp >Yes</option>
              <option value="No"  @php if($course->fast_forward=='No') echo "selected=selected"; @endphp >No</option>
            </select>
          </label> 
        </div>
         <div class="form-group">
            {!! Form::label('Fast Forward - if "Yes" provide details (E.g. 1.0 x, 1.2 x, 1.5x etc)') !!}
            {!! Form::text('fast_forward_details', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Fast Forward Provided Details')) !!}
        </div>   
         <div class="form-group">
            {!! Form::label('Validity (in Months OR provide date)') !!}
            {!! Form::text('expire_validity', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Validity (in Months OR provide date)')) !!}
        </div>   
           <div class="form-group">
            {!! Form::label('Topics Covered') !!}
            {!! Form::text('topics_covered', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Topics Covered')) !!}
        </div>   
           <div class="form-group">
            {!! Form::label('How the Doubt clearing session will be available?') !!}
            {!! Form::text('doubt_clearing_availability', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'How the Doubt clearing session will be available?')) !!}
        </div>   
        <div class="form-group">
            {!! Form::label('How the amendmend will be provided?') !!}
            {!! Form::text('amendmend', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'How the amendmend will be provided?')) !!}
        </div>   
       <div class="form-group">
            {!! Form::label('Video Runs on') !!}
            {!! Form::text('video_run_on', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Video Runs on')) !!}
        </div>     
          <div class="form-group">
            {!! Form::label('If Test Series Provided, Mention complete details') !!}
            {!! Form::textarea('mention_details', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'','class' => 'ckeditor')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('If Providing Charts, Mention details.') !!}
            {!! Form::textarea('charts_details', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'','class' => 'ckeditor')) !!}
        </div>
        <div class="form-group">
        <label>Dispatch
              <select name="dispatch" id="dispatch" class="form-control" >
                <option value="">Select</option>
                <option value="Partly"  @php if($course->dispatch=='Partly') echo "selected=selected"; @endphp >Partly</option>
                <option value="Complete"  @php if($course->dispatch=='Complete') echo "selected=selected"; @endphp >Complete</option>
              </select>
          </label>
        </div>
        <div class="form-group">
            {!! Form::label('If Dispatch partly, mention dispatch schedule.') !!}
            {!! Form::textarea('dispatch_schedule', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'','class' => 'ckeditor')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Lectures Link') !!}
            {!! Form::text('lectures_link', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Lectures Link')) !!}
        </div>   
        <div class="form-group">
            {!! Form::label('Books Images Link') !!}
            {!! Form::text('books_images_link', null, 
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Books Images Link')) !!}
        </div>   
          <div class="form-group">
            {!! Form::label('Other Details (If anything)') !!}
            {!! Form::textarea('other_details', null, 
                array('class'=>'form-control', 
                      'placeholder'=>'Other Details (If anything)','class' => 'ckeditor')) !!}
        </div>
         <div class="form-group">
        <label>Shipment Required (Y/N)
              <select name="shipment_required" id="shipment_required" class="form-control" >
                <option value="">Select</option>
                <option value="Yes"  @php if($course->shipment_required=='Yes') echo "selected=selected"; @endphp >Yes</option>
                <option value="No"  @php if($course->shipment_required=='No') echo "selected=selected"; @endphp >No</option>
              </select>
          </label>
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
                array( 
                      'class'=>'form-control', 
                      'placeholder'=>'Meta Tags')) !!}
        </div>  
        <div class="form-group">
            {!! Form::label('Meta Details') !!}
            {!! Form::textarea('meta_details', null, 
                array('class'=>'form-control', 
                'placeholder'=>'Meta Details','class' => 'ckeditor')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update!!', 
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