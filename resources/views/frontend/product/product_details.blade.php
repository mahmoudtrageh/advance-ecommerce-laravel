@extends('frontend.main_master')
@section('content')

@section('title')
@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_hin }} @endif | {{trans('site.product-details')}}
@endsection

<style>
	.checked {
  color: orange;
}


</style>

@if(session()->get('lang') == 'hi')

<style>
	.owl-single-product {
		opacity: 1;
    display: block;
	}
	.owl-wrapper-outer {
		overflow: hidden;
    position: relative;
    width: 100%;
	}
	.owl-wrapper{
		width: 1276px;
    left: 0px;
    display: block;
	}
</style>
@endif


<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">{{trans('site.home')}}</a></li>
				<li><a href="#">@if(session()->get('lang') == 'hi') {{ $category->category_name_hin }} @else {{ $category->category_name_hin }} @endif</a></li>
				<li class='active'>@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_hin }} @endif</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
	
  
    
    
    	<!-- ====== === HOT DEALS ==== ==== -->
   @include('frontend.common.hot_deals')
<!-- ===== ===== HOT DEALS: END ====== ====== -->					

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

       
		<div id="owl-single-product">

        	@foreach($multiImag as $img)
            <div class="single-product-gallery-item" id="slide{{ $img->id }}">
  <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($img->photo_name ) }} ">
                    <img class="img-responsive" alt="" src="{{ asset($img->photo_name ) }} " data-echo="{{ asset($img->photo_name ) }} " />
                </a>
            </div><!-- /.single-product-gallery-item -->
            @endforeach
            

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">

			@foreach($multiImag as $img)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $img->id }}">
     <img class="img-responsive" width="85" alt="" src="{{ asset($img->photo_name ) }} " data-echo="{{ asset($img->photo_name ) }} " />
                    </a>
                </div>
				@endforeach
              



            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->   

@php 
	$reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();

	$avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');

@endphp


					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">


							<h1 class="name" id="pname">
@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
							 </h1>
							
			<div class="rating-reviews m-t-20">
				<div class="row"> 
					<div class="col-sm-3">
						 
						@if($avarage == 0)
						{{trans('site.no-rating-yet')}} 
						@elseif($avarage == 1 || $avarage < 2)
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						@elseif($avarage == 2 || $avarage < 3)
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>
						@elseif($avarage == 3 || $avarage < 4)
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						<span class="fa fa-star"></span>

						@elseif($avarage == 4 || $avarage < 5)
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star"></span>
						@elseif($avarage == 5 || $avarage < 5)
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						@endif


					</div>

					<div class="col-sm-8">
						<div class="reviews">
							<a href="#" class="lnk">({{ count($reviewcount) }} {{trans('site.reviews')}})</a>
						</div>
					</div>
				</div><!-- /.row -->		
			</div><!-- /.rating-reviews -->

							{{-- <div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container --> --}}

<div class="description-container m-t-20">
	@if(session()->get('lang') == 'hi') {{ $product->short_descp_hin }} @else {{ $product->short_descp_en }} @endif
</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

	<div class="col-sm-6">
		<div class="price-box">
       @if ($product->discount_price == NULL)
       <span class="price">${{ $product->selling_price }}</span>
       @else
       <span class="price">${{ $product->discount_price }}</span>
			<span class="price-strike">${{ $product->selling_price }}</span>
       @endif

			
		</div>
	</div>

		<div class="col-sm-6">
			<div class="favorite-button m-t-10">
				<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#" id="{{ $product->id }}" onclick="addToWishList(this.id)">
				    <i class="fa fa-heart"></i>
				</a>
				<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#" >
				    <i class="fa fa-envelope"></i>
				</a>
			</div>
		</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->


 <!--     /// Add Product Color And Product Size ///// -->

<div class="row">
									

	<div class="col-sm-6">

<div class="form-group">

	<label class="info-title control-label">{{trans('site.choose-color')}} <span> </span></label>
	<select class="form-control unicase-form-control selectpicker" style="display: none;" id="color">
		<option selected="" disabled="">--{{trans('site.choose-color')}}--</option>
		@if(session()->get('lang') == 'hi')
		@foreach($product_color_hin as $color)
		<option value="{{ $color }}">{{ ucwords($color) }}</option>
		 @endforeach
		 @else 
		 @foreach($product_color_en as $color)
		<option value="{{ $color }}">{{ ucwords($color) }}</option>
		 @endforeach
		 @endif
	</select> 

</div> <!-- // end form group -->
		 
	</div> <!-- // end col 6 -->

		<div class="col-sm-6">

