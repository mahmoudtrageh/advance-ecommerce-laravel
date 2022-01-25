@extends('frontend.main_master')
@section('content')
@section('title')
{{trans('site.user-profile')}}
@endsection
<div class="body-content">
	<div class="container">
		<div class="row">
			
			@include('frontend.common.user_sidebar')

			<div class="col-md-2">
				
			</div> <!-- // end col md 2 -->


			<div class="col-md-6">
  <div class="card">
  	<h3 class="text-center"><span class="text-danger">{{trans('site.hi')}} ... </span><strong>{{ Auth::user()->name }}</strong> </h3>
  	
  </div>


				
			</div> <!-- // end col md 6 -->
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection