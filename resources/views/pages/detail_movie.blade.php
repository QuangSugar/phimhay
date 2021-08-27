@extends('layout')
@section('content')
<div class="container">
    <div class="row container" id="wrapper">
       <div class="halim-panel-filter">
          <div class="panel-heading">
             <div class="row">
                <div class="col-xs-6">
                   <div class="yoast_breadcrumb hidden-xs"><span><span><a href="danhmuc.php">{{$movie->option_id}}</a> » <span><a href="danhmuc.php">{{$movie->country_id}}</a> » <span class="breadcrumb_last" aria-current="page">{{$movie->movie_name}}</span></span></span></span></div>
                </div>
             </div>
          </div>
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
             <div class="ajax"></div>
          </div>
       </div>
       <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
          <section id="content" class="test">
             <div class="clearfix wrap-content">
               
                <div class="halim-movie-wrapper">
                   <div class="title-block">
                      <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                         <div class="halim-pulse-ring"></div>
                      </div>
                      {{-- <div class="title-wrapper" style="font-weight: bold;">
                         Bookmark
                      </div> --}}
                   </div>
                   <div class="movie_info col-xs-12">
                      <div class="movie-poster col-md-3">
                         <img class="movie-thumb" src="{{URL::to($movie->movie_image)}}" alt="GÓA PHỤ ĐEN">
                         <div class="bwa-content">
                            <div class="loader"></div>
                            <a href="{{URL::to('/'.$movie->movie_slug.'_'.$movie->movie_id.'/tap-1')}}" class="bwac-btn">
                            <i class="fa fa-play"></i>
                            </a>
                         </div>
                      </div>
                      <div class="film-poster col-md-9">
                         <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->movie_name}}</h1>
                         <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->movie_name_en}}</h2>
                         <ul class="list-info-group">
                            <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">{{$movie->movie_quality}}</span><span class="episode">{{$movie->movie_language}}</span></li>
                            <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">{{$movie->movie_rate}}</span></li>
                            <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->movie_time}}</li>
                            <li class="list-info-group-item"><span>Thể loại</span> : <a href="" rel="category tag">{{$movie->option_id}}</a>,@foreach ($category_movie as $key => $cate)
                              <a href="{{URL::to('/the-loai/'.$cate->category_slug)}}" rel="category tag">{{$cate->category_name}}</a>,
                            @endforeach </li>
                            <li class="list-info-group-item"><span>Quốc gia</span> : <a href="" rel="tag">Mỹ</a></li>
                            <li class="list-info-group-item"><span>Lượt xem</span> : <a href="" rel="tag">{{$movie->movie_view}}</a></li>
                         </ul>
                         <div class="movie-trailer hidden"></div>
                      </div>
                   </div>
                </div>
                <div class="clearfix"></div>
                <div id="halim_trailer"></div>
                <div class="clearfix"></div>
                <div class="section-bar clearfix">
                   <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim {{$movie->movie_name}}</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                   <div class="video-item halim-entry-box">
                      <article id="post-38424" class="item-content">

                         <p>{{$movie->movie_content}}</p>
                         <img width="100%" src="{{$movie->movie_image2}}" alt="">
                         <div class="section-bar clearfix">
                           <h2 class="section-title"><span style="color:#ffed4d">Trailer</span></h2>
                        </div>
                         <iframe width="100%" height="488" src="{{$movie->movie_trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                         {{-- <h5>Từ Khoá Tìm Kiếm:</h5>
                         <ul>
                            <li>{{$movie->movie_keywords}}</li>
                         </ul> --}}
                      </article>
                   </div>
                </div>
             </div>
          </section>
          <section class="related-movies">
             <div id="halim_related_movies-2xx" class="wrap-slider">
                <div class="section-bar clearfix">
                   <h3 class="section-title"><span>PHIM CÙNG THỂ LOẠI</span></h3>
                </div>
                <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                   @foreach ($movie_related as $key => $value)
                   @if ($value->movie_id != $movie->movie_id)
                   <article class="thumb grid-item post-38498">
                     <div class="halim-item">
                        <a class="halim-thumb" href="{{URL::to('/detail-movie/'.$value->movie_id)}}" title="{{$value->movie_name}}">
                           <figure><img class="lazy img-responsive" src="{{URL::to($value->movie_image)}}" alt="{{$value->movie_name}}" title="{{$value->movie_name}}"></figure>
                           <span class="status">{{$value->movie_quality}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$value->movie_language}}</span> 
                           <div class="icon_overlay"></div>
                           <div class="halim-post-title-box">
                              <div class="halim-post-title ">
                                 <p class="entry-title">{{$value->movie_name}}</p>
                                 <p class="original_title">{{$value->movie_name_en}}</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </article> 
                   @endif
      
                   @endforeach
                   
                </div>
                <script>
                   jQuery(document).ready(function($) {				
                   var owl = $('#halim_related_movies-2');
                   owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
                </script>
             </div>
          </section>
       </main>
       @include('includes.sidebar')
    </div>
 </div>
@endsection
