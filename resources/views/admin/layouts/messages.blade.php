@if(Session::has('success'))
<!--<div class="alert alert-success" role="alert">
      <strong>Success:</strong>{{ Session::get('success') }}
</div>-->
<div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
      <h4><i class="icon fa fa-check"></i> Success:</h4>
      {{ Session::get('success') }}
</div>
@endif

@if(Session::has('error'))

<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
      <h4><i class="icon fa fa-ban"></i> Errors!</h4>
      {{ Session::get('error') }}
</div>

@endif

@if(count($errors)>0)
<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
      <h4><i class="icon fa fa-ban"></i> Errors!</h4>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
</div>

@endif