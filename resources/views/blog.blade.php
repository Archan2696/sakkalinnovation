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


    <div class="recent-update inner-blog">
    <div class="container">
        <div class="recent-update-info">
            @foreach($blog_description as $bd)
            <div class="inner-blog-head">
                <div class="title" data-aos="zoom-in">
                    <h3>{{$bd->title}}</h3>
                </div>
                <div class="team-member-content">
                    <p data-aos="zoom-in">{{$bd->description}}</p>
                  
                </div>
            </div>
            @endforeach
            
            
            <div class="blog-search" data-aos="fade-left">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="filter_form">
                            <form id="filterForm">
                                 {{csrf_field()}}
                                <input autocomplete="off" type="text" name="search" id="search" class="text-field"
                                    placeholder="Search here...">
            
                                <button type="button" class="search-btn"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
           <div class="results">
                <div class="row " >
                    @foreach($blog as $key=>$b)
                        
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
                                 <a href="{{url('/blog_detail')}}/{{$b->slug}}">
                                    <img src="uploads/{{$b->image}}">
                                </a>
                            </div>
                            <div class="recent-update-details">
                                <span>{{$b->title1}}</span>
                               <a href="{{url('/blog_detail')}}/{{$b->slug}}"> <h3>{{$b->title2}}</h3> </a>
                                <span>{{$b->title3}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="expert-pagination" data-aos="fade-down-right">
                      {{$blog->links('pagination.pagination')}}
                    <!--<div class="row">-->
                    <!--    <div class="col-lg-12">-->
                    <!--        <ul class="pagination">-->
                    <!--            <li class="page-item">-->
                    <!--                <a class="page-link" href="#"><i class="fa-solid fa-chevron-left"></i></a>-->
                    <!--            </li>-->
                    <!--            <li class="page-item">-->
                    <!--                <a class="page-link active" href="#">1</a>-->
                    <!--            </li>-->
                    <!--            <li class="page-item">-->
                    <!--                <a class="page-link" href="#">2</a>-->
                    <!--            </li>-->
                    <!--            <li class="page-item">-->
                    <!--                <a class="page-link" href="#">3</a>-->
                    <!--            </li>-->
                    <!--            <li class="page-item">...</li>-->
                    <!--            <li class="page-item">-->
                    <!--                <a class="page-link" href="#">10</a>-->
                    <!--            </li>-->
                    <!--            <li class="page-item">-->
                    <!--                <a class="page-link" href="#"><i class="fa-solid fa-chevron-right"></i></a>-->
                    <!--            </li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
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
 
<script type="text/javascript">

    jQuery(function($) {
        $('#filterForm').on('keydown', function(event) {
            if (event.key === 'Enter' && event.target.id === 'search') {
                event.preventDefault(); // Prevent the form from being submitted on Enter key press
            }
        });
    });
    $("#search").keyup(function(event){
        getProperties();
    });

    $('.search-btn').click(function(){
        getProperties();
    });
    
    function getProperties(page=1){
        var BASE_URL = "{{ url('/') }}";
       
        $.ajax({
        
            url:BASE_URL+'/load-blog',
            type:'POST',
            data:$("#filterForm").serialize()+'&page='+page,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
              $(".results").html(response);
            },
            error: function(response) {
            
            },        
        });
    }
    
    $(document).on('click', '.pagination .page-item .clickable', function(blog){
            blog.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            getProperties(page)
;
         });
         
         

   
   
      
          
</script>

@endsection

