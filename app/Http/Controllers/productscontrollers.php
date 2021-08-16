<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\products;

class productscontrollers extends Controller
{
  public function index()
    {
      $all=products::all();
      $mobile=products::where('category','mobile')->get();
      $television=products::where('category','television')->get();
      $oiran=products::where('category','oiran')->get();
      $kitchen=products::where('category','kitchen')->get();
      $laptop=products::where('category','laptop')->get();
      $bulb=products::where('category','bulb')->get();
      $refrigerator=products::where('category','refrigerator')->get();
      $speaker=products::where('category','speaker')->get();
     	return view('home',['all'=>$all,'mobile'=>$mobile,'television'=>$television
        ,'oiran'=>$oiran,'laptop'=>$laptop,'refrigerator'=>$refrigerator,
        'kitchen'=>$kitchen,'speaker'=>$speaker,'bulb'=>$bulb]);
    }
    
    public function loadtopnav()
    {
    	$navpro=products::where('category','category')->get();
      $output='';
      $output.='<ul>';
      if($navpro)
      {
        foreach ($navpro as $key => $value) {
          $output.="<li><a href='viewmore/".$value['name']."'><img src='".$value['gallery']."'><p>".$value['name']."</p></a></li>";
        }
      }
      $output.="</ul>";   	
     return Response($output);
    }
    public function itmedetails($id)
    {
      $detail=products::find($id);
      return view('itmedetails',['detail'=>$detail]);
    }
     public function viewmore($category)
     {
      $loadall=products::where('category',$category)->get();
       return view('viewmore',['prodata'=>$loadall]);
     }
      public function autocompletebox(Request $req)
    {
    	$autotext=$req->input('atext');
    	$output="";
    	$output.="<ul class='list'>";
    	$ulr=DB::table('pagedetaile')->
        where('page_name','like','%'.$autotext.'%')->
        orWhere('page_id','like','%'.$autotext.'%')->get();
        if($ulr->count()>0)
        {
                  foreach ($ulr as $key => $value) {
                    $output.="<li><img src='".$value->page_gallery."' style='height: 30px;width: 30px;border-radius: 50%;'>".$value->page_name."</li>";
                  }          
        }else{
            $output.="<li>No found this Products</li>";
        }
    	$output.="</ul>";
    	return Response($output);
    }   
   
     public function rangslider(Request $request)
      {
        if($request->ajax())
        {
            $output="";
            $products=DB::table('products')
            ->where('category',$request->input('gallery_f'))
            ->whereBetween('price',[$request->input('valr1'),$request->input('valr2')])->get();;
            // $empty=products::all();
          if($products){
             $output.="<ul>";
               foreach ($products as $key => $product) {
              $output.="<li><a style='color:gray;' href='../itmedetails/{$product->id}'><img src='".$product->gallery."'>"."<div class='text-box'>Rs.".$product->price."<br>".$product->name."</div></a></li>";
              }
              $output.='</ul>';
              return Response($output);
            }else{
             $output='not found';
            return Response($output);  
            }
        }  
    } 

}
