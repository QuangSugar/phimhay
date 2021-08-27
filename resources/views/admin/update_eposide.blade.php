@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật tập phim
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
                            <form role="form" action="{{URL::to('/edit-eposide/'.$eposide->eposide_id)}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tập phim</label>
                                <input value="{{$eposide->eposide_name}}" name="eposide_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug tập phim</label>
                                <input value="{{$eposide->eposide_slug}}" name="eposide_slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại phim...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link stream</label>
                                <input value="{{$eposide->eposide_video}}" name="eposide_video" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên loại phim...">
                            </div>
                    
                            
                            <button type="submit" name="add_eposide" class="btn btn-info">Cập nhật tập phim</button>
                            <a href="{{URL::to('/manager-eposide/'.$movie->movie_id)}}" name="back_page" class="btn btn-info">Trở lại</a>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
</div>
@endsection