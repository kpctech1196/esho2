<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\products;
use App\Models\User;

class cartcontrollers extends Controller
{
   public function mycart($id)
   {
        $user=User::where('id',$id)->get();
        $allproduct=products::all();
        if($user)
        {
        	$cart=DB::table('cart')->where('userid',$id)->get();
        	return view('mycart',['cartitem'=>$cart,'allproduct'=>$allproduct]);
        }else
        {
        	return view('mycart');
        }
   }
   // mycart page data
       public function loadcart(Request $req)
    {
        $output='';
        $uid=$req->input('uid');
        $fatch=DB::table('cart')->where('userid',$uid)->get();
        $output.="<table class='table' id='tab1'>
            <thead><tr style='text-align:center;'><th colspan='5'>MyCard </th></tr>
                <tr><th>Sno</th><th>Product_Name</th><th>Price</th><th>Delete</th><th>Quantity</th></tr>
            </thead>
              <tbody>";
        if($fatch->count()>0)
        {
             $i=0;
          foreach ($fatch as $key => $item) {
          
             $output.=' <tr><td>'.$i++.'</td><td>'.$item->name.'</td><td id="loop">'.$item->price.'</td><td><i class="fa fa-trash del-btn" data-id="'.$item->product_id.'"></i></td><td><input type="number" min="1" max="5" class="quantity"></td></tr>';
          }
          $output.='<tr><td colspan="2" class="totald">Total</td><td colspan="3" id="Totalamt"></td></tr>    
            </tbody> </table>';
          return Response($output);
        }else{
          $output.='<tr><td colspan="5" class="totald">cart is empty</td></tr>';
        return Response($output);
        }
    }

    public function cartable(Request $req)
    {
        $output='';
        $uid=$req->input('userid');
        $fatch=DB::table('cart')->where('userid',$uid)->get();
        if($fatch)
        {
            $output.=' <thead><tr style="text-align:center;"><th colspan="5">MyCard</th><tr><th>Sno</th><th>Product_Name</th><th>Price</th><th>Delete</th></tr></thead>';
          foreach ($fatch as $key => $value) {
             $output.='<tr><th scope="row"><img style="height:30px;width:30;border-radius:50%;" src="'.$value->image.'"></th><td>'.$value->name.'</td><td id="price_count">'.$value->price.'</td><td><i class="fa fa-trash del-btn"  data-id="'.$value->product_id.'" ></i></td></tr>';
          }
          return Response($output);
        }else{
          $output.='cart is empty';
          return Response($output);
        }
    }
    //view more pages

    public function AddtoCard(Request $request)
    {
      $pro=products::where('id',$request->pr_id)->first();
      $insert=DB::table('cart')->insert([
            'userid'=>$request->user,
            'image'=>$pro->gallery,
            'product_id'=>$request->pr_id,            
            'name'=>$pro->name,
            'price'=>$pro->price,
      ]);
      return Response($insert);
     
    }
    public function AddtoCardview(Request $request)
    {
      $pro=products::where('id',$request->pr_id)->first();
      $insert=DB::table('cart')->insert([
            'userid'=>$request->user,
            'image'=>$pro->gallery,
            'product_id'=>$request->pr_id,            
            'name'=>$pro->name,
            'price'=>$pro->price,
      ]);
      return Response($insert);
    }
        public function AddtoCard_mycard(Request $request)
    {
      $pro=products::where('id',$request->pr_id)->first();
      $insert=DB::table('cart')->insert([
            'userid'=>$request->user,
            'image'=>$pro->gallery,
            'product_id'=>$request->pr_id,            
            'name'=>$pro->name,
            'price'=>$pro->price,
      ]);
      return Response($insert);
    }
    public function Deletecarditem(Request $request)
    {
      $delete=DB::table('cart')->where('product_id',$request->dme)->delete();
       return Response($delete);
    }
    // case on delivery
    public function sendmail(Request $req)
    {

            $to = "kp920520@gmail.com";
            $subject = "My subject komalpatel";
            $txt = "Hello world!";
            $headers = "From: komalpatel.mca4.18606025@gmail.com" . "\r\n" .
            "CC: komalpatel7828655051@gmail.com";

           $mailsend= mail($to,$subject,$txt,$headers);
           if($mailsend)
           {
            return Response("mail send successful");
           }else{
              return Response("mail nots send successful");
           }
      
    }
}
