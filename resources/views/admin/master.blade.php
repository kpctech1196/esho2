@extends('admin.index')
@section('dashbord')
<div class="row">
      <div class="col">
          <div class="box">
            Users Login
              <div class="fillcolor" id="userbox">
              <p>{{$loadtuser}}</p>
              <button class="btn-k" id="viewdetail">Viewdetail<i class="fa fa-arrow-up"></i></button> 
              <button class="btn-k" id="viewdetail-close">Viewdetail<i class="fa fa-arrow-down"></i></button> 
            
              </div>
          </div>
      </div>
      <div class="col">
            <div class="box">Total Orders
              <div class="fillcolor" id="orderbox">
                <p>{{$total_order}}</p>
               <button class="btn-k" id="totoders">Viewdetail<i class="fa fa-arrow-up"></i></button> 
              <button class="btn-k" id="totoders-close">Viewdetail<i class="fa fa-arrow-down"></i></button>     
              </div>
            </div>
      </div>
      <div class="col">
                  <div class="box">Available Products
                    <div class="fillcolor" id="availabe_color">
                      <p>{{$totproduct}}</p>
                     <button class="btn-k" id="avai_pro">Viewdetail<i class="fa fa-arrow-up"></i></button> 
                    <button class="btn-k" id="avai_pro-close">Viewdetail<i class="fa fa-arrow-down"></i></button>     
                    </div>
                  </div>
      </div>
      <div class="col">
                  <div class="box">User Feedback
                    <div class="fillcolor" id="availabe_color">
                      <p>{{$totproduct}}</p>
                     <button class="btn-k" id="oders">Viewdetail<i class="fa fa-arrow-up"></i></button> 
                    <button class="btn-k">Viewdetail<i class="fa fa-arrow-up"></i></button>     
                    </div>
                  </div>
      </div>
          
      <div class="col">
                  <div class="box">Visit Custmors
                    <div class="fillcolor" id="visit_C_color">
                      <p>70</p>
                     <button class="btn-k" id="oders">Viewdetail<i class="fa fa-arrow-up"></i></button> 
                    <button class="btn-k">Viewdetail<i class="fa fa-arrow-up"></i></button>     
                    </div>
                  </div>
      </div>
</div>
<div class="row" style="margin:5px;">
             <table class="table" id="userinfo">
              <thead class="thead-dark text-center"><th colspan="5">User Information</th></thead>
               <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">LastName</th>
                      <th scope="col">Email</th>
                      <th scope="col">Contact</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allusers as $value)
                    <tr>
                      <th scope="row">{{$i=0}}{{$i++}}</th>
                      <td>{{$value->name}}</td>
                      <td>{{$value->lname}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->contactNo}}</td>
                    </tr>
                    @endforeach
                  </tbody>
             </table>

  </div>
  <div class="row" style="margin: 5px;">
    
  </div>
  <div class="row" style="margin: 5px;">
     <div class="col">
        <div class="orderget">
       
         </div>
     </div> 
     <div class="col">
         <div class="andminproducts">
           
         </div>  
     </div>
     
  </div>
  <style type="text/css">

  .btn-k{
    padding: 2px 8px;
    background-color:#252edb;
    width: 100%;
    color: white;
    border: none;
    font-weight:400;
    /*position: ;*/
    position: absolute;
    bottom: 0;
    left:0;
  }
  .btn-k:hover{
    border: none;
    background-color: #2c35f5;
  }
  .animat_user:hover{
    background-color: green;

  }
  .box{
    height:100px;
    background-color: #2f35ba;
    animation: green 5s;
    margin: 10px;
    padding: 5px;
    text-align: center;
    font-weight: 600;
    color: white;
    font-size: 15px;
    border-radius: 5px 5px 5px 5px;
    position: relative;
    
  }
  .box .fillcolor{
    height: 75%;
    /*width: 100%;*/
    background-color: red;
    /*opacity: 0.5; */
  }
</style>
      <script type="text/javascript">
          $(function () {

            var widthlen = parseInt("{{$loadtuser}}");
            var user_w=(widthlen*5);
            var adorder=parseInt("{{$total_order}}");
            var to_order=(adorder*15);
            $("#userbox").animate({width:user_w},900);
            $("#orderbox").animate({width:to_order},900);
            $("#visit_C_color").animate({opacity:300},900); 
            // user info block
           $("#userinfo").hide();
           $("#viewdetail-close").hide();
           // $("#viewdetail .fa-arrow-up").hide();
           $("#viewdetail").on("click",function(){
              $("#userinfo").show();
              // $("#viewdetail-close .fa-arrow-down").show();
              $("#viewdetail").hide();
              $("#viewdetail-close").show();
           })
           $("#viewdetail-close").on("click",function(){
              $("#userinfo").hide();
              $("#viewdetail-close").hide();
              $("#viewdetail").show();
           });

           // availabe products
                    $("#avai_pro-close").hide();
                     $("#avai_pro").show();
           var width_avai=parseInt("{{$totproduct}}");
           $("#availabe_color").animate({width:width_avai},900);
           $("#avai_pro").on("click",function(){
               $.ajax({
                url:"{{URL::to('andminproducts')}}",
                type:"POST",
                data:{"_token":"{{ csrf_token() }}"},
                success:function(result){
                     $(".andminproducts").html(result);
                     $("#avai_pro").hide();
                     $("#avai_pro-close").show();
                },error:function(result){
                   console.log(result);
                }
               })
           });
           $("#avai_pro-close").on("click",function(){
               $(".andminproducts").hide();
               $("#avai_pro").show();
               // $("#avai_pro-close").show();
           });
           // orders row
           $("#totoders-close").hide();
           $("#totoders").on("click",function(){
               $.ajax({
                url:"{{URL::to('andmintotalorders')}}",
                type:"POST",
                data:{"_token":"{{ csrf_token() }}"},
                success:function(result){
                     $(".orderget").html(result);
                     $("#totoders").hide();
                     $("#totoders-close").show();
                },error:function(result){
                   console.log(result);
                }
               })
           });
           $("#totoders-close").on("click",function(){
                     $("#totoders").show();
                     $("#totoders-close").hide();
                     $(".orderget").hide();
           });
           // availabe products


           // close order table
           $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
          });//ankhnomus function
      </script>
  <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
  <script src="https://code.jscharting.com/2.9.0/jscharting.js"></script>
  <script src="{{asset('assets/js/jquery.easypiechart.min.js')}}"></script>
@endsection