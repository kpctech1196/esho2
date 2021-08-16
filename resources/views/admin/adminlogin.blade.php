
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <!-- Latest compiled and minified JavaScript -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/kp.css')}}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="adminbackground">
	<header class="header">
   	  <div class="container">
   	  	<div class="row justify-content-beetwin align-item-center ">
   	  		<div class="brand-name">
   	  			<a href="">Komal</a>
   	  		</div>
   	  		<nav class="nav">
   	  			<ul>
   	  				<li><a href="">Home</a></li>
   	  				<li><a href="">Service</a></li>
   	  				<li><a href="">About</a></li>
   	  				<li><a href="">Works</a></li>
   	  				<li><a href="">Contact</a></li>
   	  			</ul>
   	  		</nav>
   	  	</div>
   	  </div>
   </header>
   <div class=" form-box">
      	<form id="adminlogin">
      		<div class="divh">Admin LogIn Form</div>
      		<div class="imgcontainer">
      			<img src="{{asset('assets/img/blog/usericon.png')}}" class="avatar">
      		</div>
			  <div class="form-group">
			    <label>Email address</label>
			    <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Your Email" aria-describedby="emailHelp">
			    <small class="form-text text-muted text-white">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label >Password</label>
			    <input type="password" class="form-control" placeholder="Enter Your Password" id="InputPassword1">
			  </div>
			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" >
			    <label class="form-check-label">Check me out</label>
			  </div>
			  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
		  	  <button type="submit" id="submit_register_open" class="btn btn-primary">New Register</button>
		
		</form>
		<form id="adminregistration">
      		<div class="divh">Admin Registration</div>
      		<div class="imgcontainer">
      			<img src="{{asset('assets/img/blog/usericon.png')}}" class="avatar">
      		</div>
      		  <div class="form-group">
      		  	<label>Name</label>
      		  	<input type="text" id="newInputName" class="form-control" placeholder="Enter Name">
      		  </div>
			  <div class="form-group">
			    <label>Email address</label>
			    <input type="email" class="form-control" id="newInputEmail1" placeholder="Enter Your Email" aria-describedby="emailHelp">
			    <small  class="form-text text-muted text-white">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label >Password</label>
			    <input type="password" class="form-control" placeholder="Enter Your Password " id="newInputPassword1">
			  </div>
			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input">
			    <label class="form-check-label" >Check me out</label>
			  </div>
		  	  <button type="submit"  id="submit_register" class="btn btn-primary">New Register</button>
		
		</form>
    </div>
</body>
</html>


         <script type="text/javascript">
         	$(function () {
         		$("#submit").on('click',function(e){
         			e.preventDefault();	
         			var email=$("#InputEmail1").val();
         			var pass=$("#InputPassword1").val();
         			$.ajax({
         				url:"{{URL::to('adminloginmatch')}}",
         				type:"post",
         				data:{"email":email,"pass":pass,"_token":"{{ csrf_token() }}"},
         				success:function(result){
                        if(result.success==1)
                        {
                        	alert(result.yes)
                        	window.location="/admin";
                        }else{
                        	alert(result);
                        }
         				},error:function(result){
         					console.log(result);
         				}
         			});
         		});//close submit login
               $("#adminregistration").hide();
               $("#submit_register_open").on('click',function(e){
               	 e.preventDefault();
                 $("#adminlogin").hide();
               	 $("#adminregistration").show(); 
               });
               $("#submit_register").on("click",function(e){
                 // $("#adminlogin").hide();
                 e.preventDefault();
         			var name=$("#newInputName").val();
         			var Aemail=$("#newInputEmail1").val();
         			var Apass=$("#newInputPassword1").val();
         			// alert(Aemail)
         			$.ajax({
         				url:"{{URL::to('adminregistration')}}",
         				type:"post",
         				data:{"email":Aemail,"pass":Apass,"name":name,"_token":"{{ csrf_token() }}"},
         				success:function(result){
                        // alert(result)
                        if(result.error==0)
                        {
                        	alert(result.msg);
                        }else{
                        	alert(result);
                        	 $("#adminregistration").hide();
                             $("#adminlogin").show();
                        }
         				},error:function(result){
         					console.log(result);
         				}
         			});
               })//close regigstration 

         		$.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
         	})
         </script>