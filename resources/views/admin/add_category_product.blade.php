@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add CateGoryProduct
                        </header>
                        <div class="panel-body">
                            <?php
                                $mess = Session::get('message');
                                if($mess)
                                {
                                    echo "<span class='text-success'>".$mess."</span>";
                                    Session::put('message',null);
                                }

                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="CategoryName">CategoryName</label>
                                    <input type="text" name ="category_product_name"class="form-control" id="CategoryName" placeholder="enterCategoryName">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name ="category_product_desc"class="form-control" rows="8" resize="none"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Display</label>
                                            <select name ="category_product_status"class="form-control input-sm m-bot15">
                                                <option value="0">hidden</option>
                                                <option value="1">visible</option>
                                            </select>
                                </div>
                            
                                <button type="submit" name="add_category_product"class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
          
        </div>
@endsection()