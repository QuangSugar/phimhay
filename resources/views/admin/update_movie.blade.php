@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm phim
                    </header>
                    <?php 
	$message = Session::get('message');
	if($message){
		print_r($message);
		Session::put('message',null);
	}
	?>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/edit-movie/'.$movie->movie_id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phim</label>
                                <input value="{{$movie->movie_name}}" name="movie_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa phim</label>
                                <input value="{{$movie->movie_keywords}}" name="movie_keywords" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO miêu tả</label>
                                <input value="{{$movie->movie_seodes}}" name="movie_seodes" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO từ khóa</label>
                                <input value="{{$movie->movie_seokey}}" name="movie_seokey" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số tập phim</label>
                                <input value="{{$movie->movie_total_eposide}}" name="movie_total_eposide" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên nước ngoài</label>
                                <input value="{{$movie->movie_name_en}}" name="movie_name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug phim</label>
                                <input value="{{$movie->movie_slug}}" name="movie_slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <input value="{{$movie->movie_trangthai}}" name="movie_trangthai" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập trạng thái...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh phim</label>
                                <input  name="movie_image" type="file" class="form-control" id="exampleInputEmail1" >
                                <img width="100" height="150" src="{{URL::to('/public/uploads/movie/'.$movie->movie_image)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Năm phim</label>
                                <input value="{{$movie->movie_year}}" name="year" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thời lượng</label>
                                <input value="{{$movie->movie_time}}" name="movie_time" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập trạng thái...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chất lượng</label>
                                <input value="{{$movie->movie_quality}}" name="movie_quality" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập trạng thái...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Đánh giá</label>
                                <input value="{{$movie->movie_rate}}" name="movie_rate" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập trạng thái...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngôn ngữ</label>
                                <input value="{{$movie->movie_language}}" name="movie_language" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập trạng thái...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Series phim</label>
                            <select name="series" class="form-control input-sm m-bot15">
                                <option value="0"></option>
                                @foreach ($series as $key => $value)
                                @if ($value->series_id = $movie->series_id)
                                <option selected value="{{$value->series_id}}">{{$value->series_name}}</option>
                                @endif
                                <option value="{{$value->series_id}}">{{$value->series_name}}</option>
                                @endforeach
                            </select>
                            <select name="country" class="form-control input-sm m-bot15">
                                @foreach ($country as $key => $value)
                                @if ($value->country_id = $movie->country_id)
                                <option selected value="{{$value->country_id}}">{{$value->country_name}}</option>
                                @endif
                                <option value="{{$value->country_id}}">{{$value->country_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Loại phim</label>
                            <select name="option" class="form-control input-sm m-bot15">
                                <option value="0"></option>
                                @foreach ($option as $key => $value)
                                @if ($value->option_id = $movie->option_id)
                                <option selected value="{{$value->option_id}}">{{$value->option_name}}</option>
                                @endif
                                <option value="{{$value->option_id}}">{{$value->option_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trailer phim</label>
                                <input value="{{$movie->movie_trailer}}" name="movie_trailer" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập trạng thái...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lượt xem</label>
                                <input value="{{$movie->movie_view}}" name="movie_view" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập trạng thái...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phim hot</label>
                            <select name="movie_hot" class="form-control input-sm m-bot15">
                                @if ($movie->movie_hay == 1)
                                <option selected value="1">Có</option>
                                <option value="0">Không</option>
                                @else
                                <option value="1">Có</option>
                                <option selected value="0">Không</option>
                                @endif
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phim hay</label>
                            <select name="movie_hay" class="form-control input-sm m-bot15">
                                @if ($movie->movie_hay == 1)
                                <option selected value="1">Có</option>
                                <option value="0">Không</option>
                                @else
                                <option value="1">Có</option>
                                <option selected value="0">Không</option>
                                @endif
                                
                                
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea style="resize: none ;"  rows = 5 name="movie_content" class="form-control" id="exampleInputPassword1">{{$movie->movie_content}}</textarea>
                            </div>
                            <button type="submit" name="add_movie" class="btn btn-info">Cập nhật</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
</div>
@endsection