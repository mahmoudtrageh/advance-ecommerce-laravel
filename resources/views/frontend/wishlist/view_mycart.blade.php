@extends('frontend.main_master')
@section('content')

@section('title')
{{trans('site.cart')}} 
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">{{trans('site.home')}}</a></li>
				<li class='active'>{{trans('site.cart')}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 

<div class="body-content">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">{{trans('site.image')}}</th>
					<th class="cart-description item">{{trans('site.name')}}</th>
					<th class="cart-product-name item">{{trans('site.color')}}</th>
					<th class="cart-edit item">{{trans('site.size')}}</th>
					<th class="cart-qty item">{{trans('site.quantity')}}</th>
					<th class="cart-sub-total item">{{trans('site.sub-total')}}</th>
					<th class="cart-total last-item">{{trans('site.remove')}}</th>
				</tr>
			</thead><!-- /thead -->
			<tbody id="cartPage">
		
			</tbody>
		</table>
	</div>
</div>		


<div class="col-md-4 col-sm-12 estimate-ship-tax">

</div>


<div class="col-md-4 col-sm-12 estimate-ship-tax">
	@if(Session::has('coupon'))

	@else

	
	<table class="table" id="couponField">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">{{trans('site.discount-code')}}</span>
					<p>{{trans('site.enter-coupon-code')}}..</p>
				</th>
			</tr>
		</thead>
		<tbody>
<tr>
	<td>
		<div class="form-group">
			<input type="text" class="form-control unicase-form-control text-input" placeholder="{{trans('site.discount-code')}}.." id="coupon_name">
		</div>
		<div class="clearfix pull-right">
			<button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">{{trans('site.apply-coupon')}}</button>
		</div>
	</td>
</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
@endif


</div><!-- /.estimate-ship-tax -->





<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead id="couponCalField">
			
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
		 <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">{{trans('site.proceed-to-checkout')}}</a>
							 
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->










	</div><!-- /.row -->
		</div><!-- /.sigin-in-->



<br>
</div>

 
@endsection
