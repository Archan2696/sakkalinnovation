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

    <div class="banner-main">
        <div class="container">
            @foreach($home_banner as $hb)
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-inner-main" data-aos="fade-right">
                        <div class="banner-content">
                            <h2>{{$hb->title}}<span class="banner-text"></span> 
                            </h2>
                             @php $descriptiondata=json_decode($hb->highlighted_text);@endphp

                             @foreach ($descriptiondata as $key=>$ld)
                            <input type="hidden" name="highlighted_text" id="highlighted_text_{{$key}}" value="{{$ld->text}}">
                             @endforeach
                            <p >
                                {{$hb->description}}
                            </p>
                            <div class="banner-btn" >
                                <div class="sakkal-btn">
                                    <a href="#intake-modal" data-bs-toggle="modal"> get started </a>
                                </div>
                                <div class="watch-btn">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#banner-video">
                                        <i class="fa-solid fa-play play-icon"></i>
                                        <span> Watch Demo</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="col-lg-6">
                    <div class="banner-img" data-aos="fade-left"  data-aos-duration="2000" >
                        <img src="/uploads/{{$hb->image}}" alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="our-service">
        <div class="container">
            <div class="service-details">
                @foreach($home_service_description as $sd)
                <div class="title" data-aos="zoom-in">
                    <h3>{{$sd->title}}</h3>
                </div>
                <p class="sub-title" data-aos="zoom-in">{{$sd->description}}</p>
                @endforeach

                <div class="row">
                    @foreach($service as $key=>$s)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        @if($key %2==0)
                        <div class="services-box" data-aos="fade-down">
                        @else
                        <div class="services-box" data-aos="fade-up">
                        @endif
                            <div class="service-icon">
                                <img src="/uploads/{{$s->home_image}}">
                            </div>
                            <div class="services-content">
                                <div class="services-title">
                                    <h4>{{$s->title}}</h4>
                                </div> 
                                <p>{{$s->home_description}}</p>
                                <!--<div class="service-btn">-->
                                <!--    <a href="{{url('/services')}}">-->
                                <!--       <span>learn more</span> <i class="fa-solid fa-arrow-up"></i>-->
                                <!--    </a>-->
                                <!--</div>                                                                                                   -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="service-btn">
                                    <a href="{{url('/services')}}">
                                       <span>learn more</span> <i class="fa-solid fa-arrow-up"></i>
                                    </a>
                                </div> 
            </div>
        </div>
    </div>

    <div class="about-us">
        <div class="container">
            <div class="about-info">
                @foreach($home_about_description as $had)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-image"  data-aos="fade-right">
                            <img src="/uploads/{{$had->image}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-details" data-aos="fade-left">
                            <div class="title">
                                <h3>{{$had->title}}</h3>
                            </div>
                            <ul class="about-info">
                                @foreach($home_about as $ha)
                                <li data-aos="fade-up" data-aos-duration="3000">
                                    <div class="about-info-details">
                                        <div class="about-info-icon">
                                            <img src="/uploads/{{$ha->image}}">
                                        </div>
                                        <p>{{$ha->description}}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="sakkal-btn">
                                <a href="{{url('/about')}}">
                                   <span> more</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> 
    </div>

    
    <div class="bg-portfolio">
        <div class="container">
            <div class="heading-flex">
                @foreach($portfolio_description as $pd)
                <div class="heading">
                    <div class="title" data-aos="zoom-in">
                        <h3>{{$pd->title}}</h3>
                    </div>
                    <p class="sub-title" data-aos="zoom-in">{!!$pd->description!!}</p>
                </div>
                @endforeach
                <div class="view-btn" data-aos="zoom-in">
                    <a href="{{url('/portfolio')}}">view all</a>
                </div>
            </div>

            <div class="row portfolio">
                @foreach($portfolio as $key=>$p)
                
                @php
                    $condition = ($key % 3) + 1;
                @endphp
    
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    @if($condition == 1)
                    <div class="project_box" data-aos="flip-left" data-aos-duration="500">
                    @elseif($condition == 2)
                    <div class="project_box" data-aos="flip-up" data-aos-duration="1000">
                    @elseif($condition == 3)
                    <div class="project_box" data-aos="flip-right" data-aos-duration="1500">
                    @else
                    <div class="project_box" data-aos="flip-right" data-aos-duration="1500">
                    @endif
                        <div class="image_box">
                            <a href="/uploads/{{$p->image}}" data-fancybox="gallary">
                                <img src="/uploads/{{$p->image}}" alt="image">
                                <div class="oh ho_1"></div>
                               <div class="oh ho_2"></div>
                               <div class="oh ho_3"></div>
                               <div class="oh ho_4"></div>
                            </a>
                            <a data-fancybox="gallery" class="zm_btn trans" href="/uploads/{{$p->image}}">
                                <i class="fa-solid fa-circle-plus"></i>
                            </a>
                            
                        </div>
                        <div class="project_details">
                            <h3><a href="{{$p->link}}" target="_blank">{{$p->name}}</a></h3>
                            <p>{{$p->category}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    

    <div class="bg-we-do">
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
                         <div class="do-img">
                        <img src="/uploads/{{$wwd->image1}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="package-main">
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
                                    <a href="#intake-modal" data-bs-toggle="modal">  get started</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="package-desc">
                                <div class="sakkal-btn">
                                    <a href="#intake-modal" data-bs-toggle="modal">  get started</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="package-desc">
                                <div class="sakkal-btn">
                                    <a href="#intake-modal" data-bs-toggle="modal">  get started</a>
                                </div>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--<div class="team-member">-->
    <!--    <div class="container">-->
    <!--        <div class="team-member-info">-->
    <!--            @foreach($team_description as $td)-->
    <!--            <div class="title" data-aos="zoom-in">-->
    <!--                <h3>{{$td->title}}</h3>-->
    <!--            </div>-->
    <!--            <div class="team-member-content" data-aos="zoom-in">-->
    <!--                <p>{{$td->description}}</p>-->
    <!--                <div class="team-member-btn">-->
    <!--                    <a href="#">-->
    <!--                       <span>view all team member</span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            @endforeach-->
    <!--            <div class="row">-->
    <!--                @foreach($team as $t)-->
    <!--                <div class="col-lg-4 col-md-6 col-sm-6 col-12">-->
    <!--                    <div class="team-box" data-aos="zoom-in">-->
    <!--                        <div class="team-image">-->
    <!--                            <img src="/uploads/{{$t->image}}">-->
    <!--                        </div>-->
    <!--                        <div class="team-content">-->
    <!--                            <h3>{{$t->title}}</h3>-->
    <!--                            <span>{{$t->sub_title}}</span>-->
    <!--                        </div>-->
    <!--                        <ul class="social-icons">-->
    <!--                            <li><a href="{{$t->facebook_url}}"><i class="fa-brands fa-facebook"></i></a></li>-->
    <!--                            <li><a href="{{$t->twitter_url}}"><i class="fab fa-twitter"></i></a></li>-->
    <!--                            <li><a href="{{$t->linkedin_url}}"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
    <!--                            <li><a href="{{$t->github_url}}"><i class="fa-brands fa-github"></i></a></li>-->
    <!--                            <li><a href="{{$t->twitch_url}}"><i class="fa-brands fa-twitch"></i></a></li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                @endforeach-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="bg-faq-section">
        <div class="container">
            <div class="faq-title">
                @foreach($faq_description as $fd)
                <h3>
                    {{$fd->title}}
                </h3>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-8 col-md-10 col-sm-12 col-12">
                    <div class="faq-section" id="accordion">
                        @foreach($faq as $key=>$f)
                        <div class="card" >
                          <div class="card-header">
                             @if($key==0)
                            <a class="btn " data-bs-toggle="collapse" href="#collapseOne{{$key+1}}" >
                            @else
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseOne{{$key+1}}" >
                            @endif
                                <span>{{$f->question}}</span>
                                
                            </a>
                          </div>
                          @if($key==0)
                          <div id="collapseOne{{$key+1}}" class="collapse show" data-bs-parent="#accordion">
                          @else
                          <div id="collapseOne{{$key+1}}" class="collapse" data-bs-parent="#accordion">
                          @endif
                            <div class="card-body">
                                <p>
                                    {{$f->answer}}
                                </p>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonials our-service">
        <div class="container">
            <div class="testimonial-details service-details">
                @foreach($review_description as $rd)
                <div class="title" data-aos="fade-right">
                    <h3>{!!$rd->title!!}</h3>
                </div>
                <p class="sub-title" data-aos="fade-right">{{$rd->description}}</p>
                @endforeach
                
                <div class="testimonial-slider" data-aos="fade-left">
                        
                        @foreach($review as $r)
                        <div class="col-lg-4">
                            <div class="testimonial-box">
                                <div class="testimonial-content">
                                  <span><i>“{{$r->description}}”</i></span>
                                </div>
                                <div class="testimonial-image-info">
                                    <div class="client-image">
                                        <img src="/uploads/{{$r->image}}">
                                    </div>
                                    <div class="client-info">
                                        <span>{{$r->title}}</span>
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        @foreach($review as $r)
                        <div class="col-lg-4">
                            <div class="testimonial-box">
                                <div class="testimonial-content">
                                  <span><i>“{{$r->description}}”</i></span>
                                </div>
                                <div class="testimonial-image-info">
                                    <div class="client-image">
                                        <img src="/uploads/{{$r->image}}">
                                    </div>
                                    <div class="client-info">
                                        <span>{{$r->title}}</span>
                                        <div class="rate">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                
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
                                        <input type="text" name="name" value=""  id="name">
                                         <span class="error-text name_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="co-input">
                                        <label>Phone Number</label>
                                        <input type="text" value="" name="number"  id="number">
                                         <span class="error-text number_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="co-input">
                                        <label>Email Address</label>
                                        <input type="text" value="" name="email"  id="email">
                                         <span class="error-text email_err"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="co-input">
                                        <label>Message</label>
                                        <textarea  name="message" id="message"></textarea>
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
                @foreach($home_banner as $hb)
                {!!$hb->link!!}
                @endforeach
            </div>
    
          </div>
        </div>
      </div>

<style>
    .typed-cursor{
        padding-left:0px!important;
    }
</style>
      

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script>
     <script type="text/javascript" src="/js/script.js"></script>
     
     <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous"></script>
     <script>
           var texts = [];
                $("input[id^='highlighted_text_']").each(function() {
                    texts.push($(this).val());
                    
                });
            

                // document.addEventListener("DOMContentLoaded", function() {
                //     var typing = new Typed(".banner-text", {
                //         strings: texts,
                //         typeSpeed: 100,
                //         backSpeed: 40,
                //         loop: false,
                //         showCursor: true, 
                //         cursorChar: '|', 
                        
                //         onComplete: function(self) { 
                           
                //             self.cursor.style.display = 'inline-block';
                          
                //             self.cursor.style.animation = 'none'; 
                            
                            
                //             if (texts[0]) {
                //             const h2Element = document.querySelector('.banner-content h2');
                //             h2Element.classList.add('highlight');
                //             const contentpos = document.querySelector('.banner-content');
                //             contentpos.classList.add('banner-contentpos');
                //             const contentmain = document.querySelector('.banner-inner-main');
                //             contentmain.classList.add('banner-posmain');
                //              }
                            
                
                             
                //         },
                       
                //     });
                // });
                
        document.addEventListener("DOMContentLoaded", function() {
            var typing = new Typed(".banner-text", {
                strings: texts,
                typeSpeed: 100,
                backSpeed: 40,
                loop: false,
              
                onStringTyped: function(pos, self) {
                    if (pos === 0) { // Check if the first string has been typed out
                        const h2Element = document.querySelector('.banner-content h2');
                        h2Element.classList.add('highlight');
                        const contentpos = document.querySelector('.banner-content');
                        contentpos.classList.add('banner-contentpos');
                        const contentmain = document.querySelector('.banner-inner-main');
                        contentmain.classList.add('banner-posmain');
                    }
                },
                  onComplete: function(self) { 
                           
                    self.cursor.style.display = 'inline-block';
                  
                    self.cursor.style.animation = 'none'; 
                     
                }
            });
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