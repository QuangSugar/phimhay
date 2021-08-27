@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm quốc gia phim
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
                            <form role="form" action="{{URL::to('/save-country')}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên quốc gia</label>
                                <input name="country_name" type="text" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="country_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                            </div>
                            <button type="submit" name="add_country" class="btn btn-info">Thêm quốc gia</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
</div>
@endsection