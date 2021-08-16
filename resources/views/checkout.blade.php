@extends('index')
@section('checkout')
<div class="row" style="background-color: #c7cad4;">
	<div class="col-8">
		<div class="row" style="border: 1px ;margin: 5px;">
	        <table >
	            @if(session()->has('user'))
	            	<tr><th colspan="2">Login<input type="checkbox" checked="" /></th></tr>
	            	<tr><td>{{session()->get('user')->name}}</td><td><a onclick="openform()();return false;">Change</a></td></tr>
	            @else
	               <tr><th>Login<input type="checkbox"  /></th></tr>
	            	<tr><td>Please you are Login </td></tr>	
	            @endif
	        </table>
       	</div>

		<div class="row" style="border: 1px ;margin: 5px;">
			     <table>
				            @if(session()->has('user'))
				            	<tr><th colspan="2">Addresh<input type="checkbox" checked="" />
				            		<a id="editaddresh" href="">Edit</a></th></tr>
				            	<tr id="addresh_area" >
				            		<td><input type="text" id="addresh_text" >
				            		    <button class="btn btn-primary" >Save</button>
				            		</td>
				            	</tr>
				            	<tr><td>{{session()->get('user')->contactNo}}</td></tr>
				            	<tr><td>{{session()->get('user')->addresh}}</td></tr>
				            @else
				               <tr><th>Addresh<input type="checkbox"  /></th></tr>
				            	<tr><td>Please you are Login </td></tr>	
				            @endif
				        </table>
		</div> <!-- close col-5-2 -->

		<div class="row" style="border: 1px ;margin: 5px;">
			        <table class="table table-borderless">
            	        <tr class="thead-dark"><th colspan="2">Orderd Summery<input type="checkbox" id="ck" />
            	        </th></tr>
            	        <tbody id="item_row">
	            	        <tr>
	            	        	<td>
	            	        		<img height="100" width="100" src="{{$item['gallery']}}">
	            	        	</td>
	            	        	<td>
	            	        		{{$item['name']}}<p><i class="fa fa-inr" aria-hidden="true"></i>{{$item['price']}}<s><i class="fa fa-inr" aria-hidden="true"></i>  {{$item['price']*1.5}}</s></p>
	            	        	</td>
	            	        </tr>
	            	        <tr>
	            	        	<td>Quantity<input type="number" id="quantity" min="1" max="10" style="border:1px solid gray;"></td>
	            	        </tr>	
            	        </tbody>
            	        
                    </table>
		</div> <!-- close col-5-3 -->

				<div class="row" style="border: 1px;margin: 5px;">
                  Order Confirmation will be send this email to
                  @if(session()->has('user'))
                  <span style="color:#34363d;font-weight: 600;">{{session()->get('user')->email}}</span>
                   <span style="margin-left: 202px;"> 
                   	<button id="continue" class="btn btn-success">Continue</button>
                    <button id="sendmail_button" class="btn btn-primary">sendmail</button>
                   	@else
                   	<span style="color:red;font-weight: 600;">please Login First</span>
                   </span>
                   @endif
         		</div> <!-- close col-5-4 -->

				<div class="row Payment" style="border: 1px;margin: 5px;display: none;">
							    <table class="table table-borderless">
	            	        <tr class="thead-dark"><th colspan="2"><i style="color: white;" class="fa fa-paypal"></i> Payment Option<input type="checkbox" id="ck_payment" /></th></tr>
	            	        <tbody id="item_row">
		            	        <tr>
		            	        	<td>
		            	        		<input type="radio" id="cre" name="Payment"/>Debit/Credit/ATM Card
		            	            </td>
                                     <td style="display:none;" id="tab_cr">
                                     	<input type="text"  class="form-control"  placeholder="Enter Card Number">
                                     </td>
		            	        </tr>
		            	        <tr>
		            	        	<td>
		            	        		<input type="radio" id="upi" name="Payment"/> UPI
		            	             </td>
		            	             <td style="display:none;" id="tab_upi">
		            	             	<button class="btn btn-primary" id="upi-pay" >Go</button>
		            	             	<label id="P_failed" style="color:red;">Payment failed..</label>
                                     </td>
		            	        </tr>
		            	        <tr>
		            	        	<td>
		            	        		<input type="radio" id="cod" name="Payment"/> Cash On Deliviry
		            	             </td>
		            	             <td style="display:none;" id="tab_cod">
		            	             	<label>Captch match</label>
		            	             	<div class="form-row">
		            	             		<div class="form-group col-md-4">
		            	             	       <input type="text" id="captch" value="a12sd" readonly class="form-control">		
		            	             		</div>
		            	             		<div class="form-group col-md-4">
		            	             	       <input type="text" placeholder="Enter captcha" id="inputcapt" class="form-control">		
		            	             		</div>
		            	             		<div class="form-group">
		            	             			<button id="match_capt" class="btn btn-primary">Match</button>
		            	             		</div>
		            	             	</div>
		            	             		<label style="font-weight: 400;font-size: 20px;">Captch Not Visible ?</label><a id="cap">
		            	             			<img height="30" width="30" src="{{asset('assets/img/users/catph.png')}}"></a>
		            	             </td>
		            	        </tr>	
	            	        </tbody>
            	        
                    </table>

                </div>
                <!-- close col-5-5 -->
	</div>
	<div class="col-4">
		<table class="table" style="background-color: white;">
			<thead class="thead-dark"><th colspan="2">Total</th></thead>
			<tr><td>Price(1 item)</td><td id="price">{{$item['price']}}</td></tr>
			<tr><td>Delivery Charge</td><td>free</td></tr>
			<tr><td>Total Payable</td><td id="Total">{{$item['price']}}</td></tr>
		</table>
		<p id="show"></p>
        <p id="show2"></p>
	</div>
	@if(session()->has('user'))
      <input type="hidden" value="{{session()->get('user')->name}}" id="u_s_name" >
      <input type="hidden" value="{{session()->get('user')->lname}}" id="u_s_lname" >
      <input type="hidden" value="{{session()->get('user')->email}}" id="u_s_email" >
	@endif
	  <div id="model">
            <div id="model-form">
              <div id="clos-btn2">X</div>
               <div class=" form-box">
		      	<form id="item_de_log">
		      		<div class="Itemsdetallogin-form">
		      			<h3>UPI Payment</h3></div>
		    		  <div class="form-group">
					    <label>UPI Id</label>
					    <input type="text" class="form-control" id="upi_id"  placeholder="Enter Your UPI Id" aria-describedby="emailHelp">
					    <small class="form-text text-muted text-white">We'll never share your upi idwith anyone else.</small>
					  </div>
					  <button type="submit" id="pay_now_upi" class="btn btn-primary">Paynow</button>
				</form>
		</div>
	</div>
