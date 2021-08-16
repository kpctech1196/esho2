@extends('admin.index')
@section('order')
<div class="container">
	<div class="row">
		<table class="table">
          <thead><th colspan="5">Order Table</th></thead>
			<tr class="form-row">
				<td class="form-group">Search:-</td>
				<td class="form-group"><input type="text" id="Search_input" class="form-control"></td>
			</tr>
		</table>
	</div>
	<div class="row">
		<div class="table" id="table"></div>
		<div class="table" id="Searchtable"></div>
    </div>
</div>    
<script>
	$(function(){
		function orders()
		{
			var token="{{csrf_token()}}";
			$.ajax({
				url:"{{URL::to('Orders')}}",
				type:'get',
				success:function(result)
				{
					$("#table").html(result);
				},error:function(result){
					console.log(result);
				}
			})

          $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
	            }
            });
		}orders();

		$("#Search_input").on("keyup",function(){
			var searchtum=$(this).val();
			$.ajax({
				url:"{{URL::to('serchOrders')}}",
				type:"get",
                data:{'Search':searchtum},
                success:function(result){
                    $("#table").hide();
                    $("#Searchtable").html(result);
                },
                error:function(result){
                	console.log(result);
                }
			})
		})
	})
</script>
@endsection