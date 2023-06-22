@extends('layout')

@include('navbar')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>products </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add New Product</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Supplier</th>
            <th>Buy Price</th>
            <th>Sell Price</th>
            <th>Stock</th>
            <th>Min Stock</th>
            <th>Max Stock</th>
            <th>Location</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{ asset('storage/images/' . $product->image) }}" style="max-height: 60px" ></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->supplier->name }}</td>
            <td>&euro;{{ $product->buy_price }}</td>
            <td>&euro;{{ $product->sell_price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->min_stock }}</td>
            <td>{{ $product->max_stock }}</td>
            <td>{{ $product->location }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $products->links() }}


@endsection
