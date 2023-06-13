@extends('suppliers.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>suppliers </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('suppliers.create') }}"> Add New supplier</a>
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
            <th>Name</th>
            <th>contact</th>
            <th>E-mail</th>
            <th>address</th>
            <th>postal-code</th>
            <th>city</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->id }}</td>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->contact }}</td>
            <td>{{ $supplier->email }}</td>
            <td>{{ $supplier->address }}</td>
            <td>{{ $supplier->postal_code }}</td>
            <td>{{ $supplier->city }}</td>

            <td>
                <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('suppliers.show',$supplier->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('suppliers.edit',$supplier->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $suppliers->links() }}


@endsection
