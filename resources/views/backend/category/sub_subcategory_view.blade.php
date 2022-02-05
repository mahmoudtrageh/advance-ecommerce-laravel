@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{trans('admin.subsubcategory-list')}} <span class="badge badge-pill badge-danger"> {{ count($subsubcategory) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>{{trans('admin.category')}} </th>
								<th>{{trans('admin.subcategory')}}</th>
								<th>{{trans('admin.subsubcategory')}} </th>
								<th>{{trans('admin.process')}}</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($subsubcategory as $item)
	 <tr>
		<td> @if(session()->get('lang') == 'hi') {{ $item['category']['category_name_hin'] }} @else {{ $item['category']['category_name_en'] }} @endif  </td>
		<td>@if(session()->get('lang') == 'hi') {{ $item['subcategory']['subcategory_name_hin'] }} @else  {{ $item['subcategory']['subcategory_name_en'] }} @endif</td>
		 <td> @if(session()->get('lang') == 'hi') {{ $item->subsubcategory_name_hin }} @else {{ $item->subsubcategory_name_en }} @endif</td>
		<td width="30%">
 <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info" title="{{trans('admin.edit')}}"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('subsubcategory.delete',$item->id) }}" class="btn btn-danger" title="{{trans('admin.delete')}}" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


<div class="col-lg-6 col-md-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{trans('admin.add-subsubcategory')}} </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('subsubcategory.store') }}" >
	 	@csrf
					   

	 <div class="form-group">
	<h5>{{trans('admin.category-select')}}  <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control"  >
			<option value="" selected="" disabled="">{{trans('admin.select-category')}} </option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}">@if(session()->get('lang') == 'hi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif</option>	
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>


		  <div class="form-group">
	<h5>{{trans('admin.subcategory-select')}} <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control"  >
			<option value="" selected="" disabled="">{{trans('admin.select-subcategory')}}</option>
			 
		</select>
		@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>


	<div class="form-group">
		<h5>{{trans('admin.subsubcategory-en')}} <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_en" class="form-control" >
     @error('subsubcategory_name_en') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>{{trans('admin.subsubcategory-ar')}}  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subsubcategory_name_hin" class="form-control" >
     @error('subsubcategory_name_hin') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div> 
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{trans('admin.add')}}">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  

 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
							$('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>


@endsection