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

    <div class="bg-crafting contact-info">
        <div class="container">
            <div class="title">
                @foreach($contact_map as $cm)
                <h3>{{$cm->title}}</h3>
                @endforeach
            </div>
            <div class="contact-info-box row align-items-start justify-content-between">
                @foreach($contact_info as $ci)
                @if($ci->title == "Phone")
                <div class="icon-box col-xl-3 col-sm-3" data-aos="fade-right">
                    <div>
                        <img src="image/call-calling.png" alt="image">
                        <p class="d-inline-block">{{$ci->title}}</p>
                    </div>
                    <a href="tel:{{$ci->info}}">{{$ci->info}}</a>
                </div>
                @endif
                @if($ci->title == "Email")
                <div class="icon-box col-xl-3 col-sm-4" data-aos="fade-up">
                    <div>
                        <img src="image/mail-icon.png" alt="image">
                        <p class="d-inline-block">{{$ci->title}}:</p>
                    </div>
                    <a href="mailto:{{$ci->info}}">{{$ci->info}}</a>
                </div>
                @endif
                @if($ci->title == "Address")
                <div class="icon-box col-xl-3 col-sm-5" data-aos="fade-left">
                    <div>
                        <img src="image/location-icon.png" alt="image">
                        <p class="d-inline-block">{{$ci->title}}:</p>
                    </div>
                    <p>{{$ci->info}}</p>
                </div>
                @endif
                @endforeach
            </div>
            <div class="contact-map" data-aos="zoom-in">
                @foreach($contact_map as $cm)
                @if($cm->title !='')
                    {!!$cm->map_link!!}
                @else
                    <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387198.06900710054!2d-74.60354288944734!3d40.696329894212646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1720598941795!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @endif
                @endforeach
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
                    <div class="contact-form" data-aos="fade-left">
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
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/mtZc4EkSw3M?si=2Lp3GDGr5txpDQW8" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
        AOS.init(
            {
                duration: 1000,
            });
    </script>

    <script>
        $(window).on("scroll", function () {
            if ($(".header-main").length) {
                var headerScrollPos = 130;
                var stricky = $(".header-main");
                if ($(window).scrollTop() > headerScrollPos) {
                    stricky.addClass("stricky-fixed");
                } else if ($(this).scrollTop() <= headerScrollPos) {
                    stricky.removeClass("stricky-fixed");
                }
            }
        });

        $('[data-fancybox="gallary"]').fancybox({
            buttons: [
                "slideShow",
                "thumbs",
                "zoom",
                "fullScreen",
                "share",
                "close"
            ],
            loop: false,
            protect: true
        });




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