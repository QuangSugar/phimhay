@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm tập phim
                    </header>
                    <?php 
	$message = Session::get('message');
	if($message){
		echo "<div class='alert alert-success' role='alert'>".$message."</div>";
		Session::put('message',null);
	}
	?>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/save-eposide')}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tập phim</label>
                                <input name="eposide_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug tập phim</label>
                                <input name="eposide_slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link stream</label>
                                <input name="eposide_video" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại phim...">
                            </div>
                            <input type="hidden" name="movie_id" value="{{$movie->movie_id}}">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="eposide_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                            </div>
                            <button type="submit" name="add_eposide" class="btn btn-info">Thêm tập phim</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
</div>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê tập phim
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
              <th>Tên tập phim</th>
              <th>Slug tập phim</th>
              <th>Link stream</th>
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $key => $eposide)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $eposide->eposide_name }}</td>
              <td>{{ $eposide->eposide_slug }}</td>
              <td>{{ $eposide->eposide_video }}</td>
              <td><span class="text-ellipsis"><?php 
              if($eposide->eposide_status == 0){
                ?>
<a class="thumbs-styling" href="{{URL::to('/active-eposide/'.$eposide->eposide_id)}}" ><span class="fa fa-thumbs-down"></span></a>
<?php
              }else{
                ?>
                <a class="thumbs-styling" href="{{URL::to('/unactive-eposide/'.$eposide->eposide_id)}}" ><span class="fa fa-thumbs-up"></span></a>
                <?php
              }
              ?></span></td>
              <td>
                <a href="{{URL::to('/update-eposide/'.$eposide->eposide_id.'/'.$movie->movie_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                 <a onclick="return confirm('Bạn muốn xóa loại phim không ?')" href="{{URL::to('/delete-eposide/'.$eposide->eposide_id)}}"> <i class="fa fa-times text-danger text"></i></a>
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