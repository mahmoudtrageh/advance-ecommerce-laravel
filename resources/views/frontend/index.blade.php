@extends('frontend.main_master')
@section('content')
@section('title')
{{trans('site.home')}}
@endsection



<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        




        <!-- === == TOP NAVIGATION == ==== -->
       @include('frontend.common.vertical_menu')
        <!-- ===== ==== TOP NAVIGATION : END ==== ===== --> 
        
        
        <!-- === ===== HOT DEALS ======= ===== -->
        @include('frontend.common.hot_deals')
        <!-- === === HOT DEALS: END ====== ===== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">{{trans('site.special-offer')}}</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">



              <div class="item">
                <div class="products special-product">

              @foreach($special_offer as $product)
  <div class="product">
    <div class="product-micro">
      <div class="row product-micro-row">
        <div class="col col-xs-5">
          <div class="product-image">
            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </a> </div>
            <!-- /.image --> 
            
          </div>
          <!-- /.product-image --> 
        </div>
        <!-- /.col -->
        <div class="col col-xs-7">
          <div class="product-info">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
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
 <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
            <!-- /.product-price --> 
            
          </div>
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.product-micro-row --> 
    </div>
    <!-- /.product-micro --> 
    
  </div>
                  @endforeach <!-- // end special offer foreach -->




                  
                </div>
              </div>










            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 



        <!-- ===== ===== PRODUCT TAGS ==== ====== -->
   @include('frontend.common.product_tags')
        <!-- ==== ===== PRODUCT TAGS : END ======= ==== --> 




        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">{{trans('site.special-deals')}}</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


              <div class="item">
                <div class="products special-product">

   @foreach($special_deals as $product)
      <div class="product">
        <div class="product-micro">
          <div class="row product-micro-row">
            <div class="col col-xs-5">
              <div class="product-image">
                <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}"  alt=""> </a> </div>
                <!-- /.image --> 
                
              </div>
              <!-- /.product-image --> 
            </div>
            <!-- /.col -->
            <div class="col col-xs-7">
              <div class="product-info">
                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>
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
                <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
                <!-- /.product-price --> 
                
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.product-micro-row --> 
        </div>
        <!-- /.product-micro --> 
        
      </div>
      @endforeach <!-- // end special deals foreach -->



              
                </div>
              </div>



            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
      
        
       
        
      
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 




        <!-- === ========= SECTION – HERO ==== ======= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            
    @foreach($sliders as $slider)
    <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
      <div class="container-fluid">
        <div class="caption bg-color vertical-center text-left">
          
          <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
          <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
          {{-- <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div> --}}
        </div>
        <!-- /.caption --> 
      </div>
      <!-- /.container-fluid --> 
    </div>
    <!-- /.item -->
    @endforeach
           
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ==== ===== SECTION – HERO : END === ============== --> 

        
        {{-- <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 

 --}}






        <!-- = ===== SCROLL TABS =============== ========== -->

        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">{{trans('site.new-products')}}</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">{{trans('site.all')}}</a></li>

              @foreach($categories as $category)
  <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">@if(session()->get('lang') == 'hi'){{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif</a></li>
              @endforeach
              <!-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>

              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">



            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @foreach($products as $product)
                  <div class="item item-carousel">
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
@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
            </a></h3>
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
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
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
                  @endforeach<!--  // end all optionproduct foreach  -->


                  
                  
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->




            @foreach($categories as $category)
            <div class="tab-pane" id="category{{ $category->id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

@php
  $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get(); 
@endphp
                  

                  @forelse($catwiseProduct as $product)
                  <div class="item item-carousel">
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
@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
            </a></h3>
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
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
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

      

        <button class="btn btn-primary icon" type="button" title="{{trans('site.add-to-cart')}}" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


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

                  @empty
                 

                  @endforelse<!--  // end all optionproduct foreach  -->


                  
                  
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            @endforeach <!-- end categor foreach -->


 
            
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        {{-- <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners -->  --}}
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        



        <!-- == === FEATURED PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">{{trans('site.featured-products')}}</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($featured as $product)
            <div class="item item-carousel">
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
@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
            </a></h3>
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
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
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
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- == ==== FEATURED PRODUCTS : END ==== === --> 





        <!-- == === skip_product_0 PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('lang') == 'hi') {{ $skip_category_0->category_name_hin }} @else {{ $skip_category_0->category_name_en }} @endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($skip_product_0 as $product)
            <div class="item item-carousel">
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
@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
            </a></h3>
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
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
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
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- == ==== skip_product_0 PRODUCTS : END ==== === --> 








<!-- == === skip_product_1 PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('lang') == 'hi') {{ $skip_category_1->category_name_hin }} @else {{ $skip_category_1->category_name_en }} @endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($skip_product_1 as $product)
            <div class="item item-carousel">
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
@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
            </a></h3>
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
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
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
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- == ==== skip_product_1 PRODUCTS : END ==== === -->















        {{-- <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- == ===== WIDE PRODUCTS : END ====== ====== -->  --}}






<!-- == === skip_brand_product_1 PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('lang') == 'hi') {{ $skip_brand_1->brand_name_hin }} @else {{ $skip_brand_1->brand_name_en }} @endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($skip_brand_product_1 as $product)
            <div class="item item-carousel">
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
@if(session()->get('lang') == 'hi') {{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif
            </a></h3>
            

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
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
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
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- == ==== skip_brand_product_1 PRODUCTS : END ==== === -->










        
        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">{{trans('site.latest-from-blog')}}</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              

  @foreach($blogpost as $blog)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="{{ route('post.details',$blog->id) }}"><img src="{{ asset($blog->post_image) }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="{{ route('post.details',$blog->id) }}">@if(session()->get('lang') == 'hi') {{ $blog->post_title_hin }} @else {{ $blog->post_title_en }} @endif</a></h3>


                    <span class="info">

                      @if(session()->get('lang') == 'hi')
			{{Carbon\Carbon::setLocale('ar')}}
                      
                      {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}
                      @else 
                      {{Carbon\Carbon::setLocale('en')}}
                      
                      {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}
                      @endif
                    
                    </span>

                    <p class="text">@if(session()->get('lang') == 'hi') {!! Str::limit($blog->post_details_hin, 100 )  !!} @else {!! Str::limit($blog->post_details_en, 100 )  !!} @endif</p>


                    <a href="{{ route('post.details',$blog->id) }}" class="lnk btn btn-primary">{{trans('site.read-more')}}</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
          @endforeach 
             
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
  @include('frontend.body.brands')
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 


@endsection