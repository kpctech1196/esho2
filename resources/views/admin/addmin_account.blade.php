@extends('admin.index')
@section('admin_account')
<div class="container">
	<div class="row mx-md-n5">
	  <div class="col-3 px-md-2">
	  	<div class="p-2 border bg-light">
	  		      <img src="{{asset('assets/img/blog/usericon.png')}}" id="usericon">
	        			<span>hello,</span>@if(session()->has('user'))
	        				<p><b>{{session()->get('user')->name}}{{session()->get('user')->lname}}</b></p>
                           @else
                           <script> window.location="/";</script>
                           @endif
	  	</div>
	  	<div class="row">
		  	<div class="col-12 px-md-1">
		     	<div class="p-2 border bg-light">
		    		<table class="table" >
		    			<tr class="userac"><td>
		    			<a href="" id="orders"><i class="fa fa-first-order"></i>MY ORDERS
		    			   <b><i class="fa fa-angle-right" id="orbutton" ></i></b>
		    		      </a>
		    		      <a href="" style="display: none;" id="back">MY ORDERS
		    			   <b><i class="fa fa-angle-left" id="orbutton" ></i></b>
		    		      </a>
		    		  </td></tr>
		    		  <tr class="userac">
		    		  	<td><p id="pro_info"> AProfile Information</p></td>
		    		  </tr>
		    		  <tr class="userac">
		    		  	<td><p id="manage_addresh">manage Addresh</p></td>
		    		  </tr>
		    		</table>
		    	</div>
		    </div>			
	  	</div>
	  </div>

	  <div class="col px-md-2">
	  	<div class="p-3 border bg-light">
	  	    <table class="table table-borderless" id="userinfo">
	        	<thead>
	        		<th scope="row">Admin Information
	        	<tbody >
	        		<tr class="form-row">
	        			<td class="form-group col-md-4">
	        				@if(session()->has('user'))
	        				<input type="text" value="{{session()->get('user')->name}}" readonly class="form-control" id="u_name">
	        				@endif
	        			</td>
               			<td class="form-group col-md-4">
               				@if(session()->has('user'))
               				<input type="hidden" id="email_use" value="{{session()->get('user')->email}}">
               				<input type="hidden" id="id_use" value="{{session()->get('user')->id}}">
	        				<input type="text" readonly value="{{session()->get('user')->lname}}" class="form-control" id="u_lname">
	        				@endif
	        			</td>
	        		</tr>
	        		<tr class="form-row">
	        			<td>
	        				<label>Your Gander</label>
	        				<div class="form-group">
	        				 <input type="radio" checked name="Gander">Male	
	        				 <input type="radio" name="Gander">	Female
	        				</div>
	        				
	        			</td>
	        		</tr>
	        		<tr><td><label>Email Addresh</label>
	        				</td></tr>
	        		<tr class="form-row">
	        			<td class="form-group col-md-4">
	        				@if(session()->has('user'))
	        				<input type="text" id="edit_mail" value="{{session()->get('user')->email}}" readonly class="form-control">
	        				@endif
	        			</td>
               		</tr>	        
	        		<tr><td><label>Mobile NO</label></td></tr>
	        		<tr class="form-row">
	        			<td class="form-group col-md-4">
	        				@if(session()->has('user'))
	        				<input type="text" id="mobile_e_in" value="{{session()->get('user')->contactNo}}" readonly class="form-control">
	        				@endif
	        			</td>
               			</tr>
	        		<tr><td><label>Join Date</label></td></tr>
	        		<tr class="form-row">
	        			<td class="form-group col-md-4">
	        				@if(session()->has('user'))
	        				<input type="text" id="mobile_e_in" value="{{session()->get('user')->updated_at}}" readonly class="form-control">
	        				@endif
	        			</td>
	        		</tr>
	        		
	        		<tr><td><b>FAQs.</b><p><b>
			        			What happens when I update my email address (or mobile number)?
									</b></p>Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).
                                    <p><b>
									When will my APE account be updated with the new email address (or mobile number)?</b></p>
									It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.
                                    <p><b>
									What happens to my existing APE account when I update my email address (or mobile number)?</b></p>
									Updating your email address (or mobile number) doesn't invalidate your account. Your account remains fully functional. You'll continue seeing your Order history, saved information and personal details.
                                    <p><b>
									Does my Seller account get affected when I update my email address?</b></p>
									APE has a 'single sign-on' policy. Any changes will reflect in your Seller account also.
	        		</td></tr>
	        		<tr><th><a href="" id="deactivate">Deactivate Account</a></th></tr>	        		
	        	</tbody>
	        </table>
	             <div id="ordersrecord"></div>
	             <div id="manage_adresh"></div>	        	
	        <img src="{{asset('assets/img/blog/footer.png')}}" width="700">
	    </div>
	  </div>
	</div>
</div>
@endsection