</div>fgo
</div>
<script>
	$(function(){
		$("#quantity").keyup(function(){
             var qua=$("#quantity").val();
             var price=$("#price").text();
             $("#Total").text(qua*price);
		});
		$("#continue").on("click",function(){
			$("#item_row").hide();
			$("#ck").prop('checked', true);
			$(".Payment").show();
		})
		$("#cre").on("click",function(){
			$("#tab_upi").hide();
			$("#tab_cod").hide();
			$("#tab_cr").show();
		})
		$("#upi").on("click",function(){
			$("#tab_cr").hide();
			$("#tab_cod").hide();
			$("#tab_upi").show();
			$("#ck_payment").prop('checked',true);
		})

		$("#cod").on("click",function(){
			$("#tab_cr").hide();
			$("#tab_upi").hide();
			$("#tab_cod").show();
			$("#ck_payment").prop('checked',true);
		})
		$("#cap").on('click',function(){
		       var alpha=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','@','#','$','%','&','*','-','+','^'];
				var a=alpha[Math.floor(Math.random()*71)];
				var b=alpha[Math.floor(Math.random()*71)];
				var c=alpha[Math.floor(Math.random()*71)];
				var d=alpha[Math.floor(Math.random()*71)];
				var e=alpha[Math.floor(Math.random()*71)];
				var f=alpha[Math.floor(Math.random()*71)];
				var final =a+b+c+d+e+f;
				// alert(alpha.length)
				$("#captch").val(final);
		
		})

	$("#match_capt").on('click',function(){
          var input_capt=$("#inputcapt").val();
		  var match_capt=$("#captch").val();
		  var Totalamt=$("#Total").text();
		  if(input_capt==match_capt)
		  {
		  	window.location='{{URL::to("caseondelivery")}}/'+Totalamt+'/{{$item["id"]}}/COD';
		  }else{
		  	alert('not match');
		  }

	});
		 $("#sendmail_button").on('click',function(){
			 	$("#item_row").hide();
				$("#ck").prop('checked', true);
				$(".Payment").show();
		     var Totalamt=$("#Total").text();
		     var uname=$("#u_s_name").val();
		     var lname=$("#u_s_lname").val();
		     var pro_name="{{$item['name']}}";
		     alert(Totalamt)
		     alert(uname)
		     $.ajax({
		      url:"{{URL::to('sendmail')}}",
		      type:"get",
		      data:{"name":uname,"lname":lname,"pro_name":pro_name,"amt":Totalamt},
		      success:function(result){
		        alert("message is send areement");
		      },error:function(result){
		        alert("message is NOt send");
		      }
		     })
		  });
		 $("#upi-pay").on("click",function(){
		 	$("#model").show();
		 })
		 $("#clos-btn2").on("click",function(){
		 	$("#model").hide();
		 	$("#P_failed").show();
		 
		 })
		 $("#P_failed").hide();
         $("#pay_now_upi").on("click",function(e){
         	e.preventDefault();
         	var id=$("#upi_id").val();
         	 var Totalamt=$("#Total").text();
         	if (id==123456) 
         	{
		  	window.location='{{URL::to("caseondelivery")}}/'+Totalamt+'/{{$item["id"]}}/UPI';
         	}else{
         		alert('payment is not done');
         	}
         });
         $("#addresh_area").hide();
         $("#editaddresh").on("click",function(e){
         	e.preventDefault();
             $("#addresh_area").show();
         });
	})
</script>
@endsection