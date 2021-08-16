<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class userscontrollers extends Controller
{
	public function login(Request $req)
   {
      $user=User::where('email',$req->emails)->first();
      if($user)
      {
        if($user && $user->password ==$req->input('password'))
        {
          $req->session()->put('user',$user);                  
           return response()->json(
              ['success'=>true,
               'yes'=>'thankq'
              ]);
        }else{
          return response()->json(
          ['success'=>0,
           'error'=>'your password is worng please retype another password'
          ]);
        }
        
      }else
      {
        return response()->json(['success'=>0,'error'=>'this email not a exixst']);
      }
   } 
    public function resistration(Request $req)
   {
        $user=User::where('email',$req->emails)->first();
        if($user)
        {
          return response()->json(['success'=>1,'yes'=>'this email exixst']); 
        }
        else
        {
          $insert=User::insert([
              'name'=>$req->names,
              'email'=>$req->emails,
              'password'=>$req->password 
          ]);
          if($insert)
          {
            return response()->json(['success'=>1,'yes'=>'this record successfully resistered']);  
          }else
          return response()->json(['success'=>0,'error'=>'this email not a resistered']);
          
        }
   }  
   public function userslogout(Request $rq)
     {
      $rq->session()->forget('user');
       return redirect(request()->headers->get('referer'));    
     }
     public function userchangpassword(Request $req)
   {
      $user=User::where('email',$req->emails)->first();
        if($user)
        {
            $affected = User::where('email', $req->emails)
              ->update(['password' =>$req->newpass]);
              if($affected)
                 return response()->json(['success'=>1,'yes'=>'password is successfully chaenged']);
              else
                 return response()->json(['success'=>0,'error'=>'password is not chaenged re try']);
        }else
            return response()->json(['success'=>0,'error'=>'this email not a exixst']);
   }
   public function user_ac_name_lname(Request $rq)
   {
       $uped=User::where('email',$rq->input('email'))
       ->update(['name'=>$rq->input('name'),'lname'=>$rq->input('lname')]);
       if($uped)
        {
          return Response($uped);
        }else{
          return Response('not match');
        }
    }
   public function user_edit_email(Request $rq)
   {
       $auth=User::where('email',$rq->input('O_email'))->get();
       if($auth)
        {
          $uped=User::where('email',$rq->input('O_email'))->update(['email'=>$rq->input('email_n')]);
          return Response($uped);
        }else{
          return Response('not match');
        }
    }    
   public function user_edit_mobile(Request $rq)
   {
       $auth=User::where('email',$rq->input('O_email'))->get();
       if($auth)
        {
          $uped=User::where('email',$rq->input('O_email'))->
          update(['contactNo'=>$rq->input('mobile_n')]);
          return Response($uped);
        }else{
          return Response('not match');
        }
    }
     public function deactivate_u_account(Request $req)
    {
      $deactivate=User::where('email',$req->u_email)->delete();
      $req->session()->forget('user');
       return Response($deactivate);
    }  
   
}
