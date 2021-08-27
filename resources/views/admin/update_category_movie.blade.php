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
                            <form role="form" action="{{URL::to('/save-category-movie/'.$movie->movie_id)}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phim</label>
                         
                                <h4>{{$movie->movie_name}}</h4>
                               
                                       
                            </div>
                            <div class="form-group">
                                @foreach ($category as $key => $value)
                                
                                   
{{--                                        
                                        <label class="checkbox-inline">
                                        <input checked name="category" type="checkbox" id="inlineCheckbox1" value="{{$cat->category_id}}"> {{$cat->category_name}}
                                        </label>
                                       --}}
                                       <div class="form-check form-check-inline">
                                
                                        <input class="form-check-input" name="category[]" type="checkbox" id="category_{{$value->category_id}}" value="{{$value->category_id}}">
                                        <label for="category_{{$value->category_id}}" class="form-check-label"> {{$value->category_name}}</label>
                                </div>
                                        </label>
                                     
                                   
                                   
                               
                                @endforeach
                            </div>
                            <button type="submit" name="add_category" class="btn btn-info">Thêm thể loại</button>
                            <a 
                            href="{{URL::to('all-movie')}}" name="add_category" class="btn btn-info">Ok</a>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
</div>
@endsection