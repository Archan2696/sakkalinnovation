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

<div class="termscondition-main">
    <div class="container">
        @foreach($privacy_policy as $pp)
        <div class="termscondition-content">
            <h3>{{$pp->title}}</h3>
             <p>{!!$pp->description!!}</p>

        </div>
        @endforeach
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