<div class="form-group">
	@if($product->product_size_en == null)

	@else	

	<label class="info-title control-label">{{trans('site.choose-size')}}<span> </span></label>
	<select class="form-control unicase-form-control selectpicker" style="display: none;" id="size">
		<option selected="" disabled="">--{{trans('site.choose-size')}}--</option>
		@if(session()->get('lang') == 'hi')
		@foreach($product_size_hin as $size)
		<option value="{{ $size }}">{{ ucwords($size) }}</option>
		 @endforeach
		 @else
		 @foreach($product_size_en as $size)
		 <option value="{{ $size }}">{{ ucwords($size) }}</option>
		  @endforeach
		 @endif
	</select> 

	@endif
	
</div> <!-- // end form group -->

			 
		</div> <!-- // end col 6 -->

	 </div><!-- /.row -->



 <!--     /// End Add Product Color And Product Size ///// -->








	<div class="quantity-container info-container">
		<div class="row">
			
			<div class="col-sm-2">
				<span class="label">{{trans('site.qty')}} :</span>
			</div>
			
			<div class="col-sm-2">
				<div class="cart-quantity">
					<div class="quant-input">
		                <div class="arrows">
		                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
		                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
		                </div>
		                <input type="text" id="qty" value="1" min="1">
	              </div>
	            </div>
			</div>

			<input type="hidden" id="product_id" value="{{ $product->id }}" min="1">

			<div class="col-sm-7">
				<button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i>{{trans('site.add-to-cart')}}</button>
			</div>

			
		</div><!-- /.row -->
	</div><!-- /.quantity-container -->

							

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
     <div class="addthis_inline_share_toolbox_8tvu"></div>
            
							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">{{trans('site.description')}}</a></li>
								<li><a data-toggle="tab" href="#review">{{trans('site.reviews')}}</a></li>
								<li><a data-toggle="tab" href="#tags">{{trans('site.tags')}}</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
<div id="description" class="tab-pane in active">
	<div class="product-tab">
		<p class="text">@if(session()->get('lang') == 'hi') 
			{!! $product->long_descp_hin !!} @else {!! $product->long_descp_en !!} @endif</p>
	</div>	
								</div><!-- /.tab-pane -->

<div id="review" class="tab-pane">
	<div class="product-tab">
												
		<div class="product-reviews">
			<h4 class="title">{{trans('site.customer-reviews')}}</h4>

@php
$reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
@endphp			

	<div class="reviews">
		 
		@foreach($reviews as $item)
		@if($item->status == 0)

		@else

		<div class="review">

        <div class="row">
			<div class="col-md-6">
			<img style="border-radius: 50%" src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}" width="40px;" height="40px;"><b> {{ $item->user->name }}</b>


 @if($item->rating == NULL)

 @elseif($item->rating == 1)
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
 @elseif($item->rating == 2)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

 @elseif($item->rating == 3)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

 @elseif($item->rating == 4)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
 @elseif($item->rating == 5)
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>

@endif



			</div>

			<div class="col-md-6">
				
			</div>			
		</div> <!-- // end row -->



			<div class="review-title"><span class="summary">{{ $item->summary }}</span><span class="date"><i class="fa fa-calendar"></i><span> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span></span></div>
			<div class="text">"{{ $item->comment }}"</div>
		 </div>

		 @endif
	@endforeach
	</div><!-- /.reviews -->


		</div><!-- /.product-reviews -->
										

										
<div class="product-add-review">
	<h4 class="title">{{trans('site.write-your-own-review')}}</h4>
	<div class="review-table">
		 
	</div><!-- /.review-table -->
											
		<div class="review-form">
			@guest
<p> <b> {{trans('site.login-to-add-review')}} <a href="{{ route('login') }}">{{trans('site.login')}}</a> </b> </p>

			@else 

			<div class="form-container">

  <form role="form" class="cnt-form" method="post" action="{{ route('review.store') }}">
  	@csrf

  	<input type="hidden" name="product_id" value="{{ $product->id }}">


<table class="table">	
	<thead>
		<tr>
			<th class="cell-label">&nbsp;</th>
			<th>1 {{trans('site.star')}}</th>
			<th>2 {{trans('site.star')}}</th>
			<th>3 {{trans('site.star')}}</th>
			<th>4 {{trans('site.star')}}</th>
			<th>5 {{trans('site.star')}}</th>
		</tr>
	</thead>	
	<tbody>
		<tr>
			<td class="cell-label">{{trans('site.quality')}}</td>
			<td><input type="radio" name="quality" class="radio" value="1"></td>
			<td><input type="radio" name="quality" class="radio" value="2"></td>
			<td><input type="radio" name="quality" class="radio" value="3"></td>
			<td><input type="radio" name="quality" class="radio" value="4"></td>
			<td><input type="radio" name="quality" class="radio" value="5"></td>
		</tr>
		 
	</tbody>
