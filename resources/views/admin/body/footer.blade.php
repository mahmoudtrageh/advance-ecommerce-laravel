@if(session()->get('lang') == 'hi') 
 
<footer class="main-footer text-left">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">محمود طه</a>
		  </li>
		</ul>
    </div>
	  &copy; 2021 . جميع الحقوق محفوظة.
</footer>

@else

 <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">www.easylearningbd.com</a>
		  </li>
		</ul>
    </div>
	  &copy; 2020 <a href="#">Easy Shop</a>. All Rights Reserved.
  </footer>

@endif