@extends('layout.header_footer')

@section('content')

<style type="text/css">
     .success-msg-contact {
        color: #39ad1d;
        padding: 10px;
        display: none;
    }
    .error-text{
        color: red;
    }

    .login-msg p{
        color: white;
        text-align: center;
    }
</style>
    
    
    @foreach($banner as $b)
    <div class="bg-banner" style="background-image: url('/uploads/{{$b->image}}');">
        <div class="container">
            <div class="about-title">
                <h2>{{$b->page_title}}</h2>
            </div>
        </div>
    </div>
    @endforeach
    

    @foreach($about as $a)
    <div class="bg-about-video">
        <div class="container">
            <div class="about-video-heading">
                <div class="title" data-aos="fade-left">
                    <h3>{{$a->title}}</h3>
                </div>
                <p class="sub-title" data-aos="fade-right" >{{$a->description}}</p>
            </div>

            <div class="about-video-section" data-aos="flip-up">
                <div class="inner-video-section">
                    <img src="/uploads/{{$a->image}}" alt="image">
                </div>
                <div class="watch-btn about-watch-btn">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#banner-video">
                        <i class="fa-solid fa-play play-icon"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach



    <div class="bg-benefit">
        <div class="container">
            @foreach($choose_us_description as $cud)
            <div class="benefit" data-aos="zoom-in">
                <div class="title">
                    <h3>{{$cud->title}}</h3>
                </div>
                <p class="sub-title">{{$cud->description}}</p>
            </div>
            @endforeach

            <div class="row">
                @foreach($choose_us as $key=>$cu)
                @php
                    $condition = ($key % 3) + 1;
                @endphp
                    
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    
                    
                    @if($condition == 1)
                    <div class="benefit-box" data-aos="fade-up" data-aos-duration="500">
                    @elseif($condition == 2)
                    <div class="benefit-box" data-aos="fade-up" data-aos-duration="1000">
                    @elseif($condition == 3)
                    <div class="benefit-box" data-aos="fade-up" data-aos-duration="1500">
                    @else
                    <div class="benefit-box" data-aos="fade-up" data-aos-duration="1500">
                    @endif
                        <div class="benefit-image">
                            <img src="/uploads/{{$cu->image}}" alt="image">
                        </div>
                        <div class="benefit-info">
                            <h4>{{$cu->title}}</h4>
                            <p>{{$cu->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="benefit-box" data-aos="fade-up" data-aos-duration="1000">
                        <div class="benefit-image">
                            <img src="image/be-icon-2.png" alt="image">
                        </div>
                        <div class="benefit-info">
                            <h4>Customized Solutions</h4>
                            <p>We tailor our services to meet the specific needs and goals of each client.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="benefit-box" data-aos="fade-up" data-aos-duration="1500">
                        <div class="benefit-image">
                            <img src="image/be-icon-3.png" alt="image">
                        </div>
                        <div class="benefit-info">
                            <h4>Client-Centric Approach</h4>
                            <p>We prioritize communication, transparency, and exceeding expectations.</p>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>
    </div>
    

    @foreach($about_service as $key=>$as)

    @php
        $condition = ($key % 4) + 1;
    @endphp

    @if($condition == 1)
    <div class="bg-crafting">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="about-crafting" data-aos="fade-right">
                        <img src="/uploads/{{$as->image}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="crafting-info">
                        <h2 data-aos="fade-left">{{$as->title}}</h2>
                        <p data-aos="fade-up">
                            {{$as->description}}
                        </p>
                        <div class="sakkal-btn">
                            <a href="#intake-modal" data-bs-toggle="modal">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    @elseif($condition == 2)
    <div class="bg-dynamic">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 order-2 order-lg-1 order-md-1 order-sm-2">
                    <div class="crafting-info">
                        <h2 data-aos="zoom-in-right">{{$as->title}}</h2>
                        <p data-aos="fade-down">
                            {{$as->description}}
                        </p>
                        <div class="sakkal-btn">
                            <a href="#intake-modal" data-bs-toggle="modal">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 order-1 order-lg-2 order-md-1 order-sm-1">
                    <div class="about-crafting" data-aos="zoom-in-left">
                        <img src="/uploads/{{$as->image}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif($condition == 3)
    <div class="bg-marketing">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="marketing-image" data-aos="fade-right">
                        <img src="/uploads/{{$as->image}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="crafting-info marketing-info">
                        <h2 data-aos="fade-up" data-aos-duration="1000">{{$as->title}}</h2>
                        <p data-aos="fade-down" data-aos-duration="1000">
                            {{$as->description}}
                        </p>
                        <div class="sakkal-btn">
                            <a href="#intake-modal" data-bs-toggle="modal">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @elseif($condition == 4)

    <div class="bg-business">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 order-2 order-lg-1 order-md-1 order-sm-2">
                    <div class="crafting-info" data-aos="zoom-in-right">
                        <h2 data-aos="fade-up">{{$as->title}}</h2>
                        <p data-aos="fade-right">
                            {{$as->description}}
                        </p>
                        <div class="sakkal-btn">
                            <a href="#intake-modal" data-bs-toggle="modal">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 order-2 order-lg-1 order-md-1 order-sm-2">
                    <div class="business-img" data-aos="zoom-out-up">
                        <img src="/uploads/{{$as->image}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @else
    <div class="bg-crafting">
        <div class="container">
            <div class="row">
                <div class="ccol-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="about-crafting" data-aos="fade-right">
                        <img src="/uploads/{{$as->image}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="crafting-info">
                        <h2 data-aos="fade-left">{{$as->title}}</h2>
                        <p data-aos="fade-up">
                            {{$as->description}}
                        </p>
                        <div class="sakkal-btn">
                            <a href="#intake-modal" data-bs-toggle="modal">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

    @endforeach
    
    
    <div class="recent-update  about-recent">
        <div class="container">
            <div class="recent-update-info">
                @foreach($recent_news_description as $rnd)
                <div class="title" data-aos="zoom-in">
                    <h3>{{$rnd->title}}</h3>
                </div>
                <div class="team-member-content">
                    <p data-aos="zoom-in">{{$rnd->description}}</p>
                  <div class="sakkal-btn" data-aos="fade-left">
                        <a href="{{url('/blog')}}">
                           <span>view all</span> 
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    @foreach($recent_news as $key=>$rn)
                    
                    @php
                        $condition = ($key % 3) + 1;
                    @endphp
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        @if($condition == 1)
                        <div class="update-box"  data-aos="fade-up" data-aos-duration="500">
                        @elseif($condition == 2)
                        <div class="update-box"  data-aos="fade-up" data-aos-duration="1000">
                        @elseif($condition == 3)
                        <div class="update-box"  data-aos="fade-up" data-aos-duration="1500">
                        @else
                        <div class="update-box"  data-aos="fade-up" data-aos-duration="1500">
                        @endif
                            <div class="recent-update-image">
                                 <a href="{{url('blog_detail')}}/{{$rn->slug}}">
                                    <img src="/uploads/{{$rn->image}}">
                                </a>
                            </div>
                            <div class="recent-update-details">
                                <span>{{$rn->title1}}</span>
                               <a href="{{url('blog_detail')}}/{{$rn->slug}}"> <h3>{{$rn->title2}}</h3> </a>
                                <span>{{$rn->title3}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>

    </div>
    
    
    <div class="bg-contactus about-contact">
         <div class="container">
             <div class="row">
               <div class="col-lg-6 col-md-7">
                   <div class="contact-information" data-aos="fade-right">
                    @foreach($contact_description as $cd)
                       <div class="co-profile">
                           <div class="co-image" data-aos="flip-up">
                               <img src="/uploads/{{$cd->image}}" alt="image">
                           </div>
                           <div class="co-address">
                               <h2>
                                   {{$cd->name}}
                               </h2>
                               <p>
                                   {{$cd->occupation}}
                               </p>
                               <ul>
                                   <li>
                                       <img src="image/call-calling.png" alt="image"><a href="tel:{{$cd->phone}}">{{$cd->phone}}</a>
                                   </li>
                                   <li>
                                       <img src="image/co-icon2.png" alt="image"><a href="mailto:{{$cd->email}}">{{$cd->email}}</a>
                                   </li>
                                   <li>
                                        @php $domain = parse_url($cd->website_link, PHP_URL_HOST); @endphp
                                       <img src="image/co-icon3.png" alt="image"><a href="{{$cd->website_link}}" target="_blank">{{$domain}}</a>
                                   </li>
                               </ul>
                           </div>
                       </div>
                    @endforeach
                       <div class="profile-bottom">
                        @foreach($form_description as $fdes)
                            <p>
                               {{$fdes->description}}
                            </p>
                        @endforeach
                       </div>
                   </div>
               </div>
               <div class="col-lg-5 col-md-5">
                   <div class="contact-form" data-aos="fade-up">
                       <form method="post" id="contact_form">
                            {{ csrf_field() }}
                            <h4>
                                contact
                            </h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="co-input">
                                        <label>Your Full Name</label>
                                        <input type="text" name="name" value="" id="name">
                                         <span class="error-text name_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="co-input">
                                        <label>Phone Number</label>
                                        <input type="text" value="" name="number" id="number">
                                         <span class="error-text number_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="co-input">
                                        <label>Email Address</label>
                                        <input type="text" value="" name="email" id="email">
                                         <span class="error-text email_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="co-input">
                                        <label>Message</label>
                                        <textarea name="message" id="message"></textarea>
                                         <span class="error-text message_err"></span>
                                    </div>
                                </div>
                                <div style="margin-bottom: 10px;"><span class="success-msg-contact">Your Response Submitted Successfully !!</span></div>
                                <div class="col-lg-12">
                                    <button type="submit" class="form-btn" id="submit">
                                        submit
                                    </button>
                                </div>
                            </div>
                        </form>
                   </div>
               </div>
           </div>
         </div>
    </div>
   
    <!--popups -->
    <div class="banner-video modal" id="banner-video">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close close-popup" data-bs-dismiss="modal">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
      
            <div class="modal-body">
                @foreach($about as $a)
                {!!$a->link!!}
                @endforeach
            </div>
    
          </div>
        </div>
      </div>
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script>
    <script src="/js/script.js"></script>
    <script>

             $(document).ready(function() {
        $("#submit").click(function(e){
            e.preventDefault();

            $(".error-text").empty();
            var _token = $("input[name='_token']").val();  
            var name = $('#name').val();
            var number = $('#number').val();
            var email = $('#email').val();
            var message = $('#message').val();

            $.ajax({
                url: '/getContactData',
                type:'POST',
              data: {_token:_token,name:name,number:number,email:email,message:message},
              beforeSend: function(){

                            $('#loading-bar-spinner').show();
 
                             $('#overlay').fadeIn();
                             
                              $('#submit').prop('disabled', true);

                           },

                        complete: function(){
                            
                              $('#submit').removeAttr("disabled");

                           $('#loading-bar-spinner').hide();
 
                         },
                         
                success: function(data) {
                  console.log(data.error)
                    if($.isEmptyObject(data.error)){

                    $('form').each(function() {
                         this.reset();
                       });

                     $(".success-msg-contact").show();
                    setTimeout(function() { $(".success-msg-contact").fadeOut(3000); }, 3000);

                     


                    }else{
                        printErrorMsg(data.error);


                  
                     
                    }
                }
            });
        }); 

        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
            console.log(key);
              $('#contact_form .'+key+'_err').css("display","block");
              $('#contact_form .'+key+'_err').text(value);

              setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
            });
        }
    });

    </script>
    

@endsection