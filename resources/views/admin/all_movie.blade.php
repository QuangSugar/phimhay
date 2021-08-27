@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê phim
      </div>
      <?php 
      $message = Session::get('message');
      if($message){
        echo "<div class='alert alert-success' role='alert'>".$message."</div>";
        Session::put('message',null);
      }
      ?>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên phim</th>
              <th>Số tập phim</th>
              <th>Tập phim</th>
      
              <th>Hình ảnh phim</th>
              <th>Năm phim</th>
              <th>Thời lượng</th>
              <th>Chất lượng</th>
              <th>Ngôn ngữ</th>
              <th>Quốc gia</th>
              <th>Thể loại</th>
              <th>Series</th>
              <th>Loại phim</th>
              <th>Lượt xem</th>
              <th>Phim hot</th>
              <th>Phim hay</th>
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_movie as $key => $movie)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $movie->movie_name }}</td>
              <td>{{ $movie->movie_total_eposide }}</td>
              <td><a href="{{URL::to('/manager-eposide/'.$movie->movie_id)}}" class="btn btn-sm btn-default">Quản lý</a></td>

              <td><img height="150" width="100" src="{{URL::to($movie->movie_image)}}"></td>
              <td>{{ $movie->movie_year }}</td>
              <td>{{ $movie->movie_time }}</td>
              <td>{{ $movie->movie_quality }}</td>
              <td>{{ $movie->movie_language }}</td>
              <td>{{ $movie->country_id }}</td>
              <td>
                @foreach ($category as $key => $value)
                @if ($movie->movie_id == $value->movie_id)
                {{$value->category_name}} <?php echo "<br>" ?>
                @endif
                
                  @endforeach
                  <a href="{{URL::to('/update-category-movie/'.$movie->movie_id)}}" class="btn btn-sm btn-default">Quản lý</a>
              </td>
              <td>{{ $movie->series_name }}</td>
              <td>{{ $movie->option_name }}</td>
              <td>{{ $movie->movie_view }}</td>
              <td>{{ $movie->movie_hot }}</td>
              <td>{{ $movie->movie_hay }}</td>
              <td><span class="text-ellipsis"><?php 
              if($movie->movie_status == 0){
                ?>
<a class="thumbs-styling" href="{{URL::to('/active-movie/'.$movie->movie_id)}}" ><span class="fa fa-thumbs-down"></span></a>
<?php
              }else{
                ?>
                <a class="thumbs-styling" href="{{URL::to('/unactive-movie/'.$movie->movie_id)}}" ><span class="fa fa-thumbs-up"></span></a>
                <?php
              }
              ?></span></td>
              <td>
                <a href="{{URL::to('/update-movie/'.$movie->movie_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                 <a onclick="return confirm('Bạn muốn xóa phim không ?')" href="{{URL::to('/delete-movie/'.$movie->movie_id)}}"> <i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
            
            @endforeach
           
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  @endsection