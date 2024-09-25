<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="google-site-verification" content="SZlJ4tq08GDUFCkUr0bATY6i2SC39AwE60R0THhlObI" />
   	@php $meta_content=meta_content(); @endphp
    <title>{{$meta_content->meta_title}}</title>
    <meta name="description" content="{{$meta_content->meta_description}}">
    <!--<title>Sakkal</title>-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="/image/Favicon.png">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    
    
     <!-- Google Tag Manager -->
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TF2DJGKH');
    </script>
    <!-- End Google Tag Manager -->
    
            
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1161000024973436');
    fbq('track', 'PageView');
    </script>
     <!-- End Meta Pixel Code -->

</head>




<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TF2DJGKH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<!-- Meta Pixel Code (noscript) -->
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1161000024973436&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code  (noscript)-->

    
<header class="sticky-top">  
    <div class="header-main">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand logo" href="{{url('/')}}">
                <img src="/image/new_logo.png" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" >
                <ul class="navbar-nav mx-auto main-menu">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{url('/')}}">home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/about')}}">about us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/services')}}">services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/portfolio')}}">portfolio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{url('/price')}}">price</a>
                  </li>
                  
                 <li class="nav-item">
                    <a class="nav-link " href="{{url('/blog')}}">Blog</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/contact')}}">contact us</a>
                  </li>
                </ul>
                <div class="sakkal-btn">
                  <a href="#intake-modal" data-bs-toggle="modal">
                    get started
                  </a>
                </div>
              </div>
            </div>
        </nav>
    </div>
    <div class="offcanvas offcanvas-start mobile-menu" id="menu">
        <div class="offcanvas-header">
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mx-auto main-menu">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{url('/')}}">home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/about')}}">about us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/services')}}">services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/portfolio')}}">portfolio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{url('/price')}}">price</a>
                  </li>
                  
                    <li class="nav-item">
                    <a class="nav-link " href="{{url('/blog')}}">Blog</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/contact')}}">contact us</a>
                  </li>
                </ul>
              <div class="sakkal-btn mt-2">
                <a href="#intake-modal" data-bs-toggle="modal">
                  get started
                </a>
              </div>
        </div>
    </div>
</header>



@yield('content')


<div class="footer-main">
        <div class="container">
            <div class="footer-content" data-aos="fade-right">
                @foreach($footer_description as $fd)
                <h2>{{$fd->title}}</h2>
                <p data-aos="fade-left">
                    {{$fd->description}}
                </p>
                @endforeach
                <ul class="footer-social">
                    @foreach($social_links as $sl)
                    <li data-aos="fade-up" data-aos-duration="500">
                        <a href="{{$sl->facebook_url}}"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1000">
                        <a href="{{$sl->twitter_url}}"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1500">
                        <a href="{{$sl->linkedin_url}}"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                    <li data-aos="fade-up" data-aos-duration="2000">
                        <a href="{{$sl->github_url}}"><i class="fa-brands fa-github"></i></a>
                    </li>
                    @endforeach
                </ul>
                <div class="sakkal-btn">
                    <a href="#intake-modal" data-bs-toggle="modal">
                      get started
                    </a>
                </div>
            </div>
        </div>
        <div class="copyright-section">
           <div class="copyright-title">
                @foreach($footer_description as $fd)
                <span>{{$fd->title}}</span> <span> All rights reserved.</span>
                @endforeach
           </div>
           <ul class="quick-links">
                <li>
                    <a href="{{url('/privacy')}}">Privacy & Cookie Policy</a>
                </li>
                <li>
                    <a href="{{url('/terms')}}">Terms & Conditions</a>
                </li>
           </ul>
        </div>
    </div>

     <div id="stop" class="scrollTop">
        <span>
            <a href="">
                <i class="fa-solid fa-arrow-up"></i>
            </a>
        </span>
    </div>
    
    
    
    
    <div class="modal intake-modal" id="intake-modal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <div class="modal-header">
                <button type="button" class="btn-close close-intake" data-bs-dismiss="modal">
                  <i class="fa-solid fa-xmark"></i>
                </button>
              </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <iframe src="https://hello.dubsado.com/public/form/view/66939aae16c9b8003a107d4f" frameborder="0" style="width:1px; min-width:100%;"></iframe>    
            </div>
      
          </div>
        </div>
        </div>
        
        
        <style>
            
            .intake-modal .modal-header {
                border-bottom: none;
            }
            
            .intake-modal .modal-body {
                padding: 0;
            }
            
            
            .intake-modal .modal-dialog {
                max-width: 600px;
                width: 100%;
            }
            
            .close-intake {
                color: #fff !important;
                background-image: none;
                opacity: 1;
                width: 28px;
                height: 28px;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: var(--primary-color);
                border-radius: 100%;
                box-shadow: none;
                border: 1px solid transparent;
            }
            @media only screen and (max-width: 767px) {
                .intake-modal .modal-dialog {
                    max-width: 98%;
                    width: 100%;
                    margin: auto;
                }
            }
            
         
            .completion-message div p {
            	font-size:20px!important;
            	margin:0!important;
            }
            

        </style>
        <script async src="https://www.googletagmanager.com/gtag/js?id=GJ715DPN26Y"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-J715DPN26Y');
        </script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.14/iframeResizer.min.js"></script>
        <script type="text/javascript">
            setTimeout(function(){iFrameResize({checkOrigin: false, heightCalculationMethod: "taggedElement"});}, 30)
        </script>
        
</body>
</html>