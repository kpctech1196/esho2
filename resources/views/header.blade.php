<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">NK</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <form class="d-flex form-group col-md-7" style="margin-top: 18px;margin-left: 150px;">
      <input class="form-control"  id="autocomplete" type="text" autocomplete="off" placeholder="Search Your Products" aria-label="Search">
      <input type="submit" id="submit_input" value="Search">
      <div id="autocompletebox"></div>
    </form>
       <?php if(session()->has('user'))
               {
                    $name=session()->get('user');   
                    $profile_url=URL::to('useraccount');    
                    $logout=URL::to('userslogout'); 
                    $cardrout=URL::to('mycart');
                    $Firstlettor=$name->name;
                   if($name->image=='')
                    {
                          	echo'<li class="nav-item">
                            <a id="" href="'.$cardrout.'/'.$name->id.'" class="nav-link">
                            <i class="fa fa-shopping-cart" style="width:10px;height:20px;color: white;margin-left:350px;" aria-hidden="true">My Cart</i></a></li>
                            <li class="nav-item dropdown " style="margin-left:30px;">
      					        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      					                <span style="padding:5px; border-radius: 50%;background-color:white;color:gray;text-align:center;">'.$Firstlettor[0].'</span>
      					        </a>
      					        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      					          <a class="dropdown-item" href="#">Action</a>
      					          <a class="dropdown-item" href="'.$profile_url.'">Your Profile</a>
      					          <a class="dropdown-item" href="'.$logout.'">Logout</a>
      					        </div>
      					      </li>';		
                    }
                    else
                    {
                      echo'<li class="nav-item dropdown " style="margin-left:450px;">
					        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					        <img src="'.$name->image.'" style="width:30px;height:30px;border-radius:50%;">
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					          <a class="dropdown-item" href="#">Action</a>
					          <a class="dropdown-item" href="'.$profile_url.'">Your Profile</a>
                    <a class="dropdown-item" href="'.$logout.'">Logout</a>
					        </div>
					      </li>';
                    }        
               }else{
               	echo'<li class="nav-item"style="margin-left:400px;"><button  class="btn btn-primary nav-link " onclick="openform()">Login</button> </li>';
               }
         ?>            
      <span id="formalert">komal</span>
    </ul>
  </div>
</nav>
</header>
<div id="test"></div>
 <!-- model form  -->
 <div class="model">
    	<div class="model-form">
    		<div id="clos-btn">X</div>
    		<form  method="post" >
                  <h2>User Login </h2>
			      <span>Email:</span>
			      <input type="email" class="form-control" name="email"  placeholder="enter your email"> <br>
			      <span>Password:</span>
			      <input type="password"  class="form-control" name="password"  placeholder="enter your password"><br>
			      <input type="submit" name="submit" style="margin:10px;width: 108px;" class="btn btn-primary" value="login"><br>
    		</form>
    	</div>
    </div>
    

<div class="popup_form"   id="id1">
    <form id="myForm1" >
    	    		<div id="clos-btn" class="clos-btnid1">X</div>
      <h2>User Login </h2>
      <span>Email</span>
      <input type="email" name="email" id="emaillog" placeholder="enter your email">
       <span class="text-danger error-text email_error"></span> 
       <br>
      <span>Password    <a style="margin-left:60px;"  onclick="open_password();return false;" href="">Forgot</a></span>
      <input type="password" name="password" id="passwordlog"  placeholder="enter your password">
      <span class="text-danger error-text password_error"></span>
      <br>
      <input type="submit" name="submit" id="submit_login"class="btn btn-primary" value="login"><br>
    </form>
    <button onclick="open_Reg()" class="btn btn-primary">Registration</button>
</div>
<!-- login form open script -->
<div class="popup_form" style="" id="id2">
    <form id="myForm"> 
    	    		<div id="clos-btn" class="clos-btnid2"><<</div>
      <h2>User Registration </h2>    
      <input type="text" name="name" id="name_reg"  placeholder="enter your Name" required=""> <br>
      <input type="email" name="email" id="email_reg"  placeholder="enter your email"> <br>
      <input type="password" name="password" id="password_reg"  placeholder="enter your password"><br>
      <input type="submit" id="submit_reg" value="Registration"  class="btn btn-primary" >
      <p style="font-size: 12px;">By continuing, you agree to Shopnow<a href=""> Terms</a> of Use and Privacy <a href="" >Policy.</a></p>
    </form>
