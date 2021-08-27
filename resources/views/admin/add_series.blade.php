@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm series
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
                            <form role="form" action="{{URL::to('/save-series')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên series</label>
                                <input name="series_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên series...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="series_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                            </div>
                            <button type="submit" name="add_series" class="btn btn-info">Thêm series</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
</div>
@endsection