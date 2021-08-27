@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật quốc gia 
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
                            <form role="form" action="{{URL::to('/edit-country/'.$country->country_id)}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên quốc gia</label>
                                <input name="country_name" value="{{$country->country_name}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên quốc gia...">
                            </div>
            
                        
                            <button type="submit" name="update_country" class="btn btn-info">Cập nhật quốc gia</button>
                        </form>
                        </div>

                    </div>

                </section>

        </div>
    </div>
</div>
@endsection