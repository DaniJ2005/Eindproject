@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
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

<form action="{{ route('products.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">

                <strong>Supplier</strong>
                <select name="supplier_id">
                  <option value="">Select a supplier</option>
                  @foreach($suppliers as $supplier)
                      <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                  @endforeach
                </select>

                <strong>Buy price</strong>
                <input type="text" name="buy_price" class="form-control" placeholder="Buy price">

                <strong>Sell price</strong>
                <input type="text" name="sell_price" class="form-control" placeholder="Sell price">

                <strong>Stock amount:</strong>
                <input type="text" name="stock" class="form-control" placeholder="Stock amount">

                <strong>minimal Stock amount:</strong>
                <input type="text" name="min_stock" class="form-control" placeholder="Minimal Stock amount">

                <strong>Max Stock amount:</strong>
                <input type="text" name="max_stock" class="form-control" placeholder="Max Stock amount">

                <strong>Warehous location:</strong>
                <input type="text" name="location" class="form-control" placeholder="Warehous location">

                
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection