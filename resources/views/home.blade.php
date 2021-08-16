@extends('index')
@section('topnav')
         <div class="top-nav" id="topnav12">
          	
         </div>	
@endsection
@section('carousal')
            <div id="sec_carousel" class="owl-carousel owl1 owl-theme">
			    <div class="item">
			    	<a href="viewmore/mobile">
			            <img src="{{asset('assets/img/blog/vivoadd.jpg')}}">
                    </a>
                </div>
			    <div class="item">
			    	<a href="viewmore/tv">
			    	  <img src="{{asset('assets/img/blog/samsung-festival.jpg')}}">
			    	</a>
			    </div>
			    <div class="item">
			    	<a href="viewmore/refrigerator">
			    	    <img src="{{asset('assets/img/blog/eleadd1.jpg')}}">
			    	</a>
			    </div>
			    <div class="item"><img src="{{asset('assets/img/blog/addmobile.jpg')}}"></div>
			    <div class="item">
			    	<a href="viewmore/refrigerator">
			    	  <img src="{{asset('assets/img/blog/addrefrigerator.jpg')}}">
			    	</a>  
			    </div>
		    </div>	    
@endsection
@section('bigvew_carousal')
        <div class="row bigcard_row" style="margin: 5px;padding: 25px;">
          	    <div class="bigcard">
                    <a href="viewmore/television">
			    	<div class="card" style="width: 18rem;">
					  <img src="{{asset('assets/img/blog/samsung-festival.jpg')}}" class="card-img-top" alt="...">
					</div>
			    	
                    </a>
                </div>
          	    <div class="bigcard">
                    <a href="viewmore/mobile">
			    	<div class="card" style="width: 18rem;">
					  <img src="{{asset('assets/img/blog/vivoadd.jpg')}}" class="card-img-top" alt="...">
					  </div>
			    	
                    </a>
                </div>
                <div class="bigcard">
                    <a href="viewmore/refrigerator">
			    	<div class="card" style="width: 18rem;">
					  <img src="{{asset('assets/img/blog/eleadd1.jpg')}}" class="card-img-top" alt="...">
					</div>
			    	
                    </a>
                </div>
			    <div class="bigcard">
                    <a href="viewmore/refrigerator">
			    	<div class="card" style="width: 18rem;">
					  <img src="{{asset('assets/img/blog/addrefrigerator.jpg')}}" class="card-img-top" alt="...">
					</div>
			    	
                    </a>
                </div>
    </div>	    
@endsection

@section('Dils_of_days')
	<div class="row">
		<div class="rowheader bg-light">Dils Of The Day....</div>
		  <div class="col-10">
		             <div id="Dils_of_days"  class="owl-carousel owl-theme">		             
				      @foreach(json_decode($all, true) as $item)
			         <a href="itmedetails/{{$item['id']}}">
			          <div class="item"><img src="{{$item['gallery']}}"><a href="">{{$item['name']}}</a> </div>	
				     </a>
				      @endforeach
				    </div>  		
		   </div>
		  <div class="col-2">
		  	<div class="item">	
		  		<img style="height: 200px;" src="{{asset('assets/img/blog/ele.jpg')}}">
		    </div>
		  </div>
	<div>
</div>		
@endsection
@section('mobile')
	<div class="card " style="width: 100%;">
  <div class="card-header">
    Mobile...
        <a href="viewmore/{{ $mobile->first()->category }}"><button class="btn btn-primary right" id="viewmore">View More</button></a>
  </div>
  <div class="card-body">
       <div id="mobile_carousel" class="owl-carousel now owl-theme">
			     @foreach($mobile as $item)
			     <a href="itmedetails/{{$item['id']}}">
			          <div class="item"><img src="{{$item['gallery']}}">
			          	<div class="text-box">
			          		<span>{{$item['name']}}</span><br>
			          	<span>RS:- {{$item['price']}} </span><span><s>{{$item['price']*1.5}}</s> </span><br>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star-half-o" aria-hidden="true"></i>
			          	</div>
			          </div>	
			     </a>     
				      @endforeach
		    </div>
  </div>
</div>
@endsection  
@section('tv')
	<div class="card " style="width: 100%;">
  <div class="card-header">
    Television Smart Tv's...
        <a href="viewmore/{{ $television->first()->category }}"><button class="btn btn-primary right" id="viewmore">View More</button></a>
  </div>
  <div class="card-body">
       <div id="tv_carousel" class="owl-carousel now owl-theme">
			     @foreach(json_decode($television, true) as $item)
			     <a href="itmedetails/{{$item['id']}}">
			          <div class="item"><img src="{{$item['gallery']}}" style="width: 250px;" >
			          	<div class="text-box">
			          		<span>{{$item['name']}}</span><br>
			          	<span>RS:- {{$item['price']}} </span><span><s>{{$item['price']*1.5}}</s> </span><br>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star-half-o" aria-hidden="true"></i>
			          	</div>
			          </div>	
			     </a>     
				      @endforeach
		    </div>
  </div>
</div>
@endsection  
@section('oiran')
	<div class="card " style="width: 100%;">
  <div class="card-header">
     Electric Oirans
        <a href="viewmore/{{ $oiran->first()->category }}"><button class="btn btn-primary right" id="viewmore">View More</button></a>
  </div>
  <div class="card-body">
       <div id="oiran_carousel" class="owl-carousel now owl-theme">
			     @foreach(json_decode($oiran, true) as $item)
			     <a href="itmedetails/{{$item['id']}}">
			          <div class="item"><img src="{{$item['gallery']}}" style="width: 250px;" >
			          	<div class="text-box">
			          		<span>{{$item['name']}}</span><br>
			          	<span>RS:- {{$item['price']}} </span><span><s>{{$item['price']*1.5}}</s> </span><br>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star-half-o" aria-hidden="true"></i>
			          	</div>
			          </div>	
			     </a>     
				      @endforeach
		    </div>
  </div>
