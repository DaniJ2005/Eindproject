@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit sellorder</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sellorders.index') }}"> Back</a>
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

    <form action="{{ route('sellorders.update', $sellorder->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Customer:</strong>
                  <select name="customer_id">
                    <option value="">Select a customer</option>
                    @foreach($customers as $customer)
                      <option value="{{ $customer->id }}" {{ old('customer_id', $sellorder->customer_id) == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                      </option>
                    @endforeach
                  </select>

                  <strong>Order status</strong>
                  <select name="status">
                    <option value="1" {{ $sellorder->status == 1 ? 'selected' : '' }}>Sell order registered</option>
                    <option value="2" {{ $sellorder->status == 2 ? 'selected' : '' }}>Sell order being collected</option>
                    <option value="3" {{ $sellorder->status == 3 ? 'selected' : '' }}>Sell order is on its way</option>
                    <option value="4" {{ $sellorder->status == 4 ? 'selected' : '' }}>Sell order delivered!</option>
                  </select>
                  
            </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection