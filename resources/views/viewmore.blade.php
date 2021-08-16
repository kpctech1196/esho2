<?php 
use Illuminate\Support\Arr;
?>
@extends('index')
@section('viewmore')
<div class="row" style="margin: 5px;padding: auto;">
<span class="managtext">	 {{ $prodata->first()->category }}</span>
<p id="alert"></p>
</div>
<div class="row">
	    <div class="col-sm-2 bg-light">
	    	<div class="infobox">
	    	<ul>
	    		<span>User Information</span>
    		<?php 
		         if(session()->has('user'))
				{
					$user=session()->get('user');
					if($user->image=='')
					{
						$Firstlettor=$user->name;
						echo '<li>'.$Firstlettor[0].' '.$user->name.'</li>';
					}
					else{
		                 echo "<li>".$user->name."<img src=".asset('assets/img/users/kp.jpg')."></li>";
					}
					echo "<li>".$user->email."</li>";
		 	    }
		    ?>
            
         </ul>
    	</div>
    </div>
    <div class="col-sm-9 bg-light" id="items" style="border: 4px solid#7d828a;overflow: scroll;height: 700px; ">
    	<ul class="moreitem">
			 @foreach($prodata as $item)
		      	<li>
		      		<div class="card" style="width: 18rem;">
				  <img src="{{$item->gallery}}" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">{{$item->name}}</h5>
				    <h5 class="cart-text">{{$item->price}}</h5>
				    <a id="bynow" href="{{URL::to('itmedetails')}}/{{$item->id}}" class="btn btn-primary">BuyNow</a>
				    <?php if(session()->has('user'))
						      		{
						      			echo '<button class="btn btn-warning" data-id="'.$item->id.'" id="AddtoCard" >AddtoCard</button>';
 						      		}?>
				  </div>
				</div>
		      	</li>
			 @endforeach
		</ul>
		@if(session()->has('user'))
		<input type="hidden" id="user_id" value="{{session()->get('user')->id}}">
		@endif
	</div>
	<script>
		$(function(){
			$("alert").hide();
			$("#bynow").click(function(e){
				e.preventDefault();
				<?php if(session()->has('user')=='')
			          {
			          	?>
			           alert('please signin');
			      <?php 
			  }else{
			  	?>
			            window.location=$("#bynow").attr('href');
			            
			      <?php 
			  }
			   ?>
			});
			$(document).on("click","#AddtoCard",function(){

                  var pro_id=$(this).data('id');
                  var u_id=$("#user_id").val();
                  $.ajax({
                  	url:'{{URL::to("AddtoCardview")}}',
                  	type:"get",
                  	data:{'pr_id':pro_id,'user':u_id},
                  	success:function(result){
                  		$("#alert").show();
                     $("#alert").text('Added Your card');
                  	},error:function(result){
                  		console.log(result);
                  	}

                  })
               });
               
		})
	</script>
</div>
@endsection