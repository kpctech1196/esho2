<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\User;
use App\Models\ordertable;
use Illuminate\Support\Facades\DB;
class admincontrollers extends Controller
{
  public function index()
  {
  	$data=User::all();
  	$pro=products::all();
  	$cout=$data->count();
  	$order=DB::table('ordertable')->get();
  	$tot_order=$order->count();
  	$protot=$pro->count();
  	return view('admin.master',['loadtuser'=>$cout,'allusers'=>$data,
  		'total_order'=>$tot_order,'totproduct'=>$protot]);
  }
  public function andmintotalorders(Request $req)
  {
  	$order=DB::table('ordertable')->get();
  	$output="";
  	$output.='<table class="table" id="ordertable_get" >
      <thead class="thead-dark text-center"><th colspan="6">Orders Table</th></thead>
       <thead><tr>
              <th scope="col">#</th>
              <th scope="col">Product_Name</th>
              <th scope="col">Orderid</th>
              <th scope="col">UserId</th>
              <th scope="col">pay_method</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
     ';
  	if($order->count()>0){
  		$i=0;
        foreach ($order as $key => $value) {
        	$output.='<tr>
              <th scope="row">'.$i++.'</th>
              <td>'.$value->productname.'</td>
              <td>'.$value->orderid.'</td>
              <td>'.$value->userid.'</td>
              <td>'.$value->pay_method.'</td>
              <td>'.$value->totalamt.'</td>
            </tr>';
        }
  	}else{
         $output.='<tr><td>No Order today</td></tr>';
  	}
  	$output.=' </tbody></table>';
  	return Response($output);
  }
  public function andminproducts(Request $req)
  {
		    $product=products::all();
		  	$output="";
		  	$output.='<table class="table" id="ordertable_get" >
		      <thead class="thead-dark text-center"><th colspan="6">Products Table</th></thead>
		       <thead><tr>
		              <th scope="col">#</th>
		              <th scope="col">Product</th>
		              <th scope="col">Name</th>
		              <th scope="col">Price</th>
		              <th scope="col">Quantity</th>
		            </tr>
		          </thead>
		          <tbody>
		     ';
		  	if($product->count()>0){
		  		$i=0;
		        foreach ($product as $key => $value) {
		        	$output.='<tr>
		              <th scope="row">'.$i++.'</th>
		              <td><img src="'.$value->gallery.'" style="width:30px;height: 30px;border-radius: 50%;"></td>
		              <td>'.$value->name.'</td>
		              <td>'.$value->price.'</td>
		              <td>'.$value->quantity.'</td>
		            </tr>';
		        }
		  	}else{
		         $output.='<tr><td>No Order today</td></tr>';
		  	}
		  	$output.=' </tbody></table>';
		  	return Response($output);
     
  }
  public function adminloginmatch(Request $req)
  {
  	      $user=User::where('email',$req->email)->first();
  	      if($user)
  	      {
              $req->session()->forget('user');                  
             if($user && $user->password ==$req->input('pass'))
             {
                $req->session()->put('user',$user);                  
                return response()->json(['success'=>true,'yes'=>'thankq']);  	
             }
             else{
                	 return Response("Your Password is Worng"); 
               }
        }       
        else{
  	      	return Response("This Email not exist");
  	      }
   }
   public function adminregistration(Request $req)
   {
       $user=User::where('email',$req->email)->first();
       if($user && $user->email ==$req->input('email'))
       {
           return response()->json(['error'=>0,'msg'=>"This Email Already exist please another email enter"]);
       }
       else{
        $insert=DB::table('users')->insert([
          'name'=>$req->name,
          'email'=>$req->email,
          'password'=>$req->pass,
        ]);
        return Response("Successfully Registered");
       }
   }
   public function adminlogout(Request $req)
   {
      $req->session()->forget('user');
      return redirect('/adminlog');
   }
   // product managemnts blocks
    public function livesearch(Request $livesearch)
    {
      $search=$livesearch->input('search');
      $products=products::where('name','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->get();
        $output='';
         $output.="<table border='1'>                    
                     <thead>
                      <tr><th id='theh' colspan='7'>Avaible All stocks</th></tr>
                       <tr><th>d</th> <th>Name</th> <th>Quentity</th><th>Price</th><th>Edit</th><th>Delete</th><th>Availstatus</th></tr>
                     </thead>
                     <tbody>";
         if($products)
          {
           foreach($products as $row)
            {
               $output.="<tr><td>".$row->id."</td><td>".$row->name."</td><td>".$row->quantity."</td><td>".$row->price."</td><td><button class='edit-btn' data-eid='".$row->id."'>Edit</button></td><td><button class='delete-btn' data-id='".$row->id."'>Delete</button></td><td>yes</td></tr>";       
             }
               $output.="</tbody></table>";
           return response()->json(['success'=>1,'all_data'=>$output]);
        }else
        {
          $output.="<tr><td colspan='5'>NO record found</td></tr>";
          $output.="</table>";
          return response()->json(['success'=>0,'all_data'=>'no record']);
        }
    }
    public function editupdate(Request $editupdate)
    {
          $id=$editupdate->input('eid');
          $name=$editupdate->input('ename');
          $quanty=$editupdate->input('eqnantity');
          $price=$editupdate->input('price');
          $affected = DB::table('products')
              ->where('id', $id)
              ->update(['name' => $name,'quantity'=>$quanty,'price'=>$price ]);
          if($affected)
          {
            return response()->json(['success'=>1,'mgs'=>'update success']);
          }else{
            return response()->json(['success'=>0]);
          } 
    }
    public function editbutton(Request $editbutton)
    {
        $id=$editbutton->input('eid');
        $query1=DB::table('products')->where('id',$id)->get();
        $output="";
        if($query1)
        {
              foreach ($query1 as $value) {
               $output.="<tr>
               <td>FirstName:</td>
               <td><input type='text' id='edit-name' value='".$value->name."'>
                              <input type='hidden' id='edit-id' value='".$value->id."'></td></tr>
                              <tr><td>Quantity:</td>
                  <td><input type='text' id='edit-quantity' value='".$value->quantity."'></td>
                </tr>
                <tr><td>Price:</td>
                  <td><input type='text' id='edit-price' value='".$value->price."'></td>
                </tr>
                <tr>
                  <td style='text-align:center;' colspan='2'><input type='submit' id='edit-submit' class='edit-submit btn btn-primary' value='Update'></td>
                </tr>";
              }
             return response()->json(['success'=>1,'all_data'=>$output]); 
        }else{
         return response()->json(['success'=>0,'all_data'=>'no record']);  
        }
    }
    public function Deleterecord(Request $Deleterec)
    {
          $id=$Deleterec->input('dme');      
        if(DB::table('products')->where('id',$id)->delete())
        {
          return response()->json(['success'=>1]);
        }else{
          return response()->json(['success'=>0]);
        }
    }
    public function insertdatajax(Request $insertdatajax)
    {      
        $name=$insertdatajax->input('name');
        $quan=$insertdatajax->input('quni');
        $price=$insertdatajax->input('pricei');
        $image=$insertdatajax->input('imagei');
        $category=$insertdatajax->input('catei');
        $disc=$insertdatajax->input('disci');
        $insert=DB::table('products')->insert([
            'name' => $name,
            'price'=>$price,
            'category'=>$category,            
            'quantity' => $quan,
            'gallery'=>$image,
            'description'=>$disc
        ]);
        if($insert)
        {
          return response()->json(['success'=>1]);
        }else{
          return response()->json(['success'=>0]);
        }
    }
    public function loadTableajax()
    {
      $products=products::all();
        $output="";
         $output.="<table border='1'>                    
                     <thead>
                      <tr><th id='theh' colspan='7'>Avaible All stocks</th></tr>
                       <tr><th>d</th> <th>Name</th> <th>Quentity</th><th>Price</th><th>Edit</th><th>Delete</th><th>Availstatus</th></tr>
                     </thead>
                     <tbody>";
         if($products)
          {
           foreach($products as $row)
            {
               $output.="<tr><td>".$row->id."</td><td>".$row->name."</td><td>".$row->quantity."</td><td>".$row->price."</td><td><button class='edit-btn' data-eid='".$row->id."'>Edit</button></td><td><button class='delete-btn' data-id='".$row->id."'>Delete</button></td><td>yes</td></tr>";       
             }
               $output.="</tbody></table>";
           return Response($output);
        }else
        {
          $output.="<tr><td colspan='5'>NO record found</td></tr>";
          $output.="</table>";
          return Response($output);
        }
    }
     public function Orders()
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
}
