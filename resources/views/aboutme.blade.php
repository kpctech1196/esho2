<!DOCTYPE html>
<html>
<head>
	<title>topview</title>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/kp.css')}}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body>
  <!-- start header -->
   <header class="header">
   	  <div class="container">
   	  	<div class="row justify-content-beetwin align-item-center ">
   	  		<div class="brand-name">
   	  			<a href="/">Eshop</a>
   	  		</div>
   	  		<nav class="nav">
   	  			<ul>
   	  				<li><a href="#Services" >Service</a></li>
   	  				<li><a href="#contact" >Contact</a></li>
   	  			</ul>
   	  		</nav>
   	  	</div>
   	  </div>
   </header>
  <!-- end header -->
  <!-- home section start -->

  <section class="home-section">
  	<!-- shape -->
  	<div class="shape-01">
  		ko
  	</div>
  	<div class="container">
  		<div class="row align-item-center">
  			<div class="home-content">
  				<h4>I'm Komal Patel</h4>
  				<h1>Programmer</h1>
  			</div>
  		</div>
  	</div>
  	<!-- scroll -->
  	<a href="" class="scroll-down">
  		<img src="{{asset('assets/img/users/scroll-down.svg')}}" align="scroll down">
  	</a>
  </section>
  <!-- home section end -->
  <!-- start about section -->
  <section class="about-section" style="border: 5px solid gray;">
  	<div class="container">
  		<div class="row">
  			<div class="about-img">
  				<div class="image-box">
  					<div class="shape-02">
  						
  					</div>
  					<img src="{{asset('assets/img/users/ab1.jfif')}}" height="300" alt="about img">
  				</div>
  			</div>
  			<div class="about-content">
  				<div class="row">
		  	          <div class="section-title">
		  	           	<h1>About</h1>
		  	           </div>
		  	    </div>       
  	          	<p>
					           Stores nationally, housing over 20 brands and 100 products. From in-depth, expert buying advice to personal after-sales care tailored to each customer, we commit to our promise of 'Personalising Technology' every day.<br>
                     <h3> Address</h3>
                     <pre style="font-size: 15px;font-weight: 600;">
                      Azad chowk,
                      Mangla,
                      Bilaspur Chhattishgarh
                      Pin: 495001</pre>
  	          	</p>
  	          	
  			</div>
  		</div>
  	</div>
  </section>
  <!-- contact section close -->
  <section class="about-section"  style="border: 5px solid gray;">
        <div class="container">
      <div class="row">

        <div class="about-content">
          <div class="row">
            </div>       
                <p>
                  <h1> Wide Range. Best Brands</h1> 
                   <br><br>

                Our ever-expanding product range includes the latest releases from global brands in:

                Personal Devices: Mobile Phones, Tablets, and Laptops
                Entertainment Systems: TVs, Sound Systems, Home Assistants & Home Theatres
                Home Appliances: ACs, Refrigerators, Washing Machines, Cooktops, Dishwashers etc
                Cameras and Accessories: DSLR cameras and Accessories - all at affordable prices


                Our stores and website offer over 5000 products and more than 200 brands with year-round promotional offers and even No Cost EMI options. Our in-store sales team makes sure to understand every customer's personal needs and budgets while assisting them to make the best choice while buying their tech.
                </p>
                
                </div>
                        <div class="about-img">
          <div class="image-box">
            <div class="shape-02">
              
            </div>
            <img src="{{asset('assets/img/users/ab2.jfif')}}" height="400" width="500" alt="about img">
          </div>
        </div>
        </div>
      </div>
  </section>
  <section id="Services" class="about-section" style="border: 5px solid gray;">
    <div class="container">
        <div class="about-content">
          <div class="row">
                  <div class="section-title">
                    <h1>Services</h1>
                   </div>
            </div>       
                <p>
                  <ul>
                    <li>Electronic Sales</li>
                    <li>Accesories</li>
                    <li>Repairs</li>
                    <li>House wiring</li>
                    <li>lighting</li>
                  </ul>
                </p>
                
        </div>
      </div>
    </div>
  </section>
    <section id="contact" class="about-section" style="border: 5px solid gray;">
    <div class="container">
        <div class="about-content">
          <div class="row">
                  <div class="section-title">
                    <h1>Contact Us</h1>
                   </div>
            </div>       
                <p>
                 <ul class="fa-ul foot-desc ml-4">
                  <li class="mb-2"><span class="fa-li"><i class="fa fa-map"></i></span>Near Azad Chouck Mangla BIlsapur Chhatishgarh. Pin:-495001
                  </li>
                  <li class="mb-2"><span class="fa-li"><i class="fa fa-phone"></i></span>6264500904</li>
                  <li class="mb-2"><span class="fa-li"><i class="fa fa-envelope"></i></span>apectricles@gmail.com</li>
                  <li><span class="fa-li"><i class="fa fa-clock-o"></i></span>Today {{date('d/m/y')}}</li>
                </ul>

                </p>
                
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>