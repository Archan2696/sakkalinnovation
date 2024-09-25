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





<div class="recent-update inner-blog blog-details">
    <div class="container">
        <div class="recent-update-info">
            <div class="inner-blog-head">
                @foreach($blog as $b)
                <div class="title" data-aos="zoom-in">
                    <h3>{{$b->title2}}</h3>
                </div>
                @endforeach
                <!--<div class="team-member-content">-->
                <!--    <p data-aos="zoom-in">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by. </p>-->
                  
                <!--</div>-->
            </div>
           
           
           
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    @foreach($blog as $b)
                    <div class="update-box"  data-aos="fade-up" data-aos-duration="500">
                        <div class="recent-update-image">
                             <a href="#">
                                <img src="/uploads/{{$b->image}}">
                            </a>
                        </div>
                        <div class="recent-update-details">
                            <span>{{$b->title1}}</span>
                           <a href="#"> <h3>{{$b->title2}}</h3> </a>
                            <span>{{$b->title3}}</span>
                            
                            <p>{{$b->main_description}}</p>
                            
                            <div class="recent-update-innercontent">
                                
                                @php $detail_title=json_decode($b->detail_title); @endphp
                                @php $description=json_decode($b->description); @endphp
                                
                                @foreach($detail_title as $key=>$dt) 
                                
                                    <h4>{{$dt->title}}</h4>
                                    @foreach($description as $key1=>$d)
                                    @if($key1==$key)
                                        <p>{{$d->des}}</p>
                                    @endif
                                    @endforeach
                                    
                                @endforeach
                                
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                   
                </div>  
                <div class="col-lg-4 col-md-5">
                  
                    <div class="latest-blog" >
                        <h4>Latest Blog</h4>
                        @foreach($blog_list as $bl)
                        <div class="recent-blog-list" >
                            <div class="left-image" >
                                <a href="{{url('blog_detail')}}/{{$bl->slug}}">
                                    <img src="/uploads/{{$bl->image}}" alt="">
                                </a>
                            </div>
                            <div class="blog-right-desc">
                                <a href="{{url('blog_detail')}}/{{$bl->slug}}"> <h3>{{$bl->title2}}</h3> </a>
                                <span>{{$bl->title3}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
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

@endsection