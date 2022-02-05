@extends('frontend.main_master')
@section('content')
@section('title')
{{trans('site.login')}}
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">{{trans('site.home')}}</a></li>
                <li class='active'>{{trans('site.login')}}</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="">{{trans('site.login')}}</h4>
    
    {{-- <div class="social-sign-in outer-top-xs">
        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
        <a href="#" class="google-sign-in"><i class="fa fa-google"></i> Sign In with google</a>
    </div> --}}

    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf 

 
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">{{trans('site.email')}} <span>*</span></label>
            <input type="text" id="email" name="email" class="form-control unicase-form-control text-input">
             @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">{{trans('site.password')}} <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
             @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="radio outer-xs">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">{{trans('site.remember-me')}}!
            </label>
            <a href="{{ route('password.request') }}" class="forgot-password pull-right">{{trans('site.forget-password')}}{{trans('site.q-mark')}}</a>
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{trans('site.login')}}</button>
        <a type="button" href="{{route('register')}}" class="btn-upper btn btn-primary checkout-page-button">{{trans('site.register')}}</a>

    </form>   


</div>
<!-- Sign-in -->

       </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->





<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->






@endsection





