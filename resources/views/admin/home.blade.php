@extends('admin.index')
@section('user_profile')
<div >
	<?php $name=session()->get('user'); ?>
  <div class="row gx-1">
    <div class="col col-3">
    	<div style="height:80px;width: 250px;margin:20px;" class="p-3 border bg-light">
    	<img src="{{asset('assets/img/users')}}/{{$name->image}}" class="avatar" alt="Avatar">Hello,<b>{{$name->name}}</b>  
    	</div>
        <div style="height:500px;width: 250px;margin:20px;" class="p-3 border bg-light">
           <i class="material-icons">add_shopping_cart</i>
           <b style="float: right;">MY ORDERS</b>
             <div class="dropdown-divider"></div>
           <i class="material-icons">assignment_ind</i>
       </div>
    	<div style="height:50px;width: 250px;margin:20px;" class="p-3 border bg-light"><i class="material-icons">power_settings_new</i><b><a href="" style="float: right;">Logout</a></b></div>
    </div>
    <div class="col ">
      <div  style="height:990px;width:900px;margin: 20px;" class="p-3 border bg-light">
      	  <h5>Personal Information</h5>
      	  <br><br>
      	     <!-- Avtar change box -->
             <img src="{{asset('assets/img/users')}}/{{$name->image}}" style="vertical-align: middle;margin-bottom:45px; width: 100px;height: 100px;border-radius: 50%;"alt="Avatar">
                  <form action="change_img" method="post">
                  	@csrf
                  	<input type='file' id="getFile" onclick="my()" name="img"> 
                  	<input type="hidden" name="id" value="{{$name->id}}">
                    <button type="submit" class="btn btn-primary" id="sub" style="display: none;" >Change</button>
                   </form> 
            <form action="kom.html" method="post">
		       	      @csrf
		              <?php if(session()->has('user'))
		              {
		                  echo '<input type="type"style="height:40px" name="name" disabled="" id="id1"  value="'.$name->name.'">
		                      <input type="email" style="height:40px" name="email" disabled="" id="id2" value="'.$name->email.'" >'; 
		             }else{
		             	echo '<a href="adminlogin">Login</a>';
		             }
		             ?>
		             <br><br>
		             <h5>Email Addresh</h5>
		             <input type="email" value="{{$name->email}}" disabled="" name=""><a style="margin: 25px;" href="">Edit</a><a href=""  onclick="open_password();return false;">chang password</a>
		             <br><br>
		             <h5>Mobile No</h5>
		             <input type="text" value="Mobile Number" disabled="" name=""><a style="margin: 25px;" href="">Edit</a><a href=""  onclick="open_password();return false;">chang password</a>
		             <br><br>
		             <p>
		             	<b style="height: 40px;">FAQs</b>
				 <p><b style="height: 25px;">	What happens when I update my email address (or mobile number)?</b></p>
					Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).
                    <p><b style="height: 25px;">
					When will my Shopnow account be updated with the new email address (or mobile number)?</b></p>
					It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.
                    <p><b style="height: 25px;">
					What happens to my existing Shopnow account when I update my email address (or mobile number)?</b></p>
					Updating your email address (or mobile number) doesn't invalidate your account. Your account remains fully functional. You'll continue seeing your Order history, saved information and personal details.
             <p><b><a href="Deactivate/{{$name->id}}">Deactivate Account</a></b></p>
       </form>
         <img src="{{asset('assets/img/blog/footer.png')}}">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	function enable()
	 {
	 	 document.getElementById("id1").disabled = true;
	 	 	 document.getElementById("id3").disabled = true;
	 	 document.getElementById("id2").disabled = false;
         window.alert();
	 }
	 function someFunction() {
	 	document.getElementById('c_img_an').style.display="none";
	 	document.getElementById('c_img_form').style.display="block";
	 }
	 function my() {
	 	 document.getElementById('getFile').style.display='none';
	 	setTimeout(function(){document.getElementById('sub').style.display='block'; }, 3000);
	 }
</script>
@endsection



@section('exeperiment')
<?php  
  
  $str=$name->name;
 echo '<h5 style="height: 32px;width: 32px;border-radius: 50%;background-color:red;text-align: center;">'.$str[0].'</h5> ';






?>
@endsection
<style type="text/css">
	.p
	{
		text-align: center;
	}

</style>