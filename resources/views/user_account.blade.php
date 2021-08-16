@extends('index')
@section('User_account')
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
		    		  	<td><p id="pro_info">Profile Information</p></td>
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
	        		<th scope="row">User Information
	        			<a href="" id="edit">Edit</a><a href="" id="cencel">Cencel</a></th></thead>
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
	        			<td class="form-group col-md-4">
	        				<button id="save_edit" class="btn btn-primary">Save</button>
	        			</td>
	        		</tr>
	        		<tr class="form-row">
	        			<td>
	        				<label>Your Gander</label>
	        				<div class="form-group">
	        				 <input type="radio" name="Gander">Male	
	        				 <input type="radio" name="Gander">	Female
	        				</div>
	        				
	        			</td>
	        		</tr>
	        		<tr><td><label>Email Addresh</label>
	        			<a href="" id="email_e">Edit</a>
	        			<a href="" id="email_cencel">Cencel</a>
	        				</td></tr>
	        		<tr class="form-row">
	        			<td class="form-group col-md-4">
	        				@if(session()->has('user'))
	        				<input type="text" id="edit_mail" value="{{session()->get('user')->email}}" readonly class="form-control">
	        				@endif
	        			</td>
               			<td class="form-group col-md-4">
	        				<button id="save_edit_email" class="btn btn-primary">Save</button>
	        			</td>
	        		</tr>	        
	        		<tr><td><label>Mobile NO</label><a href="" id="mobile_e">Edit</a>
	        				</td></tr>
	        		<tr class="form-row">
	        			<td class="form-group col-md-4">
	        				@if(session()->has('user'))
	        				<input type="text" id="mobile_e_in" value="{{session()->get('user')->contactNo}}" readonly class="form-control">
	        				@endif
	        			</td>
               			<td class="form-group col-md-4">
	        				<button id="save_edit_mobile" class="btn btn-primary">Save</button>
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
<div class="alert"></div>
<style type="text/css">
	.alert{
		padding: 25px 35px;
		background-color: #445a6e;
		color: white;
		font-weight: 600;
		position: absolute;
		top: 20%;
		left: 40%;
		z-index: 100;
		display: none;
	}
