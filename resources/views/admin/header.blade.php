<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">APE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Insert <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Ordersadmin">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="insertdata-btn"  >Insertitem</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="stockmanag">Stockmanage</a>
      </li>         
      <li class="nav-item">
        <a class="nav-link" id="user_nav_update" href="#">Pricing</a>
      </li>
       <?php if(session()->has('user'))
               {
                    $name=session()->get('user');        
                    $Firstlettor=$name->name;
                    $logout=URL::to('adminlogout');
                    $admin_account=URL::to('admin_account');
                   if($name->image=='')
                    {
                      echo'<li class="nav-item dropdown " style="margin-left:600px;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span style="padding:5px; border-radius: 50%;background-color:white;color:gray;text-align:center;">'.$Firstlettor[0].'</span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="'.$admin_account.'">Profile</a>
                    <a class="dropdown-item" id="logout" href="'.$logout.'">Logout</a>
                  </div>
                </li>';
          
                    }
                    else
                    {
                      echo'<li class="nav-item dropdown " style="margin-left: 800px;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{asset("assets/img/users/kp.jpg")}}">
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" id="logout" href="">Logout</a>
                  </div>
                </li>';
                    }        
               }else{
                echo'<li class="nav-item"style="margin-left: 800px;"><button  class="btn btn-primary nav-link " onclick="openform()">Login</button> </li>';
               }
         ?>            
      
    </ul>
  </div>
</nav>
</header>
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
      <input type="submit" name="submit" id="submit_login" style="margin:10px;width: 108px;" class="btn btn-primary" value="login"><br>
    </form>
    <button onclick="open_Reg()"style="margin-left:8px; " class="btn btn-primary">Registration</button>
</div>
<!-- login form open script -->
<div class="popup_form" style="" id="id2">
    <form id="myForm"> 
              <div id="clos-btn" class="clos-btnid2"><<</div>
      <h2>User Registration </h2>    
      <input type="text" name="name" id="name_reg"  placeholder="enter your Name" required=""> <br>
      <input type="email" name="email" id="email_reg"  placeholder="enter your email"> <br>
      <input type="password" name="password" id="password_reg"  placeholder="enter your password"><br>
      <input type="submit" id="submit_reg" value="Registration" style="margin-left:50px;" class="btn btn-primary" >
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
      <input type="submit" name="submit" id="change_password" value="chang" style="margin-left:50px;" class="btn btn-primary" >
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
       $('#insertdata').on('click',function(){
        $('#insertda').show();
       })
    // call the login route

     $("#submit_login").on("click",function(e) {
       e.preventDefault();
       var email=$("#emaillog").val();
       var pass=$("#passwordlog").val();
       $.ajax({
          url:"login",
          type:"post",
          data:{emails:email,password:pass,
          _token:'{{ csrf_token() }}'},
          cache: false,
          dataType: 'json',
          success:function(result)
          {
            if(result.success)
            {
           $("nav").load(location.href + " nav>*", "");
              alert(result.yes)
              document.getElementById('id1').style.display = 'none';
              // $("nav").reload('nav');
            }else{
              alert(result.error)
            }
          },error:function(error) {
            console.log(error);
          }
       });
     });
     // end call the login route

      // logout funtion 
      // $("#logout").on("click",function(e){
      //    e.preventDefault();
      //    $.ajax({
      //     url:'userslogout',
      //     type:"get",
      //     dataType:"json",
      //     success:function(result){
      //      if(result.success)
      //      {
      //       $("nav").load(location.href + " nav>*", "");
      //      }
      //     }
      //    });
      // });
    //end logout block
     // start the resistration form table

     $("#submit_reg").on("click",function(e) {
       e.preventDefault();
       var name=$("#name_reg").val();
       var email=$("#email_reg").val();
       var pass=$("#password_reg").val();
       alert(pass)
       $.ajax({
          url:"resistration",
          type:"post",
          data:{names:name,emails:email,password:pass,
          _token:'{{ csrf_token() }}'},
          cache: true,
          dataType: 'json',
          success:function(result)
          {
            if(result.success)
            {
                document.getElementById('id2').style.display = 'none';
              alert(result.yes)
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
          url:"userchangpassword",
          type:"post",
          data:{emails:email,password:pass_old,newpass:pass,
          _token:'{{ csrf_token() }}'},
          cache: true,
          dataType: 'json',
          success:function(result)
          {
            if(result.success)
            {
                document.getElementById('id3').style.display = 'none';
              alert(result.yes)
            }else{
              alert(result.error)
            }
          },error:function(error) {
            console.log(error);
          }
       });
     });    


    //start forget password block
  
</script>
