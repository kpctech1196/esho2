@extends('index')
@section('bynow')
<div class="row">
	<div class="col-5">
          <div id="alert">items Detailes...</div>
			    <img src="{{$item['gallery']}}">
						      <table style="color: gray;font-weight: 500;">
						      	<tr><td>Name :-<span id="pro_name" >{{$item['name']}}</span></td></tr>
						      	<tr><td >category :- {{$item['category']}} </td></tr>
						      	<tr><td >Price :-<span id="pro_price" > {{$item['price']}}</span> </td></tr>
						      	<tr><td >Ratting :-
						      		<i class="fa fa-star" aria-hidden="true"></i>
						          	<i class="fa fa-star" aria-hidden="true"></i>
						          	<i class="fa fa-star" aria-hidden="true"></i>
						          	<i class="fa fa-star-half-o" aria-hidden="true"></i> </td></tr>
						      	<tr><td>MRP:-<s> {{$item['price']*1.5}}<s> </td></tr>
                                <tr><td>Total :-{{$item['price']}} </td></tr>
						        	</tr>
						      </table>			
	</div>
	<div class="col-5">
			
		<h3 style="background-color:#fcba03;color: white;">Orderd Summery</h3>
          <table class="table table-bordered">
          	<thead class="thead-dark"><th>Items</th><th>Price</th><th>Quantity</th></thead>
          	<tr>
          		<td><img  style="height:70px;width:70px;border-radius: 50%;" src="{{$item['gallery']}}"></td><td id="price">{{$item['price']}}</td><td>  <input type="number" id="Quant" min="1" max="50"></td>
          	</tr>
          	<tr><td>Total</td><td colspan="2" id="Total">{{$item['price']}}</td></tr>
          </table>
		</div>

</div>
<script>
	$(function(){
		$("#Quant").keyup(function(){
		  var quantity=$("#Quant").val();
		  var price=$("#price").text();
			$("#Total").text(quantity*price);
		})
	})
</script>
@endsection