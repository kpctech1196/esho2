<!DOCTYPE html>
<html>
<head>
	<title>Email Confirmation</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<table style="background-color:#f1f1c1;border: 1px solid;">
      <thead><tr><th>Your Order Detailes</th></tr></thead>
            @if(isset($details['uname']))
            <tbody>
              <tr><td>ProductName</td><td>{{$details['p_name']}}</td></tr>
              <tr><td>Paid By</td><td>{{$details['uname']}}{{$details['lname']}}</td></tr>
              <tr><td>Payment Method</td><td>Cash On Delivery</td></tr>
              <tr><td>Order Date</td><td>{{ date("Y/m/d") }}</td></tr>
              <tr><td>Total Amount</td><td>{{$details['tot']}}</td></tr>
            </tbody>
            </table>
            @endif
            
            <button id="sendmail">Payment</a></button>
</div>
</div>
</div>


<script>
  $("#sendmail").on('click',function(){
     $.ajax({
      url:"sendmail",
      type:"get",
      data:{"name":"nanki","lname":"sahu"},
      success:function(result){
        alert("message is send");
      },error:function(result){
        alert("message is NOt send");
      }
     })
  })
</script>

</body>
</html>