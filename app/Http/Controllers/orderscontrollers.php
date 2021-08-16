<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\products;

class orderscontrollers extends Controller
{
   public function checkout($id)
    {
      $item_details=products::find($id);
      return view('checkout',['item'=>$item_details]);
    }
   public function caseondelivery($amt,$id,$pay_m)
    {
      return view('caseondelivery',['amt'=>$amt,'pay_m'=>$pay_m,'pro_detail'=>products::find($id)]);
    }
     public function confirmOrderd(Request $rq)
    {
      $order=DB::table('ordertable')->insert([
       'orderid'=>$rq->input('od_id'),
       'userid'=>$rq->input('u_id'),
       'productname'=>$rq->input('p_id'),
       'totalamt'=>$rq->input('total_amt'),
       'status'=>'no',
       'pay_method'=>$rq->pay_m,
       'orderdate'=>date("Y-m-d")
      ]);
      return Response($order);
    }
       public function orders(Request $rq)
      {
        $output="";
        $allorders=DB::table('ordertable')->select("*")->where('userid',$rq->input('uid'))->get();
       $output.="<table class='table borderless'>
        <thead class='thead-light'><tr><th colspan='6'>Your Oders</th></tr>
        <thead class='thead-dark'>
                <tr><th>Id</th><th>Name</th><th>Amount</th><th>Orderid</th><th>Paymethod</th><th>OrderStatus</th></tr>
        </thead>";
        
       if($allorders!==''){
        $id=0;
        foreach ($allorders as $key => $value) {
          $output.="<tr><td>".$id++."</td><td>".$value->productname."</td><td>"
          .$value->totalamt."</td><td>".$value->orderid."</td><td>".$value->pay_method."</td><td><button class='btn btn-danger cencel_order' data-cid='".$value->orderid."' >CancelOrder</button></td></tr>";
        }
       }else{
        $output.="<tr><td colspan='5'>no record</td></tr>";
       }
         $output.="</table>";
      
        return Response($output);
      }
       public function Ordersadmin()
    {
         $table=DB::table('ordertable')->get();
         $output="";
         $output.="<table><tr><th>Proname</th><th>UserId</th><th>Orderid</th><th>Paymentmethod</th><th>Status</th><th>Total Amount</th></tr>";
         foreach ($table as $key => $value) {
           $output.="<tr><td>".$value->productname."</td><td>".$value->userid."</td><td>".$value->orderid."</td><td>".$value->pay_method."</td><td>".$value->status."</td><td>".$value->totalamt."</td></tr>";
         }
         $output.="</table>";
        return Response($output);
      }
    public function serchOrders(Request $req)
  {
         $searcht=$req->input('Search');
         $products=DB::table('ordertable')->where('orderid','like','%'.$searcht.'%')->orWhere('userid','like','%'.$searcht.'%')->orWhere('pay_method','like','%'.$searcht.'%')->get();
         $output="";
         $output.="<table><tr><th>Proname</th><th>UserId</th><th>Orderid</th><th>Paymentmethod</th><th>Status</th><th>Total Amount</th></tr>";
         foreach ($products as $key => $value) {
           $output.="<tr><td>".$value->productname."</td><td>".$value->userid."</td><td>".$value->orderid."</td><td>".$value->pay_method."</td><td>".$value->status."</td><td>".$value->totalamt."</td></tr>";
         }
         $output.="</table>";
        return Response($output);    
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
     public function cencelorders(Request $req)
    {
      $udata=session()->get('user');
      $delete=DB::table('ordertable')->where('orderid',$req->input('orid'))->delete();
      DB::table('cenceloders')->insert([
        'userid'=>$udata->id,
        'cancelDate'=>date("Y/m/d"),
        'orderid'=>$req->input('orid'),
      ]);
      return Response($delete);
    }
    public function getaddresh(Request $req)
    {
        $getad=DB::table('users')->select('addresh')->where('id',$req->input('uid'))->get();
        $output="";
        $output.="<table class='table'><tr><td><i class='fa fa-address-card'></i>Addresh</td><td><button id='addboxcencel'>Cancel</button></td></tr>";
        foreach ($getad as $key => $value) {
           $output.="<tr><td>".$value->addresh."</td></tr>";
        }
        $output.='</table>';
        return Response($output);
    }
}


