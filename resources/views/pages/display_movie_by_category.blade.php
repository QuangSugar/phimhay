@extends('layout')
@section('content')
<div class="container">
<div class="row" id="wrapper">
    <div class="halim-panel-filter">
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <div class="col-xs-12 carausel-sliderWidget">
       <section id="halim-advanced-widget-4">
          <div class="section-heading">
             <a href="danhmuc.php" title="Phim Chiếu Rạp">
                
             <span class="h-text">Phim {{$title->category_name}}</span>
             </a>
             <ul class="heading-nav pull-right hidden-xs">
                <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
             </ul>
          </div>
          <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
              @foreach ($movie as $key => $movie_by_cate)
              <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                <div class="halim-item">
                   <form action="">
                      @csrf
                   <a  href="{{URL::to('/detail-movie/'.$movie_by_cate->movie_id)}}">
                      <figure><img class="lazy img-responsive" src="{{URL::to($movie_by_cate->movie_image)}}" alt="{{$movie_by_cate->movie_name}}" title="{{$movie_by_cate->movie_name}}"></figure>
                      <span class="status">{{$movie_by_cate->movie_quality}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$movie_by_cate->movie_language}}</span> 
                      <div class="icon_overlay"></div>
                      <div class="halim-post-title-box">
                         <div class="halim-post-title ">
                            <p class="entry-title">{{$movie_by_cate->movie_name}}</p>
                            <p class="original_title">{{$movie_by_cate->movie_name_en}}</p>
                         </div>
                      </div>
                   </a>
                  </form>
                </div>
             </article>
              @endforeach
          </div>
       </section>
       <div class="clearfix"></div>
    </div>
 </div>
</div>
 @endsection