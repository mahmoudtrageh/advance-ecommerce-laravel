<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">{{trans('site.contact-us')}}</h4>
          </div>
          <!-- /.module-heading -->
          
          @php
         $setting = App\Models\SiteSetting::find(1);
          @endphp

          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>{{ (!empty($setting->company_name)) ? $setting->company_name: Null }}, {{ (!empty($setting->company_address)) ? $setting->company_address: Null }}</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>{{ (!empty($setting->phone_one)) ? $setting->phone_one: Null }}<br>
                   {{ (!empty($setting->phone_two)) ? $setting->phone_two: Null }}</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href="#">{{ (!empty($setting->email)) ? $setting->email: Null }}</a></span> </div>
              </li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">{{trans('site.links')}}</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="#" title="Contact us">{{trans('site.about-us')}}</a></li>
              <li><a href="#" title="About us">{{trans('site.contact-us')}}</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">{{trans('site.follow-us')}}</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Facebook" href="#">{{trans('site.facebook')}}</a></li>
              <li><a title="Instagram" href="#">{{trans('site.instagram')}}</a></li>
              <li><a title="Email" href="#">{{trans('site.email')}}</a></li>
              <li><a title="Whatsapp" href="#">{{trans('site.whatsapp')}}</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
           <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">{{trans('site.newsletters')}}</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>{{trans('site.signup-for-our-newsletter')}}!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">{{trans('site.email')}}</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{trans('site.subscribe-to-our-newsletter')}}">
              </div>
              <button class="btn btn-primary">{{trans('site.subscribe')}}</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding ">
        <div class="clearfix social">
          <ul class="link">
            <li class="fb pull-left"><a target="_blank" rel="nofollow" href="{{ (!empty($setting->facebook)) ? $setting->facebook: Null }}" title="Facebook"></a></li>

            <li class="insta pull-left"><a target="_blank" rel="nofollow" href="{{ (!empty($setting->instagram)) ? $setting->instagram: Null }}" title="instagram"></a></li>

            {{-- <li class="tw pull-left"><a target="_blank" rel="nofollow" href="{{ (!empty($setting->twitter)) ? $setting->twitter: Null }}" title="Twitter"></a></li>

            <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="{{ (!empty($setting->linkedin)) ? $setting->linkedin: Null }}" title="Linkedin"></a></li>

            <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="{{ (!empty($setting->youtube)) ? $setting->youtube: Null }}" title="Youtube"></a></li> --}}
          </ul>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt=""></li>
            <li><img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt=""></li>
          </ul>
        </div>
        <!-- /.payment-methods --> 
      </div>
    </div>
  </div>
</footer>