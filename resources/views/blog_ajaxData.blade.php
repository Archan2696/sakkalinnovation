<div class="row " >
                    @foreach($blog as $key=>$b)
                        
                        @php
                            $condition = ($key % 3) + 1;
                        @endphp
                        
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            @if($condition == 1)
                            <div class="update-box">
                            @elseif($condition == 2)
                            <div class="update-box">
                            @elseif($condition == 3)
                            <div class="update-box">
                            @else
                            <div class="update-box">
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
                
                <div class="expert-pagination">
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