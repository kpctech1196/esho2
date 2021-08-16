@extends('admin.index')
@section('available_stocks')
  <div class="container">
      <div class="row">
          <div class="col-12">
             <div>
             	<table>
             		<tr><th colspan="5">Search:<input type="text" id="search-in"  placeholder="search"></th><th><a href="./admin">back</a> </th></tr>
             	</table>
             </div>
                 <div id="live_table"></div>
          </div>
      </div>
  </div>    
@endsection
@section('stock')
<div class="container">
  <div class="row">
      <div id="livesearchtable">
      	
      </div>  
  </div>
          <div class="row">
            <table border="2" id="customtable">
            <form id="insertdata">
              <tr><th colspan="4">Insertdata</th></tr>
              <tr><td>id:</td><td><input type="number" id="id"></td><td>Name:</td><td><input type="text"  name="" id="name" ></td></tr>
              <tr><td>Price:</td><td><input type="text" id="price"></td><td>Quantity:</td><td><input type="text" name="" id="quantity_inp"></td></tr>
              <tr><td>Discription:</td><td><input type="text" id="discription_inp"></td><td>Category:</td><td><input type="text" id="category_inp"></td></tr>
              <tr><td>Productimage:</td><td colspan="3"><input type="file"  id="productimage_inp"></td></tr>
              <tr><td colspan="4"><input type="submit" id="submit" value="save" name=""></td></tr>
            </form>
            </table>
           <div id="search">
            
           </div>
           <div id="table">
            <!-- load from database  -->
           </div>
          </div>
          <div id="model">
            <div id="model-form">
              <div id="clos-btn2">X</div>
              <h2>Edit Form</h2>
              <table  cellspacing="10" width="100%">
                
              </table>
            </div>
          </div>
      </div>
          <div id="error"></div>
      <div id="success"></div>

        <script type="text/javascript">
        $(document).ready(function ()
         {
              
               function loadTable(){
                     $.ajax({
                      url:"{{URL::to('loadTableajax')}}",
                      type:"POST",
                      data:{ _token:'{{ csrf_token() }}'},
                      success:function(data) {
                        	$("#live_table").html(data);
                      },error:function(data){
                    console.log(data)
                  }
                    });
                
               }
               loadTable();
               // innsert from data 
               $("#submit").on("click",function(e){
                e.preventDefault();
                // var idi=$("#id").val();
                  var namei=$("#name").val();
                  var price=$("#price").val();
                  var disc=$("#discription_inp").val();
                  var cate=$("#category_inp").val();
                  var image=$("#productimage_inp").val();
                  var qun=$("#quantity_inp").val();
                  if(namei==" "||price=="")
                  {
                    $('#error').html("require all fild").slideDown();
                      $("#success").slideUp();
                  }else{
                    $.ajax({
                    url:"{{URL::to('insertdatajax')}}",
                    type:"POST",
                    data:{name:namei,pricei:price,disci:disc,catei:cate,imagei:image,quni:qun,
                    _token:'{{ csrf_token() }}'},
                    success:function(data){
                      console.log(data);
                      if(data.success){
                              alert("Record successfully inserted");
                              $("#error").slideUp();
                              loadTable();
                          $("#insertdata").trigger("reset");                  
                      }else{
                        alert("can't save Record");
                        $('#error').html("can't save record").slideDown();
                              $("#success").slideUp();
                      }
                    },error:function(data){
                    console.log(data)
                  }
                  });
                  }   
               });
               
              // end datainsert section

              // delete record
                    $(document).on("click",".delete-btn",function () {
                      if(confirm("Do you really want to delete this record ?")){
                    var id=$(this).data('id');
                    var element=this;
                        $.ajax({
                             url:"Deleterecord",
                             type:"POST",
                              data:{dme:id,
                              _token:'{{ csrf_token() }}'},
                             success:function (data) {
                              // window.alert(data);
                              if(data.success){
                                $(element).closest("tr").fadeOut();
                                 loadTable();
                              }else
                              {   
                              $('#error').html("can't deleted record").slideDown();
                                      $("#success").slideUp();
                              }
                             },error:function(data){
                              console.log(data)
                            }
                          });//ajax close
                      }  
                      }); //delete record
              // Edit button code block start 

                    $(document).on("click",".edit-btn",function () {
                      $("#model").show();
                      var sid=$(this).data('eid');
                    $.ajax({
                            url:"{{URL::to('editbutton')}}",
                            type:"POST",
                            data:{eid:sid,
                            _token:'{{ csrf_token() }}'},
                            success:function(result) {
                              if(result.success)
                              $("#model-form table").html(result.all_data);
                            },error:function(data){
                              console.log(data)
                            }
                         });//ajax close
                      });//Edit button close

                // model form close button
                      
                    $(document).ready(function () {
                       $("#clos-btn2").on("click",function() {
                         $("#model").hide();  
                       });
                    });

                  // edit update button
                  $(document).on("click",".edit-submit",function() {
                    var id=$("#edit-id").val();
                    var name=$("#edit-name").val();
                    var quan_edit=$("#edit-quantity").val();
                    var pricei=$("#edit-price").val();
                    $.ajax({
                         url:"{{URL::to('editupdate')}}",
                         type:"POST",
                          data:{eid:id,ename:name,eqnantity:quan_edit,price:pricei,
                          _token:'{{ csrf_token() }}'},
                         success:function(data) {
                          if(data.success){
                            $("#model").hide();
                            loadTable(); 
                          }},error:function(data){
                          console.log(data)
                        }
                    });//ajax close
                  })//edit update close

              // Live search function
              $("#search-in").on("keyup",function () {
                // $("#table").hide();
                  var search_items=$(this).val();
                  if(search_items==''){
                  	$('#table_avail').show();
                  }else{
                  $.ajax({
                      url:"livesearch",
                      type:"POST",
                      data:{search:search_items,
                      _token:'{{ csrf_token() }}'},
                      success:function(result) {
                        if(result.success){	
                        	$("#table_avail").hide();
                         $("#live_table ").html(result.all_data);  
                        }else{
                          $("#live_table").html(result.all_data);
                        }                
                      },error:function(data){
                        console.log(data)
                      }
                  }); //ajax close
              }
              });  //live sreach close

              //csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
          });        
         $("#insertdata-btn").on('click',function(e){
          e.preventDefault();
          $("#live_table").hide();
         })
    });
        </script>
@endsection