</style>
<script>
	$(function(){
		$("#cencel").hide();
		$("#save_edit").hide();
		$("#save_edit_email").hide();
		$("#save_edit_mobile").hide();
		$("#email_cencel").hide();
		// edit user name and lastname
		$("#edit").on('click',function(e){
           e.preventDefault();
           $("#u_name").prop('readonly',false);
           $("#u_lname").prop('readonly',false);
           $("#save_edit").show();
           $("#edit").hide();
           $("#cencel").show();
		});
		$("#cencel").on('click',function(e){
			e.preventDefault();
           $("#u_name").prop('readonly',true);
           $("#u_lname").prop('readonly',true);
           $("#save_edit").hide();
           $("#edit").show();
           $("#cencel").hide();
		});
		// edit_save button
		$("#save_edit").on('click',function(){
			var E_name=$("#u_name").val();
			var E_mail=$("#email_use").val();
			var E_lname=$("#u_lname").val();
			$.ajax({
				url:"{{URL::to('user_ac_name_lname')}}",
				type:"post",
				data:{"name":E_name,"email":E_mail,"lname":E_lname,"_token": "{{ csrf_token() }}"},
				success:function(result){
                 $("#u_name").val(E_name);
                 $("#u_lname").val(E_lname);
                 $(".alert").show().html('<i class="fa fa-check"></i>Account is updated');
                 $(".alert").hide(2000);
                 const button = document.querySelector('#cencel');
                 button.click();
				},error:function(result){
					console.log(result);
				}
			})// close ajax
		});
		// email edit
		$("#email_e").on('click',function(e){
			e.preventDefault();
           $("#edit_mail").prop('readonly',false);
           $("#save_edit_email").show();
           $("#email_e").hide();
           $("#email_cencel").show();
		});
		$("#email_cencel").on('click',function(e){
					e.preventDefault();
		           $("#edit_mail").prop('readonly',true);
		           $("#save_edit_email").hide();
		           $("#email_e").show();
		           $("#email_cencel").hide();
				});

		$("#save_edit_email").on("click",function(){
			var email_e=$("#edit_mail").val();
			// alert(email_e)
			var old_email=$("#email_use").val();
			$.ajax({
				url:"{{URL::to('user_edit_email')}}",
				type:"post",
				data:{"email_n":email_e,"O_email":old_email,"_token": "{{ csrf_token() }}"},
				success:function(result){
					// console.log(result);
                 $("#edit_mail").val(email_e);
                 $(".alert").show().html('<i class="fa fa-check"></i>Account is updated');
                 $(".alert").hide(2000);
                 $("#edit_mail").prop('readonly',true);
                 // const button = document.querySelector('#cencel');
                 // button.click();
				},error:function(result){
					console.log(result);
				}
			})// close ajax           
		});
			$("#mobile_e").on('click',function(e){
						e.preventDefault();
			           $("#mobile_e_in").prop('readonly',false);
			           $("#save_edit_mobile").show();
					});

         // save_edit_mobile 
			$("#save_edit_mobile").on("click",function(){
						var mobile_e=$("#mobile_e_in").val();
						// alert(email_e)
						var old_email=$("#email_use").val();
						alert(old_email)
						$.ajax({
							url:"{{URL::to('user_edit_mobile')}}",
							type:"post",
							data:{"mobile_n":mobile_e,"O_email":old_email,"_token": "{{ csrf_token() }}"},
							success:function(result){
								// console.log(result);
			                 $("#mobile_e_in").val(mobile_e);
			                 $(".alert").show().html('<i class="fa fa-check"></i>Account is updated');
			                 $(".alert").hide(2000);
			                 $("#edit_mail").prop('readonly',true);
			                 // const button = document.querySelector('#cencel');
			                 // button.click();
							},error:function(result){
								console.log(result);
							}
						})// close ajax           
					});
			$("#orders").on("click",function(e){
                e.preventDefault();
               $("#userinfo").hide();
               $("#orders").hide();
               $("#manage_adresh").hide();
                 $("#back").show();
				 $("#ordersrecord").show(); 

              var uid=$("#id_use").val();;
               		$.ajax({
							url:"{{URL::to('users_orders')}}",
							type:"post",
							data:{"uid":uid,"_token": "{{ csrf_token() }}"},
							success:function(result){
							 $("#ordersrecord").html(result);
			                 },error:function(result){
								console.log(result);
							}
						})// close ajax           
				
			})
			$("#back").on("click",function(e){
				e.preventDefault();
				 $("#orders").show();
                 $("#back").hide();
				 $("#userinfo").show();
				 $("#ordersrecord").hide(); 
			});
			// load orders
			function loadorders(){
                var uid=$("#id_use").val();
               		$.ajax({
							url:"{{URL::to('users_orders')}}",
							type:"post",
							data:{"uid":uid,"_token": "{{ csrf_token() }}"},
							success:function(result){
							 $("#ordersrecord").html(result);
			                 },error:function(result){
								console.log(result);
							}
						});// close ajax           
			
			}
			$(document).on('click','.cencel_order',function(){
               var orid=$(this).data('cid');
               var element=$(this).data('cid');
               $.ajax({
							url:"{{URL::to('cencelorders')}}",
							type:"post",
							data:{"orid":orid,"_token": "{{ csrf_token() }}"},
							success:function(result){
							 $(element).closest("tr").fadeOut();
							 loadorders();
			                 },error:function(result){
								console.log(result);
							}
						})// close ajax           
				
			});
			$("#pro_info").click(function(){
				$("#userinfo").show();
				$("#ordersrecord").hide();
				
			});
			$("#manage_addresh").on("click",function(){
               $("#userinfo").hide();
				$("#ordersrecord").hide();
                var uid=$("#id_use").val();
               $.ajax({
							url:"{{URL::to('getaddresh')}}",
							type:"post",
							data:{"uid":uid,"_token": "{{ csrf_token() }}"},
							success:function(result){
							 $("#manage_adresh").html(result);
							 },error:function(result){
								console.log(result);
							}
						})// close ajax           
				
			})
			$("#addboxcencel").on("click",function(){
                alert()
			});
			$("#deactivate").on("click",function(e){
                e.preventDefault();
                var email=$("#email_use").val();
                if(confirm("Are you sure Deactivate Your Account"))
                {
	                $.ajax({
	                	url:"{{URL::to('deactivate_u_account')}}",
	                	type:"post",
	                	data:{'u_email':email,"_token": "{{ csrf_token() }}"},
	                	success:function(result){
	                        alert('account Deactivated');
	                        window.location="/";
	                	},error:function(result){
								console.log(result);
							}
	                });
	            }    
			});
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	})
</script>
@endsection