@extends('frontend.main_master')
@section('content')

@section('title')
{{trans('site.order-details')}}
@endsection

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user_sidebar')

      <div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>{{trans('site.shipping-details')}}</h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th> {{trans('site.shipping-name')}} : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> {{trans('site.shipping-phone')}} : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> {{trans('site.shipping-email')}} : </th>
               <th> {{ $order->email }} </th>
            </tr>

             <tr>
              <th> {{trans('site.division')}} : </th>
               <th> {{ $order->division->division_name }} </th>
            </tr>

             <tr>
              <th> {{trans('site.district')}} : </th>
               <th> {{ $order->district->district_name }} </th>
            </tr>

             <tr>
              <th> {{trans('site.state')}} : </th>
               <th>{{ $order->state->state_name }} </th>
            </tr>

            <tr>
              <th>{{trans('site.post-code')}} : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> {{trans('site.order-date')}} : </th>
               <th> {{ $order->order_date }} </th>
            </tr>
             
           </table>


         </div> 
          
        </div>
        
      </div> <!-- // end col md -5 -->



<div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>{{trans('site.order-details')}}
<span class="text-danger"> {{trans('site.invoice')}} : {{ $order->invoice_no }}</span></h4>
          </div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>  {{trans('site.name')}} : </th>
               <th> {{ $order->user->name }} </th>
            </tr>

             <tr>
              <th>  {{trans('site.phone')}} : </th>
               <th> {{ $order->user->phone }} </th>
            </tr>

             <tr>
              <th> {{trans('site.payment-method')}} : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> Tranx ID : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> {{trans('site.invoice-number')}}  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> {{trans('site.total')}} : </th>
               <th>{{ $order->amount }} </th>
            </tr>

            <tr>
              <th> {{trans('site.order')}} : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
            </tr>

           
             
           </table>


         </div> 
          
        </div>
        
      </div> <!-- // 2ND end col md -5 -->


      <div class="row">



<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> {{trans('site.image')}}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{trans('site.product-name')}} </label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{trans('site.product-code')}}</label>
                </td>


                <td class="col-md-2">
                  <label for=""> {{trans('site.color')}} </label>
                </td>

                 <td class="col-md-2">
                  <label for=""> {{trans('site.size')}} </label>
                </td>

                 <td class="col-md-1">
                  <label for=""> {{trans('site.quantity')}} </label>
                </td>

                <td class="col-md-1">
                  <label for=""> {{trans('site.price')}} </label>
                </td>

                 <td class="col-md-1">
                  <label for=""> {{trans('site.download')}} </label>
                </td>
                
              </tr>


              @foreach($orderItem as $item)
       <tr>
                <td class="col-md-1">
                  <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ $item->product->product_name_en }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $item->product->product_code }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $item->color }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $item->size }}</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> {{ $item->qty }}</label>
                </td>

          <td class="col-md-2">
                  <label for=""> ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
                </td>


@php 

$file = App\Models\Product::where('id',$item->product_id)->first();
@endphp

             <td class="col-md-1">
              @if($order->status == 'pending')  
              <strong>
 <span class="badge badge-pill badge-success" style="background: #418DB9;"> {{trans('site.no-file')}}</span>  </strong> 
                
              @elseif($order->status == 'confirm')  

<a target="_blank" href="{{ asset('upload/pdf/'.$file->digital_file) }}">  
  <strong>
 <span class="badge badge-pill badge-success" style="background: #FF0000;"> {{trans('site.download-ready')}}</span>  </strong> </a> 
              @endif


                </td>




                
              </tr>
              @endforeach





            </tbody>
            
          </table>
          
        </div>
 
         
       </div> <!-- / end col md 8 --> 
        
      </div> <!-- // END ORDER ITEM ROW -->

      @if($order->status !== "delivered")
      
      @else

      @php 
      $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
      @endphp


      @if($order)
      <form action="{{ route('return.order',$order->id) }}" method="post">
        @csrf

  <div class="form-group">
    <label for="label"> {{trans('site.order-return-reason')}}:</label>
    <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">{{trans('site.return-reason')}}</textarea>    
  </div>

  <button type="submit" class="btn btn-danger">{{trans('site.order-return')}}</button>

</form>
   @else

   <span class="badge badge-pill badge-warning" style="background: red">{{trans('site.sent-return-for-this-product')}}</span>
   
   @endif 



  @endif
<br><br>


		 
			
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection