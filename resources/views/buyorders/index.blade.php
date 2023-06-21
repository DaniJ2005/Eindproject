@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>buyorders </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('buyorders.create') }}"> Add New buyorder</a>
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
            <th>Order Number</th>
            <th>Supplier Name</th>
            <th>Date</th>
            <th width="100px">Products</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($buyorders as $buyorder)
        <tr>
            <td>{{ $buyorder->id }}</td>
            <td>{{ $buyorder->supplier->name }}</td>
            <td>{{ $buyorder->created_at }}</td>

            <td>
                
                <a class="btn btn-info" href="{{ route('buyorders.products.create',$buyorder->id) }}">Edit Product List</a>
                  
            </td>
            
            <td>
                <form action="{{ route('buyorders.destroy',$buyorder->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('buyorders.show',$buyorder->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('buyorders.edit',$buyorder->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $buyorders->links() }}


@endsection