</div>
@endsection  
@section('Kitchen')
<div class="card " style="width: 100%;">
  <div class="card-header">
    Mixer Grinder...   
    <a href="viewmore/{{ $kitchen->first()->category }}"><button class="btn btn-primary right" id="viewmore">View More</button></a>
  </div>
  <div class="card-body">
       <div id="kitchen_carousel" class="owl-carousel now owl-theme">
                 @foreach(json_decode($kitchen, true) as $item)
			          <div class="item">
			          	<i class="fa fa-heart like" id="wish" data-id="{{$item['id']}}" ></i>
    			      	<a href="itmedetails/{{$item['id']}}">
			          	<img src="{{$item['gallery']}}" >
			          	<div class="text-box">
				          		<span>{{$item['name']}}</span><br>
				          	<span>RS:- {{$item['price']}} </span><span><s>{{$item['price']*1.5}}</s> </span><br>
				          	<i class="fa fa-star" aria-hidden="true"></i>
				          	<i class="fa fa-star" aria-hidden="true"></i>
				          	<i class="fa fa-star" aria-hidden="true"></i>
				          	<i class="fa fa-star-half-o" aria-hidden="true"></i>
			          	</div>
			         </a>
			          </div>	
			          
				      @endforeach
		    </div>
  </div>
  <script>
  	$("#wish").on("click","k",function(){
  		alert()
  		  $(".fa-heart").css("color","red");
        });
  </script>
</div>
@endsection
@section('refrigerat')
	<div class="card " style="width: 100%;">
  <div class="card-header">
    Refrigerators...
        <a href="viewmore/{{ $refrigerator->first()->category }}"><button class="btn btn-primary right" id="viewmore">View More</button></a>
  </div>
  <div class="card-body">
       <div id="refrigerator_carousel" class="owl-carousel now owl-theme">
                 @foreach(json_decode($refrigerator, true) as $item)
			     <a href="itmedetails/{{$item['id']}}">
			          <div class="item"><img src="{{$item['gallery']}}">
			          	<div class="text-box">
			          		<span>{{$item['name']}}</span><br>
			          	<span>RS:- {{$item['price']}} </span><span><s>{{$item['price']*1.5}}</s> </span><br>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star-half-o" aria-hidden="true"></i>
			          	</div>	
			     </a>     
				      @endforeach
		    </div>
  </div>
</div>
@endsection  
@section('bulb')
	<div class="card " style="width: 100%;">
  <div class="card-header">
    Led Bulb...
     <a href="viewmore/{{ $bulb->first()->category }}"><button class="btn btn-primary right" id="viewmore">View More</button></a>
  </div>
  <div class="card-body">
       <div id="bulb_carousel" class="owl-carousel now owl-theme">
                 @foreach(json_decode($bulb, true) as $item)
			     <a href="itmedetails/{{$item['id']}}">
			          <div class="item"><img src="{{$item['gallery']}}" style="width: 200px;">
			          	<div class="text-box">
			          		<span>{{$item['name']}}</span><br>
			          	<span>RS:- {{$item['price']}} </span><span><s>{{$item['price']*1.5}}</s> </span><br>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star-half-o" aria-hidden="true"></i>
			          	</div>
			          </div>	
			     </a>     
				      @endforeach
		    </div>
  </div>
</div>
@endsection
@section('speaker')
	<div class="card " style="width: 100%;">
  <div class="card-header">
    Speaker...
     <a href="viewmore/{{ $speaker->first()->category }}"><button class="btn btn-primary right" id="viewmore">View More</button></a>
  </div>
  <div class="card-body">
       <div id="speaker_carousel" class="owl-carousel now owl-theme">
                 @foreach(json_decode($speaker, true) as $item)
			     <a href="itmedetails/{{$item['id']}}">
			          <div class="item"><img src="{{$item['gallery']}}" style="width: 200px;">
			          	<div class="text-box">
			          		<span>{{$item['name']}}</span><br>
			          	<span>RS:- {{$item['price']}} </span><span><s>{{$item['price']*1.5}}</s> </span><br>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star-half-o" aria-hidden="true"></i>
			          	</div>
			          </div>	
			     </a>     
				      @endforeach
		    </div>
  </div>
</div>
@endsection

@section('laptop')
	<div class="card " style="width: 100%;">
  <div class="card-header">
    Laptops...
     <a href="viewmore/{{ $laptop->first()->category }}"><button class="btn btn-primary right" id="viewmore">View More</button></a>
  </div>
  <div class="card-body">
       <div id="laptop_carousel" class="owl-carousel now owl-theme">
                 @foreach(json_decode($laptop, true) as $item)
			     <a href="itmedetails/{{$item['id']}}">
			          <div class="item"><img src="{{$item['gallery']}}" style="width: 200px;">
			          	<div class="text-box">
			          		<span>{{$item['name']}}</span><br>
			          	<span>RS:- {{$item['price']}} </span><span><s>{{$item['price']*1.5}}</s> </span><br>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star" aria-hidden="true"></i>
			          	<i class="fa fa-star-half-o" aria-hidden="true"></i>
			          	</div>
			          </div>	
			     </a>     
				      @endforeach
		    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/js/custom.owl-carousel.js')}}"></script>
@endsection