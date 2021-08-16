<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;
class mailcontrollers extends Controller
{
    public function sendmail(Request $req)
    {
    	 $details=[
            	 	'uname'=>$req->name,
            	 	'lname'=>$req->lname,
                    'tot'=>$req->amt,
                    'p_name'=>$req->pro_name,
            	 ];
    	 if(Mail::to(session()->get('user')->email)->send(new MyTestMail($details)))
    	 {
    	   return Response("mail send"); 	 	
    	 }else{
    	 	return Response("mail not send");
    	 }    
    }
    public function emailcashondelivery(Request $req)
    {
    	 $details=[
    	 	'title'=>'Your Order Confirmation',
    	 	'uname'=>$req->name,
    	 	'lname'=>$req->lname,
    	 	// 'amt'=>$req->amt,
    	 	'body'=>'Your Order despeched 12/11/22 ',
    	 ];
    	 if(Mail::to('komalpatel.mca4.18606025@gmail.com')->send(new MyTestMail($details)))
    	 {
    	   return Response("mail send"); 	 	
    	 }else{
    	 	return Response("mail not send");
    	 }
    }
}
