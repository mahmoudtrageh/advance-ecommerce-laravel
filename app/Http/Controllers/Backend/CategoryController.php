<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
 
class CategoryController extends Controller
{
    public function CategoryView(){

    	$category = Category::latest()->get();
    	return view('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){

       $request->validate([
    		'category_name_en' => 'required',
    		'category_name_hin' => 'required',
    		'category_icon' => 'required',
    	],[
    		'category_name_en.required' => trans('admin.add-category-en-name'),
    		'category_name_hin.required' => trans('admin.add-category-ar-name'),
    	]);

    	 

	Category::insert([
		'category_name_en' => $request->category_name_en,
		'category_name_hin' => $request->category_name_hin,
		'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
		'category_slug_hin' => str_replace(' ', '-',$request->category_name_hin),
		'category_icon' => $request->category_icon,

    	]);

	    $notification = array(
			'message' => trans('admin.category-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 


    public function CategoryEdit($id){
    	$category = Category::findOrFail($id);
    	return view('backend.category.category_edit',compact('category'));

    }


    public function CategoryUpdate(Request $request ,$id){

    	 

      Category::findOrFail($id)->update([
		'category_name_en' => $request->category_name_en,
		'category_name_hin' => $request->category_name_hin,
		'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
		'category_slug_hin' => str_replace(' ', '-',$request->category_name_hin),
		'category_icon' => $request->category_icon,

    	]);

	    $notification = array(
			'message' => trans('admin.category-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all.category')->with($notification);


    } // end method


    public function CategoryDelete($id){

    	Category::findOrFail($id)->delete();

    	$notification = array(
			'message' => trans('admin.category-deleted-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 


}
 