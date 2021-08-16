@extends('index')
@section('cart')
<div class="container">
	<div class="row">
			<div class="card" style="width: 100%;">
			  <div class="card-header">
			  	@if(session()->has('user'))
                 {{session()->get('user')->name}} Your Card Items..
                <input type="hidden" id="userin" value="{{session()->get('user')->id}}" name="">
			  	@endif
			  </div>
			  <div class="card-body" >
                 <div class="getab" style="display: none;">
                 </div>
                 <table class="table">
                 	<thead><tr><th>#</th><th>Title</th><th>Price</th><th>Quantity</th><th>Delete</th></tr></thead>
	                 <span style="display: none;">{{$i=0}}</span>
	                 @foreach($cartitem as $value)
	                   <tr>
	                   	<td>{{$i++}}</td><td>{{$value->name}}</td>
	                   	<td id="loop">{{$value->price}}</td>
	                   	<th><input type="number" id="quantity"  min="1" max="4"></th>
	                   	<th><i class="fa fa-trash del-btn" data-id="{{$value->product_id}}"></i></th>
	                   </tr>
	                 @endforeach  
	                 <tr><td colspan="2" class="totald">Total Amount</td><td id="Totalamt"></td></tr>
                </table>
                 <a id="bynowcard" class="btn btn-primary">BuyNow</a>
			  </div>
			</div>
			<p id="what"></p>
	</div>
	<div class="row">
		<div class="card" style="width: 100%;">
			  <div class="card-header">
			    Suggestion Products..
			  </div>
			  <div class="card-body">
			    <ul class="moreitem">
			 @foreach($allproduct as $item)
		      	<li>
		      		<div class="card" style="width: 18rem;">
				  <img src="{{$item->gallery}}" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">{{$item->name}}</h5>
				    <h5 class="cart-text">{{$item->price}}</h5>
				    <a id="bynow" href="{{URL::to('checkout')}}/{{$item->id}}" class="btn btn-primary">BuyNow</a>
				    <?php if(session()->has('user'))
						      		{
						      			echo '<button class="btn btn-warning" data-id="'.$item->id.'" id="AddtoCardmyc" >AddtoCard</button>';
 						      		}?>
				  </div>
				</div>
		      	</li>
			 @endforeach
		</ul>
			  </div>
			</div>
	</div>
</div>
<style type="text/css">
	#Totalamt{
		font-weight: 800;
		color: gray;
		font-size: 25px;
	}
	.totald{
	      font-weight: 800;
		color: gray;
		font-size: 25px;	
	}
</style>
    <script>
   
    	$(function() {
    		function loadcartitem(){
    			var uit=$("#userin").val();
    	    $.ajax({
    	    	type:"get",
    	    	url:'{{URL::to("loadcart")}}',
    	    	data:{'uid':uit},
    	    	success:function(result){
    	    		$(".getable").html(result);
    	    	},error:function(result){
    	    		console.log(result);
    	    	}
    	    });
    		}
                  loadcartitem();
                  $(document).on("click",'#quantity',function(){
                       var id=$(this).val();
                  });
    	function amount()
    	{      
    		   var TotalValue = 0;
					$("tr #loop").each(function(index,value){
					currentRow = parseFloat($(this).text());
					TotalValue += currentRow
					});
                $('#Totalamt').text(TotalValue); 
                // alert(TotalValue) ;   	

    	}  amount();
            
         $(document).on("click","#AddtoCardmyc",function(){
                  var pro_id=$(this).data('id');
                  // alert(pro_id)
                  var u_id=$("#userin").val();
                  $.ajax({
                  	url:'{{URL::to("AddtoCard_mycard")}}',
                  	type:"get",
                  	data:{'pr_id':pro_id,'user':u_id},
                  	success:function(result){
                  		$("#alert").show();
                        $("#alert").text('Added Your card');
                     loadcartitem();
                  	},error:function(result){
                  		console.log(result);
                  	}

                  })
               });
    	 $("#del").on("click",function(){
    	 	alert()
    	 })
    	  $(document).on("click",".del-btn",function () {
	              var id=$(this).data('id');
	              var element=this;
	                  $.ajax({
	                       url:"{{URL::to('Deletecarditem')}}",
	                       type:"post",
	                       data:{"dme":id,"_token":"{{ csrf_token() }}"},  
	                       success:function (data) {
	                          $(element).closest("tr").fadeOut();
	                          loadcartitem();
	                       },error:function(data){
	                        console.log(data)
	                      }
	                    });
                });
        })       
         $("#bynowcard").on("click",function(){
               var tot=$("#Totalamt").text();
               alert()
         });

        // $("#bynowcard").on('click',function(){
        //       var total=$("#Totalamt").text();
        //       var qu=$("#quantity").val();
        //       alert(qu)
        // });
        // $(document).on("keyup",'.quantity',function(){
        //       var q=$(this).val();
        //       var tot=$("#Totalamt").text();

        //       var grandtot=tot+q;
        //       alert(grandtot)
        // })
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
	            }
	        });

	      </script>
@endsection