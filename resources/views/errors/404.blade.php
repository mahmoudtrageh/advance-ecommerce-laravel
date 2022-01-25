@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
					<h1>404</h1>
					<p>{{trans('site.404-error-page')}}. </p>
					 
					<a href="{{ url('/') }}"><i class="fa fa-home"></i> {{trans('site.go-to-homepage')}}</a>
				</div>
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection
