@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Buy Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('buyorders.index') }}"> Back</a>
            </div>
        </div>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Order Number:</strong>
            {{ $buyorder->id }}
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Supplier Name:</strong>
            {{ $buyorder->supplier->name }}
          </div>
        </div>

        

        

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created at:</strong>
            {{ $buyorder->created_at }}
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          @if($buyorder->created_at != $buyorder->updated_at)
          <strong>Updated at:</strong>
              {{ $buyorder->updated_at }}
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
        @foreach ($buyProducts as $buyProduct)
        @php
        $price = $buyProduct->product->buy_price * $buyProduct->quantity;
        $totalPrice += $price;
        @endphp
        <tr>
            <td>{{ $buyProduct->product->id }}</td>
            <td>{{ $buyProduct->product->name }}</td>
            <td>{{ $buyProduct->product->buy_price }}</td>
            <td>{{ $buyProduct->quantity }}</td>
            <td>&euro;{{ number_format($price, 2) }}</td>
        </tr>
        @endforeach
      </table>
      
      <strong>Order Total: &euro;{{ number_format($totalPrice, 2) }}</strong>




    </div>
@endsection