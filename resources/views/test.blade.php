<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<script src="{{asset('assets/js/local.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<input type="text" value="1" id="idu" name="">
<p id="val"></p>
<p id="val2"></p>
<table class="table table-bordered">
<thead>
            <tr>
            <th>1</th>
            <th>Price</th>
            </tr>
            </thead>
            <tbody>

            <tr>
              <td>1</td>
              <td id="loop">50</td>
            </tr>

            <tr>
              <td>1</td>
              <td id="loop">160</td>
            </tr>

            <tr>
              <td>1</td>
              <td id="loop">70</td>
            </tr>

            </tbody>

            <tbody>
            <tr>
               <td class="text-right">Total</td>
               <td id="total"></td>
            </tr>

            </tbody>
            </table>
            @if(isset($details['title']))
            <h1>{{$details['title']}}</h1>
            <h1>{{$details['uname']}}</h1>

            <h1>{{$details['lname']}}</h1>
            <h1>{{$details['body']}}</h1>
            @endif
            
            <button id="sendmail">Send</a></button>
</div>
</div>
</div>


<script type="text/javascript">
    $(function() {

       var TotalValue = 0;

       $("tr #loop").each(function(index,value){
         currentRow = parseFloat($(this).text());
         TotalValue += currentRow
       });

       $('#total').text(TotalValue);

});
</script>


<script>
	$(document).ready(function(){
		var uid=$("#idu").val();
		// alert(uid)
		$.ajax({
         url:'{{URL::to("ajaxsession")}}',
         type:'get',
         data:{'id':uid},
         success:function(result){
          sessionStorage.setItem('sname',JSON.stringify(result));
         },error:function(result){
         	console.log(result);
         }
		});
		if(sessionStorage.getItem('sname')==null)
		{
			$("#val").text('this is not logedin');
		}else{
			$("#val").text('this is logedin');
		}
	   console.log(JSON.parse(sessionStorage.getItem('sname')));
	   <?php if(session()->has('user')=='')
	   {
	      ?> $("#val2").text('logedin not');
	      <?php
	   }else{
	   	?> $("#val2").text('logedin komal razz');
	      <?php
	      	   } ?>

	})
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