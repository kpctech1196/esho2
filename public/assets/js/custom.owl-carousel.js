	$(document).ready(function(){
					var sec_carousel=$("#sec_carousel");
				      sec_carousel.owlCarousel({
					    loop:true,
					    margin:10,
					    nav:true,
					     navText : ["<i class='fa fa-angle-right nav-next' style='font-size:36px'></i>","<i class='fa fa-angle-left nav-prev' style='font-size:36px'></i>"],
					    dots:false,
					    autoplay:true,
					    responsive:{
					        0:{
					            items:1
					        },
					        600:{
					            items:1	
					        },
					        1000:{
					            items:1
					        }
					    }
					});
				      			$(function(){
			              var l=$("#Dils_of_days");
						l.owlCarousel({
						    loop:true,
						    margin:1,
						    stagePadding: 50,
						    nav:true,
						    navText : ["<i class='fa fa-angle-right nav-next' style='font-size:36px;background-color:blue;'></i>"],
							dots:false,
						    responsive:{
						        0:{
						            items:1
						        },
						        600:{
						            items:3
						        },
						        1000:{
						            items:7
						        }
						    }
						});
						});
              var kitchen_caro=$("#kitchen_carousel");
              kitchen_caro.owlCarousel({
              loop:true,
              margin:5,
              dots:false,
              autoplay:true,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:6
                  }
              }
          });

              var laptop_carousel=$("#laptop_carousel");
              laptop_carousel.owlCarousel({
              loop:true,
              margin:10,
              dots:false,
              autoplay:true,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:6
                  }
              }
          });
              var speakers_carousel=$("#speakers");
              speakers_carousel.owlCarousel({
              loop:true,
              margin:10,
              dots:false,
              autoplay:true,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:6
                  }
              }
          });
              var mobile_caro=$("#mobile_carousel");
             mobile_caro.owlCarousel({
              loop:true,
              dots:false,
              margin:10,
              autoplay:true,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:5
                  }
              }
          });
           var refrigerator_carousel=$("#refrigerator_carousel");
             refrigerator_carousel.owlCarousel({
              loop:true,
              dots:false,
              margin:10,
              autoplay:true,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:3
                  }
              }
          }); 
           var tv_carousel=$("#tv_carousel");
             tv_carousel.owlCarousel({
              loop:true,
              dots:false,
              margin:10,
              autoplay:false,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:4
                  }
              }
          }); 
           
             var oiran_caro=$("#oiran_carousel");
             oiran_caro.owlCarousel({
              loop:true,
              dots:false,
              margin:10,
              autoplay:true,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:5
                  }
              }
          }); 
			       var speaker_caro=$("#speaker_carousel");
             speaker_caro.owlCarousel({
              loop:true,
              dots:false,
              margin:10,
              autoplay:true,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:5
                  }
              }
          }); 
             var bulb_caro=$("#bulb_carousel");
             bulb_caro.owlCarousel({
              loop:true,
              dots:false,
              margin:10,
              autoplay:true,
              responsive:{
                  0:{
                      items:3
                  },
                  600:{
                      items:3 
                  },
                  1000:{
                      items:5
                  }
              }
          }); 
         
        function loadtopnav(){
          $.ajax({
            url:"loadtopnav",
            type:"get",
            success:function(result)
            {
              if(result.length>0)
              $("#topnav12").html(result);
            else
              $("#topnav12").html("<li>NO nav found</li>");
            },error:function(result){
              console.log(result);
            }
          });
        }
        loadtopnav();
			})