</table>
 


	
	<div class="row">
		<div class="col-sm-6">
			 
			<div class="form-group">
				<label for="exampleInputSummary">{{trans('site.summary')}} <span class="astk">*</span></label>
	 <input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
			</div><!-- /.form-group -->
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputReview">{{trans('site.review')}} <span class="astk">*</span></label>
 <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
			</div><!-- /.form-group -->
		</div>
	</div><!-- /.row -->
	
	<div class="action text-right">
		<button type="submit" class="btn btn-primary btn-upper">{{trans('site.submit-review')}}</button>
	</div><!-- /.action -->

</form><!-- /.cnt-form -->
			</div><!-- /.form-container -->

   @endguest


		</div><!-- /.review-form -->

	</div><!-- /.product-add-review -->										
	
</div><!-- /.product-tab -->
</div><!-- /.tab-pane -->

<div id="tags" class="tab-pane">
<div class="product-tag">
	
	<h4 class="title">{{trans('site.product-tags')}}</h4>
	<form role="form" class="form-inline form-cnt">
		<div class="form-container">

			<div class="form-group">
				<label for="exampleInputTag">{{trans('site.add-your-tags')}}: </label>
				<input type="email" id="exampleInputTag" class="form-control txt">
				

			</div>

			<button class="btn btn-upper btn-primary" type="submit">{{trans('site.add-tags')}}</button>
		</div><!-- /.form-container -->
	</form><!-- /.form-cnt -->

	<form role="form" class="form-inline form-cnt">
		<div class="form-group">
			<label>&nbsp;</label>
			<span class="text col-md-offset-3">{{trans('site.add-tags-conditions')}}.</span>
		</div>
	</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ===== ======= UPSELL PRODUCTS ==== ========== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">{{trans('site.related-products')}}</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">



		@foreach($relatedProduct as $product)
	    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a>
			</div><!-- /.image -->			

			@php
			$amount = $product->selling_price - $product->discount_price;
			$discount = ($amount/$product->selling_price) * 100;
			@endphp                  
							  
			  <div>
				@if ($product->discount_price == NULL)
				<div class="tag new"><span>{{trans('site.new')}}</span></div>
				@else
				<div class="tag hot"><span>{{ round($discount) }}%</span></div>
				@endif
			  </div>         		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
				@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
				@php 
				$reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
			
				$avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
			
			@endphp
						<div class="rating-reviews">
							   
					 @if($avarage == 0)
					 
					 @elseif($avarage == 1 || $avarage < 2)
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star"></span>
				  <span class="fa fa-star"></span>
				  <span class="fa fa-star"></span>
				  <span class="fa fa-star"></span>
					 @elseif($avarage == 2 || $avarage < 3)
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star"></span>
				  <span class="fa fa-star"></span>
				  <span class="fa fa-star"></span>
					@elseif($avarage == 3 || $avarage < 4)
					<span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star"></span>
				  <span class="fa fa-star"></span>
				  
					@elseif($avarage == 4 || $avarage < 5)
					<span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star"></span>
					@elseif($avarage == 5 || $avarage < 5)
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
				  <span class="fa fa-star checked"></span>
					 @endif
				  
				  
				  
				  
				  
							  <div class="reviews">
								<a href="#" class="lnk">({{ count($reviewcount) }} {{trans('site.reviews')}})</a>
							  </div>
						</div><!-- /.rating-reviews -->
			<div class="description"></div>


 @if ($product->discount_price == NULL)
<div class="product-price">	
				<span class="price">
					${{ $product->selling_price }}	 </span> 
			</div><!-- /.product-price -->
 @else

<div class="product-price">	
				<span class="price">
					${{ $product->discount_price }}	 </span>
			  <span class="price-before-discount">$ {{ $product->selling_price }}</span>								
			</div><!-- /.product-price -->
 @endif


			
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
                
							<button class="btn btn-primary icon" type="button" title="{{trans('site.add-to-cart')}}" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
					 
					 <button class="btn btn-primary cart-btn" type="button">{{trans('site.add-to-cart')}}</button>
				   </li>
			 
				   
			 
					 <button class="btn btn-primary icon" type="button" title="{{trans('site.whishlist')}}" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
			 
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
	
	 	@endforeach





			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->

</div>






<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>



@endsection
