@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật series
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
                            <form role="form" action="{{URL::to('/edit-series/'.$series->series_id)}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên series</label>
                                <input name="series_name" value="{{$series->series_name}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên series...">
                            </div>
                        
                            <button type="submit" name="update_series" class="btn btn-info">Cập nhật series</button>
                        </form>
                        </div>

                    </div>

                </section>

        </div>
    </div>
</div>
@endsection