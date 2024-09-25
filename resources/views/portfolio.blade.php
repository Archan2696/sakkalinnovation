@extends('layout.header_footer')

@section('content')
    @foreach($banner as $b)
    <div class="bg-banner" style="background-image: url('/uploads/{{$b->image}}');">
        <div class="container">
            <div class="about-title">
                <h2>{{$b->page_title}}</h2>
            </div>
        </div>
    </div>
    @endforeach




    <div class="main_project">
        <div class="container">
            @foreach($portfolio_description as $pd)
            <div class="project_head">
                <div class="title">
                    <h3>{{$pd->title}}</h3>
                </div>
                <p class="sub-title">{!!$pd->description!!}</p>
            </div>
            @endforeach
            <div class="row project_tabs_container">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs project_tabs">
                        <li class="nav-item">
                            <a class="active" data-bs-toggle="tab" href="#all">All</a>
                        </li>
                        @foreach($project_type as $pt)
                        <li class="nav-item">
                            <a class="" data-bs-toggle="tab" href="#{{$pt->category}}">{{$pt->category}}</a>
                        </li>
                        @endforeach
                        <!--<li class="nav-item">-->
                        <!--    <a class="" data-bs-toggle="pill" href="#development">Development</a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a class="" data-bs-toggle="pill" href="#marketing">Marketing</a>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="tab-content project_content">
                    <div class="tab-pane container active" id="all">
                        <div class="row">
                            @foreach($portfolio_list as $key=>$p)
                            
                            @php
                                $condition = ($key % 3) + 1;
                            @endphp
                            
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                @if($condition == 1)
                                <div class="project_box" data-aos="flip-left" data-aos-duration="1000">
                                @elseif($condition == 2)
                                <div class="project_box" data-aos="flip-up" data-aos-duration="1000">
                                @elseif($condition == 3)
                                <div class="project_box" data-aos="flip-right" data-aos-duration="1000">
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
                                        <!-- <a href="#" class="project_icon"><i class="fa-solid fa-angle-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @foreach($project_type as $pt)
                    <div class="tab-pane container fade" id="{{$pt->category}}">
                        <div class="row">
                            @foreach($portfolio as $key1=>$pd)
                            @if($pd->category == $pt->category)
                            @php
                                $condition1 = ($key1 % 3) + 1;
                            @endphp
                            
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                @if($condition1 == 1)
                                <div class="project_box" data-aos="flip-left" data-aos-duration="1000">
                                @elseif($condition1 == 2)
                                <div class="project_box" data-aos="flip-up" data-aos-duration="1000">
                                @elseif($condition1 == 3)
                                <div class="project_box" data-aos="flip-right" data-aos-duration="1000">
                                @endif
                                    <div class="image_box">
                                        <a href="/uploads/{{$pd->image}}" data-fancybox="gallary">
                                            <img src="/uploads/{{$pd->image}}" alt="image">
                                            <div class="oh ho_1"></div>
                                        <div class="oh ho_2"></div>
                                        <div class="oh ho_3"></div>
                                        <div class="oh ho_4"></div>
                                        </a>
                                        <a data-fancybox="gallery" class="zm_btn trans" href="/uploads/{{$pd->image}}">
                                            <i class="fa-solid fa-circle-plus"></i>
                                        </a>
                                        
                                    </div>
                                    <div class="project_details">
                                        <h3><a href="{{$p->link}}" target="_blank">{{$pd->name}}</a></h3>
                                        <p>{{$pd->category}}</p>
                                        <!-- <a href="#" class="project_icon"><i class="fa-solid fa-angle-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="newsletter-section">
        <div class="container">
            @foreach($cta as $c)
            <div class="newsletter-item">
                <div class="newsletter-content">
                    <h3 data-aos="fade-up">{{$c->title}}</h3>
                    <p data-aos="fade-up">{{$c->description}}</p>
                    <div class="d-flex">
                        <div class="btn-white sakkal-btn" data-aos="zoom-in">
                            <a href="{{url('/contact')}}">Let’s Talk</a>
                        </div>
                        <div class="sakkal-btn" data-aos="zoom-in">
                            <a href="{{url('/services')}}">
                               <span>Our Services</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="newsletter-img" data-aos="zoom-in-left">
                    <img src="/uploads/{{$c->image}}" alt="image">
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <div class="recent-update project_post">
        <div class="container">
            <div class="recent-update-info">
                @foreach($recent_news_description as $rnd)
                <div class="title" data-aos="zoom-in">
                    <h3>{{$rnd->title}}</h3>
                </div>
                <div class="team-member-content">
                    <p data-aos="zoom-in">{{$rnd->description}}</p>
                  <div class="sakkal-btn" data-aos="fade-left">
                        <a href={{url('/blog')}}>
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
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/mtZc4EkSw3M?si=2Lp3GDGr5txpDQW8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous"></script>
     
    <script>
        // Initialize AOS with your desired settings
        AOS.init();
    
        // Function to adjust tab pane heights based on content
        function adjustTabPaneHeights() {
            var tabContent = document.querySelector('.project_tabs');
            var tabPanes = tabContent.querySelectorAll('.tab-pane');
            
            // Reset heights to auto to calculate new heights
            tabPanes.forEach(function(pane) {
                pane.style.height = 'auto';
            });
            
            // Find the maximum height among all tab panes
            var maxHeight = 0;
            tabPanes.forEach(function(pane) {
                var paneHeight = pane.scrollHeight; // Get the scroll height to include overflow content
                if (paneHeight > maxHeight) {
                    maxHeight = paneHeight;
                }
            });
            
            // Set all tab panes to the maximum height
            tabPanes.forEach(function(pane) {
                pane.style.height = maxHeight + 'px';
            });
        }
    
        // Function to refresh AOS animations when tab changes
        function refreshAOS() {
            setTimeout(function() {
                AOS.refresh();
            }, 100); // Adjust delay if needed to ensure AOS refreshes after tab change
        }
    
        // Listen for tab change event and refresh AOS
        var tabTriggers = document.querySelectorAll('[data-bs-toggle="tab"]');
        tabTriggers.forEach(function(tabTrigger) {
            tabTrigger.addEventListener('shown.bs.tab', function (e) {
                adjustTabPaneHeights();
                refreshAOS();
            });
        });
    
        // Initial setup on page load
        adjustTabPaneHeights();
        refreshAOS();
    </script>
@endsection