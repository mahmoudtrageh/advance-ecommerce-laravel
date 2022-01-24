<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand; 
use App\Models\Product;

class ShopController extends Controller
{
    public function ShopPage(){

        $products = Product::query();

        if (!empty($_GET['category']) && empty($_GET['brand'] )) {
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$catIds)->paginate(3);
            
        }
        else if (!empty($_GET['brand']) && empty($_GET['category'] )) {
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brandIds)->paginate(3);
        }
        else if(!empty($_GET['category']) && !empty($_GET['brand'] )) {
         $slugscat = explode(',',$_GET['category']);
         $catIds = Category::select('id')->whereIn('category_slug_en',$slugscat)->pluck('id')->toArray();
         $slugsbrand = explode(',',$_GET['brand']);
         $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugsbrand)->pluck('id')->toArray();
         $products = $products->whereIn('brand_id',$brandIds)->whereIn('category_id',$catIds)->paginate(3);
            
        } 
        else{
             $products = Product::where('status',1)->orderBy('id','DESC')->paginate(3);
        }

 
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.shop.shop_page',compact('products','categories','brands'));

    } // end Method 



    public function ShopFilter(Request $request){
        // dd($request->all());
        $data = $request->all(); 
       

      if($request->price != null) {
        if($request->price != null && $request->category == null && $request->brand == null ) {

          

         $minPrice = (int) explode(",",$request->price)[0];
         $maxPrice = (int) explode(",",$request->price)[1];
        
         $products = Product::select("*")->whereBetween('discount_price', [$minPrice, $maxPrice])->paginate();
      
      } else if($request->price != null && $request->category != null && $request->brand != null) {
         $slugscat = explode(',',$request->category);
         $catIds = Category::select('id')->whereIn('category_slug_en',$slugscat)->pluck('id')->toArray();
          
          $slugsbrand = explode(',',$request->brand);
         $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugsbrand)->pluck('id')->toArray();
 
          $minPrice = (int) explode(",",$request->price)[0];
          $maxPrice = (int) explode(",",$request->price)[1];
         
          $products = Product::select("*")->whereBetween('discount_price', [$minPrice, $maxPrice])->
          whereIn('brand_id',$brandIds)->whereIn('category_id',$catIds)->paginate();
          
        } else if($request->price != null && $request->category != null) {
         
         $slugscat = explode(',',$request->category);
        $catIds = Category::select('id')->whereIn('category_slug_en',$slugscat)->pluck('id')->toArray();

         $minPrice = (int) explode(",",$request->price)[0];
         $maxPrice = (int) explode(",",$request->price)[1];
        
         $products = Product::select("*")->whereBetween('discount_price', [$minPrice, $maxPrice])->whereIn('category_id',$catIds)->paginate();

        } else if ($request->price != null && $request->brand != null) {

         $slugsbrand = explode(',',$request->brand);
         $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugsbrand)->pluck('id')->toArray();
        
         $minPrice = (int) explode(",",$request->price)[0];
         $maxPrice = (int) explode(",",$request->price)[1];
        
         $products = Product::select("*")->whereBetween('discount_price', [$minPrice, $maxPrice])->whereIn('brand_id',$brandIds)->paginate();
        
        }

        $brands = Brand::orderBy('brand_name_en','ASC')->get();
         $categories = Category::orderBy('category_name_en','ASC')->get();

        return view('frontend.shop.shop_page',compact('products','categories','brands'));

      }

      
         



        // Filter Category

        $catUrl = "";
            if (!empty($data['category'])) {
               foreach ($data['category'] as $category) {
                  if (empty($catUrl)) {
                     $catUrl .= '&category='.$category;
                  }else{
                    $catUrl .= ','.$category;
                  }
               } // end foreach condition
            } // end if condition 


 // Filter Brand 

        $brandUrl = "";
            if (!empty($data['brand'])) {
               foreach ($data['brand'] as $brand) {
                  if (empty($brandUrl)) {
                     $brandUrl .= '&brand='.$brand;
                  }else{
                    $brandUrl .= ','.$brand;
                  }
               } // end foreach condition
            } // end if condition 



            return redirect()->route('shop.page',$catUrl.$brandUrl);


            


    } // end Method 


    public function SearchShopFilter (Request $request,$category,$item){
      $minPrice = (int) explode(",",$request->price)[0];
      $maxPrice = (int) explode(",",$request->price)[1];
      $category_id = $category;
      $categories = Category::orderBy('category_name_en','ASC')->get();

      if(session()->get('lang') == 'hi') {
      $products = Product::select("*")->whereBetween('discount_price', [$minPrice, $maxPrice])
      ->where('category_id',$category)->where('product_name_hin','LIKE',"%$item%")->get();
      } else {
         $products = Product::select("*")->whereBetween('discount_price', [$minPrice, $maxPrice])
      ->where('category_id',$category)->where('product_name_en','LIKE',"%$item%")->get();
      }

      return view('frontend.product.search',compact('products','categories', 'category_id', 'item'));
   }


}
 