
<html>
<head>
<meta name="_token" content="{{ csrf_token() }}">
<title>Range</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
</head>
<body>
<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Products info </h3>
				</div>
			<div class="panel-body">
			<div class="form-group">
				<input type="text" class="form-controller" id="search" name="search"></input>
			</div>
			<table class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Description</th>
					<th>Price</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<p id="p"></p>
			<p>
		  <label for="amount">Price range:</label>
		  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
		</p>
		 
		<div id="slider-range"></div>
		 
		</div>
	</div>
</div>
</div>
<script type="text/javascript">

         $( function() {
         	var v1=10;
         	var v2=15;
		    $( "#slider-range" ).slider({
		      range: true,
		      min: 0,
		      max: 15000,
		      values: [ v1, v2 ],
		      slide: function( event, ui ) {
		        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		           v1=ui.values[0];
					v2=ui.values[1];
					loadtbul(v1,v2);
		      }
		    });
		    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		 
		  function loadtbul($val1,$val2){
            $.ajax({
                 type:'get',
                 url:'{{URL::to("rangslider")}}',
                 data:{'valr1':$val1,'valr2':$val2},
                 success:function(data){
                 	$("#p").html(data);
                 },error:function(data){
                 	console.log(data);
                 }
            });
		  }
		  loadtbul(v1,v2);





		  } );
          
	// 	$('#search').on('keyup',function(){
	// 		$value=$(this).val();
	// 		$.ajax({
	// 		type : 'get',
	// 		url : '{{URL::to('rangslider')}}',
	// 		data:{'val1':$value,'val2'},
	// 		success:function(data){
	// 		$('tbody').html(data);
	// 		},error:function(data){
	// 			console.log(data);
	// 		}
	// 		});
	// })
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
</body>
</html>