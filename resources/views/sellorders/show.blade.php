@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Sell Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sellorders.index') }}"> Back</a>
            </div>
        </div>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Order Number:</strong>
            {{ $sellorder->id }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Customer Name:</strong>
            {{ $sellorder->customer->name }}
          </div>
        </div>

        

        

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created at:</strong>
            {{ $sellorder->created_at }}
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          @if($sellorder->created_at != $sellorder->updated_at)
          <strong>Updated at:</strong>
              {{ $sellorder->updated_at }}
            @endif
        </div>
      </div>





      <table class="table table-bordered">
        <tr>
            <th>Product Number</th>
            <th>Product</th>
            <th>Product price</th>
            <th>Quantity</th>
            <th>Total Product Price</th>
        </tr>
        @php
        $totalPrice = 0;
        @endphp
        @foreach ($sellProducts as $sellProduct)
        @php
        $price = $sellProduct->product->sell_price * $sellProduct->quantity;
        $totalPrice += $price;
        @endphp
        <tr>
            <td>{{ $sellProduct->product->id }}</td>
            <td>{{ $sellProduct->product->name }}</td>
            <td>{{ $sellProduct->product->sell_price }}</td>
            <td>{{ $sellProduct->quantity }}</td>
            <td>&euro;{{ number_format($price, 2) }}</td>
        </tr>
        @endforeach
      </table>
      
      <strong>Order Total: &euro;{{ number_format($totalPrice, 2) }}</strong>




    </div>
@endsection