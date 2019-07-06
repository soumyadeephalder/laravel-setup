<!DOCTYPE html>
<html>
<head>

   @include('admin/layouts/head')

</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

	@include('admin/layouts/header')
	@include('admin/layouts/sidebar')
	@include('admin/layouts/messages')
	<div class="content-wrapper">
		<section class="content-header">

	      <h1>@yield('page_title')</h1><!-- Display current page title-->
	      @yield('page_location')<!-- Display current page location i.e add data/view data etc-->

		</section>
		<section class="content">
			@section('main-content')

			@show 
		</section>
	</div>	   
	@include('admin/layouts/footer')

   </div>
</body>

</html>
