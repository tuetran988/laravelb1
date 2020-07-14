@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Update CateGoryProduct
                        </header>
                        <div class="panel-body">
                           @foreach($edit_category_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="CategoryName">CategoryName</label>
                                    <input type="text" name ="category_product_name"class="form-control" id="CategoryName" value="{{$edit_value->category_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name ="category_product_desc"class="form-control" rows="8" resize="none">{{$edit_value->category_desc}}</textarea>
                                </div>
                              
                            
                                <button type="submit" name="update_category_product"class="btn btn-info">updateCategory</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
          
        </div>
@endsection()