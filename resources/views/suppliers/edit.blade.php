@extends('suppliers.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit supplier</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('suppliers.index') }}"> Back</a>
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

    <form action="{{ route('suppliers.update',$supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Name:</strong>
                <input type="text" name="name" value="{{ $supplier->name }}" class="form-control" placeholder="Name">

                <strong>contact:</strong>
                <input type="text" name="contact" value="{{ $supplier->contact }}" class="form-control" placeholder="contact">

                <strong>email:</strong>
                <input type="email" name="email" value="{{ $supplier->email }}" class="form-control" placeholder="email">

                <strong>address</strong>
                <input type="text" name="address" value="{{ $supplier->address }}" class="form-control" placeholder="address">

                <strong>postal code</strong>
                <input type="text" name="postal_code" value="{{ $supplier->postal_code }}" class="form-control" placeholder="Postal code">

                <strong>city</strong>
                <input type="text" name="city" value="{{ $supplier->city }}" class="form-control" placeholder="city">
            </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection