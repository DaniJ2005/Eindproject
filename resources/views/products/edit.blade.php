@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Name:</strong>
                  <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">

                  <strong>Image:</strong>
                  <input type="file" name="image" value="{{ old('image', $product->image) }}" class="form-control">
  
                  <strong>Buy price</strong>
                  <input type="text" name="buy_price" value="{{ $product->buy_price }}" class="form-control" placeholder="Buy price">
  
                  <strong>Sell price</strong>
                  <input type="text" name="sell_price" value="{{ $product->sell_price }}" class="form-control" placeholder="Sell price">
  
                  <strong>Stock amount:</strong>
                  <input type="text" name="stock" value="{{ $product->stock }}" class="form-control" placeholder="Stock amount">
  
                  <strong>minimal Stock amount:</strong>
                  <input type="text" name="min_stock" value="{{ $product->min_stock }}" class="form-control" placeholder="Minimal Stock amount">
  
                  <strong>Max Stock amount:</strong>
                  <input type="text" name="max_stock" value="{{ $product->max_stock }}" class="form-control" placeholder="Max Stock amount">
  
                  <strong>Warehous location:</strong>
                  <input type="text" name="location" value="{{ $product->location }}" class="form-control" placeholder="Warehous location">
            </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection