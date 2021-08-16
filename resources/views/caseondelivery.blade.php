@extends('index')
@section('caseondelivery')
<div class="container">
	<div class="row">
		<img src="{{asset('assets/img/blog/gift.png')}}" height="100" width="100">
		<p style="font-size:25px;color:#43a6f7;font-weight: 600; ">
			Your Oder Placed <i class="fa fa-inr" aria-hidden="true"></i>{{$amt}}!
		</p>
		<p><br>Your 1 item will be delivered within 5 days <br> Today is:-<?php echo date("Y/m/d"); ?></p>
	</div>
	<div class="row" style="margin-top:5px;">
		<div class="col-4">
			<span style="font-size: 20px;font-weight: 500;">Delivery Addresh</span>
			@if(session()->has('user'))
			<p>{{session()->get('user')->name}}<br>{{session()->get('user')->addresh}}</p>
			<span style="font-size: 20px;font-weight: 500;">Mobile No</span>
			<input type="hidden" id="user_id" value="{{session()->get('user')->id}}">
			<p>{{session()->get('user')->contactNo}}</p>
			@endif
		</div>
		<div class="col-4">
			<span style="font-size: 20px;font-weight: 500;">Your Reword</span>
			<p>No valid </p>
		</div>
		<div class="col-4">
			<span style="font-size: 20px;font-weight: 500;">Your OrderId</span>
			<p id="ordreid"><?php echo rand();?> </p>
			<span style="font-size: 20px;font-weight: 500;">Payment Mode</span>
			<p>{{$pay_m}}</p>
		</div>
	</div>
	<div class="row" style="margin-top:5px;">
		<div class="col-4">
			<img src="{{$pro_detail['gallery']}}" style="height: 100px;width: 100px;">
			<span style="font-size: 20px;font-weight: 500;">{{$pro_detail['name']}}</span>
			<p>{{$pro_detail['description']}}</p>
		</div>
		<div class="col-4">
			<span style="font-size: 20px;font-weight: 500;">Delivery</span>
			<p><i class="fa fa-bus"></i>Delivery expected by 5 days </p>
		</div>
		<div class="col-4">
			<span style="font-size: 20px;font-weight: 500;"><i class="fa fa-inr"></i>{{$amt}}</span>			
		</div>
	</div>
	<div class="row" style="margin-top: 5px;">
				<div class="card" style="width: 100%;">
					<div class="card-header">Suggestions based on your order</div>
		            <div class="card-body">
		            	@if(isset($details['title']))
				            <h4>{{$details['title']}}</h4>
				             <h4>{{$details['body']}}</h4>
				            <h4>{{$details['uname']}}</h4>
				             <h4>{{$details['lname']}}</h4>
				        @endif				            
		            </div>
</div>
	</div>

</div>
<script>
	$(function(){
      function	confirmOrderd(){
         var userid=$("#user_id").val();
         var pro_id="{{$pro_detail['name']}}";
         var total_amt='{{$amt}}';
         var ordreid=$("#ordreid").text();
         var token="{{csrf_token()}}";
         $.ajax({
         	url:"{{URL::to('confirmOrderd')}}",
         	type:'post',
            data:{'_token':token,'od_id':ordreid,'p_id':pro_id,
            'u_id':userid,'total_amt':total_amt,'pay_m':"{{$pay_m}}"},
            success:function(result){

            },
            error:function(result){
            	console.log(result);
            }
         })
           $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
		}
		confirmOrderd();
	})
</script>
@endsection