@extends('frontend.main_master')
@section('content')
@section('title')
{{trans('site.my-orders')}}
@endsection
<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

       <div class="col-md-2">
       </div>

       <div class="col-md-8">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> {{trans('site.date')}}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{trans('site.total')}}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{trans('site.payment-method')}}</label>
                </td>


                <td class="col-md-2">
                  <label for=""> {{trans('site.invoice-number')}}</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> {{trans('site.order')}}</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> {{trans('site.action')}} </label>
                </td>
                
              </tr>


              @foreach($orders as $order)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $order->order_date }}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> ${{ $order->amount }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $order->payment_method }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

         <td class="col-md-2">
          <label for=""> 

    @if($order->status == 'pending')        
        <span class="badge badge-pill badge-warning" style="background: #800080;"> {{trans('site.pending')}} </span>
        @elseif($order->status == 'confirm')
         <span class="badge badge-pill badge-warning" style="background: #0000FF;"> {{trans('site.confirm')}} </span>

          @elseif($order->status == 'processing')
         <span class="badge badge-pill badge-warning" style="background: #FFA500;"> {{trans('site.processing')}} </span>

          @elseif($order->status == 'picked')
         <span class="badge badge-pill badge-warning" style="background: #808000;"> {{trans('site.picked')}} </span>

          @elseif($order->status == 'shipped')
         <span class="badge badge-pill badge-warning" style="background: #808080;"> {{trans('site.shipped')}} </span>

          @elseif($order->status == 'delivered')
         <span class="badge badge-pill badge-warning" style="background: #008000;"> {{trans('site.delivered')}} </span>

          @if($order->return_order == 1) 
           <span class="badge badge-pill badge-warning" style="background:red;"> {{trans('site.return-requested')}} </span>

          @endif

         @else
  <span class="badge badge-pill badge-warning" style="background: #FF0000;"> {{trans('site.cancel')}} </span>

      @endif
            </label>
        </td>

         <td class="col-md-1">
          <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> {{trans('site.view')}}</a>

           <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> {{trans('site.invoice')}} </a>
          
        </td>
                
              </tr>
              @endforeach





            </tbody>
            
          </table>
          
        </div>




         
       </div> <!-- / end col md 8 -->

		 

		 
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection