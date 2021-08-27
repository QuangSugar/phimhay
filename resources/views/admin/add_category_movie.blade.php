@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm thể loại phim
                    </header>
                    <?php 
	// $message = Session::get('message');
	// if($message){
	// 	echo "<div class='alert alert-success' role='alert'>".$message."</div>";
	// 	Session::put('message',null);
	// }
	?>
                    <div class="panel-body">
                        <div class="position-center">
                            @foreach ($movie as $key => $value)
                            <form role="form" action="{{URL::to('/save-category-movie/'.$value->movie_id)}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phim</label>
                               <h3 class="text-center">{{$value->movie_name}}</h3>
        
                                @endforeach        
                            </div>
                            <div class="form-group">
                                @foreach ($category as $key => $value)
                                <div class="form-check form-check-inline">
                                
                                    <input class="form-check-input" name="category[]" type="checkbox" id="category_{{$value->category_id}}" value="{{$value->category_id}}">
                                    <label for="category_{{$value->category_id}}" class="form-check-label"> {{$value->category_name}}</label>
                            </div>
                                @endforeach              
                            </div>
                            <button type="submit" name="add_category" class="btn btn-info">Thêm thể loại</button>
                            <a 
                            href="{{URL::to('/add-movie')}}" name="add_category" class="btn btn-info">Ok</a>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
</div>
@endsection