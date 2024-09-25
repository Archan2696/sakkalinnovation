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


    <div class="main_price">
        <div class="container">
            <div class="row align-items-end pride_space">
                <div class="col-lg-6 col-md-6">
                    @foreach($price_description as $pd)
                    <div class="price_head">
                        <div class="title">
                            <h3>{{$pd->title}}</h3>
                        </div>
                        <p class="sub-title">{{$pd->description}}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="nav nav-pills justify-content-end">
                        <li class="nav-item pride_button">
                            <a class="active" data-bs-toggle="pill" href="#monthly">Monthly</a>
                        </li>
                        <li class="nav-item pride_button pride_button_left">
                            <a class="" data-bs-toggle="pill" href="#yearly">Yearly</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane container active" id="monthly">
                            <div class="row">
                                @foreach($monthly_price as $key=>$mp)
                                @if($key %2==0)
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" >
                                @else
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-down" data-aos-duration="1500">
                                @endif
                                    <div class="price_box">
                                        <div class="price_box_head">
                                            <h3>{{$mp->title}}</h3>
                                            <div class="price_plan">
                                                <h4>${{$mp->price}} @if(is_numeric($mp->price))/@endif</h4>
                                                @if(is_numeric($mp->price))
                                                <span>Per Month</span>
                                                @endif
                                            </div>
                                        </div>
                                        <ul class="pricing_list">
                                            @php $descriptiondata=json_decode($mp->features);@endphp

                                            @foreach ($descriptiondata as $ld)
                                            <li>
                                                <img src="image/price-layer-2.png">
                                                {{$ld->fes}}
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="sakkal-btn pricing_button">
                                            <a  href="#intake-modal" data-bs-toggle="modal">
                                                get started
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="yearly">
                            <div class="row">
                                @foreach($yearly_price as $key1=>$yp)
                                @if($key1 %2==0)
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                @else
                                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-down" data-aos-easing="linear"  data-aos-duration="1500">
                                @endif

                                    <div class="price_box">
                                        <div class="price_box_head">
                                            <h3>{{$yp->title}}</h3>
                                            <div class="price_plan">
                                                <h4>${{$yp->price}} @if(is_numeric($yp->price))/@endif</h4>
                                                @if(is_numeric($yp->price))
                                                <span>Per Year</span>
                                                @endif
                                            </div>
                                        </div>
                                        <ul class="pricing_list">
                                            @php $descriptiondata=json_decode($yp->features);@endphp

                                            @foreach ($descriptiondata as $ld1)
                                            <li>
                                                <img src="/image/price-layer-2.png">
                                                {{$ld1->fes}}
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="sakkal-btn pricing_button">
                                            <a  href="#intake-modal" data-bs-toggle="modal">
                                                get started
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     
    <div class="bg-contactus">
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

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script>
    <script src="js/script.js"></script>
    
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