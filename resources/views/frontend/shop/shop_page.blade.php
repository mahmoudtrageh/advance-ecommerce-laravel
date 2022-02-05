@extends('frontend.main_master')
@section('content')
@section('title')
{{trans('site.shop')}}
@endsection





<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">{{trans('site.shop')}}</a></li>
         
      </ul>
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>

    <form action="{{ route('shop.filter') }}" method="post">
      @csrf
   


    <div class='row'>
      <div class='col-md-3 sidebar'> 

        <!-- ===== == TOP NAVIGATION ======= ==== -->
        @include('frontend.common.vertical_menu')
        <!-- = ==== TOP NAVIGATION : END === ===== -->




        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">{{trans('site.shop-by')}}</h3>




              <div class="widget-header">
                <h4 class="widget-title">{{trans('site.category')}}</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">

                  @if(!empty($_GET['category']))
                  @php
                  $filterCat = explode(',',$_GET['category']);
                  @endphp
                  @endif



 @foreach($categories as $category)
	<div class="accordion-group">
	<div class="accordion-heading">   

 <label class="form-check-label">
  <input type="checkbox" class="form-check-input" name="category[]" value="{{ $category->category_slug_en }}" @if(!empty($filterCat) && in_array($category->category_slug_en,$filterCat)) checked @endif  onchange="this.form.submit()">

  @if(session()->get('lang') == 'hi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif 
   
 </label>


  </div>
	<!-- /.accordion-heading -->
 
	 
	</div>
	<!-- /.accordion-group -->
    @endforeach              
                









                  
                </div>
                <!-- /.accordion --> 
              </div>
              <!-- /.sidebar-widget-body --> 
           
            <!-- /.sidebar-widget --> 




<!--  /////////// This is for Brand Filder /////////////// -->



 <div class="widget-header">
                <h4 class="widget-title">{{trans('site.brand-filter')}}</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">

                  @if(!empty($_GET['brand']))
                  @php
                  $filterBrand = explode(',',$_GET['brand']);
                  @endphp
                  @endif



 @foreach($brands as $brand)
  <div class="accordion-group">
  <div class="accordion-heading">   

 <label class="form-check-label">
  <input type="checkbox" class="form-check-input" name="brand[]" value="{{ $brand->brand_slug_en }}" @if(!empty($filterBrand) && in_array($brand->brand_slug_en,$filterBrand)) checked @endif onchange="this.form.submit()">

  @if(session()->get('lang') == 'hi') {{ $brand->brand_name_hin }} @else {{ $brand->brand_name_en }} @endif 
   
 </label>


  </div>
  <!-- /.accordion-heading -->
 
   
  </div>
  <!-- /.accordion-group -->
    @endforeach              
                
 


                  
                </div>
                <!-- /.accordion --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 



          </form>


 




            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
            
            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">{{trans('site.price-filter')}}</h4>
              </div>
              
          
              
    <form action="{{ route('shop.filter') }}" method="post">
      @if(!empty($_GET['brand']))
      <input type="hidden" name="brand" value="{{$_GET['brand']}}">
      @endif
      @if(!empty($_GET['category']))
       <input type="hidden" name="category" value="{{$_GET['category']}}">
       @endif

      @csrf

      @php
      $prices = DB::table('products')->select('discount_price')->pluck('discount_price')->toArray();

      foreach ($prices as $g => $f)
      {
        // use the key $g in the $priceprod array
        $prices[$g];
      }

      // get the highest price
      $maxprice = max($prices);
      $minprice = min($prices);


      @endphp
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">${{$minprice}}</span> <span class="pull-right">${{$maxprice}}</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input name="price" type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder --> 
                <input type="submit" class="lnk btn btn-primary" value="{{trans('site.shop-now')}}"> </div>
              <!-- /.sidebar-widget-body --> 
            </div>
          </form>
            {{-- <!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            <!-- ============================================== MANUFACTURES============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Manufactures</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#">Forever 18</a></li>
                  <li><a href="#">Nike</a></li>
                  <li><a href="#">Dolce & Gabbana</a></li>
                  <li><a href="#">Alluare</a></li>
                  <li><a href="#">Chanel</a></li>
                  <li><a href="#">Other Brand</a></li>
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== MANUFACTURES: END ============================================== --> 
            <!-- ============================================== COLOR============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">Colors</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#">Red</a></li>
                  <li><a href="#">Blue</a></li>
                  <li><a href="#">Yellow</a></li>
                  <li><a href="#">Pink</a></li>
                  <li><a href="#">Brown</a></li>
                  <li><a href="#">Teal</a></li>
                </ul>
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COLOR: END ============================================== --> 
            <!-- == ======= COMPARE==== ==== -->
            <div class="sidebar-widget wow fadeInUp outer-top-vs">
              <h3 class="section-title">Compare products</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
                <!-- /.compare-report --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COMPARE: END ============================================== -->  --}}


            <!-- == ====== PRODUCT TAGS ==== ======= -->
              @include('frontend.common.product_tags')
            <!-- /.sidebar-widget -->
             <!-- == ====== END PRODUCT TAGS ==== ======= -->






            
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'> 



        <!-- == ==== SECTION – HERO === ====== -->
        
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt="" class="img-responsive"> </div>
            
            <!-- /.container-fluid --> 
          </div>
        </div>
   
 


     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>{{trans('site.grid')}}</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>{{trans('site.list')}}</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
              {{-- <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Show</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->  --}}
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
              
              <!-- /.pagination-container --> </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>


<!--    //////////////////// START Product Grid View  ////////////// -->

        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">



@foreach($products as $product)
  <div class="col-sm-6 col-md-4 wow fadeInUp">
    <div class="products">
      <div class="product">
        <div class="product-image">
          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
          <!-- /.image -->

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


        </div>
        <!-- /.product-image -->
        
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
<div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>   </div>

@else

<div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
@endif



          
          <!-- /.product-price --> 
          
        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
                <button class="btn btn-primary icon" type="button" title="{{trans('site.add-to-cart')}}" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
        
        <button class="btn btn-primary cart-btn" type="button">{{trans('site.add-to-cart')}}</button>
              </li>
              <button class="btn btn-primary icon" type="button" title="{{trans('site.whishlist')}}" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
      </div>
      <!-- /.product --> 
      
    </div>
    <!-- /.products --> 
  </div>
  <!-- /.item -->
  @endforeach
                  
                









                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->

 <!--            //////////////////// END Product Grid View  ////////////// -->




 <!--            //////////////////// Product List View Start ////////////// -->
            


            <div class="tab-pane "  id="list-container">
              <div class="category-product">



 @foreach($products as $product)
<div class="category-product-inner wow fadeInUp">
  <div class="products">
    <div class="product-list product">
      <div class="row product-list-row">
        <div class="col col-sm-4 col-lg-4">
          <div class="product-image">
            <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>
          </div>
          <!-- /.product-image --> 
        </div>
        <!-- /.col -->
        <div class="col col-sm-8 col-lg-8">
          <div class="product-info">
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


            @if ($product->discount_price == NULL)
            <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
            @else
<div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
            @endif
            
            <!-- /.product-price -->
            <div class="description m-t-10">
            	@if(session()->get('lang') == 'hi') {{ $product->short_descp_hin }} @else {{ $product->short_descp_en }} @endif</div>
            <div class="cart clearfix animate-effect">
              <div class="action">
                <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">
                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                    <button class="btn btn-primary cart-btn" type="button">{{trans('site.add-to-cart')}}</button>
                  </li>
                  <li class="lnk wishlist"> <a class="add-to-cart" id="{{ $product->id }}" onclick="addToWishList(this.id)" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                </ul>
              </div>
              <!-- /.action --> 
            </div>
            <!-- /.cart --> 
            
          </div>
          <!-- /.product-info --> 
        </div>
        <!-- /.col --> 
      </div>



         @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp    

                      <!-- /.product-list-row -->
                      <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>{{trans('site.new')}}</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>



                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.category-product-inner -->
    @endforeach

                

 <!--            //////////////////// Product List View END ////////////// -->







                
              </div>
              <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content -->
          


            {{ $products->appends($_GET)->links('vendor.pagination.custom')  }}



          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 



 </form>

  </div>
  <!-- /.container --> 
  
</div>
<!-- /.body-content --> 



 



@endsection

<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 


<script>


jQuery(document).ready(function() {
    "use strict";

jQuery(function () {

// Price Slider
if (jQuery('.price-slider').length > 0) {
    jQuery('.price-slider').slider({
        min: {{$minprice}},
        max: {{$maxprice}},
        step: 10,
        value: [200, 500],
        handle: "square"

    });

}

});
});
</script>