</div>
<!-- change password form open script -->
<div class="popup_form" style="" id="id3">
    <form  id="myFormpassword" > 
    	    		<div id="clos-btn" class="clos-btnid3"><<</div>
      <h2>change password </h2>   
      <input type="email" name="email" id="email_for"  placeholder="enter your email"> <br>
      <input type="password" name="password" id="password_for"  placeholder="enter your new password"><br>
      <input type="password" name=" passwordnew" id="password_for_new"  placeholder="enter your new password"><br>
      <input type="submit" name="submit" id="change_password" value="chang"  class="btn btn-primary" >
      <p style="font-size: 12px;">By continuing, you agree to Shopnow<a href=""> Terms</a> of Use and Privacy <a href="" >Policy.</a></p>
    </form>
</div>

<script>
    // open button for all popup_form block

    function openform() {
      document.getElementById("myForm1").reset();
      document.getElementById('id1').style.display = 'block';
    }
    function open_Reg() {
     document.getElementById("myForm").reset();
      document.getElementById('id2').style.display = 'block';
    }
    function open_password() {
     document.getElementById("myFormpassword").reset();
      document.getElementById('id3').style.display = 'block';
    }


    // close button for all popup_form block


    	
      $(".clos-btnid1").on("click",function() {
    	$("#id1").hide();
    	 });
      $(".clos-btnid2").on("click",function() {
    	$("#id2").hide();
    	 });
      $(".clos-btnid3").on("click",function() {
    	$("#id3").hide();
    	 });
            // setTimeout(function(){ $(".model").show(); }, 30000);

    // call the login route

     $("#submit_login").on("click",function(e) {
       e.preventDefault();
       var email=$("#emaillog").val();
       var pass=$("#passwordlog").val();
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
     // end call the login route
     // start the resistration form table

     $("#submit_reg").on("click",function(e) {
       e.preventDefault();
       var name=$("#name_reg").val();
       var email=$("#email_reg").val();
       var pass=$("#password_reg").val();
       $.ajax({
          url:"{{URL::to('resistration')}}",
          type:"post",
          data:{names:name,emails:email,password:pass,
          _token:'{{ csrf_token() }}'},
          success:function(result)
          {
            if(result.success)
            {
                document.getElementById('id2').style.display = 'none';
              $("#formalert").show();
              $("#formalert").text(result.yes);
              $("#formalert").hide(9000);
              
            }else{
              alert(result.error)
            }
          },error:function(error) {
            console.log(error);
          }
       });
     });  
     // end the Registration form block
   
    //start forget password block
    
      
     $("#change_password").on("click",function(e) {
       e.preventDefault();
       var email=$("#email_for").val();
       var pass_old=$("#password_for").val();
       var pass=$("#password_for_new").val();
       $.ajax({
          url:"{{URL::to('userchangpassword')}}",
          type:"post",
          data:{emails:email,password:pass_old,newpass:pass,
          _token:'{{ csrf_token() }}'},
          success:function(result)
          {
            if(result.success)
            {
                document.getElementById('id3').style.display = 'none';
              $("#formalert").show();
              $("#formalert").text(result.yes);
              $("#formalert").hide(9000);
              
            }else{
              alert(result.error)
            }
          },error:function(error) {
            console.log(error);
          }
       });
     });    


    //start forget password block
   //autocomplete box
   $("#autocomplete").on("keyup",function() {
    var text=$(this).val();
     if(text!='')
     {
      $.ajax({
         url:"{{URL::to('autocompletebox')}}",
         type:"get",
         data:{atext:text},
         success:function(data){
          $("#autocompletebox").fadeIn("fast").html(data);
         },error:function(result){
          console.log(result);
         }
      });
     }else{
         $("#autocompletebox").fadeOut("fast");
     }
   });
   $(document).on("click","#autocompletebox li",function() {
    $("#autocomplete").val($(this).text());
          var page=$(this).text();
         $("#autocompletebox").fadeOut("fast");
         window.location="http://localhost:8000/viewmore/"+page;
   });
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });  
    
</script>
