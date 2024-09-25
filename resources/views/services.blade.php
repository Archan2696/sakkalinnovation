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


    <div class="bg-crafting service-offering">
        <div class="container">
            @foreach($service_description as $sd)
            <div class="services-head" data-aos="zoom-in-up">
                <div class="title">
                    <h3>{{$sd->title}}</h3>
                </div>
                <p class="sub-title">{{$sd->description}}</p>
            </div>
            @endforeach
            

            @foreach($service as $key=>$s)
            @if($key+1 ==1)
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about-crafting"  data-aos="fade-right">
                        <img src="/uploads/{{$s->image}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <div class="crafting-info"  data-aos="fade-left">
                        <h2>{{$s->title}}</h2>
                        @php $descriptiondata=json_decode($s->description);@endphp

                        @foreach ($descriptiondata as $ld)
                        <p>
                            {{$ld->des}}
                        </p>
                        @endforeach

                        <div class="service-list">
                            @php $listdata=json_decode($s->list);@endphp

                            @foreach ($listdata as $ldd)
                            @if($ldd->list !='')
                            <div class="service-item" data-aos="fade-up" data-aos-duration="500">
                                <div class="service-inner-icon">
                                    <img src="image/service-icon.png" alt="">
                                </div>
                                <div class="service-name">
                                    <span>{{$ldd->list}}</span>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="sakkal-btn">
                            <a  href="#intake-modal" data-bs-toggle="modal">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    
    @foreach($service as $key1=>$ss)
    @if($key1+1 !=1)

    @if($key1 %2 !=0)
    <div class="service-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="crafting-info" data-aos="fade-right">
                        <h2>{{$ss->title}}</h2>

                        @php $descriptiondata=json_decode($ss->description);@endphp
                        @foreach ($descriptiondata as $lds)
                        <p>
                            {{$lds->des}}
                        </p>
                        @endforeach

                        
                            @php $listdata=json_decode($ss->list);@endphp

                            @foreach ($listdata as $ldds)
                            @if($ldds->list !='')
                            <div class="service-list">
                                <div class="service-item" data-aos="fade-up" data-aos-duration="500">
                                    <div class="service-inner-icon">
                                        <img src="image/service-icon.png" alt="">
                                    </div>
                                    <div class="service-name">
                                        <span>{{$ldds->list}}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                        

                        <div class="sakkal-btn">
                            <a  href="#intake-modal" data-bs-toggle="modal">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about-crafting" data-aos="fade-left">
                        <img src="/uploads/{{$ss->image}}" alt="image">
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    @else

    <div class="bg-crafting service-offering">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about-crafting" data-aos="zoom-in-right">
                        <img src="/uploads/{{$ss->image}}" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="crafting-info" data-aos="zoom-in-left">
                        <h2 data-aos="fade-up">{{$ss->title}}</h2>
                        @php $descriptiondata=json_decode($ss->description);@endphp
                        @foreach ($descriptiondata as $lds)
                        <p>
                            {{$lds->des}}
                        </p>
                        @endforeach

                        <div class="service-list">
                            @php $listdata=json_decode($ss->list);@endphp

                            @foreach ($listdata as $lde)
                            @if($lde->list !='')
                            <div class="service-item" data-aos="fade-up" data-aos-duration="500">
                                <div class="service-inner-icon">
                                    <img src="image/service-icon.png" alt="">
                                </div>
                                <div class="service-name">
                                    <span>{{$lde->list}}</span>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                        </div>
                        <div class="sakkal-btn" data-aos="fade-left">
                            <a  href="#intake-modal" data-bs-toggle="modal">
                                get started
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

    @endforeach
   
    <div class="services-main">
        <div class="container">
            <div class="services-head" data-aos="zoom-in">
                @foreach($facility_description as $fd)
                    <h2>{{$fd->title}} <span>{{$fd->highlighted_text}}</span>.</h2>
                @endforeach
            </div>
            <div class="services-inner">
                <div class="row">
                    @foreach($facility as $f)
                    <div class="col-lg-3 col-md-6">
                        <div class="provide-box" data-aos="fade-up" data-aos-duration="500">
                            <div class="provide-icon">
                                <img src="/uploads/{{$f->image}}" alt="">
                            </div>
                            <div class="provide-content">
                                <span>{{$f->title}}</span>
                                <p>
                                    {{$f->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-lg-3">
                        <div class="provide-box" data-aos="fade-up" data-aos-duration="1000">
                            <div class="provide-icon">
                                <img src="image/provide-s1.png" alt="">
                            </div>
                            <div class="provide-content">
                                <span>Theme Customizations</span>
                                <p>
                                    Tailoring themes to fit your brand's unique identity and functional needs
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="provide-box" data-aos="fade-up" data-aos-duration="1500">
                            <div class="provide-icon">
                                <img src="image/provide-s2.png" alt="">
                            </div>
                            <div class="provide-content">
                                <span>Front-end Design & Implementation</span>
                                <p>
                                    Creating intuitive and visually appealing user interfaces through front-end design and implementation.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="provide-box" data-aos="fade-up" data-aos-duration="2000">
                            <div class="provide-icon">
                                <img src="image/provide-s3.png" alt="">
                            </div>
                            <div class="provide-content">
                                <span>Shopify Interface Training</span>
                                <p>
                                    Training sessions focused on mastering the Shopify interface for efficient business management
                                </p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="bg-we-do inner-we-do">
        <div class="container">
            @foreach($what_we_do as $wwd)
           <div class="row">
                <div class="col-lg-7 col-md-8 col-12">
                    <div class="wedo-information" data-aos="fade-right">
                        <div class="wedo-flex">
                            <h2>{{$wwd->title}}</h2>
                            <!--<span><img src="/uploads/{{$wwd->image1}}"></span>-->
                        </div>
                        <p>
                            {{$wwd->description}}
                        </p>
                        <div class="sakkal-btn">
                            <a href="{{url('/contact')}}">contact us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="wedo-image" data-aos="fade-left">
                        <img src="/uploads/{{$wwd->image1}}" alt="image">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="package-main inner-package-main">
        <div class="container">
            @foreach($service_packages_description as $spd)
            <div class="title" data-aos="zoom-in">
                <h3>{{$spd->title}}</h3>
            </div>
            <p class="sub-title" data-aos="zoom-in">{{$spd->description}}</p>
            @endforeach
           <div class="package-table table-responsive table-responsive-sm table-responsive-lg table-responsive-md" data-aos="fade-left" data-aos-duration="500">
                <table class="table table-borderless table-striped table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>
                            <div class="package-title">
                                Standard
                            </div>
                        </th>
                        <th>
                            <div class="package-title">
                                Premium
                            </div>
                        </th>
                        <th>
                            <div class="package-title">
                                Business
                            </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($package_services as $ps)
                        <tr>
                            <td> <span class="package-inner">{{$ps->title}}</span></td>
                            <td>
                                <div class="package-desc">
                                    @if($ps->standard_type == 1)
                                        @if($ps->standard==1)
                                            <span class="true-icon"><i class="fa-solid fa-check"></i></span>
                                        @else
                                            <span class="false-icon"><i class="fa-solid fa-xmark"></i></span>
                                        @endif
                                    @else
                                        <span class="package-inner">{{$ps->standard}}</span>
                                    @endif

                                </div>
                            </td>
                            <td>
                                <div class="package-desc">
                                    @if($ps->premium_type == 1)
                                        @if($ps->premium==1)
                                            <span class="true-icon"><i class="fa-solid fa-check"></i></span>
                                        @else
                                            <span class="false-icon"><i class="fa-solid fa-xmark"></i></span>
                                        @endif
                                    @else
                                        <span class="package-inner">{{$ps->premium}}</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="package-desc">
                                    @if($ps->business_type == 1)
                                        @if($ps->business==1)
                                            <span class="true-icon"><i class="fa-solid fa-check"></i></span>
                                        @else
                                            <span class="false-icon"><i class="fa-solid fa-xmark"></i></span>
                                        @endif
                                    @else
                                        <span class="package-inner">{{$ps->business}}</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      
                      <tr>
                        <td></td>
                        <td>
                            <div class="package-desc">
                                <div class="sakkal-btn">
                                    <a  href="#intake-modal" data-bs-toggle="modal">  get started</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="package-desc">
                                <div class="sakkal-btn">
                                    <a  href="#intake-modal" data-bs-toggle="modal">  get started</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="package-desc">
                                <div class="sakkal-btn">
                                    <a  href="#intake-modal" data-bs-toggle="modal">  get started</a>
                                </div>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="recent-update">
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