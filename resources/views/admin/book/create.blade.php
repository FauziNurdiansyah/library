@extends('layouts.admin')
@section('header', 'Book')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Create Book</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('books') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Isbn</label>
                        <input type="text" name="isbn" class="form-control" placeholder="Enter Isbn" maxlength="9" required="">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" required="">
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="year" class="form-control" placeholder="Enter Year" required="">
                    </div>
                    <div class="form-group">
                        <label>Publisher ID</label>
                        <input type="text" name="publisher_id" class="form-control" placeholder="Enter Publisher" required="">
                    </div>
                    <div class="form-group">
                        <label>Author ID</label>
                        <input type="text" name="author_id" class="form-control" placeholder="Enter Author" required="">
                    </div>
                    <div class="form-group">
                        <label>Catalog ID</label>
                        <input type="text" name="catalog_id" class="form-control" placeholder="Enter Catalog" required="">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="qty" class="form-control" placeholder="Enter Quantity" required="">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter Price" required="">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.card -->
@endsection