<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>	
			
			 <!-- User Account-->
			 <li class="dropdown user user-menu" style="margin-right: 10px;">	
				<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
					<i class="fa fa-flag" style="font-size: 15px;margin-top: 15px"></i>
				</a>
				<ul class="dropdown-menu animated flipInX" style="padding:10px;">
					@if(session()->get('lang') == 'hi')       
					<li><a href="{{route('site.change.lang',['lang'=>'en'])}}">الإنجليزية</a></li>
					@else
					<li><a href="{{route('site.change.lang',['lang'=>'hi'])}}">Arabic</a></li>
					 @endif      
				</ul>
			  </li>	
		  </ul>
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		
			
		  @php
		  
			$id=Auth::guard('admin')->user()->id;
			$adminData = DB::table('admins')->find($id);
		  
		  @endphp

	      <!-- User Account-->
          <li class="dropdown user user-menu">
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
				<img src="{{ (!empty($adminData->profile_photo_path))? url($adminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="">
			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">
 <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ti-user text-muted mr-2"></i> {{trans('admin.profile')}}</a>

  <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="ti-wallet text-muted mr-2"></i>{{trans('admin.change-password')}}</a>
  
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i>{{trans('admin.settings')}}</a>
				 <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-lock text-muted mr-2"></i>{{trans('admin.logout')}}</a>
			  </li>
			</ul>
          </li>	
			
        </ul>
      </div>
    </nav>
  </header>