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
    $(document).ready(function() {
    	// setTimeout(function(){ $(".model").show(); }, 10000);

    });

    // close button for all popup_form block


    $(document).ready(function() {
      $("#clos-btn").on("click",function() {
    	$(".model").hide();
    	 });
      $(".clos-btnid1").on("click",function() {
    	$("#id1").hide();
    	 });
      $(".clos-btnid2").on("click",function() {
    	$("#id2").hide();
    	 });
      $(".clos-btnid3").on("click",function() {
    	$("#id3").hide();
    	 });
    });

   $(document).ready(function() {

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
      $("#logout").on("click",function(e){
         e.preventDefault();
         $.ajax({
          url:'userslogout',
          type:"get",
          dataType:"json",
          success:function(result){
           if(result.success)
           {
            $("nav").load(location.href + " nav>*", "");
           }
          }
         });
      });
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
   });