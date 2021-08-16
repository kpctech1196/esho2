@extends('index')
@section('itmedetails')
		<?php 
		     if(session()->has('user')){
			$session=session()->get('user');
			echo '<input type="hidden" value="'.$session->id.'" id="user_id">';
			}                                  
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
				  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
				  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<div class="ctainr">
			<div class="row mx-md-n2">
				<div class="col-3 px-md-2" >
					<div class="p-2 border bg-light"style="height: 300px;">
					                <p>
									  <label for="amount">Price range:</label>
									  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
								     <input type="hidden" id="val" value="{{$detail['category']}}" name=""><br>		 
									</p>							 
									<div id="slider-range"></div>
					</div>	
				</div>
				<div class="col-5 px-md-2">
					<div class="p-2 border bg-light">
					   <div id="alert">Details...</div>
					    <img src="{{$detail['gallery']}}" height="200" width="250">
								      <table style="color: gray;font-weight: 500;">
								      	<tr><td>Name :-<span id="pro_name" >{{$detail['name']}}</span></td></tr>
								      	<tr><td >category :- {{$detail['category']}} </td></tr>
								      	<tr><td >Price :-<span id="pro_price" > {{$detail['price']}}</span> </td></tr>
								      	<tr><td >Ratting :-
								      		<i class="fa fa-star" aria-hidden="true"></i>
								          	<i class="fa fa-star" aria-hidden="true"></i>
								          	<i class="fa fa-star" aria-hidden="true"></i>
								          	<i class="fa fa-star-half-o" aria-hidden="true"></i> </td></tr>
								      	<tr><td>MRP:-<s> {{$detail['price']*1.5}}<s> </td></tr>
		                                <tr><td>Total :-{{$detail['price']}} </td></tr>
								        <input type="hidden" value="{{$detail['id']}}" id="pro_id">
								        <input type="hidden" value="{{$detail['gallery']}}" id="gallery_f">
								      	<tr><td><a id="bynow" href="{{URL::to('checkout')}}/{{$detail['id']}}" class="btn btn-primary">BuyNow</a>
								      		<?php if(session()->has('user'))
								      		{
								      			echo '<button class="btn btn-warning" id="AddtoCard" >AddtoCard</button>';
		 						      		}?>
								      	</td>
								      		</tr>
								      </table>
					</div>			      
				</div>
							<div class="col-4">
					              <div id="cart-item">
					                 <table class="table table-bordered"> 
					                 	<tbody></tbody>
					                 </table>
					              </div>
												  			
							</div>
			 </div><!--//close row -->

							<div class="row mx-md-n5">
								<div class="col-12">
									   <div class="card" >
										    	<div class="card-header">
										    		Related Items....
										    	</div>
												<div class="card-body">
						                            <div class="releted-items">
													</div>	        
												</div>
											</div>   	        			
								</div>
							</div>
		     </div>
		          <div id="model">
            <div id="model-form">
              <div id="clos-btn2">X</div>
               <div class=" form-box">
		      	<form id="item_de_log">
		      		<div class="Itemsdetallogin-form"><span>Your Not login pleage login</span>
		      			<h3>User LogIn Form</h3></div>
		    		  <div class="form-group">
					    <label>Email address</label>
					    <input type="email" class="form-control" id="emaillog_item"  placeholder="Enter Your Email" aria-describedby="emailHelp">
					    <small class="form-text text-muted text-white">We'll never share your email with anyone else.</small>
					  </div>
					  <div class="form-group">
					    <label >Password</label>
					    <input type="password"  class="form-control" placeholder="Enter Your Password" id="passwordlog_item">
					  </div>
					  <div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" >
					    <label class="form-check-label">Check me out</label>
					  </div>
					  <button type="submit" id="submit_login_item" class="btn btn-primary">Submit</button>
				  	  <button  id="submit_register_open" class="btn btn-primary">New Register</button>
				
				</form>
				<form id="item_de_reg">
		      		<div class="Itemsdetallogin-form"><h3>User Registration Form</h3></div>
		    		  <div class="form-group">
					    <label>Name</label>
					    <input type="text" class="form-control" id="namereg_item" required placeholder="Enter Your Name">
					  </div>
		    		  <div class="form-group">
					    <label>Email address</label>
					    <input type="email" class="form-control" id="emailreg_item" required placeholder="Enter Your Email" aria-describedby="emailHelp">
					    <small class="form-text text-muted text-white">We'll never share your email with anyone else.</small>
					  </div>
					  <div class="form-group">
					    <label >Password</label>
					    <input type="password"  class="form-control" required placeholder="Enter Your Password" id="passwordreg_item">
					  </div>
					  <div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" >
					    <label class="form-check-label">Check me out</label>
					  </div>
					  <button type="submit" id="submit_item_register" class="btn btn-primary">Register</button>
				
				</form>
	        </div>
          </div>
	
 </div>
    			<script>
	         $( function() {
	         	var v1=0;
	         	var v2=80000;
			    $( "#slider-range" ).slider({
			      range: true,
			      min:0,
			      max: 100000,
			      values: [ v1, v2 ],
			      slide: function( event, ui ) {
			        $( "#amount" ).val( "Rs." + ui.values[ 0 ] + " To Rs." + ui.values[ 1 ] );
			           v1=ui.values[0];
						v2=ui.values[1];
						loadtbul(v1,v2);
			      }
			    });
			    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

			  function loadtbul($val1,$val2){
	            var gallery=$("#val").val();
	            // alert(gallery)
	            $.ajax({
	                 type:'get',
	                 url:'{{URL::to("rangslider")}}',
	                 data:{'valr1':$val1,'valr2':$val2,'gallery_f':gallery },
	                 success:function(data){
	                 	$(".releted-items").html(data);
	                 },error:function(data){
	                 	console.log(data);
	                 }
	            });
			  }
			  loadtbul(v1,v2);
			  // qunntity function

			  $("#demoInput").on("keyup",function(){
			  	alert($(this).val())
			  });
               // AddtoCard function
               $("#AddtoCard").on("click",function(){
                  var pro_id=$("#pro_id").val();
                  var proname=$("#pro_name").text();
                  var pro_price=$("#pro_price").text();
                  var u_id=$("#user_id").val();
                  var gallery_f=$("#gallery_f").val();
                  $.ajax({
                  	url:'{{URL::to("AddtoCard")}}',
                  	type:"post",
                  	data:{"_token": "{{ csrf_token() }}",'pr_id':pro_id,'user':u_id,'prname':proname,'gallery':gallery_f,'price':pro_price},
                  	success:function(result){
                     $("#alert").text('Inserted');
                  	},error:function(result){
                  		console.log(result);
                  	}

                  })
               });
                // open cart tables

                $('#AddtoCard').on('click',function(){
                       $.ajax({
                       	url:'{{URL::to("cartable")}}',
                       	type:"post",
                       	data:{'userid':$("#user_id").val(),"_token": "{{ csrf_token() }}"},
                       	success:function(result)
                       	{
                       		$("#cart-item").show();
                       		$("#cart-item tbody").html(result);
                       	},error:function(result)
                       	{
                       		console.log(result);
                       	}
                       }); 	
                })
                $(document).on("click",".del-btn",function () {
	              var id=$(this).data('id');
	              var element=this;
	                  $.ajax({
	                       url:"{{URL::to('Deletecarditem')}}",
	                       type:"POST",
	                       data:{"dme":id,"_token": "{{ csrf_token() }}"},  
	                       success:function (data) {
	                          $(element).closest("tr").fadeOut();
	                       },error:function(data){
	                        console.log(data)
	                      }
	                    });
                });
               $("#bynow").click(function(e){
				e.preventDefault();
				<?php if(session()->has('user')=='')
			          {
			          	?>
                        $("#model").show();
			      <?php 
			  }else{
			  	?>
			            window.location=$("#bynow").attr('href');
			            
			      <?php 
				  }
				   ?>
				});
                     $(document).ready(function () {
		                    $("#clos-btn2").on("click",function() {
		                    $("#model").hide();  
	                       });
	                    });
		                 // call the login route

		     $("#submit_login_item").on("click",function(e) {
		             e.preventDefault();
			       var email=$("#emaillog_item").val();
			       var pass=$("#passwordlog_item").val();
			       var loc="{{request()->get('referer')}}";
			       $.ajax({
			          url:"{{URL::to('login')}}",
			          type:"post",
			          data:{emails:email,password:pass,
			          _token:'{{ csrf_token() }}'},
			          cache: false,
			          dataType: 'json',
			          success:function(result)
			          {
			            if(result.success)
			            {
			              window.location=loc;
			              // $('#id1').hide();
			             }else{
			              alert(result.error)
			            }
			          },error:function(error) {
		            console.log(error);
		          }
		       });
		     });
		     $("#item_de_reg").hide();
		     $("#submit_register_open").on("click",function(e){
		     	e.preventDefault();
                $("#item_de_log").hide();
		     	$("#item_de_reg").show();
		     });
		     // end call the login route
		     $("#submit_item_register").on("click",function(e) {
			       e.preventDefault();
			       var name=$("#namereg_item").val();
			       var email=$("#emailreg_item").val();
			       var pass=$("#passwordreg_item").val();
			       if(name || email || pass!==''){
			          $.ajax({
			          url:"{{URL::to('resistration')}}",
			          type:"post",
			          data:{names:name,emails:email,password:pass,
			          _token:'{{ csrf_token() }}'},
			          success:function(result)
			          {
			            if(result.success)
			            {
			                $("#item_de_log").show();
             		     	$("#item_de_reg").hide();          
			            }else{
			              alert(result.error)
			            }
			          },error:function(error) {
			            console.log(error);
			          }
			        });	
			       }else{
			       	alert("emapty field");
			       }
			       
			     });  
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
            } );//clode akhnowmus function 
		       
          			</script>
@endsection
