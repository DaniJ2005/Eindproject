@extends('layout')

@include('navbar')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>sellorders </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('sellorders.create') }}"> Add New sellorder</a>
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
            <th>Customer Name</th>
            <th>Order Status</th>
            <th>Date</th>
            <th width="100px">Products</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($sellorders as $sellorder)
        <tr>
            <td>{{ $sellorder->id }}</td>
            <td>{{ $sellorder->customer->name }}</td>
            <td>
              @if($sellorder->status == 1)
              <p>Sell order registered</p>
              @elseif($sellorder->status == 2)
              <p>Sell order being collected</p>
              @elseif($sellorder->status == 3)
              <p>Sell order is on its way</p>
              @elseif($sellorder->status == 4)
              <p>Sell order delivered succesfully</p>
              @else
              <p>null</p>
              @endif
            </td>
            <td>{{ $sellorder->created_at }}</td>

            <td>
                
                <a class="btn btn-info" href="{{ route('sellorders.products.create',$sellorder->id) }}">Edit Product List</a>
                  
            </td>
            
            <td>
                <form action="{{ route('sellorders.destroy',$sellorder->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('sellorders.show',$sellorder->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('sellorders.edit',$sellorder->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $sellorders->links() }}


@endsection
